<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ActorWork;
use App\CreatorWork;

class WorkController extends Controller
{
    //
    public function actor_add()
    {
        return view('work.actor.create');
    }
    public function creator_add()
    {
        return view('work.creator.create');
    }
    
    
    public function actor_create(Request $request)
    {
        $this->validate($request, ActorWork::$rules);
        
        $actors_works = new ActorWork;
        $form =$request->all();
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/actor/image');
            $actors_works->image_path = basename($path);
        }else {
            $actors_works->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $actors_works->fill($form);
        $actors_works->save();
        
        return redirect('work/actor/create');
    }
    public function creator_create(Request $request)
    {
        $this->validate($request, CreatorWork::$rules);
        
        $creators_works= new CreatorWork;
        $form =$request->all();
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/creator/image');
            $creators_works->image_path = basename($path);
        }else {
            $creators_works->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $creators_works->fill($form);
        $creators_works->save();
        
        return redirect('work/creator/create');
    }
    
    public function actor_index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $posts = ActorWork::where('title', $cond_tilte)->get();
        } else {
            $posts = ActorWork::all();
            }
            $posts = ActorWork::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('work.actor.index', ['headline' => $headline, 'posts' => $posts,'posts' => $posts, 'cond_title' => $cond_title]);    
            
    }
    public function creator_index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $posts = CreatorWork::where('title', $cond_tilte)->get();
        } else {
            $posts = CreatorWork::all();
            }
            $posts = CreatorWork::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('work.creator.index', ['headline' => $headline, 'posts' => $posts]);
            
    }
    public function edit(Request $request)
    {
        $work = ActorWork::find($request->id);
        if (empty($work)){
            abort(404);
        }
    return view('work.edit', ['work_form' => $work]);
    }
    
    public function update(Request $request)
    {
        // validation
        $this->validate($request, Work::$rules);
        // Work model id を取得 
        $work = Work::find($request->id);
        // データの格納
        $work_form = $request->all();
        if (isset($work_form['image'])) {
            $path = $request->file('image')->store('public/image');
            unset($work_form['image']);
        } elseif (isset($request->remove)) {
            $work->image_path = null;
            unset($work_form['remove']);
        }
        unset($work_form['_token']);
        // データを上書き保存
        $work->fill($work_form)->save();
        
        return redirect('work');
    }
}
