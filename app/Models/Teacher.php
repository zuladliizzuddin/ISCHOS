<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'id',
        'user_id',
        'class_id',
        'subject_id',
        'teacherImage',
        'first_name',
        'last_name',
        'email',
        'username',
        'phone_number',
    ];
   


    public function school_class () {
        return $this->belongsTo(School_Class::class, 'class_id');
    }

    public function subject() {
        return $this->hasMany(Subject::class,'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Students::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

   
}
