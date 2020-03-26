@extends('admin.layouts.app')
@section('rekap')
  <div class="row">
    <div class="col-lg-7 col-md-9">
        <h1 class="display-2 text-white">Edit Produk</h1>
        <p class="text-white mt-0 mb-2">{{ $item->nama }}</p>
      </div>
  </div>
@endsection
@section('content')
	<div class="row">
		
	</div>
	<div class="row">
		<div class="col-md-5">
  			<img class="img-thumbnail img-fluid" src="{{ asset('/storage') }}/{{ $namaPerusahaan }}/{{ $item->gambar }}" alt="Card image cap">
		</div>
		<div class="col-md-7">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                        <form method="POST" action="{{ url('/admin/produk') }}/{{ encrypt($item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" required="" class="form-control" id="nama" name="nama" value="{{ old('nama') ? old('nama') : $item->nama }}" placeholder="Masukan nama produk">
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" required="" class="form-control" id="harga" name="harga" value="{{ old('harga') ? old('harga') : $item->harga }}" placeholder="Masukan harga produk">
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
          </div>
           <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') ? old('deskripsi') : $item->deskripsi }}</textarea>
          </div>
      </div>
      <div class="modal-footer">
        <a href="{{ url('/admin/produk') }}" class="btn btn-secondary" >Kembali</a>
        <button type="submit" class="btn btn-primary">Ubah Produk</button>
      </div>
      </form>
            </div>
          </div>
        </div>
	</div>
@endsection