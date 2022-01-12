<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use App\Models\Parents;
use App\Models\School_Class;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClassSchedulesController extends Controller
{

    public function index(){

        $id="";
        
        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $classID = $parent->students[0]->class_id;
            $detailSchedule = Schedule::where('class_id', $classID)->first();
            return view('manage_class_schedule.view_schedule_parent', compact('parent','detailSchedule'));


        }elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $scheduleData = Schedule::where('class_id', $teacher->class_id)->get();
            //dd($scheduleData);

            if ($scheduleData->isEmpty()) {
                return redirect()->route('classSchedule.addClassSchedule');
            } else {
                return view('manage_class_schedule.view_schedule_teacher', compact('teacher','scheduleData'));
               
                
            }
            
           
            
        }

        return redirect()->route('login');

    }

    public function addClassSchedule(){
        $class = "";
        $classList = School_Class::orderBy('id')->pluck('class_name', 'id');
        return view('manage_class_schedule.add_schedule_teacher', compact('classList','class'));
    }

    public function addClassScheduleStore(Request $request){

        $teacher = Auth::user()->teacher;

        $request->validate([
            //'class_schedule_name' => 'required|string|max:255',
            'image' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);

        $classSchedule = Schedule::create([
                'teacher_id'=> Auth::user()->teacher->id,
                'class_id' => $teacher->class_id,
                //'class_schedule_name' => $request->class_schedule_name,
                'image' => $request->file('image')->store('classScheduleFile', ['disk' => 'public']),
                
        ]);

        return redirect()->route('classSchedule.viewSchedule')->with('success', 'Add Successfully');
    }

    public function viewEditClassSchedule() {
        $teacher = Auth::user()->teacher;
        return view('manage_class_schedule.edit_schedule_teacher', compact('teacher'));
    }

    public function updateClassSchedule(Request $request)
    {
        $teacher = Auth::user()->teacher;
        $id = $request->route('id');
        $request->validate([
            //'class_schedule_name' => 'required|string|max:255',
            'image' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);

        $classSchedule = Schedule::where('id',$id)->update([
                'image' => $request->file('image')->store('classScheduleFile', ['disk' => 'public']),
                
        ]);

            return view('manage_class_schedule.view_schedule_teacher', compact('teacher'))->with('success', 'Update Successfully');

    }

}