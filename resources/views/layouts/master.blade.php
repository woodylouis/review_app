<!doctype html>
<html lang="en">
  
    <head>
      <title>@yield('tagTitle')</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      
      <link rel="stylesheet" href="{{secure_asset('css/master.css')}}">
      <link rel="stylesheet" href="{{secure_asset('css/navCustom.css')}}">
      <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">
      <link rel="stylesheet" href="{{secure_asset('css/user.css')}}">
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
      @yield('styles')
    </head>
    
    
    <body>
      <div class="wrapper">
      @include('layouts.navBar.navBar')
      
      <main role="main">
        <div class="jumbotron">
            <h3 class="page-title">@yield('pageTitle')</h3>
            <div class = "form" id="content">
              @include('shared._messages')
              @yield('content')
             
                <a href="#" id="myBtn">Top</a>
              
            </div>
  
        </div>
      </main>
      
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://www.draw.io/js/viewer.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
    
      @yield('scripts')
      
      
      </div>
      
      <footer class="footer bg font-small">
        @include('layouts.footer.footer')
      </footer>
      
    </body>

</html>


