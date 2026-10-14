@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Departments</h2>
        <a href="{{ route('departments.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">+ Add Department</a>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Code</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Department Name</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($departments as $dept)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">{{ $dept->code }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $dept->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                    <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete department?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="3" class="px-6 py-4 text-center text-gray-500">No departments found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $departments->links() }}</div>
</div>
@endsection