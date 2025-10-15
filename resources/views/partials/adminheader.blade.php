
        <nav class="top-navbar">
            <div class="d-flex align-items-center">    
            <button class="btn btn-link d-md-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>     
                <h5 class="mb-0">
                @php
                    $routeName = Route::currentRouteName();
                    $pageTitles = [
                        'admin.dashboard' => 'Dashboard',
                        'admin.users' => 'Users',
                        'admin.applications' => 'Applications',
                        'admin.contact.index' => 'Contact',
                        'admin.service' => 'Service',
                        'admin.profile' => 'My Profile',
                    ];
                @endphp
                {{ $pageTitles[$routeName]  ?? 'Dashboard' }}
                </h5>
            </div>
            <div class="user-dropdown d-flex align-item-center">
                <span class="badge bg-success me-2">{{ Auth::user()->name ?? 'Admin'}}</span>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/images/default-avatar.png') }}" alt="Usr Avatar"  class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;" >
                    <i class="fas fa-chevron-down ms-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end"  aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""><i class="fas fa-key me-2"></i> Change Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href=""><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>  
        </nav>  


