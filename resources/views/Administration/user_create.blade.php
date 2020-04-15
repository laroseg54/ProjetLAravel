@extends('layouts.administration')

@section('content')

<div class="container">
    <h1> Creer un utilisateur </h1>

<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
  

    <div class="form-group">
        <label> nom</label>
        <input class="form-control" type="text" name="name"  />
    </div>

    <div class="form-group">
        <label> email</label>
        <textarea class="form-control"  name="email"></textarea>
    </div>
    <div class="form-group">
        <label> role</label>
        <SELECT name="role_id" size="1">
            <option selected value="2">utilisateur</option>
            <option value="1">admin</option>
           
        </SELECT>
    </div>
    <div class="form-group">
        <label>Mot de passe</label>
        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" >
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit" name="create">envoyer</button>
</form>

</div>

@endsection

