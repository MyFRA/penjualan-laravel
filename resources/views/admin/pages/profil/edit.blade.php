@extends('admin.layouts.app')
@section('rekap')
		<div class="row">
      <div class="col-lg-7 col-md-10">
        <h1 class="display-2 text-white">Ubah Data Akun</h1>
      </div>
    </div>
@endsection

@section('content')
	  <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card text-center ">
              <i style="{{ !is_null($item->gambar) ? 'display: none' : '' }}" class="fas fa-user fa-10x pt-5 pb-5"></i>
              <img style="{{ is_null($item->gambar) ? 'display: none' : '' }}" class="img-thumbnail img-fluid" src="{{ asset('/storage/profil_user') }}/{{ $item->gambar }}" alt="Card image cap">
          </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Akun Saya</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/admin/profil') }}/{{ encrypt($item->id) }}" enctype="multipart/form-data">
            	@csrf
            	@method('PUT')
              <h6 class="heading-small text-muted mb-4">Informasi Akun</h6>
              <div class="pl-lg-4">
                 <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="name">Nama Lengkap</label>
                      <input id="name" name="name" class="form-control form-control-alternative" placeholder="Masukan nama kamu" @error('name') style="border: 1px solid red" @enderror value="{{ old('name') ? old('name') : $item->name }}" type="text">

          						@error('name')
          							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
          						@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email</label>
                      <input type="email" name="email" id="input-email" class="form-control form-control-alternative" @error('email') style="border: 1px solid red" @enderror value="{{ old('email') ? old('email') : $item->email }}" placeholder="Masukan email">
                    
            					@error('email')
            						<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
            					@enderror
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Informasi Kontak</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="alamat">Alamat</label>
                      <input id="alamat" name="alamat" class="form-control form-control-alternative" placeholder="masukan alamat" @error('alamat') style="border: 1px solid red" @enderror value="{{ old('alamat') ? old('alamat') : $item->alamat }}" type="text">
                    
            					@error('alamat')
            						<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
            					@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="alamat">Negara</label>
                      <input id="negara" name="negara" class="form-control form-control-alternative" placeholder="masukan negara" @error('negara') style="border: 1px solid red" @enderror value="{{ old('negara') ? old('negara') : $item->negara }}" type="text">
                    
            					@error('negara')
            						<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
            					@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="instansiasi">Sekolah / Instansiasi</label>
                      <input id="instansiasi" name="instansiasi" class="form-control form-control-alternative" placeholder="masukan nama sekolah / instansiasi" @error('instansiasi') style="border: 1px solid red" @enderror value="{{ old('instansiasi') ? old('instansiasi') : $item->instansiasi }}" type="text">
                    
            					@error('instansiasi')
            						<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
            					@enderror
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <!-- Description -->
              <h6 class="heading-small text-muted mb-4">Informasi Data Diri</h6>
              <div class="pl-lg-4">
                <div class="row">
                	<div class="col-lg-6">
                	   <div class="form-group focused">
				                <label class="form-control-label" for="gambar">Foto Profil</label>
				                <input type="file" class="form-control-file" id="gambar" name="gambar">
				    
            						@error('gambar')
            							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
            						@enderror
				            </div>
                	</div>
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="umur">Umur</label>
                      <input id="umur" name="umur" class="form-control form-control-alternative" placeholder="masukan umur" @error('umur') style="border: 1px solid red" @enderror value="{{ old('umur') ? old('umur') : $item->umur }}" type="number">
                    
            					@error('umur')
            						<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
            					@enderror
                    </div>
                  </div>
                </div>
                <div class="form-group focused">
                  <label class="form-control-label" for="deskripsi">Tentang Saya</label>
                  <textarea rows="4" name="deskripsi" @error('deskripsi') style="border: 1px solid red" @enderror class="form-control form-control-alternative" placeholder="Tentang saya...">{{ old('deskripsi') ? old('deskripsi') : $item->deskripsi }}</textarea>
          				
                  @error('deskripsi')
          					<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
          				@enderror
                </div>
                <button type="submit" class="btn btn-primary float-right">Update</button>
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


