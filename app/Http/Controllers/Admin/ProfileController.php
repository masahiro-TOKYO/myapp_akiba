<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CreatorProfile;
use App\ActorProfile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    public function choice_job()
    {
        return view('profile.choice_job');
    }
    
  
    public function creator_add()
    {
        return view('profile.creator.create');
    }
    
    public function creator_create(Request $request)
    {
        // ログイン しているユーザーを取得 かつ　roleにデータがあれば403

        // if(!Auth::check() || Auth::creator_profile()->role(){
        //     abort(403);
        // }
        
        $this->validate($request, CreatorProfile::$rules);
        $creator_profiles = new CreatorProfile;
        $form = $request->all();

        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/profile_creator/image');
            $creator_profiles->image_path = basename($path);
        }else {
            $creator_profiles->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $creator_profiles->fill($form);
        $creator_profiles->user_id=Auth::user()->id;
        $creator_profiles->save();
        
        $user = Auth::user();
        $user->role='creator';
        $user->save();
        
        return redirect()->route('profile.creator.index');
        
    }
    
    public function creator_index(Request $request) 
    {
        
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $posts = CreatorProfile::where('title', $cond_tilte)->get();
        } else {
            $posts = CreatorProfile::all();
            }
        $posts = CreatorProfile::all()->sortByDesc('updated_at');

        return view('profile.creator.index', ['posts' => $posts, 'cond_title' => $cond_title]);    
    }
    
    public function creator_show($id)
    {
        $creator_profile = CreatorProfile::where('user_id',$id)->get();
        if(!$creator_profile) abort(404);
        
        $user = Auth::user();
        
        return view()->name('profile.creator.show');
    }

    public function edit()
    {
        return view ('profile.edit');
    }

    public function update()
    {
        return redirect('profile/edit');
    }
    
    
}


