@extends('layouts.main')


@section('content')
<div class="text-center">
<ul>
    @foreach ( $posts as $post )
    
      <li><a href="http://localhost:8000/articles/{{$post->post_name}}" >{{ $post->post_title }}</a></li>
      
    
    @endforeach
    </ul>
</div>
 @endsection


 
