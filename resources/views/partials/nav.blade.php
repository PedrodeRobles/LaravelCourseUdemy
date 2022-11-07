<nav>
    <ul>
        <li class="{{ setActive('home') }}"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">{{ __('About') }}</a></li>
        <li class="{{ setActive('projects.*') }}"><a href="{{ route('projects.index') }}">{{ __('Portafolio') }}</a></li>
        <li class="{{ setActive('contact') }}"><a href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
        @else
            <li><a href="#"onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                >Cerrar sesión</a>
            </li>
        @endguest
    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>