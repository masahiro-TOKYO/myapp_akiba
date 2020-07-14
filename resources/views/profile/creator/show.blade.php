@extends('layouts.admin')
@section('title', 'name')

@section('content')
    <div class="container">
        <div class="row">
                <div class="">
                    <h3>{{ $creator->name }}</h3>
                    <img src="{{ asset('storage/profile_creator/image/' . optional($creator->profile)->image_path) }}">
                </div>
                <table>
                    <tbody>
                        <tr>
                            <th>年齢</th>
                            <td>
                                {{ $creator->profile->age }}
                            </td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>
                                {{ $creator->profile->gender_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>地域</th>
                            <td>
                                {{ \Str::limit($creator->profile->area,30) }}
                            </td>
                        </tr>
                        <tr>
                            <th>自己紹介</th>
                            <td>
                                {{ \Str::limit($creator->profile->introduction,30) }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table>
                    <thead>
                    @foreach($works as $work)
                        <tr>
                            <th>
                                <a href="{{route('work.creator.show',['creator_id' => $creator->id,'work_id' => $work->id])}}"><img src="{{ asset('storage/profile_creator/image/' .$work->image_path)}}"></a>
                                {{$work->caption}}
                            </th>
                        </tr>
                    @endforeach
                    </thead>
                </table>


        </div>
    </div>
@endsection