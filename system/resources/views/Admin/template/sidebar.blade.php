  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #008080">
    <!-- Brand Logo -->
    <a href="{{url('Admin/beranda')}}" class="brand-link" style="background-color: #008080">
      <img src="{{url('public')}}/Client/images/home/Logo MAOK.png"
           alt="AdminLTE Logo"
           class="brand-image elevation-2"
           style="opacity: .8; background-color: #fff; border-radius: 5px;">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('public')}}/Admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="color: #fff;">
            @if(Auth::check())
              <a href="{{url('Admin/profil')}}" class="d-block" style="color: #fff;">
                {{request()->user()->email}}
              </a>
            @else
                Silahkan Login
            @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{url('/Admin/beranda')}}" class="nav-link {{request()->is('Admin/beranda*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/Admin/kategori')}}" class="nav-link {{request()->is('Admin/kategori*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/Admin/user')}}" class="nav-link {{request()->is('Admin/user*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                User
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>