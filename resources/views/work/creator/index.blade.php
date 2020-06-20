@extends('layouts.admin')
@section('title', 'creator worklist')

@section('content')
    <div class="container">
        <div class="row">
            <h2>creator's worklist</h2>
        </div>
        <div class="list-work row">
            @foreach($posts as $creator_work)
                <div class="col-md-3">
                    <a href ='{{ route("creator/{id}",["id"=>$creator_works->id]) }}'>
                        @if ($post->image_path)
                            <img src="{{ secure_asset('storage/work_creator/image/' . $creator_work->image_path) }}">
                        @endif
                    </a>
                </div>    
            @endforeach
        </div>
    </div>
@endsection