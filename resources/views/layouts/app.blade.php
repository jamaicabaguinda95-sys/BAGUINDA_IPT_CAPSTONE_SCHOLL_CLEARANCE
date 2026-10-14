<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Clearance Management System</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
   <nav class="bg-blue-600 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('clearances.index') }}" class="font-bold text-lg">🏫 School Clearance System</a>
        <div class="space-x-4 flex items-center">
            <a href="{{ route('clearances.index') }}" class="hover:underline">Clearances</a>
            <a href="{{ route('students.index') }}" class="hover:underline">Students</a>
            <a href="{{ route('departments.index') }}" class="hover:underline">Departments</a>
            <a href="{{ route('clearances.create') }}" class="bg-blue-500 px-3 py-2 rounded hover:bg-blue-400 text-sm">Request Clearance</a>
        </div>
    </div>
</nav>

    <main class="max-w-7xl mx-auto px-4 py-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>