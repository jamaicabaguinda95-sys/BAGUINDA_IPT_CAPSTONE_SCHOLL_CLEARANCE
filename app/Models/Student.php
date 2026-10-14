<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    protected $fillable = ['student_id_no', 'first_name', 'last_name', 'email', 'department_id', 'course', 'year_level'];

    public function department() { return $this->belongsTo(Department::class); }
    public function clearances() { return $this->hasMany(Clearance::class); }
}
