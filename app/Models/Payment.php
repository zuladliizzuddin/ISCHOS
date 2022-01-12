<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'id',
        'teacher_id',
        'class_id',
        'payment_title',
        'amount',
        'description',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function schoolClass () {
        return $this->belongsTo(School_Class::class, 'class_id');
    }

   
    
}