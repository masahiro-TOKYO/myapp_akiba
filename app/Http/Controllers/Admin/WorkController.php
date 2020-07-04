<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ActorWork;
use App\CreatorWork;
use App\User;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
   
    public function creator_add()
    {
        return view('work.creator.create');
    }
    
    public function creator_create(Request $request)
    {
        // クリエイターしか入れない
       
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
        
        $creator_works->fill($form);
        $creator_works->user_id=Auth::user()->id;
        $creator_works->save();
         
        $user = Auth::user();
        $user->role='creator';
        $user->save(); 
         
        return redirect()->route('work.creator.index');
    }
    
    public function creator_index(Request $request) 
    {

        // 最新のレコードだけ表示
        $creator_works = User::with(['work_creator'])->orderBy('created_at','desc')->get();
        $creator_works = User::with('work_creator')->orderBy('created_at','asc')->first()->toSql();
        dd($creator_works);
        // $creator_works = User::with('work_creator')->get();
        
        
        $cond_title = $request->cond_title;
        
        // $posts = CreatorWork::all();
        // $posts = CreatorWork::all()->sortByDesc('updated_at');

        return view('work.creator.index', ['creator_works' => $creator_works,"cond_title" => $cond_title]);
    }
    
    public function creator_show(Request $request)
    {
        
        $creator_works = CreatorWork::find($request->id);
        if (empty($creator_works)){
            abort(404);
        }
        return view('work.creator.{id}',['work_form' => $creator_works,'posts' => $posts, 'cond_title ' => $cond_title]);
    }
    public function creator_update(Request $request)
    {
        $this->validate($request, CreatorWork::$rules);
        $creator_works = CreatorWork::find($request->id);
        $creator_works = $request->all();
        unset($work_form['_token']);
        $creator_works->fill($work_form)->save();
        return redirect('work/creator');
    }
    
    
}
