@extends('layouts.admin')

@section('content')


<ul class="list-group">
@foreach ($posts as $post)
<li class="list-group-item"><a href="http://localhost:8000/articles/{{$post->post_name}}">{{$post->post_title}}</a> </li>
</ul>
@endforeach

@endsection