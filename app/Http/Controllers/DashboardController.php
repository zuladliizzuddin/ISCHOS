<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Students;
use App\Models\Teacher;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
   {

      if (Auth::user()->hasRole('teacher')) {

         $teacher = Auth::user()->teacher;
         $slider = Banner::orderBy('id', 'DESC')->where('banner', '!=', null)->get();
         $studentSlider = Students::where('class_id', $teacher->class_id)->get();
         $announcementSlider = Announcement::orderBy('created_at', 'DESC')->get();
         //dd($slider);
         return view('teacherdash', compact('slider', 'studentSlider', 'announcementSlider'));
      } elseif (Auth::user()->hasRole('parent')) {

         $parent = Auth::user()->parent;
         $slider = Banner::orderBy('id', 'DESC')->where('banner', '!=', null)->get();
         $teacherSlider = Teacher::groupby('user_id')->get();
         $announcementSlider = Announcement::orderBy('created_at', 'DESC')->get();
         return view('parentdash', compact('slider', 'teacherSlider', 'announcementSlider'));

      } elseif(Auth::user()->hasRole('admin')){
         $slider = Banner::orderBy('id', 'DESC')->where('banner', '!=', null)->get();
         return view('admindash', compact('slider'));
      }
   }
}
