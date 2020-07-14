<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatorProfile extends Model
{
    protected $table = 'creator_profiles';

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'area' => 'required',
        'introduction' => 'required',
        //画像のバリデーション
        'image' => 'required|file|mimes:jpeg,png'
    ];
    public function creator_works()
    {
        return $this->hasMany('App\CreatorWork');
    }

    /**
     * テーブルに保存する値が必ずしも画面で表示したい文字とは限らない
     * get~Attributeという名前でメソッドを作ると、$obj（objはあくまでサンプルの文字）->gender_labelという風にして、メンバを参照するようにしてViewで呼び出して使うことができる（
     * $obj->genderだと,womanという値がそのまま取り出されるが、このようにしてメソッドを作ると、$obj->genderを事前に加工してから参照できる
     */
    public function getGenderLabelAttribute()
    {
        $gender = [
            'woman' => '女性',
            'men' => '男性',
            'other' => 'その他',
        ];
        return $gender[$this->gender];
    }
}
