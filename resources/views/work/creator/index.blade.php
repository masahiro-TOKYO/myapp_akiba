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
                            @foreach($works as $work)

                                @if(optional($work->creator_works_first)->image_path)
                                    <tr>
                                        <td class="table-img">
                                            <div class="box-img">
                                                <a href ='{{ route("work.creator.show",optional($work->creator_works_first)->id) }}'>
                                                    <img src="{{ asset('storage/work_creator/image/' . optional($work->creator_works_first)->image_path) }}">
                                                </a>
                                            </div>
                                            <div text="box-textarea">{{ \Str::limit(optional($work->creator_works_first)->caption,30) }}</div>
                                        </td>
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