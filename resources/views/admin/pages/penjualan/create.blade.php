@extends('admin.layouts.app')
@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white">Tambahkan Penjualan</h1>
	    	<p class="text-white mt-0 mb-5">Menampilkan Form Penjualan</p>
	  	</div>
	</div>

@endsection

@section('content')
	<div class="row">
		<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Form Penjualan</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="http://127.0.0.1:8000/admin/profil/eyJpdiI6IlJycTNQQUtKV2greDlUSlJtdUVPM0E9PSIsInZhbHVlIjoidDM5WWErdjFENnlZYjdRdWhCT21OUT09IiwibWFjIjoiMDFmMjM2MWRjYTljZTAwMzRkOTE3ZjYyYTIyZjA4MmRlMDIwMmM2ZjFhMWI2N2Y2YzI5ODRmMGM5ZWVkOWQ0NCJ9" enctype="multipart/form-data">
              	<input type="hidden" name="_token" value="xHtq0NKcILZJVdejcIDIGEpRjnBCxHnjLL8n9oYv">              	<input type="hidden" name="_method" value="PUT">                <h6 class="heading-small text-muted mb-4">Informasi Akun</h6>
                <div class="pl-lg-4">
                   <div class="row">
                    <div class="col-md-12">
                    	<div class="form-group focused">
						    <label for="penjual">Nama Penjual</label>
						    <select class="form-control" id="penjual">
						      <option>-- Pilih Penjual --</option>
						      @foreach ($penjual as $row)
						      	<option value="{{ encrypt($row->id) }}">{{ $row->name }}</option>
						      @endforeach
						    </select>
						</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nama_pembeli">Nama Pembeli</label>
                        <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control form-control-alternative" value="" placeholder="Masukan nama pembeli">
                      
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
						    <label for="penjual">Produk</label>
						    <select class="form-control" id="penjual">
						      <option>-- Pilih Produk --</option>
						      @foreach ($produk as $row)
						      	<option value="{{ encrypt($row->id) }}">{{ $row->nama }}</option>
						      @endforeach
						    </select>
						</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                       <div class="form-group focused">
						    <label for="penjual">Status</label>
						    <select class="form-control" id="penjual">
						      <option>-- Pilih Status --</option>
						      <option value="Online">Online</option>
						      <option value="Offline">Offline</option>
						    </select>
						</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="instansiasi">Sekolah / Instansiasi</label>
                        <input id="instansiasi" name="instansiasi" class="form-control form-control-alternative" placeholder="masukan nama sekolah / instansiasi" value="" type="text">
                      
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
					    
												    </div>
                  	</div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="umur">Umur</label>
                        <input id="umur" name="umur" class="form-control form-control-alternative" placeholder="masukan umur" value="18" type="number">
                      
						                      </div>
                    </div>
                    </div>
                  <div class="form-group focused">
                    <label class="form-control-label" for="deskripsi">Tentang Saya</label>
                    <textarea rows="4" name="deskripsi" class="form-control form-control-alternative" placeholder="Tentang saya...">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit praesentium aut tempore, atque, modi doloremque possimus pariatur ex earum dolore consequatur nisi voluptatibus delectus quam consectetur tenetur. Numquam autem iure accusamus nobis beatae voluptatibus, consequuntur.</textarea>
					                  </div>
                  <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
	</div>
@endsection