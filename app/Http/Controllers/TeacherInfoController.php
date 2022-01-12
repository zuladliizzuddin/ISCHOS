<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\School_Class;
use App\Models\Subject;

class TeacherInfoController extends Controller
{
    public function index(){

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $dataTeacher = Teacher::all()->groupBy('user_id');
            $subjectData = Teacher::select('*')->groupBy('user_id')->paginate(10);
            return view('manage_teacher_info.list_teacher_parent', compact('subjectData'));

        }elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher->user_id;
            $subjectData = Teacher::select('*')->groupBy('user_id')->paginate(10);

            return view('manage_teacher_info.list_teacher_parent', compact('subjectData'));
            
        }
           
    }

    public function search(Request $request)
    {
        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;

            $search = $request->input('search');
            $subjectData = Teacher::where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%")
            ->orWhere('phone_number', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->groupBy('user_id')
            ->paginate(10);

            return view('manage_teacher_info.list_teacher_parent', compact('subjectData'));

        }elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher->user_id;

            $search = $request->input('search');
            $subjectData = Teacher::where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%")
            ->orWhere('phone_number', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->groupBy('user_id')
            ->paginate(10);

            return view('manage_teacher_info.list_teacher_parent', compact('subjectData'));
            
        }
    }


   

    
}

