
@extends('layouts.main')

@section('content')


<div class="container">
    <h1> Modifier un article </h1>

<form action="{{route('articles.update',$post->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
  @method('PATCH')

    <div class="form-group">
        <label>Modifier le titre </label>
        <input class="form-control" type="text" name="title" placeholder="{{$post->post_title}}" />
    </div>

    <div class="form-group">
        <label>Modifier le contenu de l'article</label>
        <textarea class="form-control" name="content" placeholder="{{$post->post_content}}"></textarea>
    </div>

    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input"  id="validateCustomFile">
            <label class="custom-file-label" for="validateCustomFile">Choisir une image</label>
            <div class="invalid-feedback">Example invalid custom feedback</div>
        </div>
    </div>

    <div class="form-group">
      
        <input  name="author" type="hidden" value={{Auth::user()->id}}>
        <p> Auteur : {{Auth::user()->name}}</p>

    </div>

    <button class="btn btn-primary" type="submit">Modifier</button>
</form>

</div>

@endsection