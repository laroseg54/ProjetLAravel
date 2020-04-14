
   
    @foreach ($comments as $comment)
      
        <div class="commentaire">
         
            
           
            <p>{{ $comment->content }}</p>
            <small>{{ $comment->user->name }} : {{$comment->created_at->diffForHumans()}}</small>  / <button onclick="afficherFormReponse(this,{{$comment->id}})" id = "rep_com">Répondre</button>
            @if($comment->user_id==Auth::user()->id)
                <div><a href="{{route('comments.edit',$comment)}}">Modifier </a> 
                
                    <form style="display: inline" action="{{ route('comments.destroy',$comment) }}" method="post">
                        @method('delete')
                        @csrf
                        <input  type="submit" value="Supprimer" />
                        
                    </form>
                    
                </div>
             @endif
        </div>
        <hr>
       
        @if($comment->enfants->count()> 0)
            <div style=" margin-left: 25px">
                @if($profondeur<4)
                @include('comments.index', ['comments' => $comment->enfants,'profondeur'=>$profondeur+1])
                @else
                    <button class="btn btn-info" onclick="window.location.href='{{route('comments.show',$comment)}}'">Charger plus </button>
                @endif
            </div>
        @endif
    @endforeach

