<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clearance extends Model {
    protected $fillable = ['student_id', 'school_year', 'semester', 'status'];

    public function student() { return $this->belongsTo(Student::class); }
    public function approvals() { return $this->hasMany(Approval::class); }
}