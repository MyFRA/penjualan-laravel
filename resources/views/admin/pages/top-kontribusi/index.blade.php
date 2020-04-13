@extends('admin.layouts.app')

@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white"><i class="fas fa-trophy"></i> Top Kontribusi</h1>
	    	<p class="text-white mt-0 mb-5">Halaman Peringkat, Top Kontribusi dalam perusahaan</p>
	  	</div>
	</div>

@endsection

@section('content')

    <div class="row">
      <div class="col-lg-9 col-xl-9 mb-0 mb-xl-0">
        <div class="card shadow">
          <div class="card-header border-0">
            <h3 class="mb-0">Top Kontribusi</h3>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th></th>
                  <th style="width: 20%" scope="col">Profil</th>
                  <th scope="col">Nama</th>
                  <th style="width: 20%" scope="col">Role</th>
                  <th style="width: 20%" class="text-center" scope="col">Jml</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($topKontribusi as $top)
                  <tr @if($user->id == $top->id) style="background: #eee" @endif>
                    <th style="color: {{ ( $loop->iteration == 1 ) ? '#FFD700' : '' }} {{ ( $loop->iteration == 2 ) ? '#808080' : '' }} {{ ( $loop->iteration == 3 ) ? '#cd7f32' : '' }}">
                      @if ($loop->iteration == 1 || $loop->iteration == 2 || $loop->iteration == 3 )
                        <i class="fas fa-trophy fa-3x"></i>
                      @endif
                    </th>
                    <th scope="row">
                      <div class="media align-items-center">
                        @if ( is_null($top->gambar) )
                          <div class="card text-center ml-1">
                            <i class="fas fa-user fa-3x"></i>
                          </div>
                        @else
                          <a href="#" class="avatars rounded-circle mr-3">
                            <img class="img-thumbnail img-fluid" src="{{ asset('/storage/profil_user') }}/{{ $top->gambar }}" alt="Card image cap">
                          </a>
                        @endif
                      </div>
                    </th>
                    <td>
                      {{ $top->name }}
                    </td>
                    <td>
                      {{ $top->role }}
                    </td>
                    <td class="text-center">
                      {{ $top->jumlahOrder }}
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