<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\CreatorProfile;
use App\ActorProfile;
use App\CreatorWork;
use App\ActorWork;

class ProfileController extends Controller
{
    
    public function creator_add()
    {
        if(Auth::User()->isCreatedProfile()) abort(403);
        return view('profile.creator.create');
    }
    
    public function creator_create(Request $request)
    {        
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
        
        $user = Auth::user();

        $creator_profiles->fill($form);
        $creator_profiles->user_id = $user->id;
        $creator_profiles->save();

        $user->profile_status=1;
        $user->save();
        
        return redirect()->route('profile.creator.index');
        
    }
    
    public function creator_index(Request $request) 
    {
        //ペジネーションを利用しましょう
        //paginate()を使用することで、自動的にページめくりのリンクが作成されます。
        //paginate(数字)で、(数字)件で区切って次のページを作成します。
        //数字を指定しない場合、15件です。
        //取得したデータの件数がこの数字以下の場合は、リンク表示はされません。（<|1,2,3|>)が表示されない）
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $creators = CreatorProfile::where('title', $cond_tilte)->orderBy('created_at','desc')->paginate(3);
        } else {
            $creators = CreatorProfile::orderBy('created_at','desc')->paginate(3);
            }

        return view('profile.creator.index', ['creators' => $creators, 'cond_title' => $cond_title]);    
    }
    
    public function creator_show($id)
    {
        $creator = User::find($id);
        if(!$creator) abort(404);

        $works = CreatorWork::where('user_id',$creator->id)->get();
    
        return view('profile.creator.show',[
            'creator' => $creator,
            'works' => $works
        ]);
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


