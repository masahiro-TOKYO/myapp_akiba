<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class workController extends Controller
{
    //
    public function add()
    {
        return view('admin.work.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, work::$rules);
        
        $work = new work;
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
}
