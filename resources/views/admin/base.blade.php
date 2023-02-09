<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>@yield('title')</title>
    <style>
      div#social-links {
          margin: 0 ;
          max-width: 500px;
      }
      div#social-links ul li {
          display: inline-block;
      }          
      div#social-links ul li a {
          padding: 10px;
          /* border: 1px solid #ccc; */
          margin: 1px;
          font-size: 30px;
          color: #222;
          /* background-color: rgb(181, 214, 33)204, 204, 204); */
      }  
      .ul{
        background-color: rgb(62, 50, 221);
      }
      .ul .li{
        /*  margin: 5px; */
        padding-left: 10px;
        padding-right: 10px;
      }
      .ul li:hover{
        background-color: rgb(223, 131, 10);
        color: aliceblue;
      }
     

    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" style="font-size: 35px"  href="#">BlogPost (Admin)</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ul">
          <li class="nav-item li">
              <a class="nav-link " style="color:white; font-size:20px" href={{route('admin')}}>Home</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white; font-size:20px" href={{route("admin.creat")}}>Creat Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white; font-size:20px" href={{route('admin.post')}}>ListPost</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white; font-size:20px" href={{route('admin.post.list')}}>Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white; font-size:20px" href={{url('/logout')}}>Logout</a>
            </li>
           
        </ul>
        
          <a class="nav-link" style="color:rgb(214, 217, 26); font-size:25px">{{Auth::user()->name}}</a>
        
      </div>
    </nav>
    @yield('adminpost')
    @yield('index')
    @yield('create')
    @yield('admin_list_post')
    @yield('admin_edit')
    @yield('readmore')
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>