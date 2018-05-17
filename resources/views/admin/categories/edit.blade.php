@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">

        {!! Form::model($categories,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$categories->id] ]) !!}

        <div class="form-group">

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('parent_id','Belong to:') !!}
            {!! Form::select('parent_id',[0=>'None'] + $categoriess, null ,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-info col-sm-6']) !!}
            {{csrf_field()}}
        </div>

        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy',$categories->id] ]) !!}



        <div class="form-group">
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
            {{csrf_field()}}
        </div>

        {!! Form::close() !!}

    </div>

    <div class="col-sm-6">



    </div>






@stop