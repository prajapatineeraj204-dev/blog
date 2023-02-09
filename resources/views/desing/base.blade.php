<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>@yield('title')</title>
    <style>
      ul{
        background-color: rgb(62, 50, 221);
      }
      ul li{
        /*  margin: 5px; */
        padding-left: 5px;
        padding-right: 5px;
      }
      ul li:hover{
        background-color: rgb(223, 131, 10);
        color: aliceblue;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" style="font-size: 35px"  href="#">BlogPost</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link" style="color:white; font-size:20px" href={{route('index')}}>Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" style="color:white; font-size:20px" href={{url('/register')}}>Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white; font-size:20px" href={{url('/login')}}>Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white; font-size:20px" href="#">Contact</a>
            </li>
        </ul>  
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row">
        <div class="col">
              @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <h4>{{Session::get('success')}}</h4>
                </div>
              @endif
        </div>
      </div>
    </div>
    @yield('heading')
    @yield('form')
    @yield('login')

    {{-- footer --}}

    <!-- Footer -->

   
<!-- Footer -->
    </div>
    {{-- endfooter --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>