<header class="main-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ $generalSettings->logo ?: '/template/images/template/logo1.png' }}" alt="{{ $generalSettings->company_name }}" width="250">
                </a>
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item {{ Request::routeIs('home') ? 'current-menu-item' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item {{ Request::routeIs('about') ? 'current-menu-item' : '' }}">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="nav-item {{ Request::routeIs('services*') ? 'current-menu-item' : '' }}">
                                <a class="nav-link" href="{{ route('services.index') }}">Services</a>
                            </li>
                            <li class="nav-item {{ Request::routeIs('blog*') ? 'current-menu-item' : '' }}">
                                <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                            </li>
                            <li class="nav-item highlighted-menu {{ Request::routeIs('booking') ? 'current-menu-item' : '' }}">
                                <a class="nav-link" href="{{ route('booking') }}">Book Service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-btn">
                        <a href="{{ route('booking') }}" class="btn-default">Book Service</a>
                    </div>
                </div>
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
