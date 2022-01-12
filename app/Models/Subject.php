<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = [
        'id',
        'subject_name',
    ];

    public function school_work()
    {
        return $this->hasMany(School_Work::class, 'subject_id');   
        
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'subject_id');   
        
    }
   

    
}
