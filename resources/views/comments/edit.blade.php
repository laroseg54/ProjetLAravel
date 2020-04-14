@extends('layouts.main')

@section('content')
<div>
<p><button class="btn btn-info" onclick="window.location.href='{{route('articles.show',$comment->post_id)}}'">Revenir à l'article </button><p> 
<h1> Modifier mon commentaire </h1>

<form  class="mt-4" action="{{ route('comments.update',$comment)}}" method="post" id="form_edit_com"  enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
  
    <textarea rows="3" cols="30" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="content"  placeholder="{{$comment->content}}">{{ old('content') }}</textarea>
        {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        <input  name="post_id" type="hidden" value={{$comment->post_id}}>
        <input  name="user_id" type="hidden" value={{Auth::user()->id}}>
        <input  name="parent_id" type="hidden" value="{{$comment->parent_id}}" id="comment_parent_id">
        

        <input type="submit" name="form_edit" value="Modifier" class="btn btn-dark">
  
  
    </form>
    @if(Session::has('success'))
        <p class="alert alert-info">{{ Session::get('success')}}</p>
    @endif
</div>


 @endsection