@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store' ]) !!}

        <div class="form-group">

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('parent_id','Belong to:') !!}
            {!! Form::select('parent_id',[0=>'None'] + $categoriess, null ,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            {{csrf_field()}}
        </div>

        {!! Form::close() !!}

        <div class="row">
            @include('includes.form_error')
        </div>
    </div>

    <div class="col-sm-6">

        @if($categories)

            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Belong to</th>
                    <th>Created date</th>
                </tr>
                </thead>
                <tbody>


                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>
                            {{$category->parent_id == 0 ? "None":$category->showName($category->parent_id)  }}
                        </td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date yet'}}</td>

                    </tr>

                @endforeach

                </tbody>
            </table>

        @endif
        {!! $categories->render() !!}

    </div>


@stop