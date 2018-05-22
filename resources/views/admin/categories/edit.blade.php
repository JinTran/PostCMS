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
        @if($categories->posts)
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Owner</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories->posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>






@stop