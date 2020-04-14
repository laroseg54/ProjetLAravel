@include('comments.create')

<h5><p>Commentaires<p></h5>

<div id="affichage_commentaire">
@include('comments.index',['comments' =>$post->comments->whereNull('parent_id'),'profondeur'=>0])
</div>

@include('comments.commentReplyForm',['post'=>$post])


  
@push('scripts')

<script type="text/javascript" >
  
    window.onload = function(){
      let b_commentaire = document.querySelector('#b_commentaire');
      let div_commentaire = document.querySelector('#div_commentaire');
    
      b_commentaire.onclick = function(){
      
          div_commentaire.style.display = "block";
          b_commentaire.style.display = "none";
        
      };

   
    }

 </script>

@endpush

  