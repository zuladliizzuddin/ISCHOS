<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Parents;
use App\Models\School_Class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassInfoController extends Controller
{
    public function listStudInfo()
    {

        if (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $detailStudent = Students::where('class_id', $teacher->class_id)->paginate(5);
            $class_name = Students::where('class_id', $teacher->class_id)->get();
            //   dd($detailStudent);
            if ($detailStudent->isEmpty()) {
                return redirect()->route('classInfo.addClassStudInfo');
            } else {
                return view('manage_class_info.list_class_stud_info_teacher', compact('teacher', 'class_name', 'detailStudent'));
            }
        }

        return redirect()->route('login');
    }

    public function addClassStudInfo()
    {
        $class = "";
        $clasList = School_Class::orderBy('id')->pluck('class_name', 'id');
        return view('manage_class_info.add_class_stud_info_teacher', compact('clasList', 'class'));
    }

    public function addClassStudInfoStore(Request $request)
    {

        $request->validate([
            'studFullName' => 'required|string|max:255',
            'studIdCard' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'brthOfDate' => 'required|string|max:255',
            'religon' => 'required|string|max:255',
            'parentFullName' => 'required|string|max:255',
            'parentIdCard' => 'required|string|max:255',
            'parentSalary' => 'required|string|max:255',
            //'studImage' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);


        if ($request->file('studImage') != null) {
            $studInfo = Students::create([

                'studFullName' => $request->studFullName,
                'studIdCard' => $request->studIdCard,
                'teacher_id' => Auth::user()->teacher->id,
                'address' => $request->address,
                'class_id' => $request->class,
                'gender' => $request->gender,
                'age' => $request->age,
                'brthOfDate' => $request->brthOfDate,
                'religon' => $request->religon,
                'parentFullName' => $request->parentFullName,
                'parentIdCard' => $request->parentIdCard,
                'parentSalary' => $request->parentSalary,
                'studImage' => $request->file('studImage')->store('studInfoFile', ['disk' => 'public']),

            ]);
        } else {
            $studInfo = Students::create([

                'studFullName' => $request->studFullName,
                'studIdCard' => $request->studIdCard,
                'teacher_id' => Auth::user()->teacher->id,
                'address' => $request->address,
                'class_id' => $request->class,
                'gender' => $request->gender,
                'age' => $request->age,
                'brthOfDate' => $request->brthOfDate,
                'religon' => $request->religon,
                'parentFullName' => $request->parentFullName,
                'parentIdCard' => $request->parentIdCard,
                'parentSalary' => $request->parentSalary,

            ]);
        }


        return redirect()->route('classInfo.list_classInfo')->with('success', 'Add Successfuly');
    }

    public function detailClassStudent(Request $request)
    {

        if (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $id = $request->route('id');
            $detailStudent = Students::where('id', $id)->first();
            //dd($detailStudent);
            // $class = "";
            // $clasList = School_Class::orderBy('id')->pluck('class_name', 'id');
            return view('manage_class_info.detail_class_stud_info_teacher', compact('teacher', 'detailStudent'));
        }

        return redirect()->route('login');
    }

    public function editClassStudInfo(Request $request)
    {

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $id = $request->route('id');
            $detailStudent = Students::where('id', $id)->get();
            $class = "";
            $clasList = School_Class::orderBy('id')->pluck('class_name', 'id');
            return view('manage_class_info.edit_detail_class_stud_info_parent', compact('parent', 'detailStudent', 'clasList', 'class'));
        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $id = $request->route('id');
            $detailStudent = Students::where('id', $id)->get();
            $class = "";
            $clasList = School_Class::orderBy('id')->pluck('class_name', 'id');
            return view('manage_class_info.edit_detail_class_stud_info_teacher', compact('teacher', 'detailStudent', 'clasList', 'class'));
        }
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

    public function updateClassStudInfo(Request $request)
    {

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $id = $request->route('id');
            $studInfo = Students::find($id);
            $studInfo->address = $request->input('address');
            $studInfo->parentSalary = $request->input('parentSalary');
            $studInfo->save();
            return redirect()->route('classInfo.detailClassStudent', $id)->with('success', 'Update Successfuly');
        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $id = $request->route('id');
            $studInfo = Students::find($id);
            $studInfo->class_id = $request->input('class');
            $studInfo->studFullName = $request->input('studFullName');
            $studInfo->studIdCard = $request->input('studIdCard');
            $studInfo->address = $request->input('address');
            $studInfo->gender = $request->input('gender');
            $studInfo->age = $request->input('age');
            $studInfo->brthOfDate = $request->input('brthOfDate');
            $studInfo->religon = $request->input('religon');
            $studInfo->parentFullName = $request->input('parentFullName');
            $studInfo->parentIdCard = $request->input('parentIdCard');
            $studInfo->parentSalary = $request->input('parentSalary');
            if ($request->file('studImage') != null) {
                $studInfo->studImage = $request->file('studImage')->store('studInfoFile', ['disk' => 'public']);
            }
            $studInfo->save();
            return redirect()->route('classInfo.detailClassStudent', $id)->with('success', 'Update Successfuly');
        }
    }

    public function search(Request $request)
    {
        $teacher = Auth::user()->teacher;
        $class_name = Students::where('class_id', $teacher->class_id)->get();
        $search = $request->input('search');
        $detailStudent = Students::query()
            ->where('studFullName', 'LIKE', "%{$search}%")
            ->orWhere('studIdCard', 'LIKE', "%{$search}%")
            ->orWhere('address', 'LIKE', "%{$search}%")
            ->paginate(5);
        return view('manage_class_info.list_class_stud_info_teacher', compact('detailStudent', 'class_name'));
    }

    public function deleteClassStudInfo(Request $request)
    {
        $id = $request->route('id');
        // dd($id);
        try {

            Students::where('id', $id)->delete();

            return \Redirect::route('classInfo.list_classInfo')
                ->with('success', 'Delete Succesfully ');
        } catch (\Exception $e) {

            return \Redirect::route('classInfo.list_classInfo')
                ->with('error', 'Delete Unsuccesfully ');
        }
    }
}
