  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('') }}assets/dist/img/logo-bprku.jpeg" alt="BPRKU Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BPRKU E-Box</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

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
            {{-- menu user --}}
            @if (auth()->user()->level_id==1)
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    User
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ url('user/create') }}" class="nav-link">
                        <i class="far fa-plus-square nav-icon"></i>
                        <p>Tambah User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/user" class="nav-link">
                        <i class="far fa-id-badge nav-icon"></i>
                        <p>Data User</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if ((auth()->user()->level_id==1) or auth()->user()->level_id==2)
            {{-- menu pelayanan --}}
            @include('layouts.menu.menu-pelayanan')
            @endif

            @if ((auth()->user()->level_id==1) or auth()->user()->level_id==3)
            {{-- menu kredit --}}
            @include('layouts.menu.menu-kredit')
            @endif

            @if ((auth()->user()->level_id==1) or auth()->user()->level_id==4)
            {{-- menu umum dan akunting cabang --}}
            @include('layouts.menu.menu-umum-akunting')
            @endif

            @if ((auth()->user()->level_id==1) or auth()->user()->level_id==5)
            {{-- menu umum--}}
            @include('layouts.menu.menu-umum-pusat')
            @endif

            @if ((auth()->user()->level_id==1) or auth()->user()->level_id==6)
            {{-- menu sekdir--}}
            @include('layouts.menu.menu-sekdir')
            @endif

            @if ((auth()->user()->level_id==1) or auth()->user()->level_id==7)
            {{-- menu sdm--}}
            @include('layouts.menu.menu-sdm')
            @endif


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
