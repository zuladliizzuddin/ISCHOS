<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PushDemo;
use App\Notifications\PushSchoolWork;
use App\Models\User;
use App\Models\Students;
use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use Notification;
use PhpParser\Node\Stmt\Foreach_;

class PushController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // /**
    //  * Store the PushSubscription.
    //  * 
    //  * @param \Illuminate\Http\Request $request
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    public function store(Request $request)
    {

        $this->validate($request, [
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
        ]);

        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        //$parent =  Parents::where('student_id', 2)->get();
        //$user = $parent;
        $user = Auth::user();
        $user->updatePushSubscription($endpoint, $key, $token);

        return response()->json(['success' => true], 200);
    }

    public function push()
    {

        $teacherClass = Auth::user()->teacher->class_id;
        //tukar kepada relationship eloquent laravel
        $parent =  Parents::select('parents.user_id')
            ->join('students', 'students.id', '=', 'parents.student_id')
            ->where('students.class_id', $teacherClass)
            ->get();
  
        Notification::send(User::find($parent),new PushDemo);
        //$sent=Notification::send(User::all(),new PushDemo);
        //dd(User::find($parent));
        return redirect()->route('studAttendance.scanAttendance')->with('success', 'Successfully Sent To Parent');
    }

    public function pushSchoolWork($id)
    {

        //tukar kepada relationship eloquent laravel
        $parent =  Parents::select('parents.user_id')
            ->join('students', 'students.id', '=', 'parents.student_id')
            ->where('students.class_id', $id)
            ->get();
        
        //dd(User::find($parent));
        $noti = Notification::send(User::find($parent),new PushSchoolWork);
        //dd($noti);
        //$sent=Notification::send(User::all(),new PushDemo);
        //dd(User::find($parent));
        return redirect()->route('schoolWorkInfo.listHomeworkTeacher')->with('success', 'Successfully Sent To Parent');
    }
}
