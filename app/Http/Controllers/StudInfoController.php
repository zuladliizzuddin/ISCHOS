<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\School_Class;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudInfoController extends Controller
{
    public function index()
    {
        $id = "";
        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $detailStudent = $parent->students->first();
            //dd($detailStudent);
            return view('manage_stud_info.detail_stud_info_parent', compact('parent', 'detailStudent'));

        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            // $paginate = Students::paginate(3);
            return view('manage_class_info.list_class_stud_info_teacher', compact('teacher'));
        }

        return redirect()->route('login');
    }

    public function listStudInfo(Request $request)
    {

        if (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $detailStudentInfo = Students::orderBy('created_at', 'ASC')->paginate(5);
            return view('manage_stud_info.list_stud_info_teacher', compact('teacher', 'detailStudentInfo'));
        }

        return redirect()->route('login');
    }

    public function editStudInfo(Request $request)
    {

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $id = $request->route('id');
            $detailStudent = Students::where('id', $id)->get();
            $class = "";
            $clasList = School_Class::orderBy('id')->pluck('class_name', 'id');
            return view('manage_stud_info.edit_detail_stud_info_parent', compact('parent', 'detailStudent', 'clasList', 'class'));
        }
    }

    public function updateStudInfo(Request $request)
    {

        $parent = Auth::user()->parent;
        $id = $request->route('id');
        $studInfo = Students::find($id);
        $studInfo->address = $request->input('address');
        $studInfo->parentSalary = $request->input('parentSalary');
        if ($request->file('studImage') != null) {
            $studInfo->studImage = $request->file('studImage')->store('studInfoFile', ['disk' => 'public']);
        }
        $studInfo->save();
        return redirect()->route('studInfo.stud_detail', $id)->with('success', 'Update Successfuly');
        
    }

    public function searchStudInfo(Request $request)
    {
        $teacher = Auth::user()->teacher;
        $search = $request->input('search');
        $detailStudentInfo = Students::query()
            ->where('studFullName', 'LIKE', "%{$search}%")
            ->orWhere('studIdCard', 'LIKE', "%{$search}%")
            ->orWhere('address', 'LIKE', "%{$search}%")
            ->paginate(5);
        return view('manage_stud_info.list_stud_info_teacher', compact('detailStudentInfo'));
    }

}
