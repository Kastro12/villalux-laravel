<nav class="my-n navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand" href="{{asset('/')}}">Villa Lux</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link disabled" href="{{asset('/gallery')}}"><b>Gallery</b></a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="{{asset('/reserve')}}"><b>Book it</b></a>
            </li>

             @guest
             <li class="nav-item">
             <a class="nav-link disabled" href="{{asset('/login')}}"><b>Login</b></a>
             </li>
             <li class="nav-item">
             <a class="nav-link disabled" href="{{asset('/register')}}"><b>Register</b></a>
             </li>
             @else
             <li class="nav-item dropdown">
             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             <b>    {{ Auth::user()->name }}   </b> <span class="caret"></span>
             </a>

             <div class="dropdown-menu dropdown-menu-right">

             <a class="dropdown-item" style="cursor: pointer;" href="{{asset('profile')}}">
             <b>My profile</b></a>

             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
             <b>    {{ __('Logout') }}  </b>
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
             </form>
             </div>
              </li>
              @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="cura"> <img src="{{asset('/storage/images/cura.png')}}">
</div>