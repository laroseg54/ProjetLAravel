@if (Auth::check())
<button id="b_commentaire">Soumettre un commentaire</button>
<div id="div_commentaire" style="display: none ">

    @if ($post->image)
<img src="{{ asset('storage/' . $post->image )}}" alt="post-image" class="img-thumbnail">
    @endif

{{-- Form for the comments --}}
<form  class="mt-4" action="{{ route('articles.comments.store',$post->id)}}" method="POST">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="content">Votre commentaire</label>
    </div>

    <div class="form-group"> 
        <textarea rows="3" cols="30" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="content" id="content" placeholder=" Entrez votre commentaire ...">{{ old('content') }}</textarea>
        {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        <input  name="post_id" type="hidden" value={{$post->id}}>
        <input  name="user_id" type="hidden" value={{Auth::user()->id}}>
    </div>   
        <button type="submit" name="form_create_com"class="btn btn-dark"> Soumettre </button>

    </form>
</div>
@else
    <p>Connectez vous pour soumettre un commentaire ! </p> 
@endif

  