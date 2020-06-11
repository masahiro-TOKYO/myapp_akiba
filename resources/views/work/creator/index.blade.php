@extends('layouts.admin')
@section('title', 'creators worklist')

@section('content')
    <div class="container">
        <div class="row">
            <h2>creators worklist</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\WorkController@creator_index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-default" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="list-work col-md-3">
                    @if ($post->image_path)
                        <img src="{{ secure_asset('storage/creator/image/' . $post->image_path) }}">
                    @endif
                </div>    
            @endforeach
        </div>
    </div>
@endsection