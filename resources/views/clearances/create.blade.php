@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Create Clearance Request</h2>

    <form action="{{ route('clearances.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Select Student</label>
            <select name="student_id" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="">-- Choose Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }} ({{ $student->student_id_no }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">School Year</label>
            <input type="text" name="school_year" placeholder="e.g. 2025-2026" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Semester</label>
            <select name="semester" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="1st Semester">1st Semester</option>
                <option value="2nd Semester">2nd Semester</option>
                <option value="Summer">Summer</option>
            </select>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('clearances.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Submit Request</button>
        </div>
    </form>
</div>
@endsection