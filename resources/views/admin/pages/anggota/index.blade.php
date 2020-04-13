@extends('admin.layouts.app')

@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white">{{ $perusahaan->nama }}</h1>
	    	<p class="text-white mt-0 mb-5">{{ $perusahaan->slogan }}</p>
	  	</div>
	</div>

  @if ($user->role == 'pemilik' || $user->role == 'administrator')
    <div class="row">
      <div class="col-md-12">
        <h3 class="mb-2" style="color: white">Undang via tautan</h3>
      </div>
      <div class="col-md-6">
        <div class="form-group focused d-inline">
          <input style="color: black;" type="text" id="myInput" class="form-control form-control-alternative" readonly="" value="{{ url('/invite') }}/{{ $perusahaan->token }}">
        </div>
      </div>
      <div class="col-md-2">
        <button id="copyButton" type="button" onclick="myFunction()"  class="btn btn-success"><i class=""></i>Salin</button>
      </div>
    </div>
  @endif

@endsection


@section('content')

    <div class="row">
      <div class="col-lg-9 col-xl-9 mb-5 mb-xl-0">
        <div class="card shadow">
          <div class="card-header border-0">
            <h3 class="mb-0">{{ $jmlAnggota }} Anggota</h3>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th style="width: 20%" scope="col">Profil</th>
                  <th scope="col">Nama</th>
                  <th style="width: 20%" scope="col">Role</th>
                  <th style="width: 20%" class="text-center" scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($anggota as $anggotaPer1)
                  <tr @if($user->id == $anggotaPer1->id) style="background: #eee" @endif>
                    <th scope="row">
                      <div class="media align-items-center">
                        @if ( is_null($anggotaPer1->gambar) )
                          <div class="card text-center ml-1">
                            <i class="fas fa-user fa-3x"></i>
                          </div>
                        @else
                          <a href="#" class="avatars rounded-circle mr-3">
                            <img class="img-thumbnail img-fluid" src="{{ asset('/storage/profil_user') }}/{{ $anggotaPer1->gambar }}" alt="Card image cap">
                          </a>
                        @endif
                      </div>
                    </th>
                    <td>
                      {{ $anggotaPer1->name }}
                    </td>
                    <td>
                      {{ $anggotaPer1->role }}
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="{{ url('/admin/anggota/'.encrypt($anggotaPer1->id)) }}">Lihat {{ $anggotaPer1->name }}</a>
                          @if ( $user->role == 'pemilik' && $user->role != $anggotaPer1->role )
                            @if ( $anggotaPer1->role == 'administrator' )
                              <a class="dropdown-item" href="#" onclick='updateRole("{{ $anggotaPer1->name }}", "Turunkan", "anggota", "{{ url('/admin/anggota/' . encrypt($anggotaPer1->id) . '/' . encrypt('anggota')) }}")'>Turunkan menjadi anggota</a>
                            @else
                              <a href="#" class="dropdown-item" onclick='updateRole("{{ $anggotaPer1->name }}", "Promosikan", "administrator", "{{ url('/admin/anggota/' . encrypt($anggotaPer1->id) . '/' . encrypt('administrator')) }}")'>Promosikan menjadi administrator</a>
                            @endif
                            <a class="dropdown-item" href="#" onclick='onDestroy("{{ url('/admin/anggota/' . encrypt($anggotaPer1->id)) }}", "Apakah anda yakin, akan mengeluarkan {{ $anggotaPer1->name }}?")'>Keluarkan {{ $anggotaPer1->name }}</a>
                          @elseif( $user->role == 'administrator' && $anggotaPer1->role == 'anggota' )
                            <a href="#" class="dropdown-item" onclick='updateRole("{{ $anggotaPer1->name }}", "Promosikan", "administrator", "{{ url('/admin/anggota/' . encrypt($anggotaPer1->id) . '/' . encrypt('administrator')) }}")'>Promosikan menjadi administrator</a>
                            <a class="dropdown-item" href="#" onclick='onDestroy("{{ url('/admin/anggota/' . encrypt($anggotaPer1->id)) }}", "Apakah anda yakin, akan mengeluarkan " . $anggotaPer1->name . "?")'>Keluarkan {{ $anggotaPer1->name }}</a>
                          @endif
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer  py-4">
            <nav aria-label="...">
              {{ $anggota->onEachSide(5)->links() }}
            </nav>
          </div>
        </div>
      </div>
    </div>
    
@endsection

@section('script')
  <form id="updateRole_form" action="" method="POST" style="display: none;">
    @csrf
    @method('PUT')
  </form>
  <form id="destroy_form" action="" method="POST" style="display: none;">
    @csrf
    @method('delete')
  </form>

  <script>
    function myFunction() {
      var copyText = document.getElementById('myInput');
      copyText.select();

      var copyButton = document.getElementById('copyButton');
      copyButton.innerHTML = 'Tersalin';

      document.execCommand("copy");

    }
  </script>
@endsection