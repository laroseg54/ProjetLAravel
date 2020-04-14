@extends('layouts.main')


@section('content')
    
<style>

    #main_commentaire{

        margin-top: 40px
    }

</style>



<div id="main_commentaire">       
<p><button class="btn btn-info" onclick="window.location.href='{{route('articles.show',$comment->post_id)}}'">Revenir à l'article </button><p>       
    <p>{{ $comment->content }}</p>
    <small>{{ $comment->user->name }} : {{$comment->created_at->diffForHumans()}}</small>  / <button onclick="afficherFormReponse(this,{{$comment->id}})" id = "rep_com">Répondre</button>
    @if($comment->user_id==Auth::user()->id)
        <p><a href="{{route('comments.edit',$comment)}}">Modifier </a> <a href="{{route('comments.destroy',$comment)}}">Supprimer </a><p>
    @endif
   <hr>



<div style="margin-left: 25px">
@include('comments.index',['comments' =>$comment->enfants,'profondeur'=>0])
</div>
@include('comments.commentReplyForm',['post'=>$comment->post])
</div>
@endsection