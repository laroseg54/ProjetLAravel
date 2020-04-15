@extends('layouts.administration')

@section('content')

<div class="container">
    <h1> Modifier un utilisateur </h1>

<form action="{{route('users.update',$user)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
  @method('PATCH')

    <div class="form-group">
        <label>Modifier nom</label>
        <input class="form-control" type="text" name="name" value="{{$user->name}}" />
    </div>

    <div class="form-group">
        <label>Modifier l'email</label>
        <textarea class="form-control"  name="email">{{$user->email}}</textarea>
    </div>
    <div class="form-group">
        <label>Modifier le role</label>
        <SELECT name="role_id" size="1">
            @if($user->role_id==2)
            <option selected value="2">utilisateur</option>
            <option value="1">admin</option>
            @else
            <option  value="2">utilisateur</option>
            <option selected value="1">admin</option>
            @endif
        </SELECT>
    </div>
    <div class="form-group">
        <label>Modifier le mdp</label>
        <input id="password" class="form-control @error('password') is-invalid @enderror"type="password" name="password" >
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button class="btn btn-primary" type="submit" name="edit">Modifier</button>
</form>

</div>






@endsection