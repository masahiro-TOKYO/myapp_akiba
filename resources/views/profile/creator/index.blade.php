@extends('layouts.admin')
@section('title', 'profile list')

@section('content')
    <div class="container">
        <div class="row">
            <h2>creator's profile list</h2>
        </div>
        <div class="row">
            <div class="list-work col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <tbody>
                            @foreach($posts as $creator_profile)
                                @if ($creator_profile->image_path)
                                    <tr>
                                        <tb class="table-img">
                                            <div class="box-img">
                                                <a href ='{{ route("profile.creator.show",$creator_profile->user_id) }}'>
                                                    <img src="{{ asset('storage/profile_creator/image/' . $creator_profile->image_path) }}"/>
                                                </a>
                                            </div>
                                            <div text="box-text">{{ $creator_profile->name }}</div>
                                            <div text="box-text">{{ $creator_profile->age }}</div>
                                            <div text="box-text">{{ $creator_profile->gender }}</div>
                                            <div text="box-textarea">{{ \Str::limit($creator_profile->area,30) }}</div>
                                            <div text="box-textarea">{{ \Str::limit($creator_profile->introduction,30) }}</div>
                                        </tb>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection