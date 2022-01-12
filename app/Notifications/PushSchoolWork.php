<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;
use App\Models\Attendances;
use App\Models\Teacher;
use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PushSchoolWork extends Notification
{
    use Queueable;
    // TODO mungkin kat sini kot kena buang sebab dia queue

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
        $url = route('schoolWorkInfo.listHomeworkTeacher');
        return (new WebPushMessage)
            ->title('ADA KERJA SEKOLAH !!')
            ->icon(asset('img/logo.png'))
            ->body('Lihat kerja sekolah anak anda')
            ->action('View App', 'notification_action')
            ->data(['id' => $notification->id, $url]);
    }
}
