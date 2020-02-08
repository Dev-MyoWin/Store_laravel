<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-warning" href="{{url('products')}}">Store Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-warning" href="{{url('products')}}">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-warning" href="{{url('categories')}}">Categories</a>
      </li>

      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link text-warning" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item mb-2" href="#"><i class="fa fa-user-plus float-left float-left"></i> &nbsp;&nbsp;Add Editor</a>
                  <a class="dropdown-item mb-2" href="#"><i class="fa fa-users float-left float-left"></i>&nbsp;&nbsp;View Editor</a>
                  <a class="dropdown-item mb-2" href="#"><i class="fa fa-clipboard float-left"></i>&nbsp;&nbsp;View Log</a>
                  <a class="dropdown-item mb-2" href="#"><i class="fa fa-trash float-left"></i>&nbsp;&nbsp;Erase All Data</a>
                  <a class="dropdown-item mb-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fa fa-power-off float-left"></i>&nbsp;&nbsp;{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
            </li>
        @endguest
    </ul>

    </ul>
    <form class="form-inline my-2 my-lg-0">

        <a class="nav-link text-warning mr-5" href="#"><i class="fa fa-bell"></i> &nbsp;Notifications</a>

    </form>
  </div>
</nav>
