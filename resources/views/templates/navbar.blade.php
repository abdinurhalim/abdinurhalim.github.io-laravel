<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Code</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                <a class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}"
                    href="{{ url('/about') }}">About</a>
                <a class="nav-item nav-link {{ Request::is('blog*') ? 'active' : '' }}"
                    href="{{ url('/blog') }}">Blog</a>
                <a class="nav-item nav-link {{ Request::is('category*') ? 'active' : '' }}"
                    href="{{ url('/category') }}">Category</a>
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @auth
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard"><i class="fas fa-fw fa-home"></i> Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout"><i class="fas fa-fw fa-sign-out-alt"></i> logout</a>
                        </div>
                    </div>
                @else
                    <a class="nav-item nav-link {{ Request::is('login', 'register') ? 'active' : '' }}"
                        href="{{ url('/login') }}"><i class="fas fa-fw fa-sign-in-alt"></i> login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
