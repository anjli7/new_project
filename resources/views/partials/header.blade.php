<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="{{ asset('assets/images/logo.png') }}" alt="">
            <h1 class="brand-title mb-0">PRAKASH JANGID & ASSOCIATES</h1>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('home')}}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#services" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu no-radius" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item" href="{{route('TDS')}}">Tax Deducted Source</a></li>
                        <li><a class="dropdown-item" href="{{route('ITD')}}">Income Tax Department</a></li>
                        <li><a class="dropdown-item" href="{{route('GST')}}">Goods and Services Tax</a></li>
                        <li><a class="dropdown-item" href="{{route('MCA')}}">Ministry of Corporate Affairs</a></li>
                        <li><a class="dropdown-item" href="{{route('audite')}}">Audit Services</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('contact')}}">Contact</a>
                </li>
            </ul>
            <!-- 
                {{-- User Profile Dropdown --}}
                <div class="dropdown ms-lg-3">
                    <a class="nav-link dropdown-toggle d-flex text-white align-items-center" href="#" id="userProfileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="" 
                             alt="Profile" 
                             class="rounded-circle me-2" 
                             style="width: 32px; height: 32px; object-fit: cover;">
                        <span class="text-white"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end no-radius" aria-labelledby="userProfileDropdown">
                        <li><a class="dropdown-item" href="">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a></li>
                        <li><a class="dropdown-item" href="">
                            <i class="fas fa-user me-2"></i>Profile
                        </a></li>
                        <li><a class="dropdown-item" href="">
                            <i class="fas fa-file-alt me-2"></i>My Applications
                        </a></li>
                        <li><a class="dropdown-item text-danger" href=""
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a></li>
                    </ul>
                </div> -->

                <form id="logout-form" action="" method="POST" class="d-none">
                    @csrf
                </form>
            
                <a href="{{route('login')}}" class="btn btn-outline-light ms-lg-3">Login</a>
        </div>
    </div>
</nav>
