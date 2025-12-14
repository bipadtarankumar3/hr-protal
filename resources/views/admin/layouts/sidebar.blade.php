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
          <a href="{{ url('/admin/talent-hub') }}" class="menu-link"><i class="menu-icon ri ri-list-check-2"></i> Job Listings</a>
        </li>
        <li class="menu-item">
          <a href="{{ url('/admin/talent-hub/create') }}" class="menu-link"><i class="menu-icon ri ri-add-line"></i> Create Job</a>
        </li>
        <li class="menu-item">
          <a href="{{ url('/admin/talent-hub/applicants') }}" class="menu-link"><i class="menu-icon ri ri-user-search-line"></i> Applicants</a>
        </li>
      </ul>
    </li>

    <li class="menu-item {{ request()->is('admin/hire-desk*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/hire-desk') }}" class="menu-link"><i class="menu-icon ri ri-user-star-line"></i> Hire Desk</a>
      <ul class="menu-sub">
        {{-- <li class="menu-item"><a href="{{ url('/admin/hire-desk/offer') }}" class="menu-link"><i class="menu-icon ri ri-mail-send-line"></i> Offer Letters (Hire Desk)</a></li> --}}
        {{-- <li class="menu-item"><a href="{{ url('/admin/offer-letters') }}" class="menu-link"><i class="menu-icon ri ri-mail-send-line"></i> Offer Letters (Library)</a></li> --}}
      </ul>
    </li>

    <li class="menu-item {{ request()->is('admin/onboard-pro*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle"><i class="menu-icon ri ri-user-add-line"></i> Onboard Pro</a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="{{ url('/admin/onboard-pro') }}" class="menu-link"><i class="menu-icon ri ri-user-add-line"></i> Overview</a></li>
        <li class="menu-item"><a href="{{ url('/admin/kyc') }}" class="menu-link"><i class="menu-icon ri ri-file-list-3-line"></i> KYC & Documents</a></li>
      </ul>
    </li>

    <!-- Workforce -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">Workforce</span>
    </li>

    <li class="menu-item {{ request()->is('admin/team-map*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/team-map') }}" class="menu-link"><i class="menu-icon ri ri-group-line"></i> Team Map</a>
    </li>
    <li class="menu-item {{ request()->is('admin/pulse-log*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/pulse-log') }}" class="menu-link"><i class="menu-icon ri ri-time-line"></i> Pulse Log</a>
    </li>
    <li class="menu-item {{ request()->is('admin/time-away*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/time-away') }}" class="menu-link"><i class="menu-icon ri ri-calendar-event-line"></i> Time Away</a>
    </li>
    <li class="menu-item {{ request()->is('admin/leave-track*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/leave-track') }}" class="menu-link"><i class="menu-icon ri ri-calendar-check-line"></i> Leave Track</a>
    </li>

    <!-- Payroll -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">Payroll</span>
    </li>

    <li class="menu-item {{ request()->is('admin/pay-pulse*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle"><i class="menu-icon ri ri-money-rupee-circle-line"></i> Pay Pulse</a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="{{ url('/admin/pay-pulse') }}" class="menu-link"><i class="menu-icon ri ri-money-rupee-circle-line"></i> Overview</a></li>
        {{-- <li class="menu-item"><a href="{{ url('/admin/payslips') }}" class="menu-link"><i class="menu-icon ri ri-file-text-line"></i> Payslips</a></li>
        <li class="menu-item"><a href="{{ url('/admin/payslips/generate') }}" class="menu-link"><i class="menu-icon ri ri-play-circle-line"></i> Generate Payslips</a></li>
       --}}
      
      </ul>
    </li>

    <!-- HR Operations -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">HR Operations</span>
    </li>

    <li class="menu-item {{ request()->is('admin/talent-vault*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/talent-vault') }}" class="menu-link"><i class="menu-icon ri ri-folder-user-line"></i> Talent Vault</a>
    </li>
    <li class="menu-item {{ request()->is('admin/project-desk*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/project-desk') }}" class="menu-link"><i class="menu-icon ri ri-folder-3-line"></i> Project Desk</a>
    </li>
    <li class="menu-item {{ request()->is('admin/buzz-desk*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/buzz-desk') }}" class="menu-link"><i class="menu-icon ri ri-megaphone-line"></i> Buzz Desk</a>
      {{-- <ul class="menu-sub">
        <li class="menu-item"><a href="{{ url('/admin/buzz-desk/create') }}" class="menu-link"><i class="menu-icon ri ri-add-circle-line"></i> Create Announcement</a></li>
      </ul> --}}
    </li>

    <!-- Exit Management -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">Exit Management</span>
    </li>

    <li class="menu-item {{ request()->is('admin/curtain-call*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/curtain-call') }}" class="menu-link"><i class="menu-icon ri ri-logout-box-line"></i> Curtain Call</a>
      {{-- <ul class="menu-sub">
        <li class="menu-item"><a href="{{ url('/admin/curtain-call/resign') }}" class="menu-link"><i class="menu-icon ri ri-door-open-line"></i> Resignation Form</a></li>
      </ul> --}}
    </li>
    <li class="menu-item {{ request()->is('admin/offboard-desk*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/offboard-desk') }}" class="menu-link"><i class="menu-icon ri ri-file-list-3-line"></i> OffBoard Desk</a>
    </li>

    <!-- Organization -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">Organization</span>
    </li>

    <li class="menu-item {{ request()->is('admin/departments*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle"><i class="menu-icon ri ri-building-line"></i> Departments</a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="{{ url('/admin/departments') }}" class="menu-link"><i class="menu-icon ri ri-list-check-2"></i> Department List</a></li>
        <li class="menu-item"><a href="{{ url('/admin/departments/create') }}" class="menu-link"><i class="menu-icon ri ri-add-line"></i> Create Department</a></li>
      </ul>
    </li>

    <li class="menu-item {{ request()->is('admin/teams*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle"><i class="menu-icon ri ri-stack-line"></i> Team Master</a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="{{ url('/admin/teams') }}" class="menu-link"><i class="menu-icon ri ri-list-check-2"></i> All Teams</a></li>
        <li class="menu-item"><a href="{{ url('/admin/teams/create') }}" class="menu-link"><i class="menu-icon ri ri-add-line"></i> Create Team</a></li>
        {{-- <li class="menu-item"><a href="{{ url('/admin/teams/tech') }}" class="menu-link"><i class="menu-icon ri ri-code-line"></i> Tech Team</a></li>
        <li class="menu-item"><a href="{{ url('/admin/teams/ops') }}" class="menu-link"><i class="menu-icon ri ri-truck-line"></i> Ops Team</a></li>
        <li class="menu-item"><a href="{{ url('/admin/teams/hr') }}" class="menu-link"><i class="menu-icon ri ri-user-heart-line"></i> HR Team</a></li>
        <li class="menu-item"><a href="{{ url('/admin/teams/bpo') }}" class="menu-link"><i class="menu-icon ri ri-phone-line"></i> BPO Cell</a></li>
        <li class="menu-item"><a href="{{ url('/admin/teams/marketing') }}" class="menu-link"><i class="menu-icon ri ri-pie-chart-line"></i> Marketing</a></li>
        <li class="menu-item"><a href="{{ url('/admin/teams/finance') }}" class="menu-link"><i class="menu-icon ri ri-bank-line"></i> Finance</a></li>
       --}}
      
      </ul>
    </li>

    <li class="menu-item {{ request()->is('admin/grievance-cell*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/grievance-cell') }}" class="menu-link"><i class="menu-icon ri ri-service-line"></i> Grievance Cell</a>
    </li>

    <!-- System -->
    <li class="menu-header mt-3">
      <span class="menu-header-text">System</span>
    </li>

    <li class="menu-item {{ request()->is('admin/users*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/users') }}" class="menu-link"><i class="menu-icon ri ri-user-line"></i> Users</a>
    </li>

    <li class="menu-item {{ request()->is('admin/role-master*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/role-master') }}" class="menu-link"><i class="menu-icon ri ri-shield-user-line"></i> Role Master</a>
      <ul class="menu-sub">
        <li class="menu-item"><a href="{{ url('/admin/role-master/create') }}" class="menu-link"><i class="menu-icon ri ri-add-circle-line"></i> Create Role</a></li>
      </ul>
    </li>
    <li class="menu-item {{ request()->is('admin/audit-trail*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/audit-trail') }}" class="menu-link"><i class="menu-icon ri ri-time-line"></i> Audit Trail</a>
    </li>
    <li class="menu-item {{ request()->is('admin/learn-zone*') ? 'active open' : '' }}">
      <a href="{{ url('/admin/learn-zone') }}" class="menu-link"><i class="menu-icon ri ri-book-open-line"></i> Learn Zone</a>
      {{-- <ul class="menu-sub">
        <li class="menu-item"><a href="{{ url('/admin/learn-zone/create') }}" class="menu-link"><i class="menu-icon ri ri-add-circle-line"></i> Add Resource</a></li>
      </ul> --}}
    </li>

  </ul>
</aside>