<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parents;
use App\Models\Teacher;
use App\Models\Students;
use App\Models\User;
use App\Models\School_Class;
use App\Models\Subject;
use App\Models\Permission;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegistrationController extends Controller
{

    public function index()
    {
        if (Auth::check() && Auth::user()->hasRole('teacher')) {
            $student = "";
            $class_id = Auth::user()->teacher->class_id;
            $studentList = Students::where('class_id', $class_id)->orderBy('id')->pluck('studFullName', 'id');
            $user = Parents::select('parents.*')
            ->join('students', 'students.id', '=', 'parents.student_id')
            ->where('students.class_id', $class_id)
            ->paginate(5);
            //dd($user);
            //$role = Permission::all();
            //dd($role);
            //$paginate = Parents::paginate(2);
            return view('manage_user.list_user', compact('user', 'student', 'studentList'));
        }
    }

    public function registerParent()
    {
        $student = "";
        $studentList = Students::orderBy('id')->pluck('studFullName', 'id');
        return view('auth.register', compact('student', 'studentList'));
    }

    public function createParent(Request $request)
    {
        $validated = $request->validateWithBag('add', [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email',
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
            'password_confirmation' => 'required|same:password',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $parent = Parents::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'student_id' => $request->add_student,

        ]);

        $user->attachRole('parent');
        event(new Registered($user));

         return redirect()->route("manage_user.list_user")->with('success', 'Save successful!!');
    }

    public function removeParent($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->roles()->detach();
            $user->delete();
        }

        return redirect()->back()->with('success', 'Delete successful!!');
    }

    public function updateParent(Request $request, $id)
    {

        // $validatedData = $request->validate([
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'username' => ['required', 'unique:users,username,' . $id],
        //     'phone_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:11'],
        // ]);

        $validated = $request->validateWithBag('edit', [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'username' => 'required|unique:users,username,' . $id,
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
        ]);



        $parent = Parents::where('user_id', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'student_id' => $request->student,
        ]);

        $users = User::where('id', $id)->update([
            'first_name' => $request->first_name,
            'username' => $request->username,
        ]);

        return redirect()->route("manage_user.list_user")->with('success', 'Save successful!!');
    }

    public function registerTeacher()
    {
        $class = "";
        $subject = "";
        $classList = School_Class::orderBy('id')->pluck('class_name', 'id');
        $subjectList = Subject::orderBy('id')->pluck('subject_name', 'id');
        return view('auth.registerTeacher', compact('classList', 'class', 'subject', 'subjectList'));
    }

    public function createTeacher(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string| max:255|unique:users',
            'email' => 'required|string|email',
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
            //'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);



        $subject = $request->input('subject', []);
        if (is_array($subject) || is_object($subject)) {
            foreach ($subject as $key => $subject) {
                $parent = Teacher::create([
                    'user_id' => $user->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'class_id' => $request->class,
                    'subject_id' => $request->subject[$key],
                    
                ]);
            }
        }
        // dd($parent);

        $user->attachRole('teacher');
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    public function changePassword($id)
    {
        //dd($id);
        $user = User::find($id);
        return view('manage_user.change_password_user', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required|min:6|max:100',
            'new_password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:new_password',
        ]);

        $current_user = User::find($id);
        //dd($current_user);
        if (Hash::check($request->old_password, $current_user->password)) {
            $current_user->update([
                'password' => bcrypt($request->new_password)
            ]);

            return redirect()->route('manage_user.list_user')->with('success', 'Password Change Success');
        } else {
            return redirect()->back()->with('error', 'Old Password Does Not Matched');
        }
    }

    public function registerAdmin()
    {
       
        return view('auth.registerAdmin');
    }

    public function createAdmin(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'username' => 'required|string| max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
            //'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole('admin');
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
