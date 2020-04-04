@extends('layouts.main')


@section('content')


<div class="container">
<a href="/" type="button" class="btn btn-dark">Go Back</a>
<h2>Titre : {{$post->post_title}}</h2>

<div>
<h4>Auteur : {{$post->author->name}}</h4>
<p>{{$post->post_content}}</p>
</div>
<small>Posté le : {{$post->created_at}}</small>
<hr>



	
@if (Auth::check())
<h5>Commentaires</h5>

{{-- Form for the comments --}}
<form  class="mt-4" action="{{ url('comments')}}" method="post">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="content">Votre commentaire</label>
    </div>

    <div class="form-group"> 
        <textarea rows="3" cols="30" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" placeholder=" Entrez votre commentaire ...">{{ old('message') }}</textarea>
        {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
    </div>   
        <button type="submit" class="btn btn-dark"> Soumettre </button>

@endif

@foreach ($post->comments as $comment)
  <p>{{ $comment->user->name }} {{$comment->created_at}}</p>
  <p>{{ $comment->body }}</p>
  <hr>

@endforeach


</div>

</form>
@endsection