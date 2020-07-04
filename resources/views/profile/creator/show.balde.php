@extends('layouts.admin')
@section('title', 'name')

@section('content')
    <div class="container">
        <div class="row">
            <h2>my page</h2>
            @foreach($posts as $creator_profile)
                @if ($post->image_path)
            
                    <div class="form-group row">
                        <p>{{ $creator_profile->name }}</p>
                        <img src="{{ asset('storage/profile_creator/image/' . $post->image_path) }}">
                        <td src="{{ $post->name }}"></td>
                        <td src="{{ $post->age }}"></td>
                        <td src="{{ $post->gender }}"></td>
                        <td src="{{ \Str::limit($post->area,30) }}"></td>
                        <td src="{{ \Str::limit($post->introduction,30) }}"></td>
                    </div>
                 @endif
            @endforeach
        </div>
    </div>
@endsection