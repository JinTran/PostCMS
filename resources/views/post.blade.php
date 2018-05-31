@extends('layouts.blog-post')




@section('content')




    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a> {{$post->category ? $post->category->name :'Uncategory' }}

    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->format('Y-m-d')}}
        at {{$post->created_at->format('H:i:s')}} </p>

    <hr>

    <!-- Preview Image -->
    {{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/800x400'}}"
         alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <hr>

    @if(Session::has('comment_message'))

        {{session('comment_message')}}

    @endif


    <!-- Blog Comments -->

    <!-- Comments Form -->

    {{--<div class="well">--}}
    {{--<h4>Leave a Comment:</h4>--}}
    {{--<form role="form">--}}
    {{--<div class="form-group">--}}
    {{--<textarea class="form-control" rows="3"></textarea>--}}
    {{--</div>--}}
    {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
    {{--</form>--}}
    {{--</div>--}}


    <div class="well">
        <h4>Leave a Comment:</h4>
        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}


        <input type="hidden" name="post_id" value="{{$post->id}}">
        <div class="form-group">
            {!! Form::label('body','Body:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>4]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    <hr>

    <!-- Posted Comments -->

    @foreach($comments as $comment)
        <!-- Comment -->

        <div class="media">
            @if($comment->is_active == 1 && $comment->post_id == $post->id )
                <a class="pull-left" href="#">
                    <img class="media-object" height="64"
                         src="{{$comment->user->photo->file ? $comment->user->photo->file : 'http://placehold.it/64x64' }}"
                         alt="">
                </a>


                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->format('Y-m-d')}}
                            at {{$comment->created_at->format('H:i:s')}} </small>
                    </h4>
                    {{$comment->body}}

                    <br>

                    <a href="javascript:void(0)" id="show" class="rep-a" data-a="{{$comment->id}}">Reply!</a>
                    {{--<a href="javascript:void(0)" id="show" class="edit-a" data-a="{{$comment->id}}">Edit!</a>--}}

                    @foreach($replies as $reply)
                        @if($reply->comment_id == $comment->id && $reply->is_active==1)

                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="64"
                                         src="{{$reply->user->photo->file ? $reply->user->photo->file : 'http://placehold.it/64x64'}}"
                                         alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->format('Y-m-d')}}
                                            at {{$reply->created_at->format('H:i:s')}} </small>
                                    </h4>
                                    {{$reply->body}}
                                </div>
                            </div>
                        @endif

                    @endforeach
                    @auth
                        <br>
                        <div class="well rep-form{{$comment->id}}" style="display:none">
                            <h4>Leave a reply:</h4>
                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@store']) !!}


                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <div class="form-group">
                                {!! Form::label('body','Body:') !!}
                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>2]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit Reply',['class'=>'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    @endauth
                </div>


            @endif

        </div>
    @endforeach

    <!-- Comment -->
    {{--<div class="media">--}}
    {{--<a class="pull-left" href="#">--}}
    {{--<img class="media-object" src="http://placehold.it/64x64" alt="">--}}
    {{--</a>--}}
    {{--<div class="media-body">--}}
    {{--<h4 class="media-heading">Start Bootstrap--}}
    {{--<small>August 25, 2014 at 9:30 PM</small>--}}
    {{--</h4>--}}
    {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin--}}
    {{--commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce--}}
    {{--condimentum--}}
    {{--nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.--}}
    {{--<!-- Nested Comment -->--}}
    {{--<div class="media">--}}
    {{--<a class="pull-left" href="#">--}}
    {{--<img class="media-object" src="http://placehold.it/64x64" alt="">--}}
    {{--</a>--}}
    {{--<div class="media-body">--}}
    {{--<h4 class="media-heading">Nested Start Bootstrap--}}
    {{--<small>August 25, 2014 at 9:30 PM</small>--}}
    {{--</h4>--}}
    {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante--}}
    {{--sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra--}}
    {{--turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue--}}
    {{--felis--}}
    {{--in faucibus.--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- End Nested Comment -->--}}
    {{--</div>--}}
    {{--</div>--}}



    <!-- Blog Sidebar Widgets Column -->

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>


        $(document).ready(function () {
            $(".rep-a").click(function () {
                id = $(this).attr("data-a");
                $(".rep-form" + id).slideToggle();
            });

        });
    </script>

@stop
