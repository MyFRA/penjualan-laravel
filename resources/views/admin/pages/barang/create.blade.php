@extends('admin.layouts.app')
@section('rekap')
		<div class="row">
      <div class="col-lg-7 col-md-10">
        <h1 class="display-2 text-white"><i class="fas fa-shopping-bag"></i> Tambah Produk</h1>
        <p class="text-white mt-0 mb-2">Menampilkan Form Tambah Produk</p>
      </div>
    </div>
@endsection

@section('content')
	  <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card text-center ">
              <i style="" class="fas fa-shopping-bag fa-10x pt-5 pb-5"></i>
              <img style="display: none" class="img-thumbnail img-fluid" src="" alt="Card image cap">
          </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Form Tambah Produk</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/admin/produk') }}" enctype="multipart/form-data">
            	@csrf
              <h6 class="heading-small text-muted mb-4">Informasi Produk</h6>
              <div class="pl-lg-4">
                 <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="nama">Nama Produk</label>
                      <input required="" id="nama" name="nama" class="form-control form-control-alternative" placeholder="Masukan nama produk" @error('nama') style="border: 1px solid red" @enderror value="{{ old('nama') }}" type="text">

          						@error('nama')
          							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
          						@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="harga_asli">Harga Asli</label>
                      <input required="" type="number" name="harga_asli" id="harga_asli" class="form-control form-control-alternative" @error('harga_asli') style="border: 1px solid red" @enderror value="{{ old('harga_asli') }}" placeholder="Masukan harga asli">
                    
            					@error('harga_asli')
            						<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
            					@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="harga_jual">Harga Jual</label>
                      <input required="" type="number" name="harga_jual" id="harga_jual" class="form-control form-control-alternative" @error('harga_jual') style="border: 1px solid red" @enderror value="{{ old('harga_jual') }}" placeholder="Masukan harga jual">
                    
                      @error('harga_jual')
                        <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <div class="pl-lg-4">
                <div class="row">
                	<div class="col-lg-6">
                	   <div class="form-group focused">
				                <label class="form-control-label" for="gambar">Foto Produk</label>
				                <input type="file" class="form-control-file" id="gambar" name="gambar">
				    
            						@error('gambar')
            							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
            						@enderror
				            </div>
                	</div>
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="satuan">Satuan</label>
                      <input required="" id="satuan" name="satuan" class="form-control form-control-alternative" placeholder="masukan satuan" @error('satuan') style="border: 1px solid red" @enderror value="{{ old('satuan') }}" type="text">
                    
            					@error('satuan')
            						<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
            					@enderror
                    </div>
                  </div>
                </div>
                <div class="form-group focused">
                  <label class="form-control-label" for="deskripsi">Deskripsi Produk</label>
                  <textarea rows="4" name="deskripsi" @error('deskripsi') style="border: 1px solid red" @enderror class="form-control form-control-alternative" placeholder="Deskripsi Produk">{{ old('deskripsi') }}</textarea>
          				
                  @error('deskripsi')
          					<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
          				@enderror
                </div>
                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah</button>
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
		const imageSrc = document.querySelector('.row .col-xl-4 .card img.img-thumbnail');
		const profileDefault = document.querySelector('.row .col-xl-4 .card i');

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


