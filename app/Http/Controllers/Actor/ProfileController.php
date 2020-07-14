<?php

namespace App\Http\Controllers\Actor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\ActorProfile;
use App\ActorWork;

class ProfileController extends Controller
{
      
    public function actor_add()
    {
        return view('profile.actor.create');
    }
    
    public function actor_create(Request $request)
    {
        // ログイン しているユーザーを取得 かつ　roleにデータがあれば403

        // if(!Auth::check() || Auth::actor_profile()->role(){
        //     abort(403);
        // }
        
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
        
        $user = Auth::user();

        $actor_profiles->fill($form);
        $actor_profiles->user_id = $user->id;
        $actor_profiles->save();

        $user->profile_status=1;
        $user->save();
        
        return redirect()->route('profile.actor.index');
        
    }
    
    public function actor_index(Request $request) 
    {
        //ペジネーションを利用しましょう
        //paginate()を使用することで、自動的にページめくりのリンクが作成されます。
        //paginate(数字)で、(数字)件で区切って次のページを作成します。
        //数字を指定しない場合、15件です。
        //取得したデータの件数がこの数字以下の場合は、リンク表示はされません。（<|1,2,3|>)が表示されない）
        $cond_title = $request->cond_title;
        if ($cond_title != '' ) {
            $actors = ActorProfile::where('title', $cond_tilte)->orderBy('created_at','desc')->paginate(3);
        } else {
            $actors = ActorProfile::orderBy('created_at','desc')->paginate(3);
            }

        return view('profile.actor.index', ['actors' => $actors, 'cond_title' => $cond_title]);    
    }
    
    public function actor_show($id)
    {
        $actor = User::find($id);
        if(!$actor) abort(404);

        $works = ActorWork::where('user_id',$actor->id)->get();
    
        return view('profile.actor.show',[
            'actor' => $actor,
            'works' => $works
        ]);
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }
    
    
}


