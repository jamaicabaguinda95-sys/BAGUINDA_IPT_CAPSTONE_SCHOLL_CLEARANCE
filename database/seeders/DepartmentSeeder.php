<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Library', 'code' => 'LIB'],
            ['name' => 'Accounting Office', 'code' => 'ACC'],
            ['name' => "Dean's Office", 'code' => 'DEAN'],
            ['name' => 'Registrar', 'code' => 'REG'],
            ['name' => 'Laboratory Department', 'code' => 'LAB'],
        ];

        foreach ($departments as $dept) {
            Department::firstOrCreate(['code' => $dept['code']], $dept);
        }
    }
}