@extends('layouts.admin')
@section('title', 'creator worklist')

@section('content')
    <div class="container">
        <div class="row">
            <h2>creator's worklist</h2>
        </div>
        <div class="row">
            <div class="list-work col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <tbody>
                            @foreach($creator_works as $creator_work)
                            @php dd($creator_work->work_creator);@endphp
                            
                                @if (optional($creator_work->work_creator)->first()->image_path)
                                    <tr>
                                        <tb class="table-img">
                                            <div class="box-img">
                                                <a href ='{{ route("profile.creator.show",$creator_work->id) }}'>
                                                    <img src="{{ secure_asset('storage/work_creator/image/' . $creator_work->work_creator->first()->image_path) }}">
                                                </a>
                                            </div>
                                            <div text="box-textarea">{{ \Str::limit(optional($creator_work->work_creator)->first()->caption,30) }}</div>
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