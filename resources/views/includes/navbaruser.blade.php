<!-- NAVIGATION BAR -->
@guest
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand font-weight-bold" href="{{url('/')}}"> Tiket Online Gunung
            <img src="{{url('frontend/images/gununglogo.png')}}" alt="" />
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navigationbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navigationbar">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a class="nav-link active" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Lainnya
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">More Feature</a>
                        <a class="dropdown-item" href="#">More Feature</a>
                        <a class="dropdown-item" href="#">More Feature</a>
                    </div>
                </li>
            </ul>

            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none">
                <button class="btn btn-login my-2 my-sm-0" type="button"
                    onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                    Masuk
                </button>
            </form>

            <!-- Desktop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                    onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                    Masuk
                </button>
            </form>
        </div>
    </nav>
</div>

@endguest

@auth
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand font-weight-bold" href="{{url('/')}}"> Booking Ticket Gunung
            <img src="{{url('frontend/images/gununglogo.png')}}" alt="" />
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navigationbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navigationbar">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a class="nav-link active" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{url('/ticketbooking')}}">Pesan Tiket Simaksi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Lainnya
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Aturan</a>
                        <a class="dropdown-item" href="#">Seputar Gunung</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </li>
            </ul>

            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none" action="{{  url('logout') }}" method="POST">
                @csrf
                <button class="btn btn-login my-2 my-sm-0" type="submit">
                    Keluar
                </button>
                <span class="mr-2 d-none d-lg-inline text-gray-600 bold">Hallo,
                    {{Auth::user()->name}}
                </span>
            </form>

            <!-- Desktop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{  url('logout') }}" method="POST">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                    Keluar
                </button>
                <span class="mr-2 d-none d-lg-inline text-gray-600 bold">Hallo,
                    {{Auth::user()->name}}
                </span>
            </form>
        </div>
    </nav>
</div>

@endauth