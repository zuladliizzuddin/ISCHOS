<?php

namespace App\Http\Controllers;

use App\Models\Attendance_Reports;
use App\Models\Students;
use App\Models\Attendances;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudAttendanceController extends Controller
{
    public function index()
    {

        $id = "";
        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            return view('manage_attendance.scan_stud_attendance_teacher', compact('parent'));
        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;

            return view('manage_attendance.scan_stud_attendance_teacher', compact('teacher'));
        }

        return redirect()->route('login');
    }

    public function attendanceRecord()
    {

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $class = Auth::user()->parent->students[0]->id;
            $attendances = Attendance_Reports::where('student_id', $class)->orderBy('created_at', 'DESC')->get();
            //dd($class);
            return view('manage_attendance.record_stud_attendance_parent', compact('class', 'attendances'));
        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $date = Carbon::now();
            $dateNow = Carbon::today();
            $teacherClass = Auth::user()->teacher->class_id;
            $student = Students::where('class_id', $teacherClass)->paginate(5);
            foreach ($student as $stud) {
                $attendance = Attendance_Reports::where('id', $stud->attendance_report_id)->where('student_id', $stud->id)->get();
            }
            $attendances = Attendance_Reports::where('class_id', $teacherClass)->whereDate('created_at', Carbon::today())->get();
            //dd($attendances);
            //dd($date);

            return view('manage_attendance.record_stud_attendance_teacher', compact('student', 'date', 'attendances', 'dateNow', 'attendance'));
        }

        return redirect()->route('login');
    }

    public function reviewScan()
    {
        $teacher = Auth::user()->teacher->class_id;
        $student = Attendances::where('class_id', $teacher)->whereDate('created_at', Carbon::today())->get();
        //dd($student);

        return view('manage_attendance.review_scan_stud_attendance_teacher', compact('student'));
    }

    public function deleteScanRecord(Request $request)
    {
        $id = $request->route('id');
        $attendance = Attendances::where('id', $id)->get();
        foreach ($attendance as $attend){
            Students::where('id', $attend->student_id)->update([
                'status_attendance' => 'absent'
            ]);
        }
        $deleteScan = Attendances::find($id)->delete();

        return redirect()->back();
    }

    public function updateScanRecord(Request $request)
    {
        $teacher = Auth::user()->teacher;
        $todayDate =  Carbon::today()->toDateString();
        $student = Students::query()->where('class_id', $teacher->class_id)->get();
        $attendanceDate = Attendance_Reports::query()->where('class_id', $teacher->class_id)->whereDate('created_at', $todayDate)->get();
        //dd($attendanceDate);

        if (!$attendanceDate->isEmpty()) {
            foreach ($student as $stud) {


                $attendance = Attendance_Reports::whereDate('created_at', $todayDate)->where('student_id', $stud->id)->update([
                    'status' => $stud->status_attendance,

                ]);
            }
        } else {

            foreach ($student as $stud) {
                //dd($stud->status_attendance);
                $attendances = Attendance_Reports::create([
                    'class_id' => $stud->class_id,
                    'student_id' => $stud->id,
                    'status' => $stud->status_attendance,

                ]);
            }
        }


        $resetData = Attendances::where('class_id', $teacher->class_id)->delete();

        return redirect()->route('studAttendance.attendanceRecord');
    }

    public function attendanceReport(Request $request)
    {
        $month = $request->month;
        $teacher = Auth::user()->teacher;
        $studentAbsent = Attendance_Reports::where('class_id', $teacher->class_id)
            ->where('status', 'absent')
            ->whereMonth('created_at', $month)
            ->paginate(10);
        $studentPresent = Attendance_Reports::where('class_id', $teacher->class_id)
            ->where('status', 'present')
            ->whereMonth('created_at', $month)
            ->get();
        $countAbsent = $studentAbsent->count();
        $countPresent = $studentPresent->count();

        //dd($student);

        return view('manage_attendance.report_stud_attendance_teacher', compact('studentAbsent', 'month', 'countAbsent', 'countPresent', 'teacher'));
    }

    public function individualAttendanceReport(Request $request, $id)
    {
        $month = $request->month;
        $teacher = Auth::user()->teacher;
        $student =  Attendance_Reports::where('student_id', $id)->first();
        $studentAbsent = Attendance_Reports::where('student_id', $id)
            ->where('status', 'absent')
            ->whereMonth('created_at', $month)
            ->paginate(10);
        //dd($id);
        $studentPresent = Attendance_Reports::where('student_id', $id)
            ->where('status', 'present')
            ->whereMonth('created_at', $month)
            ->get();
        $countAbsent = $studentAbsent->count();
        $countPresent = $studentPresent->count();

        return view('manage_attendance.report_individual_stud_attendance_teacher', compact('studentAbsent', 'studentPresent', 'countAbsent', 'countPresent', 'teacher', 'month', 'student'));
    }

    public function attendanceReason(Request $request)
    {
        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $id = $request->route('id');
            $attendances = Attendance_Reports::where('id', $id)->get();
            //dd($attendances);
            return view('manage_attendance.reason_stud_attendance_parent', compact('attendances'));
        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {

            $id = $request->route('id');
            $attendances = Attendance_Reports::where('id', $id)->first();
            //dd($attendances);
            return view('manage_attendance.view_reason_stud_attendance_teacher', compact('attendances'));
        }

        return redirect()->route('login');
    }

    public function saveAttendanceReason(Request $request)
    {
        $id = $request->route('id');
        $reason_attendance = Attendance_Reports::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'file_reason' => $request->file('file_reason')->store('attendance_reason_file', ['disk' => 'public']),
        ]);


        //dd($attendances);
        return redirect()->route('studAttendance.attendanceRecord')->with('success', 'Attendance Reason Submit Successfully');
    }

    public function scanQrCode()
    {
        $teacher = Auth::user()->teacher->class_id;
        //dd($teacher);
        return view('manage_attendance.scan_qrcode', compact('teacher'));
    }

    public function scanQrCodeNew()
    {
        $teacher = Auth::user()->teacher->class_id;
        $resetStatus = Students::query()
            ->where('class_id', $teacher)->update([
                'status_attendance' => 'absent'
            ]);
        //dd($teacher);
        return view('manage_attendance.scan_qrcode', compact('teacher'));
    }
}
