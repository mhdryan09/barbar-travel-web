    <!-- Navigasi -->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a href="#" class="navbar-brand">
                <img src="{{ url('frontend/images/logo_barbar.png') }}" alt="logo Barbar" />
            </a>
            <!-- toggle -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- link/menu navigasi -->
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md 2">
                        <a href="#" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item mx-md 2">
                        <a href="#" class="nav-link">Travel</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                            Services
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Link 1</a>
                            <a href="#" class="dropdown-item">Link 2</a>
                            <a href="#" class="dropdown-item">Link 3</a>
                        </div>
                    </li>

                    <li class="nav-item mx-md 2">
                        <a href="#" class="nav-link">Testimonial</a>
                    </li>
                </ul>

                @guest
                    <!-- Mobile Button -->
                    <form class="form-inline d-sm-block d-md-none">
                        <button class="btn btn-login my-2 my-sm-0" type="button"
                            onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                            Masuk
                        </button>
                    </form>

                    <!-- Desktop Button -->
                    <form class="form-inline d-md-block d-none my-2 my-lg-0">
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                            onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                            Masuk
                        </button>
                    </form>
                @endguest

                @auth
                    <!-- Mobile Button -->
                    <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-login my-2 my-sm-0" type="submit">
                            Keluar
                        </button>
                    </form>

                    <!-- Desktop Button -->
                    <form class="form-inline d-md-block d-none my-2 my-lg-0" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                            Keluar
                        </button>
                    </form>
                @endauth

            </div>
        </nav>
    </div>
    <!-- Navigasi Ends -->
