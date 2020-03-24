<!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item {{ ($nav == 'dashboard') ? 'active' : '' }}">
            <a class=" nav-link " href="{{ url('/admin/dashboard') }}"> 
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'anggota') ? 'active' : '' }}">
            <a class="nav-link " href="{{ url('/admin/anggota') }}">
              <i class="ni ni-planet text-blue"></i> List Anggota
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/profile.html">
              <i class="ni ni-single-02 text-yellow"></i> Top Kontribusi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/profile.html">
              <i class="ni ni-single-02 text-yellow"></i> List Penjualan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/tables.html">
              <i class="ni ni-bullet-list-67 text-red"></i> Tambahkan Penjualan
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'alamat') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/alamat') }}">
              <i class="ni ni-key-25 text-info"></i> Alamat
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'profil') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/profil') }}">
              <i class="ni ni-key-25 text-info"></i> Profil
            </a>
          </li>
          <li class="nav-item {{ ($nav == 'anggota') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/produk') }}">
              <i class="ni ni-key-25 text-info"></i> Produk
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