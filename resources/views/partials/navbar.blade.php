<nav class="navbar navbar-expand-lg px-4">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="fa-solid fa-baby-carriage me-2"></i>BirthRegSys</a>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end text-end" id="navbarNav">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}"><i class="fa-solid fa-house me-1"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register.form') }}"><i class="fa-solid fa-file-signature me-1"></i>Birth Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('contact.index') }}"><i class="fa-solid fa-envelope me-1"></i>Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="#"><i class="fa-solid fa-user-shield me-1"></i>Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
