<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NotificationChannels\WebPush\HasPushSubscriptions;
use Illuminate\Notifications\Notifiable;
//use Laratrust\Traits\LaratrustUserTrait;

class Parents extends Model
{
    //use LaratrustUserTrait;
    use Notifiable, HasPushSubscriptions;
    protected $table = 'parents';
    protected $fillable = [
        'id',
        'user_id',
        'student_id',
        'email',
        'first_name',
        'last_name',
        'username',
        'phone_number',
    ];

    public function students() {
        return $this->hasMany(Students::class, 'id', 'student_id');
    }
}
