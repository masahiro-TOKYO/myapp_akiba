<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mypage()
    {
        $user = Auth::User();
        $works = $user->works;
        return view('mypage',[
            'user' => $user,
            'works' => $works
        ]);
    }

    public function edit($id)
    {
        //パスワードとそれ以外の情報とで、編集画面を分けるのが一般的です。
    }

    public function update(Request $request)
    {

    }

    public function edit_password($id)
    {
        //パスワードとそれ以外の情報とで、編集画面を分けるのが一般的です。
    }

    public function update_password(Request $request)
    {
        //パスワードとメールアドレスの変更fフォームは、必ず2回入力させるフォームにしましょう。
    }
    
}