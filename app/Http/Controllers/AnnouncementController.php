<?php

namespace App\Http\Controllers;
use App\Models\Announcement;
use App\Models\Teacher;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(){

        return view('manage_announcement.option_add_announcement_teacher');

    }


    public function listBanner(){

        $listBanner = Banner::orderBy('id', 'ASC')->paginate(2);
        return view('manage_announcement.list_banner_teacher' ,compact('listBanner'));

    }


    public function addBanerStore(Request $request){

   
        $request->validate([
           
            'banner_name'=> 'required|string|max:255',
            //'picture' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $banner = Banner::create([
            
            'banner_name' => $request->banner_name,
            'banner' => $request->file('picture')->store('bannerFile', ['disk' => 'public']),
            
        ]);

        // dd($banner);

        return redirect()->route('announcement.listBanner')->with('success', 'Banner Succesfully Publish!');;
    }
    

    public function deleteBanner(Request $request)
    {
        $id = $request->route('id');
        // dd($id);
        try {

            banner::where('id', $id)->delete();

            return \Redirect::route('announcement.listBanner')
                ->with('success', 'Data Succesfully Deleted!');

        }catch (\Exception $e){

            return \Redirect::route('announcement.listBanner')
                ->with('error', 'Error during the creation!');
        }    

    }

    public function listAnnouncement(){
        $id="";

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $announcement = Announcement::orderBy('created_at', 'DESC')->get();
            $date = Carbon::now()->format('d/m/Y');
            $detailAnnouncement = Announcement::where('id',$id)->get()->pluck('id');
            return view('manage_announcement.list_announcement_parent', compact('parent','announcement','date','detailAnnouncement'));

        }elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $announcement = Announcement::orderBy('created_at', 'DESC')->get();
            $date = Carbon::now()->format('d/m/Y');
            $detailAnnouncement = Announcement::where('id',$id)->get()->pluck('id');
            return view('manage_announcement.list_announcement_teacher', compact('teacher','announcement','date','detailAnnouncement'));
        }

        return redirect()->route('login');
    }


    public function addAnnouncementView(){
        return view('manage_announcement.add_announcement_teacher');
    }

    public function addAnnouncementStore(Request $request){

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            //  'image' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);


        $user = Auth::user()->teacher;
        
        if($request->file('picture') != null ){
            $announcement = Announcement::create([
                 
                'user_id'=>$user->user_id,
                'title' => $request->title,
                'description' => $request->description,
                'picture' => $request->file('picture')->store('announcementFile', ['disk' => 'public']),
                
            ]);
        } else {
            $announcement = Announcement::create([
            
                'user_id'=>$user->user_id,
                'title' => $request->title,
                'description' => $request->description,
                
            ]);
        }
    
        return redirect()->route('announcement.listAnnouncement')->with('success','Announcement Publish Sucessfully');
    }

    public function detailAnnouncement(Request $request){

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $id = $request->route('id');
            $detailAnnouncement = Announcement::where('id',$id)->first();
            $detailUser = Teacher::where('user_id',$detailAnnouncement->user_id)->first();
            //dd($detailUser);
            return view('manage_announcement.detail_announcement_parent', compact('parent','detailAnnouncement','detailUser'));

        }elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $id = $request->route('id');
            $detailAnnouncement = Announcement::where('id',$id)->first();
            $detailUser = Teacher::where('user_id',$detailAnnouncement->user_id)->first();
            return view('manage_announcement.detail_announcement_teacher', compact('teacher','detailAnnouncement','detailUser'));
        }

    }

    public function editAnnouncementView(Request $request){
        $id = $request->route('id');
        $detailAnnouncement = Announcement::where('id',$id)->get();
        return view('manage_announcement.edit_announcement_teacher', compact('detailAnnouncement'));
    }

    public function updateAnnouncement(Request $request){
        $id = $request->route('id');
        $announcement = Announcement::find($id);
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        if($request->file('picture') != null ){
        $announcement->picture = $request->file('picture')->store('announcementFile' , ['disk' => 'public']);
        }
        $announcement->save();
        return redirect()->route('announcement.detailAnnouncement', $id)->with('success','Update Sucessfully');
        
    }

}
