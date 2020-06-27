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
        
        $actor_works = new ActorWork;
        $form =$request->all();
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/work_actor/image');
            $actor_works->image_path = basename($path);
        }else {
            $actor_works->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $actor_works->fill($form);
        $actor_works->save();
        
        return redirect('work/actor/create');
    }
    public function creator_create(Request $request)
    {
        // クリエイターしか入れない
        if(!Auth::guard('creator')->check()){
            abort(403);
        }
        $this->validate($request, CreatorWork::$rules);
        
        $creator_works = new CreatorWork;
        $form = $request->all();
        
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/work_creator/image');
            $creator_works->image_path = basename($path);
        }else {
            $creator_works->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        
        $creator_works->creator_profile_id=Auth::guard('creator')->user()->id;
        $creator_works->fill($form);
        $creator_works->save();
         
        
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

        return view('work.actor.index', ['posts' => $posts,'cond_title' => $cond_title]);    
            
    }
    public function creator_index(Request $request) 
    {
        // $creator_works = CreatorWork::all();
        // // 最新のレコードだけ表示
        // $creator_works = CreatorWork::with('work_creator_history_first'->get());
        $cond_title = $request->cond_title;
        // if ($cond_title != '' ) {
        //     $posts = CreatorWork::where('title', $cond_tilte)->get();
        // } else {
            $posts = CreatorWork::all();
            // }
            $posts = CreatorWork::all()->sortByDesc('updated_at');

        return view('work.creator.index', ['posts' => $posts]);
    }
    
    // public function creator_show(Request $request)
    // {
        
    //     $creator_works = CreatorWork::find($request->id);
    //     if (empty($creator_works)){
    //         abort(404);
    //     }
    //     return view('work.creator.{id}',['work_form' => $creator_works,'posts' => $posts, 'cond_title ' => $cond_title]);
    // }
    // public function creator_update(Request $request)
    // {
    //     $this->validate($request, CreatorWork::$rules);
    //     $creator_works = CreatorWork::find($request->id);
    //     $creator_works = $request->all();
    //     unset($work_form['_token']);
    //     $creator_works->fill($work_form)->save();
    //     return redirect('work/creator');
    // }
    
    
}
