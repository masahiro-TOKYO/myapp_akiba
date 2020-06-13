<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ActorsWorks;
use App\CreatorsWorks;

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
        $this->validate($request, ActorsWorks::$rules);
        
        $actors_works = new ActorsWorks;
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
        $this->validate($request, CreatorsWorks::$rules);
        
        $creators_works= new CreatorsWorks;
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
            $posts = ActorsWorks::where('title', $cond_tilte)->get();
        } else {
            $posts = ActorsWorks::all();
            }
            $posts = ActorsWorks::all()->sortByDesc('updated_at');

        

        return view('work.actor.index', ['posts' => $posts,'cond_title' => $cond_title]);    
            
    }
    public function creator_index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $posts = CreatorsWorks::where('title', $cond_tilte)->get();
        } else {
            $posts = CreatorsWorks::all();
            }
            $posts = CreatorsWorks::all()->sortByDesc('updated_at');

        

        return view('work.creator.index', [ 'posts' => $posts,'cond_title' => $cond_title]);
            
    }
    
    public function creator_edit(Request $request)
    {
        $creators_works = CreatorsWorks::find($request->id);
        if (empty($creators_works)){
            abort(404);
        }
    return view('work.edit', ['work_form' => $creators_works]);
    }
    
    public function actor_edit(Request $request)
    {
        $actors_works = ActorsWorks::find($request->id);
        if (empty($actors_works)){
            abort(404);
        }
    return view('work.edit', ['work_form' => $actors_works]);
    }
    
    
    public function actor_update(Request $request)
    {
        // validation
        $this->validate($request, ActorsWorks::$rules);
        // Work model id を取得 
        $actors_works = ActorsWorks::find($request->id);
        // データの格納
        $work_form = $request->all();
        if (isset($work_form['image'])) {
            $path = $request->file('image')->store('public/actor/image');
            unset($work_form['image']);
        } elseif (isset($request->remove)) {
            $actors_works->image_path = null;
            unset($work_form['remove']);
        }
        unset($work_form['_token']);
        // データを上書き保存
        $actors_works->fill($work_form)->save();
        
        return redirect('work');
    }
    public function creator_update(Request $request)
    {
        // validation
        $this->validate($request, CreatorsWorks::$rules);
        // Work model id を取得 
        $creators_works = CreatorsWorks::find($request->id);
        // データの格納
        $work_form = $request->all();
        if (isset($work_form['image'])) {
            $path = $request->file('image')->store('public/creator/image');
            unset($work_form['image']);
        } elseif (isset($request->remove)) {
            $creators_works->image_path = null;
            unset($work_form['remove']);
        }
        unset($work_form['_token']);
        // データを上書き保存
        $creators_works->fill($work_form)->save();
        
        return redirect('work');
    }
}
