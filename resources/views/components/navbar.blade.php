<nav class="black">
    <div class="container">
        <a class="brand-logo" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="material-icons">menu</i>
        </a>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
            @auth
                @if(auth()->user()->isAdmin())
                    <li>
                        <a href="/admin">USERS</a>
                    </li>
                @endif

                @if(auth()->user()->isEmployee())
                    <li>
                        <a href="/dashboard">APPLICATIONS</a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>
                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} <span class="caret"></span>
                    </a>

                    <ul id='dropdown1' class='dropdown-content'>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endauth
        </ul>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
        </ul>
    </div>
</nav>
