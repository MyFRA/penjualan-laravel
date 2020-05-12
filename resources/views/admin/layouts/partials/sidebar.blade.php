<!-- Navigation -->
        <ul class="navbar-nav">
          @if ($user->role == 'author')
            <li class="nav-item {{ ($nav == 'list-perusahaan') ? 'active' : '' }}">
              <a class=" nav-link " href="{{ url('/admin/list-perusahaan') }}"> 
                <i class="fas fa-home text-primary"></i> List Perusahaan
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'profil') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/admin/profil') }}">
                <i class="ni ni-circle-08 text-info"></i> Profil
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'credit') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/admin/credit') }}">
                <i class="fas fa-info text-info"></i> Credit
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="logout('{{ url('/admin/logout') }}')" href="">
                <i class="ni ni-key-25 text-info"></i> Logout
              </a>
            </li>
          @else
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
            <li class="nav-item {{ ($nav == 'top-kontribusi') ? 'active' : '' }}">
              <a class="nav-link " href="{{ url('/admin/top-kontribusi') }}">
                <i class="fas fa-trophy text-yellow"></i> Top Kontribusi
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'penjualan') ? 'active' : '' }}">
              <a class="nav-link " href="{{ url('/admin/penjualan') }}">
                <i class="ni ni-cart text-yellow"></i> Penjualan
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'traffics') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/admin/traffics') }}">
                <i class="fas fa-map text-info"></i> Traffics
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'profil') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/admin/profil') }}">
                <i class="ni ni-circle-08 text-info"></i> Profil
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'produk') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/admin/produk') }}">
                <i class="fas fa-shopping-bag text-info"></i> Produk
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'cek-ongkir') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/admin/cek-ongkir') }}">
                <i class="fas fa-box text-info"></i> Cek Ongkir
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'profil-perusahaan') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/admin/profil-perusahaan') }}">
                <i class="fas fa-building"></i> Profil Perusahaan
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'kas') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/admin/kas') }}">
                <i class="fas fa-wallet text-info"></i> Kas
              </a>
            </li>
            <li class="nav-item {{ ($nav == 'credit') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/admin/credit') }}">
                <i class="fas fa-info text-info"></i> Credit
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="logout('{{ url('/admin/logout') }}')" href="">
                <i class="ni ni-key-25 text-info"></i> Logout
              </a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>