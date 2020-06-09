{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- @yield('title') に'the work'を埋め込む --}}
@section('title', 'choice')

{{-- @yield('content') に'以下のbootstapsのシステム'を埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>choice</h3>
                <p>モデルかクリエイターか選んでください</p>
                <a href="{{ action('Admin\ProfileController@actor_create') }}">
                    <button type="button" class="actor">model</button>
                </a>
                <a href="{{ action('Admin\ProfileController@creator_create') }}">
                    <button type="button" class="creator">creator</button>
                </a>
            </div>
        </div>
    </div>
@endsection