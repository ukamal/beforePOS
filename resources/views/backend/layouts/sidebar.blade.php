@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
{{--@dd($prefix)--}}

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DASHBOARD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(!empty(Auth::user()->image))?url('/upload/user_images/'.Auth::user()->image):url('/upload/no_image.png')}}" class="img-circle elevation-2" alt="User Image">
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

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
            @if(Auth::user()->usertype=='Admin')

          <li class="nav-item {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-user') }}" class="nav-link {{($route=='view-user')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profiles-view') }}" class="nav-link {{($route=='profiles-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p>
                </a>
              </li>
                <li class="nav-item">
                    <a href="{{ route('password-view') }}" class="nav-link {{($route=='password-view')?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
            </ul>
          </li>

           <li class="nav-item {{($prefix=='/logos')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Logo
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-logo') }}" class="nav-link {{($route=='view-logo')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Logo</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix=='/sliders')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Slider
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-slider') }}" class="nav-link {{($route=='view-slider')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slider</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix=='/mission')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Mission
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-mission') }}" class="nav-link {{($route=='view-mission')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Mission</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix=='/vision')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Vision
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-vision') }}" class="nav-link {{($route=='view-vision')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Vision</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix=='/News-Event')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage News Event
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-newsevent') }}" class="nav-link {{($route=='view-newsevent')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View News Event</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix=='/service')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Service
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-service') }}" class="nav-link {{($route=='view-service')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Service</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix=='/contact')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Footer
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-footer') }}" class="nav-link {{($route=='view-footer')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Footer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix=='/about')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage About-Us
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-about') }}" class="nav-link {{($route=='view-about')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View About-Us</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{($prefix=='/about')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Contact
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view-contact') }}" class="nav-link {{($route=='view-about')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
        <br><br><br>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
