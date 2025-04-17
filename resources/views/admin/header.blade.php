<!-- resources/views/admin/header.blade.php -->
<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="d-flex">
                <span class="navbar-text">
                    @if(Auth::check())
                        Welcome, {{ Auth::user()->name }} |
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <!-- Hidden Logout Form -->
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        Welcome, Guest |
                        <a href="{{ route('admin.login') }}">Login</a>
                    @endif
                </span>
            </div>
        </div>
    </nav>
</div>
