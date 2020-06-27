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
    
    public function actor_add()
    {
        return view('profile.actor.create');
    }
    public function creator_add()
    {
        return view('profile.creator.create');
    }
    

    public function actor_create(Request $request)
    {
        if(!Auth::guard('actor')->check()) {
            abort(403);
        }
        $this->validate($request, ActorProfile::$rules);
        $actor_profiles = new ActorProfile;
        $form = $request->all();
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/profile_actor/image');
            $actor_profiles->image_path = basename($path);
        }else {
            $actor_profiles->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $actor_profiles->fill($form);
        $actor_profiles->save();
        
        
        $actor_profiles->user_id=Auth::guard('actor')->user()->id;
        
        return redirect('profile/actor/create');
        
    }
    
    public function creator_create(Request $request)
    {
        if(!Auth::guard('creator')->check()) {
            abort(403);
        }
        
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
        $creator_profiles->save();
        
        $creator_profiles->user_id=Auth::guard('creator')->user()->id;
        
        return redirect('profile/creator/create');
        
    }
    
    public function actor_index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $posts = ActorProfile::where('title', $cond_tilte)->get();
        } else {
            $posts = ActorProfile::all();
            }
            $posts = ActorProfile::all()->sortByDesc('updated_at');

        return view('profile.actor.index', ['posts' => $posts,'cond_title' => $cond_title]);    
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
    
    
    public function actor_show(Request $request,$id,CreatorProfiles $actor_profiles)
    {
        return view('profile.actor.show',['posts' => $posts, 'cond_title ' => $cond_title]);
    }
    
    public function creator_show(Request $request,$id,CreatorProfiles $creator_profiles)
    {
        return view('profile.creator.',['posts' => $posts, 'cond_title ' => $cond_title]);
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


