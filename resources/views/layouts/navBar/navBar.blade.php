<!--BS navbar-->
<!--bg-success class is nav bar color; navbar-dark is link color-->


<nav class="navbar navbar-expand-md bg navbar-dark sticky-top">
   <!--Brand -->
  <a class="navbar-brand" href="/manufacturer">Product Reviews</a>

   <!--Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

   <!--Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav navbar-right">
      <!--Guest only can see links for add products, login and register-->
      @if (Auth::guest())
        <li class="nav-item nav-align-center"><a class="nav-link nav-item" href="/manufacturer">Browse Manufacturers</a></li>
        <li class="nav-item nav-align-center"><a class="nav-link nav-item" href="/product/create">Add a Product</a></li>
        <li class="nav-item nav-align-center"><a class="nav-link nav-item" href="{{ route('login') }} ">Login</a></li>
        <li class="nav-item nav-align-center"><a class="nav-link nav-item" href="{{ route('register') }}">Register</a></li>
      <!--Moderator can see all links-->
      @elseif (Auth::check() && Auth::user()->isAdmin())
      <li class="nav-item nav-align-center">
        <a class="nav-link nav-item" href="/manufacturer">Browse Manufacturers</a>
      </li>
      <li class="nav-item nav-align-center">
        <a class="nav-link nav-item" href="/review/create">Write a Review</a>
      </li>
      <li class="nav-item nav-align-center">
        <a class="nav-link nav-item" href="/product/create">Add a Product</a>
      </li>
      
      <li class="nav-item nav-align-center">
        <a class="nav-link nav-item" href="/manufacturer/create">Create a Manufacturer</a>
      </li> 
      <li class="dropdown nav-item nav-align-center">
          <a href="#" class="dropdown-toggle nav-link nav-item" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} 
          </a>
          <ul class="dropdown-menu" role="menu">
            
              <li><a href="{{ route('user.show', Auth::user()->id) }}">Profile</a></li>
              <li><a href="{{ route('user.edit', Auth::user()->id) }}">Edit Profile</a></li>
              <li class="divider"></li>
            
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
              
          </ul>
      </li>
      <li class="nav-item nav-link nav-align-center">
        <img src="https://api.adorable.io/avatars/285/abott@adorable.png" class="user-image" alt="profile-img" width="38" height="38">
      </li>
      <!--Only logined users can see links to see manufacturers, write reviews, add products but they can't create a manufacturer -->
      @else
      <li class="nav-item nav-align-center">
        <a class="nav-link nav-item" href="/manufacturer">Browse Manufacturers</a>
      </li>
      <li class="nav-item nav-align-center">
        <a class="nav-link nav-item" href="/review/create">Write a Review</a>
      </li>
      <li class="nav-item nav-align-center">
        <a class="nav-link nav-item" href="/product/create">Add a Product</a>
      </li>
      
      <li class="dropdown nav-item nav-align-center">
          <a href="#" class="dropdown-toggle nav-link nav-item" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} 
          </a>
          <ul class="dropdown-menu" role="menu">
            
              <li><a href="{{ route('user.show', Auth::user()->id) }}">Profile</a></li>
              <li><a href="{{ route('user.edit', Auth::user()->id) }}">Edit Profile</a></li>
              <li class="divider"></li>
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
          </ul>
      </li>
      <li class="nav-item nav-link nav-align-center">
        <img src="https://api.adorable.io/avatars/285/abott@adorable.png" class="user-image" alt="profile-img" width="38" height="38">
      </li>
      @endif    
    </ul>
  </div> 
</nav>
