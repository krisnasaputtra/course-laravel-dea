@auth
    <nav class="navbar-nav guest">
        <ul class="nav-link content">
            <li class="wrap-text-nav"><a class="text-nav a" href="/">K</a><a class="text-nav b" href="/">S</a></li>
            <li> <a class="link_action {{ Request::is('/') ? 'active' : '' }}" href="/"><i
                        data-feather="home"></i>Home</a></li>
            <li><a class="link_action {{ Request::is('about') ? 'active' : '' }}" href="/about"><i
                        data-feather="user"></i>About Me</a>
            </li>
        </ul>
        <ul class="nav-link action">
            <div class="dropdown">
                <div class="dropdown-action">
                    <span>{{ auth()->user()->name }}</span>
                    <i><span data-feather="chevron-down"></span></i>
                </div>

                <div class="dropdown-content">
                    <li>
                        <a href="/dashboard">Dashboard</a>
                    </li>
                    <form class="logout-navbar" action={{ route('dashboard_logout') }} method="POST">
                        @csrf
                        <input type="hidden" name="token" value={{ auth()->user()->token }}>
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </ul>

    </nav>
@else
    <nav class="navbar-nav guest">

        <ul class="nav-link content">
            <li class="wrap-text-nav"><a class="text-nav a" href="/">K</a><a class="text-nav b" href="/">S</a>
            </li>
            <li> <a class="link_action {{ Request::is('/') ? 'active' : '' }}" href="/"><i
                        data-feather="home"></i>Home</a></li>
            <li><a class="link_action {{ Request::is('about') ? 'active' : '' }}" href="/about"><i
                        data-feather="user"></i>About Me</a>
            </li>
        </ul>
        <ul class="nav-link action">
            <li><a class="link_action" href="/login"><i data-feather="log-in"></i>Login </a></li>
        </ul>

    </nav>
@endauth
