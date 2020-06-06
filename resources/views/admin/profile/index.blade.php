@extends('layouts.admin')
@section('title', 'profile list')

@section('content')
    <div class="container">
        <div class="row">
            <h2>profile</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\ProfileController@index') }}" method="get">
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
            <div class="list-work col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <tbody>
                            @foreach($posts as $post)
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection