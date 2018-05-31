@extends('layouts.blog-home')

@section('content')


        <!-- Page Content -->
        <div class="container">

                <div class="row">

                        <!-- Blog Entries Column -->
                        <div class="col-md-8">



                                <!-- First Blog Post -->
                            @foreach($results as $result)

                            <!-- First Blog Post -->
                            <h2>
                            <a href="{{route('home.post',$result->id)}}">{{$result->title}}</a>
                            </h2>
                            <p class="lead">
                            by <a href="index.php">{{$result->user->name}}</a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$result->created_at->diffForHumans()}}
                            </p>
                            <hr>
                            <img class="img-responsive" height="30"
                            src="{{$result->photo ? $result->photo->file : 'http://placehold.it/900x300'}}" alt="">
                            <hr>
                            <p>{{str_limit($result->body,150)}}</p>
                            <a class="btn btn-primary" href="{{route('home.post',$result->id)}}">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>
                            @endforeach

                                <hr>



                        </div>

                        <!-- Blog Sidebar Widgets Column -->
                        <div class="col-md-4">

                                <!-- Blog Search Well -->
                                {{--<div class="well">--}}
                                        {{--<h4>Blog Search</h4>--}}
                                        {{--<div class="input-group">--}}
                                                {{--<input type="text" class="form-control">--}}
                                                {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-default" type="button">--}}
                                {{--<span class="glyphicon glyphicon-search"></span>--}}
                        {{--</button>--}}
                        {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<!-- /.input-group -->--}}
                                {{--</div>--}}



                                <div class="well">

                                        <h4>Blog Search</h4>
                                        {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@search']) !!}

                                        <div class="form-group">
                                                {{--{!! Form::label('keyword','keyword') !!}--}}
                                                {!! Form::text('keyword',null,['class'=>'form-control']) !!}

                                        </div>
                                        <div class="form-group">
                                                {!! Form::submit('Search Post',['class'=>'btn btn-primary']) !!}
                                        </div>

                                {!! Form::close() !!}
                                <!-- /.input-group -->
                                </div>

                                <!-- Blog Categories Well -->
                                <div class="well">
                                        <h4>Blog Categories</h4>

                                        <div class="row">
                                                <div class="col-lg-6">
                                                        <ul class="list-unstyled">


                                                                @foreach($categories as $item)
                                                                        <li><a href="#">{{$item->name}}</a>
                                                                        </li>
                                                                @endforeach

                                                        </ul>
                                                </div>

                                                <!-- /.col-lg-6 -->
                                                <div class="col-lg-6">
                                                        <ul class="list-unstyled">
                                                                <li><a href="#">Category Name</a>
                                                                </li>
                                                                <li><a href="#">Category Name</a>
                                                                </li>
                                                                <li><a href="#">Category Name</a>
                                                                </li>
                                                                <li><a href="#">Category Name</a>
                                                                </li>
                                                        </ul>
                                                </div>
                                                <!-- /.col-lg-6 -->
                                        </div>
                                        <!-- /.row -->
                                </div>

                                <!-- Side Widget Well -->
                                <div class="well">
                                        <h4>Side Widget Well</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
                                                accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                                </div>

                        </div>

                </div>
                <!-- /.row -->

                <hr>

                <!-- Footer -->
                <footer>
                        <div class="row">
                                <div class="col-lg-12">
                                        <p>Copyright &copy; Your Website 2014</p>
                                </div>
                                <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->
                </footer>

        </div>



@stop