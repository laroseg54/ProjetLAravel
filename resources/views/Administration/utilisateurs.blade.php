@extends('layouts.administration')

@section('content')
<style>
    #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 90%;
      margin-left: 40px;
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
</style>
    

    <div style="margin-left: 40px; ">
    <h1> Administration des utilisateurs </h1>
    <hr>
        <div style="margin-left: 40px; margin-top: 100px; ">
            <h2>Liste des utilisateurs </h2>
            <table id="customers">
                <tr>
                  <th>nom</th>
                  <th>email</th>
                  <th>role</th>
                  <th colspan='3'>actions</th>
                </tr>
                
                @foreach ($users as $user )
                    <tr>
                        <td>{{$user->name}} </td> 
                        <td>{{$user->email}} </td> 
                        <td>{{$user->role->role_name}} </td> 
                        <td><button type="button"  ><a class="btn btn-info " href="{{route('user_articles',$user->id)}}">Voir ses articles</a> </button></td>
                        <td>
                            @if(Auth::user()->id!==$user->id)
                            <form style="display: inline" action="{{ route('users.destroy',$user) }}" method="post">
                                @method('delete')
                                @csrf
                                <input  type="submit" class="btn btn-warning "  value="Supprimer l'utilisateur" />
                                
                                
                            </form>
                            @else
                                Vous ne pouvez pas vous supprimer
                            @endif
                        </td>
                        <td>
                            <button type="button"  ><a class="btn btn-info " href="{{route('users.edit',$user)}}"> Modifier informations et/ou role de l'utilisateur </a>
                        </td>
                    </tr>    
                @endforeach
              </table>
              {{ $users->links() }}
        </div>
    </div>

@endsection