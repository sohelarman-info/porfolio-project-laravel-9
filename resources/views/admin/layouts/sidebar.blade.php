<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin') }}" class="brand-link">
    <img src="{{ asset('admin/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ __('Dashboard') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item @yield('HomeManOpen')">
          <a href="{{ route('admin') }}" class="nav-link @yield('HomeManActive')">
            <i class="nav-icon fas fa-home"></i>
            <p>
              {{ __('Home') }}
              <span class="right badge badge-danger">Home</span>
            </p>
          </a>
        </li>
        <li class="nav-item @yield('SendMail')">
          <a href="{{ route('SendMailSection') }}" class="nav-link @yield('SendMailSection')">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              {{ __('Inbox') }}
              <span class="right badge badge-info">Mail</span>
            </p>
          </a>
        </li>
        <li class="nav-item @yield('PortManOpen')">
          <a href="#" class="nav-link @yield('PortManActive')">
            <i class="nav-icon fas fa-user-edit"></i>
            <p>
              {{ __('Portfolio Website') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('PortHeader') }}" class="nav-link @yield('Header')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Header Section') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('PersonalArea') }}" class="nav-link @yield('PersonalArea')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Personal Section') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('About') }}" class="nav-link @yield('About')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('About Section') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('SkillSection') }}" class="nav-link @yield('SkillSection')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Skill Section') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ServiceSection') }}" class="nav-link @yield('ServiceSection')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Service Section') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('Portfolio') }}" class="nav-link @yield('Portfolio')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Portfolio Section') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('Coundown') }}" class="nav-link @yield('Coundown')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Coundown Section') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('Education') }}" class="nav-link @yield('Education')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Education') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('Testimonials') }}" class="nav-link @yield('Testimonials')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Testimonials') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('BlogSection') }}" class="nav-link @yield('Blog')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Blog Section') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('Ready') }}" class="nav-link @yield('Ready')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Ready Section') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ContactSection') }}" class="nav-link @yield('ContactSection')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Contact Section') }}</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item @yield('UserManOpen')">
          <a href="#" class="nav-link @yield('UserManActive')">
            <i class="nav-icon fas fa-users"></i>
            <p>
              {{ __('User Management') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('UserList') }}" class="nav-link @yield('User')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('User List') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('Role') }}" class="nav-link @yield('Role')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Role') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('Permission') }}" class="nav-link @yield('Permission')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Permission') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('RolePermission') }}" class="nav-link @yield('RolePermission')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Role Permission') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('UserRole') }}" class="nav-link @yield('UserRole')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('User Role') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('UserPermission') }}" class="nav-link @yield('UserPermission')">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('User Permission') }}</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
