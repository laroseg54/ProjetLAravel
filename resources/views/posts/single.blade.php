@extends('layouts.main')


@section('content')


<div class="container">
<a href="/" type="button" class="btn btn-dark">Go Back</a>
<h2>Titre : {{$post->post_title}}</h2>

<div>
<h4>Auteur : {{$post->author->name}}</h4>
<p>{{$post->post_content}}</p>
</div>
<hr>
<small>Writeeen on {{$post->created_at}}</small>
</div>
</div>
@endsection