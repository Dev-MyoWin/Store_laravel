<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-warning" href="{{url('/')}}">Store Management</a>
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item mb-2" href="#"><i class="fa fa-user-plus float-left float-left"></i> &nbsp;&nbsp;Add Editor</a>
          <a class="dropdown-item mb-2" href="#"><i class="fa fa-users float-left float-left"></i>&nbsp;&nbsp;View Editor</a>
          <a class="dropdown-item mb-2" href="#"><i class="fa fa-clipboard float-left"></i>&nbsp;&nbsp;View Log</a>
          <a class="dropdown-item mb-2" href="#"><i class="fa fa-trash float-left"></i>&nbsp;&nbsp;Erase All Data</a>
          <a class="dropdown-item mb-2" href="#"><i class="fa fa-power-off float-left"></i>&nbsp;&nbsp;Log Out</a>

      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">

        <a class="nav-link text-warning mr-5" href="#"><i class="fa fa-bell"></i> &nbsp;Notifications</a>

    </form>
  </div>
</nav>
