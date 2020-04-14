@extends('admin.layouts.app')
@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white">{{ $perusahaan->nama }}</h1>
	    	<p class="text-white mt-0 mb-4">{{ $perusahaan->slogan }}</p>
	    	@if ($user->role == 'pemilik' || $user->role == 'administrator')
	    		<a class="btn btn-success mb-1" href="{{ url('/admin/profil-perusahaan/' . encrypt($perusahaan->id) . '/edit' ) }}">Edit Perusahaan</a>
	    	@endif
	  	</div>
	</div>

@endsection

@section('content')
	<div class="row">
		<div class="col-md-5">
      @if ( is_null($perusahaan->logo) )
        <div class="card text-center">
            <i class="fas fa-building fa-10x pt-5 pb-5"></i>
        </div>
      @else
        <img class="img-thumbnail img-fluid" src="{{ asset('/storage/logo_perusahaan/' . $perusahaan->logo) }}" alt="Card image cap">
      @endif
		</div>
		<div class="col-md-7">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
        	<hr>
    			<div class="mt-4">
    				<h2>Deskripsi : </h2>
    				<p style="text-indent: 20px; ">{{ $perusahaan->deskripsi }}</p>
    			</div>
    			<hr>
    			<div class="mt-4">
    				<h2>Sejarah : </h2>
    				<p style="text-indent: 20px; ">{{ $perusahaan->sejarah }}</p>
    			</div>
    			<div>
    				<a href="{{ url('/admin/produk') }}" class="mt-3 btn btn-dark float-right">Kembali</a>
    			</div>
        </div>
      </div>
    </div>
	</div>
	<div class="row mt-3">
		<div class="col">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">{{ $perusahaan->nama }}</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form>
            <h6 class="heading-small text-muted mb-4">Hubungi Kami</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="telp">Telp</label>
                    <input type="text" id="telp" class="form-control form-control-alternative" readonly="" style="background: white" value="{{ $perusahaan->telp }}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="email">Email</label>
                    <input type="email" id="email" class="form-control form-control-alternative" readonly="" style="background: white" value="{{ $perusahaan->email }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="fax">Fax</label>
                    <input type="text" id="fax" class="form-control form-control-alternative" readonly="" style="background: white" value="{{ $perusahaan->fax }}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="situs">Situs</label>
                    <input type="text" id="situs" class="form-control form-control-alternative" readonly="" style="background: white" value="{{ $perusahaan->site }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="facebook">Facebook</label>
                    <input type="text" readonly="" id="facebook" class="form-control form-control-alternative" readonly="" style="background: white" value="{{ $perusahaan->facebook }}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="instagram">Instagram</label>
                    <input type="text" id="instagram" class="form-control form-control-alternative" readonly="" style="background: white" value="{{ $perusahaan->instagram }}">
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4">
            <!-- Address -->
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group focused">
                    <label class="form-control-label" for="alamat">Alamat</label>
                    <textarea readonly="" style="background: white" class="form-control form-control-alternative" name="" id="" rows="4">{{ $perusahaan->alamat }}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4">
          </form>
        </div>
      </div>
    </div>
	</div>
@endsection
