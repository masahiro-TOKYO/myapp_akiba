@extends('layouts.admin')
@section('title', 'profile list')

@section('content')
    <div class="container">
        <div class="row">
            <h2>creator's profile list</h2>
        </div>
        <div class="row">
            {{ $creators->links() }}
            <div class="list-work col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <tbody>
                            @foreach($creators as $creator)
                                <tr>
                                    <td class="table-img">
                                        <div class="box-img">
                                            <a href ='{{ route("profile.creator.show",$creator->user_id) }}'>
                                                <img src="{{ asset('storage/profile_creator/image/' . $creator->image_path) }}"/>
                                            </a>
                                        </div>
                                        <div text="box-text">{{ $creator->name }}</div>
                                        <div text="box-text">{{ $creator->age }}</div>
                                        <div text="box-text">{{ $creator->gender_label }}</div>
                                        <div text="box-textarea">{{ \Str::limit($creator->area,30) }}</div>
                                        <div text="box-textarea">{{ \Str::limit($creator->introduction,30) }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection