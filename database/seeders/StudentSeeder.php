<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Department;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        // Get the first department to assign to students if available
        $department = Department::first();

        if (!$department) {
            return; // Exit if departments haven't been seeded yet
        }

        $students = [
            [
                'student_id_no' => '2026-0001',
                'first_name' => 'Juan',
                'last_name' => 'Dela Cruz',
                'email' => 'juan.delacruz@example.com',
                'department_id' => $department->id,
                'course' => 'BS Information Technology',
                'year_level' => '3rd Year',
            ],
            [
                'student_id_no' => '2026-0002',
                'first_name' => 'Maria',
                'last_name' => 'Santos',
                'email' => 'maria.santos@example.com',
                'department_id' => $department->id,
                'course' => 'BS Business Administration',
                'year_level' => '4th Year',
            ],
        ];

        foreach ($students as $student) {
            Student::firstOrCreate(['student_id_no' => $student['student_id_no']], $student);
        }
    }
}
