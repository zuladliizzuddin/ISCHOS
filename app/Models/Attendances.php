<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    protected $table = 'attendances';
    protected $fillable = [
        'id',
        'class_id',
        'student_id',
    ];

    public function student() {
        // return $this->hasMany(Students::class, 'id' , 'student_id');
         return $this->belongsTo(Students::class);
    }
}
