@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 mb-6">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Clearance Details</h2>
            <p class="text-gray-600">Student: <span class="font-semibold">{{ $clearance->student->first_name }} {{ $clearance->student->last_name }}</span></p>
            <p class="text-gray-600">School Year / Semester: <span class="font-semibold">{{ $clearance->school_year }} - {{ $clearance->semester }}</span></p>
        </div>
        <div>
            <span class="px-3 py-1 text-sm font-semibold rounded-full 
                @if($clearance->status == 'Approved') bg-green-100 text-green-800 
                @elseif($clearance->status == 'Rejected') bg-red-100 text-red-800 
                @else bg-yellow-100 text-yellow-800 @endif">
                Overall: {{ $clearance->status }}
            </span>
        </div>
    </div>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Department Sign-offs & Approvals</h3>

    <div class="space-y-4">
        @foreach($clearance->approvals as $approval)
        <div class="border border-gray-200 rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h4 class="font-bold text-lg text-gray-700">{{ $approval->department->name }}</h4>
                <p class="text-sm text-gray-500">Status: 
                    <span class="font-semibold 
                        @if($approval->status == 'Approved') text-green-600 
                        @elseif($approval->status == 'Rejected') text-red-600 
                        @else text-yellow-600 @endif">
                        {{ $approval->status }}
                    </span>
                </p>
                @if($approval->remarks)
                    <p class="text-xs text-gray-500 mt-1">Remarks: {{ $approval->remarks }}</p>
                @endif
            </div>

            <!-- Approval Action Form -->
            <form action="{{ route('approvals.update', $approval->id) }}" method="POST" class="flex items-center gap-2">
                @csrf
                @method('PATCH')

                <input type="text" name="remarks" placeholder="Optional remarks..." value="{{ $approval->remarks }}" class="border border-gray-300 rounded text-sm p-1.5">

                <select name="status" class="border border-gray-300 rounded text-sm p-1.5" required>
                    <option value="Pending" @selected($approval->status == 'Pending')>Pending</option>
                    <option value="Approved" @selected($approval->status == 'Approved')>Approved</option>
                    <option value="Rejected" @selected($approval->status == 'Rejected')>Rejected</option>
                </select>

                <button type="submit" class="bg-indigo-600 text-white text-sm px-3 py-1.5 rounded hover:bg-indigo-700">Update</button>
            </form>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        <a href="{{ route('clearances.index') }}" class="text-blue-600 hover:underline">&larr; Back to Clearances List</a>
    </div>
</div>
@endsection