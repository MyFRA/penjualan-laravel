@extends('admin.layouts.app')

@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white"><i class="fas fa-building"></i> Daftar Perusahaan</h1>
	    	<p class="text-white mt-0 mb-5">Menampilkan semua daftar perusahaan</p>
	  	</div>
	</div>

@endsection

@section('content')

    <div class="row">
      <div class="col-lg-9 col-xl-9 mb-0 mb-xl-0">
        <div class="card shadow">
          <div class="card-header border-0">
            <h3 class="mb-0">List Perusahaan</h3>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th style="width: 20%" scope="col">Profil</th>
                  <th scope="col">Nama</th>
                  <th style="width: 20%" class="text-center" scope="col">Jml Anggota</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($perusahaan as $usaha)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        @if ( is_null($usaha->logo) )
                          <div class="card text-center ml-1">
                            <i class="fas fa-building fa-3x"></i>
                          </div>
                        @else
                          <a href="#" class="avatars rounded-circle mr-3">
                            <img class="img-thumbnail img-fluid" src="{{ asset('/storage/logo_perusahaan') }}/{{ $usaha->logo }}" alt="Card image cap">
                          </a>
                        @endif
                      </div>
                    </th>
                    <td>
                      {{ $usaha->nama }}
                    </td>
                    <td class="text-center">
                      {{ $usaha->jumlah }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
@endsection