<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

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
    

    public function actor_create()
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        }else {
            $profile->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $profile->fill($form);
        $profile->save();
        
        
        return redirect('profile/actor/create');
        
    }
    public function creator_create()
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        }else {
            $profile->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $profile->fill($form);
        $profile->save();
        
        
        return redirect('profile/creator/create');
        
    }
    
    public function actor_index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $posts = Profile::where('title', $cond_tilte)->get();
        } else {
            $posts = Profile::all();
            }
            $posts = Profile::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        return view('actor.profile.index', ['headline' => $headline, 'posts' => $posts,'posts' => $posts, 'cond_title' => $cond_title]);    
    }
    
    public function creator_index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $posts = Profile::where('title', $cond_tilte)->get();
        } else {
            $posts = Profile::all();
            }
            $posts = Profile::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        return view('creator.profile.index', ['headline' => $headline, 'posts' => $posts,'posts' => $posts, 'cond_title' => $cond_title]);    
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


