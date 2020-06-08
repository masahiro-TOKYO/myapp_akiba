{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- @yield('title') に'the work'を埋め込む --}}
@section('title', 'actor profile')

{{-- @yield('content') に'以下のbootstapsのシステム'を埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>model profile</h3>
                <form action="{{ action('Admin\ProfileController@actor_create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">プロフィール画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">年齢</label>
                        <div class="col-md-10">
                            <select class="select" name="age" value="{{ old('age') }}">
                                <option value="非公開">非公開</option>
                                <option value="18">18歳</option>
                                <option value="19">19歳</option>
                                <option value="20">20歳</option>
                                <option value="21">21歳</option>
                                <option value="22">22歳</option>
                                <option value="23">23歳</option>
                            </select>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <select class="select" name="gender">
                                <option value="woman">女性</option>
                                <option value="man">男性</option>
                            </select>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">主な活動拠点</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="area" rows="2">{{ old('area') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="完了">
                </form>
            </div>
        </div>
    </div>
@endsection