@extends('layouts.admin')
@section('title','model edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>model edit </h2>
                <form action="{{ action('Admin\WorkController@actor_update') }}" method="post" enctype="multpart/form-date">
                    if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="form-text text-info">
                            {{ $work_form->image_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除 
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="caption">キャプション</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="caption" row="20">{{ $work_form->caption }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $work_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-default" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsction