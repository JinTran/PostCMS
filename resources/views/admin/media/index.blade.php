@extends('layouts.admin')

@section('content')

    <h1>Media</h1>


        <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                {{--<th>Email</th>--}}
              </tr>
            </thead>
            <tbody>
            @if($photos)
            @foreach($photos as $photo)
              <tr>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->file ? $photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>

                  <td>
                      {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}


                           <div class="form-group">
                              {!! Form::submit('Delete ',['class'=>'btn btn-danger']) !!}
                          </div>

                          {!! Form::close() !!}

                  </td>
              </tr>
             @endforeach
                @endif
            </tbody>
          </table>

    {!! $photos->render() !!}
    @stop