
@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12"> <h1> CRUD of the Articles</h1>
    <div class="col-md-12 text-right">
    <button type="button" ><a class="btn btn-primary active" href="{{action('ArticlesController@create')}}">Add Post</a> </button>
    </div>

</div>

<table class="table table-bordered">
<thead>
    <tr>
        <th>Post Name</th>
        <th>Post Title</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>

    {{-- @if(count($articles) > 0)
   
        @foreach ($articles as $article) --}}
        <tr>
            @foreach ($articles as $article)
            <td >{{$article->post_name}}  </td>
            <td >{{$article->post_title}}  </td>       
           
        <td class="col-4">
        <form action="{{ action('ArticlesController@destroy', $article->id )}}" method="post"></form>
        
        <button type="button" ><a class="btn btn-info " href="{{action('ArticlesController@show', $article->id )}}">Show</a></button>
        <button type="button" ><a class="btn btn-warning " href="{{action('ArticlesController@edit', $article->id )}}">Edit</a> </button>
        <button type="submit" class="btn btn-danger">Delete</button>
        </td>
        </tr>
        
             @endforeach
    

</tbody>

</table>
</div>

@endsection