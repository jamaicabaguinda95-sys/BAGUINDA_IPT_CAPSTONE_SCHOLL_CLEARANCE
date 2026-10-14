<?php

namespace App\Http\Controllers;

use App\Models\Clearance;
use App\Models\Student;
use App\Models\Department;
use App\Models\Approval;
use Illuminate\Http\Request;

class ClearanceController extends Controller
{
    /**
     * Display a listing of the clearances.
     */
    public function index()
    {
        $clearances = Clearance::with(['student.department', 'approvals.department'])->latest()->paginate(10);
        return view('clearances.index', compact('clearances'));
    }

    /**
     * Show the form for creating a new clearance request.
     */
    public function create()
    {
        $students = Student::all();
        return view('clearances.create', compact('students'));
    }

    /**
     * Store a newly created clearance in storage and initialize approvals for all departments.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'school_year' => 'required|string',
            'semester' => 'required|string',
        ]);

        // Create the main clearance record
        $clearance = Clearance::create([
            'student_id' => $request->student_id,
            'school_year' => $request->school_year,
            'semester' => $request->semester,
            'status' => 'Pending',
        ]);

        // Automatically create approval records for every department in the system
        $departments = Department::all();
        foreach ($departments as $department) {
            Approval::create([
                'clearance_id' => $clearance->id,
                'department_id' => $department->id,
                'status' => 'Pending',
            ]);
        }

        return redirect()->route('clearances.index')->with('success', 'Clearance request created successfully.');
    }

    /**
     * Display the specified clearance with all department approval statuses.
     */
    public function show(Clearance $clearance)
    {
        $clearance->load(['student.department', 'approvals.department']);
        return view('clearances.show', compact('clearance'));
    }

    /**
     * Update a specific department's approval status.
     */
    public function updateApproval(Request $request, Approval $approval)
    {
        $request->validate([
            'status' => 'required|in:Approved,Rejected',
            'remarks' => 'nullable|string',
        ]);

        $approval->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        // Check if all department approvals for this clearance are 'Approved'
        $clearance = $approval->clearance;
        $allApproved = $clearance->approvals()->where('status', '!=', 'Approved')->count() === 0;
        $anyRejected = $clearance->approvals()->where('status', 'Rejected')->count() > 0;

        if ($anyRejected) {
            $clearance->update(['status' => 'Rejected']);
        } elseif ($allApproved) {
            $clearance->update(['status' => 'Approved']);
        }

        return redirect()->route('clearances.show', $clearance->id)->with('success', 'Approval status updated.');
    }

    /**
     * Remove the specified clearance from storage.
     */
    public function destroy(Clearance $clearance)
    {
        $clearance->delete();
        return redirect()->route('clearances.index')->with('success', 'Clearance deleted successfully.');
    }
}