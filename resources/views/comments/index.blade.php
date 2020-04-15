
   
    @foreach ($comments as $comment)
      
        <div style="background-color:antiquewhite; padding-left:10px; margin-top: 15px">
         
            
           
            <p>{{ $comment->content }}</p>
            <small>{{ $comment->user->name }} : {{$comment->created_at->diffForHumans()}}</small>  /<button onclick="afficherFormReponse(this,{{$comment->id}})" style="font-size: 14px" id = "rep_com">Répondre</button>
            @if(Auth::check() && $comment->user_id==Auth::user()->id)
                <div><a href="{{route('comments.edit',$comment)}}">Modifier </a> 
                
                    <form style="display: inline" action="{{ route('comments.destroy',$comment) }}" method="post">
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
        </div>
     
       
        @if($comment->enfants->count()> 0)
            <div style=" margin-left: 25px ; margin-top: 15px">
                @if($profondeur<4)
                @include('comments.index', ['comments' => $comment->enfants,'profondeur'=>$profondeur+1])
                @else
                    <button class="btn btn-info" onclick="window.location.href='{{route('comments.show',$comment)}}'">Charger plus </button>
                @endif
            </div>
        @endif
    @endforeach

