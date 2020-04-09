@extends('layouts.main')

@section('content')

<div class="container">
<h1> Gérer mes articles </h1>

<div>
    @if(count($articles) > 0)
    
        @foreach ($articles as $article)
        <ul class="list-group">
            <li class="list-group-item"><b>{{$article->post_title}}</b> </li>
            <li class="list-group-item">{{substr($article->post_content,0,200)}} ....  <a href={{route('articles.show',$article->id)}}>Lire la suite de l'article </a></li>
            <li class="list-group-item"><button type="button" ><a class="btn btn-info " href={{route('articles.edit',$article->id)}}>Modifier l'article</a> </button> </li>
       
           
        
        </ul>
        @endforeach
    @endif
    
    
</div>
    
</div>

@endsection