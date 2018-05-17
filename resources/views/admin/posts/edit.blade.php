@extends('layouts.admin')


@section('content')

    <h1>Create Posts</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""
                 class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">
            {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title','Title:') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id','Category:') !!}
                {!! Form::select('category_id',[NULL=>'Uncategory'] + $category ,null,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('photo','Photo:') !!}
                {!! Form::file('photo',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body','Description:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3 ]) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Update Post',['class'=>'btn btn-info col-sm-2']) !!}
                {{csrf_field()}}
            </div>
            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}
            <div class="form-group">

                {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-2 pull-right']) !!}
                {{csrf_field()}}
            </div>
            {!! Form::close() !!}
        </div>


    </div>
    @include('includes.form_error')
@stop