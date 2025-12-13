<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- Brand -->
  <div class="app-brand demo">
    <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-semibold ms-2">
        RYDZAA HRMS
      </span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="menu-toggle-icon d-xl-inline-block align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">

    <!-- Dashboard -->
    <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
      <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon ri ri-home-smile-line"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <!-- Recruitment -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">Recruitment</span>
    </li>

    <li class="menu-item {{ request()->is('admin/talent-hub*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon ri ri-briefcase-line"></i>
        <div>Talent Hub</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ url('/admin/talent-hub') }}" class="menu-link">
            <div>Job Listings</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ URL::to('/admin/talent-hub/create') }}" class="menu-link">
            <div>Create Job</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item {{ request()->is('admin/hire-desk*') ? 'active' : '' }}">
      <a href="{{ url('/admin/hire-desk') }}" class="menu-link">
        <i class="menu-icon ri ri-user-search-line"></i>
        <div>Hire Desk</div>
      </a>
    </li>

    <li class="menu-item {{ request()->is('admin/onboard-pro*') ? 'active' : '' }}">
      <a href="{{ url('/admin/onboard-pro') }}" class="menu-link">
        <i class="menu-icon ri ri-user-add-line"></i>
        <div>Onboard Pro</div>
      </a>
    </li>

    <!-- Workforce -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">Workforce</span>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/team-map') }}" class="menu-link">
        <i class="menu-icon ri ri-group-line"></i>
        <div>Team Map</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/pulse-log') }}" class="menu-link">
        <i class="menu-icon ri ri-time-line"></i>
        <div>Pulse Log</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/time-away') }}" class="menu-link">
        <i class="menu-icon ri ri-calendar-event-line"></i>
        <div>Time Away</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/leave-track') }}" class="menu-link">
        <i class="menu-icon ri ri-calendar-check-line"></i>
        <div>Leave Track</div>
      </a>
    </li>

    <!-- Payroll -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">Payroll</span>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/pay-pulse') }}" class="menu-link">
        <i class="menu-icon ri ri-money-rupee-circle-line"></i>
        <div>Pay Pulse</div>
      </a>
    </li>

    <!-- HR Operations -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">HR Operations</span>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/talent-vault') }}" class="menu-link">
        <i class="menu-icon ri ri-folder-user-line"></i>
        <div>Talent Vault</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/project-desk') }}" class="menu-link">
        <i class="menu-icon ri ri-folder-3-line"></i>
        <div>Project Desk</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/buzz-desk') }}" class="menu-link">
        <i class="menu-icon ri ri-megaphone-line"></i>
        <div>Buzz Desk</div>
      </a>
    </li>

    <!-- Exit Management -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">Exit Management</span>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/curtain-call') }}" class="menu-link">
        <i class="menu-icon ri ri-logout-box-line"></i>
        <div>Curtain Call</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/offboard-desk') }}" class="menu-link">
        <i class="menu-icon ri ri-file-list-3-line"></i>
        <div>OffBoard Desk</div>
      </a>
    </li>

    <!-- System -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">System</span>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/role-master') }}" class="menu-link">
        <i class="menu-icon ri ri-shield-user-line"></i>
        <div>Role Master</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="{{ url('/admin/learn-zone') }}" class="menu-link">
        <i class="menu-icon ri ri-book-open-line"></i>
        <div>Learn Zone</div>
      </a>
    </li>

  </ul>
</aside>