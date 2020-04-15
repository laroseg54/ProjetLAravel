@extends('layouts.main')


@section('content')
    
<style>

    #main_commentaire{

        margin-top: 40px;
        
        background-color: antiquewhite;
        padding-left: 10px;
    }

    #com_aff{
        margin-left: 40px;
        
    }

</style>

<p><button class="btn btn-info" onclick="window.location.href='{{route('articles.show',$comment->post_id)}}'">Revenir à l'article </button><p>       
<div id="com_aff" >
    <div id="main_commentaire">       
        
        <p>{{ $comment->content }}</p>
        <small>{{ $comment->user->name }} : {{$comment->created_at->diffForHumans()}}</small>  / <button onclick="afficherFormReponse(this,{{$comment->id}})" id = "rep_com">Répondre</button>
        @if(Auth::check() && $comment->user_id==Auth::user()->id)
        <div><a href="{{route('comments.edit',$comment)}}">Modifier </a> 
                
            <form style="display: inline  " action="{{ route('comments.destroy',$comment) }}" method="post">
                @method('delete')
                @csrf
                <input  type="submit" style="background: none;
                   color: Tomato;
                border: none;
                padding: 0;
                font: inherit;
                cursor: pointer;
                outline: inherit;" value="Supprimer" />
                
            </form>
            
        </div>
        @endif
    <hr>


    </div>
    <div style="margin-left: 25px">
    @include('comments.index',['comments' =>$comment->enfants,'profondeur'=>0])
    </div>
    @include('comments.commentReplyForm',['post'=>$comment->post])
   
</div>
@endsection