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
                                @if ($post->image_path)
                                    <a href ='{{ route("creator/{id}",["id" =>$creator_profiles->id]) }}'>
                                        <img src="{{ asset('storage/profile_creator/image/' . $post->image_path) }}">
                                        <!--<td src="{{ $posts->name }}"></td>-->
                                        <!--<td src="{{ $creator_profiles->age }}"></td>-->
                                        <!--<td src="{{ $creator_profiles->gender }}"></td>-->
                                        <!--<td src="{{ \Str::limit($creator_profiles->area,30) }}"></td>-->
                                        <!--<td src="{{ \Str::limit($creator_profiles->introduction,30) }}"></td>-->
                                    </a>
                                @endif
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection