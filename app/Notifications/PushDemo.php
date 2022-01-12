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

class PushDemo extends Notification
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
        $teacherClass = Auth::user()->teacher->class_id;
        $student = Students::where('class_id', $teacherClass)->get();
        $attendances = Attendances::where('class_id', $teacherClass)->whereDate('created_at', Carbon::today())->get('student_id');
        $url = route('studAttendance.attendanceRecord');

        foreach ($student as $stud) {
            if ($stud->status_attendance == 'present') {

                return (new WebPushMessage)
                    ->title('TAHNIAH, ANAK ANDA HADIR !!')
                    ->icon(asset('img/logo.png'))
                    ->body('Lihat status kehadiran anak anda')
                    ->action('View App', 'notification_action')
                    ->data(['id' => $notification->id, $url]);
            } else {

                return (new WebPushMessage)
                    ->title('MAAF, ANAK ANDA TIDAK HADIR !!')
                    ->icon(asset('img/logo.png'))
                    ->body('Lihat status kehadiran anak anda')
                    ->action('View App', 'notification_action')
                    ->data(['id' => $notification->id, $url]);
            }
        }
    }


}
