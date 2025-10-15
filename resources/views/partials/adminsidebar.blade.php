<div class="sidebar">
    <div class="sidebar-header">
        <h4>Dashboard</h4>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users') }}">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.applications') }}">
                <i class="fas fa-file-alt"></i>
                <span>Applications</span>
            </a>
        </li>
        <li>
           <a href="#enquirySubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fas fa-envelope"></i>
            <span>Inquiry Forms</span>
           </a> 
           <ul class="collapse list-unstyled ms-3" id="enquirySubmenu">
            <li>
                <a href="{{ route('admin.contact.index') }}">
                    <i class="fas fa-phone"></i>
                    <span>Contact</span>
                </a>                            
            </li>
            <li>
                <a href="{{ route('admin.service') }}">
                    <i class="fa fa-tools"></i>
                    <span>Service</span>
                </a>
            </li>
           </ul>
        </li>
        <li>
            <a href="{{ route('admin.profile') }}">
                <i class="fa fa-user"></i>
                <span>My Profile</span>
            </a>
        </li>
        <li>
            <a href="">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>

</div>