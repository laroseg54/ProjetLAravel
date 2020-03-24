@extends('layouts.main')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


@section('content')
<div class="jumbotron text-center">
  <h1 class="display-4">Welcome to our first Laravel site </h1>
  <p class="lead">Welcome to our brand new website</p>
</div>


  <div class="container">
  
  <h2>Les trois derniers articles </h2>

    @foreach ( $posts as $post )
           <div class="card  bg-light">
            <h6 class="list-group-item"><a href="http://localhost:8000/articles/{{$post->post_name}}">{{ $post->post_title }}</a></h6>
           </div>  
    @endforeach

  </div>

 @endsection


 
