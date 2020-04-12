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
		<div class="col-xl-7 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Form Penjualan</h3>
            </div>
          </div>
        </div>
        <div class="card-body">



          @if ($keranjang->count() < 0)
            <form method="POST" action="{{ url('/admin/keranjang') }}" >
              @csrf
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                          <label for="penjual">Nama Penjual</label>
                          <select name="penjual" class="form-control" id="penjual" required="">
                            <option selected="" disabled="" value="">-- Pilih Penjual --</option>
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
                  <div class="row">
                    <div class="col-md-12">
                       <div class="form-group focused">
                          <label for="status">Status</label>
                          <select name="status" class="form-control" id="status" required>
                            <option selected disabled="" value="">-- Pilih Status --</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label for="traffics_id">Traffic</label>
                        <select class="form-control" name="traffics_id" id="traffics_id" required>
                          <option selected disabled="" value="">-- Pilih Traffic --</option>
                          @foreach ($tarffics as $traffic)
                            <option value="{{ $traffic->id }}">{{ $traffic->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">



              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                        <label for="barang_id">Produk</label>
                        <select class="form-control" name="barang_id" id="barang_id" required>
                          <option selected disabled="" value="">-- Pilih Produk --</option>
                          @foreach ($produk as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="jumlah">Jumlah Produk</label>
                      <input type="number" name="jumlah" id="jumlah" class="form-control form-control-alternative" value="" placeholder="Masukan jumlah">
                    
                    </div>
                  </div>
                </div>
              </div>


              <hr class="my-4">
              <!-- Description -->
              <div class="pl-lg-4">
                <div class="row">
                  </div>
                <button type="submit" class="btn btn-primary float-right">Masukan Keranjang</button>
              </div>
            </form>
          @elseif( $keranjang->count() > 0  )
            <form method="POST" action="{{ url('/admin/keranjang') }}" >
              @csrf
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                          <label for="penjual">Nama Penjual</label>
                          <select name="penjual" class="form-control" id="penjual" required="">
                            <option selected="" disabled="" value="">-- Pilih Penjual --</option>
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
                  <div class="row">
                    <div class="col-md-12">
                       <div class="form-group focused">
                          <label for="status">Status</label>
                          <select name="status" class="form-control" id="status" required>
                            <option selected disabled="" value="">-- Pilih Status --</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label for="traffics_id">Traffic</label>
                        <select class="form-control" name="traffics_id" id="traffics_id" required>
                          <option selected disabled="" value="">-- Pilih Traffic --</option>
                          @foreach ($tarffics as $traffic)
                            <option value="{{ $traffic->id }}">{{ $traffic->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">



              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                        <label for="barang_id">Produk</label>
                        <select class="form-control" name="barang_id" id="barang_id" required>
                          <option selected disabled="" value="">-- Pilih Produk --</option>
                          @foreach ($produk as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="jumlah">Jumlah Produk</label>
                      <input type="number" name="jumlah" id="jumlah" class="form-control form-control-alternative" value="" placeholder="Masukan jumlah">
                    
                    </div>
                  </div>
                </div>
              </div>


              <hr class="my-4">
              <!-- Description -->
              <div class="pl-lg-4">
                <div class="row">
                  </div>
                <button type="submit" class="btn btn-primary float-right">Masukan Keranjang</button>
              </div>
            </form>
          @endif
          





        </div>
      </div>
    </div>
    @if ( $keranjang->count() > 0 )
      <div class="col-xl-5 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Keranjang</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="http://127.0.0.1:8000/admin/profil/eyJpdiI6IlJycTNQQUtKV2greDlUSlJtdUVPM0E9PSIsInZhbHVlIjoidDM5WWErdjFENnlZYjdRdWhCT21OUT09IiwibWFjIjoiMDFmMjM2MWRjYTljZTAwMzRkOTE3ZjYyYTIyZjA4MmRlMDIwMmM2ZjFhMWI2N2Y2YzI5ODRmMGM5ZWVkOWQ0NCJ9" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="xHtq0NKcILZJVdejcIDIGEpRjnBCxHnjLL8n9oYv">                <input type="hidden" name="_method" value="PUT"> 
              <div class="pl-lg-4">
                 <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label for="penjual">Nama Penjual</label>
                      <input type="text" name="nama_pembeli" id="nama_pembeli" readonly="" class="form-control form-control-alternative" value="Tomy Wibowo" placeholder="">
              
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="nama_pembeli">Nama Pembeli</label>
                      <input type="text" name="nama_pembeli" id="nama_pembeli" readonly="" class="form-control form-control-alternative" value="Fra" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <div class="row">
                <div class="col">
                  <table class="table">
                    @foreach ($keranjang as $cart)
                      <tr>
                        <th>Produk</th>
                        <th>:</th>
                        <th>{{ $cart->nama }}</th>
                      </tr>
                      <tr>
                        <th>Jumlah</th>
                        <th>:</th>
                        <th>{{ $cart->jumlah }}</th>
                      </tr>
                      <tr>
                        <th>Aksi</th>
                        <th>:</th>
                        <th><button type="button" onclick="onDestroy('{{ url('/admin/keranjang/' . encrypt($cart->id)) }}', 'Yakin!')" class="btn btn-sm btn-danger" href="">Hapus</button></th>
                      </tr>
                      <tr>
                        <th colspan="3"></th>
                        
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
              <!-- Description -->
                <button type="submit" class="btn btn-primary float-right">Lihat Resi</button>
            </form>
          </div>
        </div>
      </div>
    @endif
    
	</div>
@endsection

@section('stylesheet')
  <link rel="stylesheet" href="{{ url('/admin-template/sweetalert2/dist/sweetalert2.css') }}">
@endsection

@section('script')
  <form id="destroy_form" action="" method="POST" style="display: none;">
    @csrf
    @method('delete')
  </form>

  <script src="{{ asset('/admin-template/sweetalert2/dist/sweetalert2.all.js') }}"></script>
@endsection