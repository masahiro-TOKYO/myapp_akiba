@extends('layouts.admin')
@section('title', 'creator work')

@section('content')
    <div class="container">
        <div class="row">
            <h2>creator's work</h2>
            <div class="form-group row">
                <p>{{ $creator_profile->name }}</p>
                <img src="{{ secure_asset('storage/work_creator/image/' . $post->image_path) }}">
                <p>{{ $creator_works->caption }}</p>
                
            </div>
        </div>
    </div>
@endsection