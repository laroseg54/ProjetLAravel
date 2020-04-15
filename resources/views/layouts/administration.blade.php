<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('js/main.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('styles')
      
        <title>Administration</title>
      
      
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
       
      
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
      
    </head>
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Administration</h3>
  <a href="/administration" class="w3-bar-item w3-button">Page principale</a>
  <a href="{{route('admin_user')}}" class="w3-bar-item w3-button">Gerer les utilisateurs</a>
  <a href="{{route('users.create')}}" class="w3-bar-item w3-button">Creer un utilisateur</a>
  
</div>

<!-- Page Content -->
<div style="margin-left:25%;">
    
    
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @yield('content')
</div>
      
</body>
</html>
