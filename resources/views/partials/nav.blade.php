<!-- Navbar Dark -->
<nav
  class="navbar navbar-expand-lg navbar-dark bg-gradient-dark z-index-3 py-3">
  <div class="container">
    <a class="navbar-brand text-white" href="{{ url('/') }}" data-placement="bottom">
        <h5 style="color:#fff">E-Commerce</h5>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:#fff; font-size:25px;"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav navbar-nav-hover mx-auto">
            <li class="nav-item">
                <a class="nav-link text-white opacity-10" style="font-size:16px;" href="{{ url('/') }}">Home</a>
              </li>
            <li class="nav-item">
              <a class="nav-link text-white opacity-10" style="font-size:16px;" href="{{ url('category') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white opacity-10" style="font-size:16px;" href="{{ url('cart') }}">Cart</a>
              </li>
            <li class="nav-item">
                <a class="nav-link text-white opacity-10" style="font-size:16px;" href="{{ url('about') }}">About</a>
            </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link text-white opacity-8" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                    </a></li>
                    <li><a class="dropdown-item" href="{{ url('dashboard') }}">
                        Dashboard
                        </a>
                    <li>
                    <li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="d-none">
                        @csrf
                    </form>
                    </li>
                </ul>
              </li>
            @endguest
        </ul>
    </div>
</div>
</nav>
