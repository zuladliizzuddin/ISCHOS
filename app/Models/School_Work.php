<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School_Work extends Model
{
    use HasFactory;
    protected $table = 'school_works';
    protected $fillable = [
        'id',
        'class_id',
        'subject_id',
        'title',
        'due_date',
        'description',
        'picture',
    ];

    public function subject() {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function school_class() {
        return $this->belongsTo(School_Class::class,'class_id');
    }
}
