@extends('admin.layouts.app')
@section('rekap')
  <div class="row">
    <div class="col-lg-7 col-md-9">
        <h1 class="display-2 text-white"><i class="fas fa-shopping-bag"></i> Edit Produk</h1>
      </div>
  </div>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-5">
      <div class="card text-center">
        <i id="imgDefault" style="{{ !is_null($item->gambar) ? 'display: none' : '' }}" class="fas fa-shopping-bag fa-10x pt-5 pb-5"></i>
        <img id="imgSrc" style="{{ is_null($item->gambar) ? 'display: none' : '' }}" class="img-thumbnail img-fluid" src="{{ asset('/storage/foto_produk') }}/{{ $item->gambar }}" alt="Card image cap">
      </div>
		</div>
		<div class="col-md-7">
      <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
      <form method="POST" action="{{ url('/admin/produk') }}/{{ encrypt($item->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="nama">Nama Produk</label>
          <input type="text" @error('nama') style="border: 1px solid red" @enderror class="form-control" id="nama" name="nama" value="{{ old('nama') ? old('nama') : $item->nama }}" placeholder="Masukan nama produk">
          
          @error('nama')
            <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
          @enderror
        
        </div>
        <div class="form-group">
          <label for="harga_asli">Harga Asli</label>
          <input type="number"  @error('harga_asli') style="border: 1px solid red" @enderror class="form-control" id="harga_asli" name="harga_asli" value="{{ old('harga_asli') ? old('harga_asli') : $item->harga_asli }}" placeholder="Masukan harga produk">
        
          @error('harga_asli')
            <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
          @enderror
          
        </div>
        <div class="form-group">
          <label for="harga_jual">Harga Jual</label>
          <input type="number"  @error('harga_jual') style="border: 1px solid red" @enderror class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual') ? old('harga_jual') : $item->harga_jual }}" placeholder="Masukan harga produk">
        
          @error('harga_jual')
            <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
          @enderror

        </div>
        <div class="form-group">
          <label for="satuan">Satuan</label>
          <input type="text"  @error('satuan') style="border: 1px solid red" @enderror class="form-control" id="satuan" name="satuan" value="{{ old('satuan') ? old('satuan') : $item->satuan }}" placeholder="Masukan nama produk">
        
          @error('satuan')
            <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
          @enderror

        </div>
       <div class="form-group focused">
          <label class="form-control-label" for="gambar">Foto Produk</label>
          <input type="file" class="form-control-file" id="gambar" name="gambar">

          @error('gambar')
            <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
          @enderror
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

@section('script')

  <script>
    const inpFile  = document.getElementById('gambar');
    const imageSrc = document.getElementById('imgSrc');
    const profileDefault = document.getElementById('imgDefault');

    inpFile.addEventListener('change', function() {
      const file = this.files[0];
      if(file) {
            const reader = new FileReader()

            profileDefault.style.display = "none"
            imageSrc.style.display = "block"

            reader.addEventListener("load", function() {
              imageSrc.setAttribute('src', this.result)
            })

            reader.readAsDataURL(file)
      }
    })
  </script>
@endsection