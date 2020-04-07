
@extends('layouts.main')

@section('content')


<div class="container">
    <h1> Ajouter un article </h1>

<form action="{{route('articles.store')}}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Titre </label>
        <input class="form-control" type="text" name="title" placeholder="Entrez le titre" />
    </div>

    <div class="form-group">
        <label>Contenu</label>
        <textarea class="form-control" name="content" placeholder="Entrez le contenu de l'article"></textarea>
    </div>

    <div class="form-group">
      
        <input  name="author" type="hidden" value={{Auth::user()->id}}>
        <p> Auteur : {{Auth::user()->name}}</p>

    </div>

    <button class="btn btn-primary" type="submit">Envoyer</button>
</form>

</div>






@endsection