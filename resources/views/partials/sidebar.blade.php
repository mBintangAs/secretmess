<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        
        <li class="menu-label">Main menu</li>
        <li>
            <a href="{{ Auth::user()->role==1?route('dashboard.admin'):'' }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('message.index') }}">
                <div class="parent-icon"><i class='bx bx-envelope'></i>
                </div>
                <div class="menu-title">Message</div>
            </a>
        </li>
          </ul>
    <!--end navigation-->
</div>