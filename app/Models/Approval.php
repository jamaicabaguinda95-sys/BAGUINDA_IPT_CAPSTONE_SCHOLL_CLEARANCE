<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model {
    protected $fillable = ['clearance_id', 'department_id', 'status', 'remarks'];

    public function clearance() { return $this->belongsTo(Clearance::class); }
    public function department() { return $this->belongsTo(Department::class); }
}