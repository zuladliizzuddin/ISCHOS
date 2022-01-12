<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaGroup extends Model
{
    use HasFactory;
    protected $table = 'social_media_groups';
    protected $fillable = [ 
        'id',
        'user_id',
        'class_id',
        'name',
        'link',
        'platform',
    ];

    
}
