<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">

    <div class="user-profile">
      <div class="ulogo">
        <a href="index.html">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
            <h3><b>SMS</b> Admin</h3>
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="header nav-small-cap">User Management</li>

      <li
        class="{{ request()->routeIs('password.*') || request()->routeIs('profile.*') || request()->routeIs('users.*') || request()->routeIs('permissions.*') ? 'treeview active' : 'treeview' }}">
        <a href="#">
          <i data-feather="user"></i>
          <span>Manage User</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ request()->routeIs('password.*') || request()->routeIs('profile.*') ? 'active' : '' }}">
            <a href="{{ route('profile.view') }}">
              <i class="ti-more"></i>Your Profile
            </a>
          </li>
          <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a href="{{ route('users.view') }}">
              <i class="ti-more"></i>View Users
            </a>
          </li>
          @if(Auth::user()->hasRole(['super_admin','admin']))
            <li class="{{ request()->routeIs('permissions.*') ? 'active' : '' }}">
              <a href="{{ route('permissions.manage') }}">
                <i class="ti-more"></i>Manage Permissions
              </a>
            </li>
          @endif
        </ul>
      </li>

      <li class="{{ request()->routeIs('student.class.*') || request()->routeIs('setups.*') ? 'treeview active' : 'treeview' }}">
        <a href="#">
          <i data-feather="settings"></i>
          <span>Setup Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ request()->routeIs('student.class.*') ? 'active' : '' }}"">
            <a href=" {{ route('student.class.view') }}">
              <i class="ti-more"></i>Student Class
            </a>
          </li>
        </ul>
      </li>

      <li class="{{ request()->routeIs('health.*') ? 'active' : '' }}">
        <a href="{{ route('health.index') }}">
          <i data-feather="heart"></i>
          <span>System Health</span>
        </a>
      </li>
    </ul>
  </section>
</aside>