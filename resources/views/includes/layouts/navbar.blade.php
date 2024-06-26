<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <div class="logo_laravel">
                {{ config('app.name') }}
            </div>
            {{-- config('app.name', 'Laravel') --}}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link @if (Route::is('guest.home')) active @endif"
                        href="{{ url('/') }}">{{ __('Home') }}</a>
                </li>
                @auth <!-- Metto questa direttiva in modo che il link projects lo vedo solo se sono loggato -->
                   <li class="nav-item">
                    <a class="nav-link @if (Request::is('admin/projects*')) active @endif"
                        href="{{ route('adminprojects.index') }}">Projects</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link @if (Request::is('admin/types*')) active @endif"
                        href="{{ route('admintypes.index') }}">Types</a>
                </li> 
                @endauth
                </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('admin') }}">{{ __('Admin Home') }}</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
