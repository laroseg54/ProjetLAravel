@extends('layouts.main')

@section('content')
<div class="container">
    <h1> Liste des Articles  </h1>

@if(count($articles) > 0)
<ul class="list-group">
    @foreach ($articles as $article)
        <li class="list-group-item">{{$article->post_title}} </li>
    @endforeach

</ul>
</div>

@endif

@endsection
       
   