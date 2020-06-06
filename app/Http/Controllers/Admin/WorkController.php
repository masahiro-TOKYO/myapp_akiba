<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;

class WorkController extends Controller
{
    //
    public function add()
    {
        return view('admin.work.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Work::$rules);
        
        $work = new Work;
        $form =$request->all();
        
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $work->image_path = basename($path);
        }else {
            $work->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $work->fill($form);
        $work->save();
        
        return redirect('admin/work/create');
    }
    public function index(Request $request) 
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $posts = Work::where('title', $cond_tilte)->get();
        } else {
            $posts = Work::all();
            }
            $posts = Work::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('admin.work.index', ['headline' => $headline, 'posts' => $posts,'posts' => $posts, 'cond_title' => $cond_title]);    
            
    }
    public function edit(Request $request)
    {
        $work = Work::find($request->id);
        if (empty($work)){
            abort(404);
        }
    return view('admin.work.edit', ['work_form' => $work]);
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
        
        return redirect('admin/work');
    }
}
