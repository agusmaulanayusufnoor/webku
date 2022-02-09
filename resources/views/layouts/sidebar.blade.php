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
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pelayanan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-plus-square nav-icon"></i>
                  <p>Tambah Stok</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="/stock" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                  <p>Data Stok</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('pelayanan/uploadba') }}" class="nav-link">
                  <i class="fa fa-upload nav-icon"></i>
                  <p>Upload BA Kas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pelayanan/download" class="nav-link">
                  <i class="fas fa-th nav-icon"></i>
                  <p>Download BA Kas</p>
                </a>
              </li>
              {{-- menu tabungan --}}
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-money-bill"></i>
                  <p>
                    Tabungan
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item small">
                    <a href="/pelayanan/uploadtab" class="nav-link">
                      <i class="fa fa-upload nav-icon"></i>
                      <p>Upload Tab</p>
                    </a>
                  </li>
                  <li class="nav-item small">
                    <a href="/pelayanan/downloadtab" class="nav-link">
                      <i class="fas fa-th nav-icon"></i>
                      <p>Download Tab</p>
                    </a>
                  </li>
                </ul>
              </li>

              {{-- menu deposito --}}
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-file-invoice-dollar"></i>
                    <p>
                      Deposito
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item small">
                        <a href="/pelayanan/uploaddep" class="nav-link">
                          <i class="fa fa-upload nav-icon"></i>
                          <p>Upload Dep</p>
                        </a>
                      </li>
                      <li class="nav-item small">
                        <a href="/pelayanan/downloaddep" class="nav-link">
                          <i class="fas fa-th nav-icon"></i>
                          <p>Download Dep</p>
                        </a>
                      </li>
                    </ul>
                </li>

            </ul>
          </li>
          @endif
          @if ((auth()->user()->level_id==1) or auth()->user()->level_id==3)
          {{-- menu kredit --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Kredit
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('kredit/uploadkre') }}" class="nav-link">
                  <i class="fa fa-upload nav-icon"></i>
                  <p>Upload File</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kredit/download" class="nav-link">
                  <i class="fas fa-th nav-icon"></i>
                  <p>Download File</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if ((auth()->user()->level_id==1) or auth()->user()->level_id==4)
          {{-- menu akunting --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-archive"></i>
              <p>
              Akunting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('akunting/uploadak') }}" class="nav-link">
                      <i class="fa fa-upload nav-icon"></i>
                      <p>Upload File</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('akunting/download') }}" class="nav-link">
                      <i class="fas fa-th nav-icon"></i>
                      <p>Download File</p>
                    </a>
                  </li>
            </ul>
          </li>
          @endif

          @if ((auth()->user()->level_id==1) or auth()->user()->level_id==5)
          {{-- menu umum--}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-mail-bulk"></i>
              <p>
             Umum
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fa fa-upload nav-icon"></i>
                      <p>Upload File</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-th nav-icon"></i>
                      <p>Download File</p>
                    </a>
                  </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
