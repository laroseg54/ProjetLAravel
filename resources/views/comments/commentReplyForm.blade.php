@push("styles")
<style>
    #rep_com {
    font-size: 13px;
    font-weight:bold;
    }

    #form_reponse_com {
        display: none;
    }


</style>
@endpush
@if(Auth::check())
    <form  class="mt-4" action="{{ route('articles.comments.store',$post->id)}}" method="POST" id="form_reponse_com">
        {{ csrf_field() }}
        
        
        <div class="form-group"> 
            <textarea rows="3" cols="30" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="content"  placeholder=" Entrez votre commentaire ...">{{ old('content') }}</textarea>
            {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
            <input  name="post_id" type="hidden" value={{$post->id}}>
            <input  name="user_id" type="hidden" value={{Auth::user()->id}}>
            <input  name="parent_id" type="hidden" value="" id="comment_parent_id">
            
    
        </div>   
            <button type="submit" name="form_reponse" class="btn btn-dark"> Soumettre </button>
    
    
        </form>
@else
        
        <a id ="form_reponse_com" href="{{route('login') }}" > Connectez vous pour poster un commentaire </a>

@endif
    @push('scripts')

    <script type="text/javascript" >
    
        function afficherFormReponse(element,commentId) {
                         let div = element.parentNode;
                         let form_reponse_com = document.querySelector("#form_reponse_com");
                         let comment_parent_id = document.querySelector("#comment_parent_id");
                         div.appendChild(form_reponse_com);
                         form_reponse_com.style.display = "block";
                         form_reponse_com.style.marginLeft = "25px";
                         comment_parent_id.value = commentId;
    
                         };
     
     </script>
    
    @endpush