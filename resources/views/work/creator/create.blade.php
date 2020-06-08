{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- @yield('title') に'the work'を埋め込む --}}
@section('title', 'creator work')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>creator work</h2>
                <form action="{{ action('Admin\WorkController@creator_create') }}" method="post" enctype="multipart/form-data">


                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">キャプション</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="caption" rows="10">{{ old('caption') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-default" value="シェア">
                </form>
            </div>
        </div>
    </div>
@endsection