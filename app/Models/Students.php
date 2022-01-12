<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'id',
        'class_id',
        'teacher_id',
        'studImage',
        'studFullName',
        'studIdCard',
        'address',
        'gender',
        'age',
        'brthOfDate',
        'religon',
        'parentFullName',
        'parentIdCard',
        'parentSalary',
    ];

    public function school_class() {
        return $this->belongsTo(School_Class::class, 'class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    // Tambah relationship dengan Attendance
    public function attendance_report() {
        return $this->belongsTo(Attendances::class,  'id','student_id');
    }

    

    

    
}
