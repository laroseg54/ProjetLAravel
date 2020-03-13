@extends('layouts.main')


@section('content')

<h1>titre :{{$post->post_title}}</h1>
<h2>auteur :{{$post->author->name}}</h2>
<p>{{$post->post_content}}</p>




@endsection