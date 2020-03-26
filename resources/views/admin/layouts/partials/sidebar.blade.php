<!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item {{ ($nav == 'dashboard') ? 'active' : '' }}">
            <a class=" nav-link " href="{{ url('/admin/dashboard') }}"> 
              <i class="fas fa-home text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'anggota') ? 'active' : '' }}">
            <a class="nav-link " href="{{ url('/admin/anggota') }}">
              <i class="fas fa-users"></i> List Anggota
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/profile.html">
              <i class="fas fa-trophy text-yellow"></i> Top Kontribusi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/profile.html">
              <i class="ni ni-cart text-yellow"></i> List Penjualan
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'alamat') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/alamat') }}">
              <i class="fas fa-map text-info"></i> Alamat
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'profil') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/profil') }}">
              <i class="ni ni-circle-08 text-info"></i> Profil
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'produk') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/produk') }}">
              <i class="ni ni-key-25 text-info"></i> Produk
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'bantuan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/bantuan') }}">
              <i class="ni ni-key-25 text-info"></i> Bantuan
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'tentang') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/tentang') }}">
              <i class="fas fa-info-circle text-info"></i> Tentang
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'pengaturan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/pengaturan') }}">
              <i class="ni ni-settings"></i> Pengaturan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/logout') }}">
              <i class="ni ni-key-25 text-info"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>