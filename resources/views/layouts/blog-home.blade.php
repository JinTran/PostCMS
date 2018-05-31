<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/bootstrap.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
            integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home.test')}}">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>


            <ul class="">
                <div class=" nav navbar-nav navbar-right">
                    @auth
                        <li><a href="{{ route('home.test') }}">News</a></li>

                        <li class="dropdown">


                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                @if(Auth::user()->role->name=='Administrator')
                                <a class="dropdown_item" href="{{ route('admin') }}"> Admin Dashboard </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                                <br>




                            </div>


                        </li>

                        {{--@if(Auth::user()->role->name=='Administrator')--}}

                            {{--<li><a href="{{ route('admin') }}"> Admin Dashboard </a></li>--}}

                        {{--@else--}}

                            {{--<a href="#"> {{Auth::user()->name}} </a>--}}


                        {{--@endif--}}
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </div>
            </ul>
        </div>


        <!-- /.navbar-collapse -->
    </div>


    <!-- /.container -->
</nav>

@yield('content')

{{--<!-- Navigation -->--}}
{{--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">--}}
{{--<div class="container">--}}
{{--<!-- Brand and toggle get grouped for better mobile display -->--}}
{{--<div class="navbar-header">--}}
{{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">--}}
{{--<span class="sr-only">Toggle navigation</span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}
{{--<a class="navbar-brand" href="#">Start Bootstrap</a>--}}
{{--</div>--}}
{{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
{{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
{{--<ul class="nav navbar-nav">--}}
{{--<li>--}}
{{--<a href="#">About</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="#">Services</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="#">Contact</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--<!-- /.navbar-collapse -->--}}
{{--</div>--}}
{{--<!-- /.container -->--}}
{{--</nav>--}}

{{--<!-- Page Content -->--}}
{{--<div class="container">--}}

{{--<div class="row">--}}

{{--<!-- Blog Entries Column -->--}}
{{--<div class="col-md-8">--}}

{{--<h1 class="page-header">--}}
{{--Page Heading--}}
{{--<small>Secondary Text</small>--}}
{{--</h1>--}}

{{--<!-- First Blog Post -->--}}
{{--<h2>--}}
{{--<a href="#">Blog Post Title</a>--}}
{{--</h2>--}}
{{--<p class="lead">--}}
{{--by <a href="index.php">Start Bootstrap</a>--}}
{{--</p>--}}
{{--<p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>--}}
{{--<hr>--}}
{{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}
{{--<hr>--}}
{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>--}}
{{--<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>--}}

{{--<hr>--}}

{{--<!-- Second Blog Post -->--}}
{{--<h2>--}}
{{--<a href="#">Blog Post Title</a>--}}
{{--</h2>--}}
{{--<p class="lead">--}}
{{--by <a href="index.php">Start Bootstrap</a>--}}
{{--</p>--}}
{{--<p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>--}}
{{--<hr>--}}
{{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}
{{--<hr>--}}
{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>--}}
{{--<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>--}}

{{--<hr>--}}

{{--<!-- Third Blog Post -->--}}
{{--<h2>--}}
{{--<a href="#">Blog Post Title</a>--}}
{{--</h2>--}}
{{--<p class="lead">--}}
{{--by <a href="index.php">Start Bootstrap</a>--}}
{{--</p>--}}
{{--<p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>--}}
{{--<hr>--}}
{{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}
{{--<hr>--}}
{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>--}}
{{--<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>--}}

{{--<hr>--}}

{{--<!-- Pager -->--}}
{{--<ul class="pager">--}}
{{--<li class="previous">--}}
{{--<a href="#">&larr; Older</a>--}}
{{--</li>--}}
{{--<li class="next">--}}
{{--<a href="#">Newer &rarr;</a>--}}
{{--</li>--}}
{{--</ul>--}}

{{--</div>--}}

{{--<!-- Blog Sidebar Widgets Column -->--}}
{{--<div class="col-md-4">--}}

{{--<!-- Blog Search Well -->--}}
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

{{--<!-- Blog Categories Well -->--}}
{{--<div class="well">--}}
{{--<h4>Blog Categories</h4>--}}
{{--<div class="row">--}}
{{--<div class="col-lg-6">--}}
{{--<ul class="list-unstyled">--}}
{{--<li><a href="#">Category Name</a>--}}
{{--</li>--}}
{{--<li><a href="#">Category Name</a>--}}
{{--</li>--}}
{{--<li><a href="#">Category Name</a>--}}
{{--</li>--}}
{{--<li><a href="#">Category Name</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--<!-- /.col-lg-6 -->--}}
{{--<div class="col-lg-6">--}}
{{--<ul class="list-unstyled">--}}
{{--<li><a href="#">Category Name</a>--}}
{{--</li>--}}
{{--<li><a href="#">Category Name</a>--}}
{{--</li>--}}
{{--<li><a href="#">Category Name</a>--}}
{{--</li>--}}
{{--<li><a href="#">Category Name</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--<!-- /.col-lg-6 -->--}}
{{--</div>--}}
{{--<!-- /.row -->--}}
{{--</div>--}}

{{--<!-- Side Widget Well -->--}}
{{--<div class="well">--}}
{{--<h4>Side Widget Well</h4>--}}
{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>--}}
{{--</div>--}}

{{--</div>--}}

{{--</div>--}}
{{--<!-- /.row -->--}}

{{--<hr>--}}

{{--<!-- Footer -->--}}
{{--<footer>--}}
{{--<div class="row">--}}
{{--<div class="col-lg-12">--}}
{{--<p>Copyright &copy; Your Website 2014</p>--}}
{{--</div>--}}
{{--<!-- /.col-lg-12 -->--}}
{{--</div>--}}
{{--<!-- /.row -->--}}
{{--</footer>--}}

{{--</div>--}}
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
