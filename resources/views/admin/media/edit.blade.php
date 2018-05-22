@extends('layouts.admin')

@section('content')

    {!! Form::open(['method'=>'POST','action'=>'AdminMediasController@store']) !!}

        <div class="form-group">
            {!! Form::label('photo','Photo:') !!}
            {!! Form::file('photo',null,['class'=>'form-control']) !!}
         </div>
         <div class="form-group">
            {!! Form::submit('Create Meia',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    @stop