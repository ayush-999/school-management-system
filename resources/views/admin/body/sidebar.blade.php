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
        class="{{ request()->routeIs('password.*') || request()->routeIs('profile.*') || request()->routeIs('permissions.*') || request()->routeIs('users.*') ? 'treeview active' : 'treeview' }}">
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
          @if(Auth::user()->hasRole(['super_admin', 'admin']))
            <li class="{{ request()->routeIs('permissions.*') ? 'active' : '' }}">
              <a href="{{ route('permissions.manage') }}">
                <i class="ti-more"></i>Manage Permissions
              </a>
            </li>
          @endif
        </ul>
      </li>
      <li class="{{ 
          request()->routeIs('student.class.*') ||
  request()->routeIs('student.group.*') ||
  request()->routeIs('student.year.*') ||
  request()->routeIs('student.shift.*') ||
  request()->routeIs('fees.category.*') ||
  request()->routeIs('fees.amount.*') ||
  request()->routeIs('exam.type.*') ||
  request()->routeIs('subject.*') ||
  request()->routeIs('assign.subject.*') ||
  request()->routeIs('designation.*') ||
  request()->routeIs('setups.*') ? 'treeview active' : 'treeview'
        }}">
        <a href="#">
          <i data-feather="settings"></i>
          <span>Setup Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ request()->routeIs('student.class.*') ? 'active' : '' }}">
            <a href=" {{ route('student.class.view') }}">
              <i class="ti-more"></i>Student Class
            </a>
          </li>
          <li class="{{ request()->routeIs('student.year.*') ? 'active' : '' }}">
            <a href=" {{ route('student.year.view') }}">
              <i class="ti-more"></i>Student Year
            </a>
          </li>
          <li class="{{ request()->routeIs('student.group.*') ? 'active' : '' }}">
            <a href=" {{ route('student.group.view') }}">
              <i class="ti-more"></i>Student Group
            </a>
          </li>
          <li class="{{ request()->routeIs('student.shift.*') ? 'active' : '' }}">
            <a href=" {{ route('student.shift.view') }}">
              <i class="ti-more"></i>Student Shift
            </a>
          </li>
          <li class="{{ request()->routeIs('fees.category.*') ? 'active' : '' }}">
            <a href=" {{ route('fees.category.view') }}">
              <i class="ti-more"></i>Fees Category
            </a>
          </li>
          <li class="{{ request()->routeIs('fees.amount.*') ? 'active' : '' }}">
            <a href=" {{ route('fees.amount.view') }}">
              <i class="ti-more"></i>Fees Amount
            </a>
          </li>
          <li class="{{ request()->routeIs('exam.type.*') ? 'active' : '' }}">
            <a href=" {{ route('exam.type.view') }}">
              <i class="ti-more"></i>Exam Type
            </a>
          </li>
          <li class="{{ request()->routeIs('subject.*') ? 'active' : '' }}">
            <a href=" {{ route('subject.view') }}">
              <i class="ti-more"></i>Subject
            </a>
          </li>
          <li class="{{ request()->routeIs('assign.subject.*') ? 'active' : '' }}">
            <a href=" {{ route('assign.subject.view') }}">
              <i class="ti-more"></i>Assign Subject
            </a>
          </li>
          <li class="{{ request()->routeIs('designation.*') ? 'active' : '' }}">
            <a href=" {{ route('designation.view') }}">
              <i class="ti-more"></i>Designation
            </a>
          </li>
        </ul>
      </li>

      <li
        class="treeview">
        <a href="#">
          <i data-feather="users"></i>
          <span>Manage Student</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="">
              <i class="ti-more"></i>View Users
            </a>
          </li>
        </ul>
      </li>


      @if(Auth::user()->hasRole(['super_admin', 'admin']))
        <li class="header nav-small-cap">System Info </li>
        <li class="{{ request()->routeIs('health.*') ? 'active' : '' }}">
          <a href="{{ route('health.index') }}">
            <i data-feather="heart"></i>
            <span>System Health</span>
          </a>
        </li>
      @endif
    </ul>
  </section>
</aside>