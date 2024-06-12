@php
$currentRouteName = Route::currentRouteName();
@endphp

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(150, 190, 252, 0.5);">
    <div class="container-md">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ Vite::asset('resources/images/Logo.png') }}"
                width="115" height="30"></a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav h5 ">
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('product.index') }}">list Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('databayar.index') }}">list Pembayaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('users.index') }}">list User</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logoutadmin') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logoutadmin') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
