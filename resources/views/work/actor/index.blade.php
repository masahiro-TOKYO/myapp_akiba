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
                        <img src="{{ secure_asset('storage/actor/image/' . $post->image_path) }}">
                    @endif
                </div>    
            @endforeach
        </div>
    </div>
@endsection