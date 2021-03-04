<div class="bg-top navbar-light d-flex flex-column-reverse">
    <div class="container py-1">
        <div class="row no-gutters d-flex align-items-center align-items-stretch">
            <div class="col-md-12 d-flex align-items-center py-2">
                <a class="navbar-brand" href="{{url('/')}}" style="display:flex;">
                    <img src="{{asset('assets2/img/logo/logo.png')}}" alt="" width=60>
                    <h4 style="font-weight:bold;margin-top:auto;margin-bottom:auto;margin-left:15px;">MZ Food</h4>
                </a>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar" style="background: #4e73df !important;">
    <div class="container d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ (Request::url() === url('/')) ? 'active' : '' }}">
                <a href="{{url('/')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Cart</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Order</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item {{(Request::url() === url('login')) ? 'active' : ''}}">
            @if(Session::has("user"))
            <div class="dropdown show">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white !important;font-weight:bold;font-size:15px;">
                    {{Session::get("user")->username}}
                </a>
                <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="">Dashboard</a>
                    <a class="dropdown-item" href="">Logout</a>
                </div> -->
            </div>
            @else
            <a href="{{route('login.index')}}" class="nav-link" style="font-weight:bold;">
                <i class="fas fa-sign-in-alt" style="margin-right:7px;"></i> Log In
            </a>
            @endif
            </li>
        </ul>
      </div>
    </div>
</nav>
