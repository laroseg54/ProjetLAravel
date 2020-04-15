@extends('layouts.main')

@section('content')
<div class="container">
    <h1> Liste des Articles  </h1>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

<p><button type="button" ><a class="btn btn-warning " href="{{route('articles.create')}}">Ajouter un article</a> </button>
@if(Auth::check())
<button type="button" ><a class="btn btn-info " href="{{route('user_articles',Auth::user()->id)}}">Voir mes articles</a> </button></p> <br />
@endif
<div>
@if(count($articles) > 0)

    @foreach ($articles as $article)
    <ul class="list-group">
        <li class="list-group-item"><b>{{$article->post_title}}</b> </li>
        <li class="list-group-item">{!!substr($article->post_content,0,200)!!} ....  <a href={{route('articles.show',$article->id)}}>Lire la suite de l'article </a></li>
      
    </ul>
    @endforeach
    <br>
    {{ $articles->links() }}
</div>
</div>
@endif

@endsection
       
   