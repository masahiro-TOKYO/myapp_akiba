@extends('layouts.admin')
@section('title', 'creator work')

@section('content')
    <div class="container">
        <div class="row">
            <h2>creator's work　詳細ページ</h2>
                    <div class="row">
                        <img src="{{ asset('storage/work_creator/image/' . $work->image_path) }}">
                        <p>{{ $work->caption }}</p>
                    </div>
        </div>
    </div>
@endsection