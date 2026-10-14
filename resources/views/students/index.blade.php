@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Students List</h2>
        <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">+ Add Student</a>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Course / Year</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Department</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($students as $student)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $student->student_id_no }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $student->first_name }} {{ $student->last_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $student->course }} ({{ $student->year_level }})</td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $student->department->name ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete student?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No students found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $students->links() }}</div>
</div>
@endsection