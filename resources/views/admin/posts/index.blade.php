@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo_id</th>
            <th>User_id</th>
            <th>Category_id</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}} </td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""> </td>
                    <td>{{$post->user->name}} </td>
                    <td>{{$post->category_id}} </td>
                    <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a> </td>
                    <td>{{$post->body}} </td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>



            @endforeach

        @endif
        {{--<tr>--}}
        {{--<td>John</td>--}}
        {{--<td>Doe</td>--}}
        {{--<td>john@example.com</td>--}}
        {{--</tr>--}}

        </tbody>
    </table>

@stop