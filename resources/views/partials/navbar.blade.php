<nav class="navbar  navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span style="font-size: 13px" class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">MNT Blog</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item text-center">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link {{ $active === 'posts' ? 'active' : '' }}" href="/posts">Blog</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">Categories</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-center" href="/dashboard"><i
                                        class="bi bi-layout-text-sidebar-reverse"></i>
                                    My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-center"><i
                                            class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
                            </li>

                        </ul>
                    </li>
                @else
                    <li class="nav-item text-center">
                        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><i
                                class="bi bi-box-arrow-in-right"></i>login</a>
                    </li>
                @endauth
            </ul>


        </div>
    </div>
</nav>
