
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light " style="width: 250px; min-height: 100vh;">
    <p class="fw-bold">Welcome, {{ Auth::user()->name ?? 'Guest' }}</p>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link  link-dark {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('user.myapplication') }}" class="nav-link   link-dark {{ request()->routeIs('user.myapplication') ? 'active' : '' }}">
                <i class="fas fa-file-alt me-2"></i> My Application
            </a>
        </li>
        <li>
            <a href="{{ route('user.newapplication') }}" class="nav-link link-dark {{ request()->routeIs('user.newapplication') ? 'active' : '' }}">
                <i class="fa-solid fa-clipboard-check"></i> New Application
            </a>
        </li>
        <li>
            <a href="{{ route('user.profile') }}" class="nav-link link-dark {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                <i class="fas fa-user me-2"></i> My Profile
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-danger">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </li>
    </ul>
</div>




