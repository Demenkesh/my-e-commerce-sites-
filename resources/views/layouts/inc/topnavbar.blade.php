<!-- top navbar -->
<div class="top-navbar">
    <div class="top-icons">

        <img src="https://cdn.pixabay.com/photo/2014/04/02/17/03/shopping-cart-307772__340.png" alt="Img" style="width:70px;height:50px;">
    </div>
    <div class="other-links">
        @guest
            @if (Route::has('login'))
                <button id="btn-login">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </button>
            @endif
            @if (Route::has('register'))
                <button id="btn-login">
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </button>
            @endif
        @else
            <div class="btn-group ">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-user">{{ Auth::user()->name }}<br />{{ Auth::user()->lastname }}</i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <button id="btn-signup">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </button>
                    <button id="btn-signup">
                        <a href="{{ url('my-orders') }}">
                            My Orders
                        </a>
                    </button>
                    <button id="btn-signup">
                        <a href="{{ url('setting') }}">
                            Setting
                        </a>
                    </button>
                    <button id="btn-signup">
                        <a href="{{ url('user/password') }}">
                            Change Password
                        </a>
                    </button>
                </ul>
            </div>
            <div class="btn-group ">
                @php
                    Helper::currency_load();
                    $currency_code = session('currency_code');
                    $currency_symbol = session('currency_symbol');
                    if ($currency_symbol == '') {
                        $system_default_currency_info = session('system_default_currency_info');
                        $currency_symbol = $system_default_currency_info->symbol;
                        $currency_code = $system_default_currency_info->code;
                    }
                @endphp
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ $currency_symbol }} {{ $currency_code }}
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" style="background-color: #1c1c50;">
                    @foreach (\App\Models\Currency::where('on', 1)->get() as $currency)
                        <button id="btn-signup">
                            <a href="javascript:;" onclick="currency_change('{{ $currency['code'] }}');">
                                {{ $currency->symbol }} {{ \Illuminate\Support\Str::upper($currency->code) }}
                            </a>
                        </button>
                    @endforeach
                </ul>
            </div>
            <a href="{{ url('cart') }}">
                <i class="fa-solid fa-cart-shopping"><i class="fa-regular fa-badge  cart-count">0</i></i>
            </a>
            <a href="{{ url('wishlist') }}">
                <i class="fa-solid fa-heart"><i class="fa-regular fa-badge wishlist-count">0</i></i>
            </a>
        @endguest
    </div>
</div>
<!-- top navbar -->
