<?php

namespace App\Http\Controllers;
use App\Models\SocialMediaGroup;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class SocialMediaGroupController extends Controller
{

    public function index(){
        $id="";

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $classID = $parent->students[0]->class_id;
            $viewSocialMediaGroup  = SocialMediaGroup::where('class_id',$classID)->get();
            
            return view('manage_social_media_group.view_media_parent', compact('parent','viewSocialMediaGroup'));

        }elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher->user_id;
            $viewSocialMediaGroup  = SocialMediaGroup::where('user_id',$teacher)->get();
            //dd($teacher);

            if ($viewSocialMediaGroup->isEmpty()) {
                return redirect()->route('socialMediaGroup.addSocialMediaGroupview');
            } else {
                return view('manage_social_media_group.view_media_teacher', compact('teacher','viewSocialMediaGroup'));
            }
            
            
            
        }
    
        return redirect()->route('login');
    }

    public function addSocialMediaGroupview(){
        return view('manage_social_media_group.add_media_teacher');
    }

    public function addSocialMediaGroupStore(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            //'image' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
        ]);


        $user = Auth::user()->teacher;

            $socialMediaGroup = SocialMediaGroup::create([
                'user_id'=>$user->user_id,
                'class_id'=>$user->class_id,
                'name' => $request->name,
                'link' => $request->link,
                'platform' => $request->platform,
                
            ]);
       
        

        return redirect()->route('socialMediaGroup.view_media');
    }

    public function viewEditMediaGroup(Request $request)
    {
        $id = $request->route('id');
        $viewSocialMediaGroup  = SocialMediaGroup::where('id', $id)->get();
        return view('manage_social_media_group.edit_media_teacher', compact('viewSocialMediaGroup'));
    }

    public function editMediaGroup(Request $request)
    {
        $id = $request->route('id');
        $viewSocialMediaGroup  = SocialMediaGroup::where('id', $id)->update([
            'platform' => $request->platform,
            'link' => $request->link,
            'name' => $request->name
        ]);

        return redirect()->back();
    }


}