@extends('layouts.admin')
@section('title', 'profile list')

@section('content')
    <div class="container">
        <div class="row">
            <h2>model's profile list</h2>
        </div>
        <div class="row">
            <div class="list-work col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <tbody>
                            @foreach($actors as $actor)
                               
                                    <a href="{{route('profile.actor.show',$actor->id)}}">
                                        <img src="{{ asset('storage/profile_actor/image/' . $actor->image_path) }}">
                                    </a>
                            @endforeach    
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection