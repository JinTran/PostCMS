@extends('layouts.admin')


@section('content')
    @if(Session::has('deleted_post'))
        <p class="bg-danger"> The Post has been deleted</p>
    @endif
    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Stt</th>
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
            <?php $i=0 ;?>
        @if($posts)
            @foreach($posts as $index=>$post)
                @if(Auth::user()->name == $post->user->name)
                <tr>
                    <td>{{$post->id}} </td>
                    <td><?php echo ++$i; ?></td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"
                             alt=""></td>
                    <td>{{$post->user->name}} </td>
                    <td>{{$post->category ? $post->category->name : 'Uncategory'}} </td>
                    <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body,10)}} </td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>


                @endif
            @endforeach


        @endif

        </tbody>
    </table>

@stop