
@extends('layouts.admin')

@section('content')


<div class="container">
    <h1> Ajouter un article </h1>

<form action="{{action('ArticlesController@store')}}" method="post">
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
        <label>Auteur</label>
        <input class="form-control" type="text" name="author" placeholder="Entrez le nom de l'auteur" />
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
</form>

</div>






@endsection