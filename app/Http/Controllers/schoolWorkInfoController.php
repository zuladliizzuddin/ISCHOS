<?php

namespace App\Http\Controllers;

use App\Models\School_Class;
use App\Models\School_Work;
use App\Models\Subject;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class schoolWorkInfoController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $classID = $parent->students[0]->class_id;
            $school_work = School_Work::where('class_id', $classID)->orderBy('created_at', 'DESC')->get();
            $date = Carbon::now()->format('d/m/Y');
            return view('manage_school_work_info.list_homework_parent', compact('parent', 'school_work', 'date'));

        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $class = "";
            $classList = School_Class::orderBy('id')->pluck('class_name', 'id');
            $className = School_Class::where('id', $request->class)->get();

            if ($request->class != null) {
                $school_work = School_Work::where('class_id', $request->class)->orderBy('created_at', 'DESC')->get();
                $date = Carbon::now()->format('d/m/Y');
                $classid = $request->class;
                
                
                
                //dd($classid);
                //dd($school_work[0]->school_class);

            } else {
                $school_work = School_Work::orderBy('created_at', 'DESC')->get();
                $date = Carbon::now()->format('d/m/Y');
                $classid = null;

            }

            return view('manage_school_work_info.list_homework_teacher', compact('teacher', 'date', 'school_work', 'classid', 'classList', 'className'));
        }

        return redirect()->route('login');
    }

    public function detailHomework(Request $request)
    {
        if (Auth::check() && Auth::user()->hasRole('parent')) {

            $id = $request->route('id');
            $school_work = School_Work::all()->groupBy('class_id');
            $detailSchoolWork = School_Work::where('id', $id)->first();
            return view('manage_school_work_info.detail_homework_parent', compact('detailSchoolWork', 'school_work', 'detailSchoolWork'));

        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {

            $id = $request->route('id');
            $school_work = School_Work::all()->groupBy('class_id');
            $detailSchoolWork = School_Work::where('id', $id)->first();
            return view('manage_school_work_info.detail_homework_teacher', compact('detailSchoolWork', 'school_work'));
        }
    }

    public function editHomeworkView(Request $request)
    {
        $id = $request->route('id');
        $school_work = School_Work::all()->groupBy('class_id');
        $detailSchoolWork = School_Work::where('id', $id)->first();
        return view('manage_school_work_info.edit_homework_teacher', compact('school_work', 'detailSchoolWork'));
    }

    public function updateHomework(Request $request)
    {
        $id = $request->route('id');
        $school_work = School_Work::find($id);
        $school_work->title = $request->input('title');
        $school_work->due_date = $request->input('due_date');
        $school_work->description = $request->input('description');
        if ($request->file('picture') != null) {
            $school_work->picture = $request->file('picture')->store('schoolWorkFile', ['disk' => 'public']);
        }
        $school_work->save();
        return redirect()->route('schoolWorkInfo.detailHomeworkTeacher', $id)->with('success', 'Update Sucessfully');

    }

    public function addHomeworkTeacherView(Request $request)
    {
        $class = "";
        $subject = "";
        $classList = School_Class::orderBy('id')->pluck('class_name', 'id');
        $subjectList = Subject::orderBy('id')->pluck('subject_name', 'id');
        return view('manage_school_work_info.add_homework_teacher', compact('classList', 'class', 'subjectList', 'subject'));
    }

    public function addHomeworkTeacherStore(Request $request)
    {

        $id = $request->class;
        if ($request->file('picture') != null) {
            $school_work = School_Work::create([

                'class_id' => $request->class,
                'subject_id' => $request->subject,
                'title' => $request->title,
                'due_date' => $request->due_date,
                'description' => $request->description,
                'picture' => $request->file('picture')->store('schoolWorkFile', ['disk' => 'public']),

            ]);
        } else {
            $announcement = School_Work::create([

                'class_id' => $request->class,
                'subject_id' => $request->subject,
                'title' => $request->title,
                'due_date' => $request->due_date,
                'description' => $request->description,

            ]);
        }

        return redirect()->route('push.pushschoolworkget', $id);
    }

    public function deleteHomework($id)
    {
        $delete_school_work = School_Work::where('id', $id)->delete();

        return redirect()->route('schoolWorkInfo.listHomeworkTeacher')->with('success', 'Delete Successfully');
    }
}
