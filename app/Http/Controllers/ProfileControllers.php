<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileControllers extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('parent')) {
            $user = Auth::user()->parent->id;
            $parentData = Parents::where('id', $user)->first();
            return view('manage_profile.view_profile_parent', compact('parentData'));

        }elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $user = Auth::user()->teacher->id;
            $teacherData = Teacher::where('id', $user)->first();
            return view('manage_profile.view_profile_teacher', compact('teacherData'));
        }

        return redirect()->route('login');
    }

    public function edit_profile()
    {
        if (Auth::user()->hasRole('parent')) {
            $user = Auth::user()->parent->id;
            $parentData = Parents::where('id', $user)->first();
            return view('manage_profile.edit_profile_parent', compact('parentData'));

        }elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $user = Auth::user()->teacher->id;
            $teacherData = Teacher::where('id', $user)->first();
            return view('manage_profile.edit_profile_teacher', compact('teacherData'));
        }
    }

    public function update_profile(Request $request)
    {
        if (Auth::user()->hasRole('parent')) {
            $user = Auth::user()->parent;
            $validated = $request->validateWithBag('edit', [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'username' => 'required|unique:users,username,'.$user->user_id,
                'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            ]);
            
            $updateParent = Parents::where('id', $user->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request-> email,
                'phone_number' =>$request->phone_number,
                'username' => $request->username,

            ]);

            $updateUser = User::where('id', $user->user_id)->update([
                'first_name' => $request->first_name,
                'username' => $request->username,
            ]);

            if($updateParent){
                return redirect()->route('manage_profile.view_profile')->with('success', 'Profile update successfully');
            }else{
                return redirect()->back()->with('error', 'Profile update failed');
            }
            
        }elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $user = Auth::user()->teacher;
            $validated = $request->validateWithBag('edit', [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'username' => 'required|unique:users,username,'.$user->user_id,
                'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            ]);
            
            $updateTeacher=Teacher::find($user->id);
            $updateTeacher->first_name =  $request->input('first_name');
            $updateTeacher->last_name = $request->input('last_name');
            $updateTeacher->email = $request->input('email');
            $updateTeacher->phone_number = $request->input('phone_number');
            $updateTeacher->username = $request->input('username');

            if($request->file('teacherImage') != null ){
                $updateTeacher->teacherImage = $request->file('teacherImage')->store('teacherInfoFile', ['disk' => 'public']);
            }
            $updateTeacher->save();

            $updateUser = User::where('id', $user->user_id)->update([
                'first_name' => $request->first_name,
                'username' => $request->username,
            ]);

            if($updateTeacher){
                return redirect()->route('manage_profile.view_profile')->with('success', 'Profile update successfully');
            }else{
                return redirect()->back()->with('error', 'Profile update failed');
            }

        }
    }
}
