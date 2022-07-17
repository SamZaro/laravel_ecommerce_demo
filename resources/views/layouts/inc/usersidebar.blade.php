<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ url('/') }}" target="_blank">
        <h5 style="color:#fff">E-Commerce</h5>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link nav-link-custom {{ Request::is('dashboard') ? 'active':'' }} " href="{{ url('dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-home"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('cart') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-shopping-cart"></i>
              </div>
              <span class="nav-link-text ms-1">Cart</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('cart') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-clipboard"></i>
              </div>
              <span class="nav-link-text ms-1">Orders</span>
            </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-custom {{ Request::is('account') ? 'active':'' }}" href="{{ url('account') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-user"></i>
            </div>
            <span class="nav-link-text ms-1">My Account</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </div>
    </div>
</aside>
