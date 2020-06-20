@extends('layouts.admin')
@section('title', 'model worklist')

@section('content')
    <div class="container">
        <div class="row">
            <h4>model's worklist</h4>
        </div>
        
        <div class="list-work row">
            @foreach($posts as $post)
                <div class="col-md-3">
                    @if ($post->image_path)
                        <a href="{{ action('Admin\WorkController@actor_show', ['id' => $actor_works->id]) }}">
                            <img src="{{ secure_asset('storage/work_actor/image/' . $post->image_path ) }}">
                        </a>
                    @endif
                </div>    
            @endforeach
        </div>
    </div>
@endsection