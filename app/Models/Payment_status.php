<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_status extends Model
{
    protected $table = 'payment_status';
    protected $fillable = [
        'id',
        'student_id',
        'payment_id',
        'status',
        'billCode',
    ];


    // public function parents()
    // {
    //     return $this->belongsTo(Parents::class, 'parent_id');
    // }
    public function students () {
        return $this->belongsTo(Students::class, 'student_id');
    }


        public function payments()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}