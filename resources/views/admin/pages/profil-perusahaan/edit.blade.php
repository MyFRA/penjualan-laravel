@extends('admin.layouts.app')

@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white">{{ $perusahaan->nama }}</h1>
	    	<p class="text-white mt-0 mb-4">{{ $perusahaan->slogan }}</p>
	  	</div>
	</div>

@endsection

@section('content')

	<div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card text-center ">
            <i style="{{ !is_null($perusahaan->logo) ? 'display: none' : '' }}" class="fas fa-building fa-10x pt-5 pb-5"></i>
          <img style="{{ is_null($perusahaan->logo) ? 'display: none' : '' }}" class="img-thumbnail img-fluid" src="{{ asset('/storage/logo_perusahaan/' . $perusahaan->logo) }}" alt="Card image cap">
        </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Edit Perusahaan</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
		      <form method="post" action="{{ url('/admin/profil-perusahaan/' . encrypt($perusahaan->id)) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="pl-lg-4">
              <div class="row">
              	<div class="col">
              	  <div class="form-group focused">
                    <label class="form-control-label" for="nama">Nama Perusahaan</label>
                    <input type="text" id="nama" name="nama" @error('nama') style="border: 1px solid red" @enderror class="form-control form-control-alternative " style="background: white;" value="{{ old('nama') ? old('nama') : $perusahaan->nama }}">
                  
        						@error('nama')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
              	</div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="telp">Telp</label>
                    <input type="text" name="telp" id="telp" @error('telp') style="border: 1px solid red" @enderror class="form-control form-control-alternative" style="background: white" value="{{ old('telp') ? old('telp') : $perusahaan->telp }}">
                  
        						@error('telp')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="email">Email</label>
                    <input type="email" name="email" id="email" @error('email') style="border: 1px solid red" @enderror class="form-control form-control-alternative" style="background: white" value="{{ old('email') ? old('email') : $perusahaan->email }}">
                  
        						@error('email')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="fax">Fax</label>
                    <input type="text" name="fax" id="fax" @error('fax') style="border: 1px solid red" @enderror class="form-control form-control-alternative" style="background: white" value="{{ old('fax') ? old('fax') : $perusahaan->fax }}">
                  
        						@error('fax')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="site">Situs</label>
                    <input type="text" name="site" id="site" @error('site') style="border: 1px solid red" @enderror class="form-control form-control-alternative" style="background: white" value="{{ old('site') ? old('site') : $perusahaan->site }}">
                  
        						@error('site')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" @error('facebook') style="border: 1px solid red" @enderror class="form-control form-control-alternative" style="background: white" value="{{ old('facebook') ? old('facebook') : $perusahaan->facebook }}">
                  
        						@error('facebook')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" @error('instagram') style="border: 1px solid red" @enderror class="form-control form-control-alternative" style="background: white" value="{{ old('instagram') ? old('instagram') : $perusahaan->instagram }}">
                  </div>
                </div>
              </div>
              <div class="row">
              	<div class="col">
              		<div class="form-group focused">
    						    <label for="logo">Logo</label>
    						    <input type="file" class="form-control-file " @error('logo') style="border: 1px solid red" @enderror id="gambar" name="logo">
				          </div>
              	</div>
              </div>
            </div>
            <hr class="my-4">
            <!-- Address -->
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="alamat">Alamat</label>
                    <textarea style="background: white" @error('alamat') style="border: 1px solid red" @enderror class="form-control form-control-alternative" name="alamat" id="alamat" rows="4">{{ old('alamat') ? old('alamat') : $perusahaan->alamat }}</textarea>
                  
        						@error('alamat')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="slogan">Slogan</label>
                    <textarea style="background: white" @error('slogan') style="border: 1px solid red" @enderror class="form-control form-control-alternative" name="slogan" id="slogan" rows="4">{{ old('slogan') ? old('slogan') : $perusahaan->slogan }}</textarea>
                  
        						@error('slogan')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="deskripsi">Deskripsi</label>
                    <textarea style="background: white" @error('deskripsi') style="border: 1px solid red" @enderror class="form-control form-control-alternative" name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi') ? old('deskripsi') : $perusahaan->deskripsi }}</textarea>
                  
        						@error('deskripsi')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="sejarah">Sejarah</label>
                    <textarea style="background: white" @error('sejarah') style="border: 1px solid red" @enderror class="form-control form-control-alternative" name="sejarah" id="sejarah" rows="4">{{ old('sejarah') ? old('sejarah') : $perusahaan->sejarah }}</textarea>
                  
        						@error('sejarah')
        							<h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
        						@enderror
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4">
            <button type="submit" class="btn btn-primary float-right">Update</button>
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