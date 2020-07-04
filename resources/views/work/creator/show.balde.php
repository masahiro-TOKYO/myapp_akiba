@extends('layouts.admin')
@section('title', 'creator work')

@section('content')
    <div class="container">
        <div class="row">
            <h2>creator's work</h2>
            
            @foreach($posts as $creator_work)
                @if ($creator_work->image_path)
                    <div class="form-group row">
                        <p>{{ $creator_profile->name }}</p>
                        <img src="{{ secure_asset('storage/work_creator/image/' . $creator_work->image_path) }}">
                        <p>{{ $creator_works->caption }}</p>
                    </div>
                 @endif
            @endforeach
        </div>
    </div>
@endsection