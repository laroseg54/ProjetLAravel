@extends('layouts.main')


@section('content')
<h1> Nous contacter WALLAH! </h1>
<form action="{{ url('contact') }}" method="POST" >
        <label for="nom">Entrez votre nom: </label>
        <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom" placeholder="Votre nom" value="{{ old('nom') }}">
        {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
        <label for="email">Entrez votre email: </label>
        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Votre email" value="{{ old('email') }}">
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        <textarea rows="5" cols="33" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" placeholder="Votre message">{{ old('message') }}</textarea>
        {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
        <input type="submit" name = "envoyer"/>


</form>


@endsection

