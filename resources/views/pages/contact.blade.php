@extends('layouts.main')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
        .invalid-feedback {
                display: block; 
        }

</style>

@section('content')
<div class="container ">
<h1> Nous contacter !! </h1>
<form  method="POST" action="{{ url('contact')}}">
        {{ csrf_field() }}
        <div class="form-group">
        <label for="nom"> Nom </label>
        <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom" placeholder=" Entrez votre nom " value="{{ old('nom') }}">
        {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
        <label for="prenom">  Prénom  </label>
        <input type="text" class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" name="prenom" id="prenom" placeholder=" Entrez prénom " value="{{ old('prenom') }}">
        {!! $errors->first('prenom', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
        <label for="email"> Email </label>
        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email"  placeholder=" Entrez votre email"  value="{{ old('email') }}">
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
        <label for="subject"> Sujet </label>
        <input type="text" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject" id="subject"  placeholder=" Entrez votre sujet"  value="{{ old('subject') }}">
        {!! $errors->first('subject', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group"> Message
        <textarea rows="5" cols="33" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" placeholder=" Entrez votre message">{{ old('message') }}</textarea>
        {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
        </div>   
        <button type="submit" class="btn btn-primary"> Valider </button>
         
</form>
</div>

@endsection

