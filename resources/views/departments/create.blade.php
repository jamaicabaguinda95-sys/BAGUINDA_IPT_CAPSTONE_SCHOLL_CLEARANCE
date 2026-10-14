@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Department</h2>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Department Name</label>
            <input type="text" name="name" placeholder="e.g. Guidance Office" class="w-full border rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Department Code</label>
            <input type="text" name="code" placeholder="e.g. GUID" class="w-full border rounded-md p-2" required>
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('departments.index') }}" class="bg-gray-300 px-4 py-2 rounded-md">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save Department</button>
        </div>
    </form>
</div>
@endsection