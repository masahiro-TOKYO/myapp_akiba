@extends('layouts.admin')
@section('title', 'profile list')

@section('content')
    <div class="container">
        <div class="row">
            <h2>model's profile list</h2>
        </div>
        <div class="row">
            <div class="list-work col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <tbody>
                            @foreach($posts as $post)
                                @if ($post->image_path)
                                    <a href="{{ action('actor/{id}','Admin\ProfileController@actor_show') }}">
                                        <img src="{{ asset('storage/profile_actor/image/' . $post->image_path) }}">
                                    </a>
                                @endif
                            @endforeach    
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection