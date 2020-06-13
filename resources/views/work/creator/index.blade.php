@extends('layouts.admin')
@section('title', 'creator worklist')

@section('content')
    <div class="container">
        <div class="row">
            <h2>creator's worklist</h2>
        </div>
        
        <div class="list-work row">
            @foreach($posts as $post)
                <div class="col-md-3">
                    @if ($post->image_path)
                        <img src="{{ secure_asset('storage/creator/image/' . $post->image_path) }}">
                    @endif
                </div>    
            @endforeach
        </div>
    </div>
@endsection