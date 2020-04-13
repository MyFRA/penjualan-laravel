@extends('admin.layouts.app')
@section('rekap')
  <div class="row">
    <div class="col-lg-7 col-md-10">
      <h1 class="display-2 text-white">Profil Akun</h1>
    </div>
  </div>
@endsection
@section('content')
  <div class="row ">
    <div class="col-md-5 col-xs-10 offset-xs-1">
      @if ( is_null($item->gambar) )
        <div class="card text-center">
            <i class="fas fa-user fa-10x pt-5 pb-5"></i>
        </div>
      @else
          <img class="img-thumbnail img-fluid" src="{{ asset('/storage/profil_user') }}/{{ $item->gambar }}" alt="Card image cap">
      @endif
    </div>
    <div class="col-md-6 ">
      <div class="card card-profile shadow">
        <div class="card-body pt-0 pt-md-4">
          <div class="text-center mt-4">
            <hr>
            <h1>
              {{ $item->name }}<span class="font-weight-light">{{', ' . $item->umur}}</span>
            </h1>
            <div class="h5 font-weight-300">
              <i class="ni location_pin mr-2"></i>{{ $item->alamat }} {{', ' .  strtoupper($item->negara) }}
            </div>
            <div class="h5 mt-4">
              <i class="ni business_briefcase-24 mr-2"></i>{{ $item->namaPerusahaan }} - {{ $item->role }}
            </div>
            <div>
              <i class="ni education_hat mr-2"></i>{{ $item->instansiasi }}
            </div>
            <hr class="my-4" style="width: 60%">
            <p>{{ $item->deskripsi ? '" ' . $item->deskripsi . ' "' : '' }}</p>
            <div style="font-size: 14px" class=" text-muted mt-4 text-left">
                {{ $item->email }}
            </div>
            <hr>
            <a href="{{ url('/admin/anggota') }}" class="btn btn-dark float-right">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection