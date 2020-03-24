
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>First Blog | Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">

</head>
  <body>

    <!-- Start Top Bar -->
    <div class="navbar navbar-dark bg-dark">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="nav-link">Blog</li>
          <li><a href="/">Home</a></li>
          <li><a href="articles">Articles</a></li>
          <li><a href="contact">Contact</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->
    

    <!-- We can now combine rows and columns when there's only one column in that row -->
    <div class="row medium-8 large-7 columns">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>



