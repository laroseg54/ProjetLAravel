@extends('layouts.main')


@section('content')

@push("styles")
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
@endpush
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
<a href="{{route('articles.index')}}" type="button" class="btn btn-dark">Retour aux articles</a>
<h2>Titre : {{$post->post_title}}</h2>

<div>
<h4>Auteur : {{$post->author->name}}</h4>
<p>{!!$post->post_content!!}</p>
</div>
<small>Posté le : {{$post->created_at->translatedFormat('l, jS F Y à H:i')}}</small>
<hr>

<div>
@include('comments.comments')
</div>


</div>

@endsection



