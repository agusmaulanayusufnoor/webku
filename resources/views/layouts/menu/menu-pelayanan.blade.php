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
        {{-- menu teller --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-file-invoice-dollar"></i>
            <p>
              Teller
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item small">
                <a href="/pelayanan/uploaddep" class="nav-link">
                  <i class="fa fa-upload nav-icon"></i>
                  <p>Upload File Slip</p>
                </a>
              </li>
              <li class="nav-item small">
                <a href="/pelayanan/downloaddep" class="nav-link">
                  <i class="fas fa-th nav-icon"></i>
                  <p>Download File Slip</p>
                </a>
              </li>
            </ul>
        </li>

    </ul>
  </li>
