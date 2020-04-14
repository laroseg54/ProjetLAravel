@extends('layouts.main')

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')

<div class="container ">
 <div class="row medium-6 large-10 columns">

  <div class="jumbotron text-center">
      <h1 class="display-4">Bienvenue sur notre premier blog Laravel </h1>
      <p class="lead">Welcome to our brand new website</p> 
  </div>


 
  <h2>Les trois derniers articles </h2>

    @foreach ( $posts as $post )
           <div class="card  bg-light medium-8 large-10 columns">
            <h6 class="list-group-item"><a href="{{route('articles.show',$post->id)}}">{{ $post->post_title }}</a></h6>
           </div>  
    @endforeach

</div>
</div>

 @endsection


 
