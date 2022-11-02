<!-- Navbar -->
<div class="navbar-header" style="background-color:#1c1c50;">
    <!-- LOGO -->
    <div class="navbar-brand-box d-flex align-items-left">
        <a href="{{ url('/') }}" class="logo">
            <img src="https://cdn.pixabay.com/photo/2014/04/02/17/03/shopping-cart-307772__340.png" alt="Img"
                style="width:70px;height:50px;">
            {{-- <span>
                <h3 class="" style="color:white">My Ecommerce website</h3>
            </span> --}}
            {{-- <i>
                <h3>DEMEN CODER</h3>
            </i> --}}
        </a>

        <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect waves-light"
            id="vertical-menu-btn" style="color:white">
            <i class="bi bi-justify-left"></i>
        </button>
    </div>

    <div class="d-flex align-items-center" style="color:white">

        <div class="dropdown d-inline-block ml-2">
            <button type="button" class="btn header-item waves-effect waves-light" id="page-header-user-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                <span class="d-none d-sm-inline-block ml-1" style="color:#fdfdfe";>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    </a>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>Profile</span>
                    <span>
                        <span class="badge badge-pill badge-warning">1</span>
                    </span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between"
                    href="{{ url('admin/password') }}">
                    Change Password
                </a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

    </div>
</div>
<!-- End Navbar -->
