<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School_Class extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = [
        'id',
        'class_name',
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Students::class, 'class_id');
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class, 'class_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'class_id');
    }

    public function school_work()
    {
        return $this->hasMany(School_Work::class, 'id');
    }
    
    
    
}
