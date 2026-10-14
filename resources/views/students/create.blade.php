@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Student</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Student ID No</label>
            <input type="text" name="student_id_no" placeholder="e.g. 2026-0003" class="w-full border rounded-md p-2" required>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
                <input type="text" name="first_name" class="w-full border rounded-md p-2" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                <input type="text" name="last_name" class="w-full border rounded-md p-2" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" class="w-full border rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Department</label>
            <select name="department_id" class="w-full border rounded-md p-2" required>
                <option value="">-- Select Department --</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Course</label>
                <input type="text" name="course" placeholder="e.g. BSIT" class="w-full border rounded-md p-2" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Year Level</label>
                <input type="text" name="year_level" placeholder="e.g. 3rd Year" class="w-full border rounded-md p-2" required>
            </div>
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('students.index') }}" class="bg-gray-300 px-4 py-2 rounded-md">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save Student</button>
        </div>
    </form>
</div>
@endsection