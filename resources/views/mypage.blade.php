@extends('layouts.admin')
@section('title', 'name')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1>マイページ</h1>
            </div>
            <div class="button col-lg-12 col-md-12 col-sm-12">
                <a href="#"><button>プロフィール編集</button></a>
                <a href="#"><button>パスワード変更</button></a>
            </div>
            <div class="icon col-lg-12 col-md-12 col-sm-12">
                <h3>{{ $user->name }}</h3>
                <img src="{{ asset('storage/profile_user/image/' . optional($user->profile)->image_path) }}">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table>
                    <tbody>
                        <tr>
                            <th>年齢</th>
                            <td>
                                {{ $user->profile->age }}
                            </td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>
                                {{ $user->profile->gender_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>地域</th>
                            <td>
                                {{ \Str::limit($user->profile->area,30) }}
                            </td>
                        </tr>
                        <tr>
                            <th>自己紹介</th>
                            <td>
                                {{ \Str::limit($user->profile->introduction,30) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="works col-lg-12 col-md-12 col-sm-12 mb30">
                <a href="#"><button>新規投稿</button></a>
                @if($works)
                <table>
                    <thead>
                    @foreach($works as $work)
                        <tr>
                            <a href="{{route('work.'.$user->role.'.show',[$user->role.'_id' => $user->id,'work_id'=> $work->id] )}}"><img src="{{$work->image_path}}" alt=""></a>
                        </tr>
                    @endforeach
                    </thead>
                </table>
                @endif
            </div>

        </div>
    </div>
@endsection