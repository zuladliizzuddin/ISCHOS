<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance_Reports extends Model
{
    use HasFactory;
    protected $table = 'attendance_report';
    protected $fillable = [
        'id',
        'class_id',
        'student_id',
        'status',
    ];

    public function student() {
        // return $this->hasMany(Students::class, 'id' , 'student_id');
         return $this->belongsTo(Students::class);
    }
}
