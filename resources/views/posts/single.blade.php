@extends('layouts.main')


@section('content')

<style>

    #b_commentaire{
     
        float: right;
        width:150px;
        color:#FFF;
        display:block;
        text-decoration:none;
        margin:0 auto;
        border-radius:5px;
        border:solid 1px #D94E3B;
        background:#cb3b27;
        text-align:center;
        padding:10px 20px;
        
        
    }

    h5{

        display: block;
    }
    


</style>

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
<button id="b_commentaire">Soumettre un commentaire</button>
<div id="div_commentaire" style="display: none ">

{{-- Form for the comments --}}
<form  class="mt-4" action="{{ url('comments')}}" method="POST">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="content">Votre commentaire</label>
    </div>

    <div class="form-group"> 
        <textarea rows="3" cols="30" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="content" id="content" placeholder=" Entrez votre commentaire ...">{{ old('content') }}</textarea>
        {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        <input  name="post_id" type="hidden" value={{$post->id}}>
        <input  name="user_id" type="hidden" value={{Auth::user()->id}}>
    </div>   
        <button type="submit" class="btn btn-dark"> Soumettre </button>

    </form>
</div>
@else
    <p>Connectez vous pour soumettre un commentaire ! </p> 
@endif

<h5><p>Commentaires<p></h5>

<div id="affichage_commentaire">
@foreach ($post->comments as $comment)
    
    <p>{{ $comment->user->name }} le {{$comment->created_at}}</p>
    <p>{{ $comment->content }}</p>
    <hr>
    

@endforeach
</div>

</div>



@endsection


<script >
  
  window.onload = function(){
    let b_commentaire = document.querySelector('#b_commentaire');
    let div_commentaire = document.querySelector('#div_commentaire');
  
    b_commentaire.onclick = function(){
    
        div_commentaire.style.display = "block";
        b_commentaire.style.display = "none";
    };
  
  }
  </script>