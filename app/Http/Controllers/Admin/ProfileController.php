<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create()
    {
        $this->validate($request, Profile::$rules);
        $work = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
        
    }
    
    public function edit()
    {
        return view ('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
}


