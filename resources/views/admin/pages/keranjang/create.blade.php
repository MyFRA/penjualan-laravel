@extends('admin.layouts.app')
@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white"><i class="fas fa-shopping-cart"></i> Keranjang</h1>
	    	<p class="text-white mt-0 mb-5">Form Pengisian Penjualan</p>
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


          @if ($keranjang->count() <= 0)
            <form method="POST" action="{{ url('/admin/keranjang') }}" >
              @csrf
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                          <label for="penjual">Nama Penjual</label>
                          <select name="penjual" class="form-control" id="penjual" required=""  @error('penjual') style="border: 1px solid red" @enderror>
                            <option selected="" disabled="" value="">-- Pilih Penjual --</option>
                            @foreach ($penjual as $row)
                              <option value="{{ encrypt($row->id) }}" >{{ $row->name }}</option>
                            @endforeach
                          </select>
                          @error('penjual')
                            <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                          @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nama_pembeli">Nama Pembeli</label>
                        <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control form-control-alternative"  @error('nama_pembeli') style="border: 1px solid red" @enderror value="{{ old('nama_pembeli') ? old('nama_pembeli') : '' }}" placeholder="Masukan nama pembeli">
                        @error('nama_pembeli')
                          <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                       <div class="form-group focused">
                          <label for="status">Status</label>
                          <select name="status" class="form-control"  @error('status') style="border: 1px solid red" @enderror id="status" required>
                            <option selected disabled="" value="">-- Pilih Status --</option>
                            <option value="Online" {{ old('status') == 'Online' ? 'selected' : '' }}>Online</option>
                            <option value="Offline" {{ old('status') == 'Offline' ? 'selected' : '' }}>Offline</option>
                          </select>
                          @error('status')
                            <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                          @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label for="traffics_id">Traffic</label>
                        <select class="form-control" name="traffics_id"  @error('traffics_id') style="border: 1px solid red" @enderror id="traffics_id" required>
                          <option selected disabled="" value="">-- Pilih Traffic --</option>
                          @foreach ($tarffics as $traffic)
                            <option value="{{ $traffic->id }}" {{ old('traffics_id') == $traffic->id ? 'selected' : '' }}>{{ $traffic->nama }}</option>
                          @endforeach
                        </select>
                        @error('traffics_id')
                          <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                       <label for="form_sex">Provinsi <small>*</small></label>
                        <select class="form-control m-b"  @error('provinsi') style="border: 1px solid red" @enderror  id="propinsi">
                          <option selected="" value="">-- Pilih Provinsi --</option>
                       </select>
                        <input id="input_propinsi" name="provinsi" type="hidden" value="">
                        @error('provinsi')
                          <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                        @enderror
                     </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                       <label for="form_post">Kab / Kota <small>*</small></label>
                        <select class="form-control m-b"  @error('kabupaten') style="border: 1px solid red" @enderror  id="kabupaten">
                          <option selected="" value="">-- Pilih Kabupaten --</option>
                        </select>
                        <input id="input_kabupaten" name="kabupaten" type="hidden" value="">
                        @error('kabupaten')
                          <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                     <label for="form_sex">Kecamatan <small>*</small></label>
                        <select class="form-control m-b"  @error('kecamatan') style="border: 1px solid red" @enderror  id="kecamatan">
                       <option selected="" value="">-- Pilih Kecamatan --</option>
                     </select>
                        <input id="input_kecamatan" name="kecamatan" type="hidden" value="">
                        @error('kecamatan')
                          <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                     <label for="form_post">Kelurahan / Desa <small>*</small></label>
                      <select class="form-control m-b"  @error('kelurahan') style="border: 1px solid red" @enderror id="kelurahan">
                       <option selected="" value="">-- Pilih Kelurahan --</option>
                     </select>
                        <input id="input_kelurahan" name="kelurahan" type="hidden" value="">
                        @error('kelurahan')
                          <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                        @enderror
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
                        <select class="form-control"  @error('barang_id') style="border: 1px solid red" @enderror name="barang_id" id="barang_id" required>
                          <option selected disabled="" value="">-- Pilih Produk --</option>
                          @foreach ($produk as $row)
                            <option value="{{ $row->id }}" {{ old('barang_id') == $row->id ? 'selected' : ''}} >{{ $row->nama }}</option>
                          @endforeach
                        </select>
                        @error('barang_id')
                          <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="jumlah">Jumlah Produk</label>
                      <input type="number" name="jumlah"  @error('jumlah') style="border: 1px solid red" @enderror id="jumlah" class="form-control form-control-alternative" value="{{ old('jumlah') ? old('jumlah') : '' }}" placeholder="Masukan jumlah">
                      @error('jumlah')
                        <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>


              <hr class="my-4">
              <!-- Description -->
              <div class="pl-lg-4">
                <div class="row">
                  </div>
                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-shopping-cart"></i> Masukan Keranjang</button>
              </div>
            </form>
          @elseif( $keranjang->count() > 0  )
            <form method="POST" action="{{ url('/admin/keranjang/add') }}" >
              @csrf
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                        <label for="barang_id">Produk</label>
                        <select class="form-control" name="barang_id" id="barang_id"  required>
                          <option selected disabled="" value="">-- Pilih Produk --</option>
                          @foreach ($produk as $row)
                            <option value="{{ $row->id }}" {{ old('barang_id') == $row->id ? 'selected' : '' }}>{{ $row->nama }}</option>
                          @endforeach
                          @error('barang_id')
                            <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                          @enderror
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="jumlah">Jumlah Produk</label>
                      <input type="number" name="jumlah" id="jumlah" class="form-control form-control-alternative" value="{{ old('jumlah') ? old('jumlah') : '' }}" placeholder="Masukan jumlah">
                      @error('jumlah')
                        <h5 class="text-danger ml-2 mt-1"> {{ $message }} </h5>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>


              <hr class="my-4">
              <!-- Description -->
              <div class="pl-lg-4">
                <div class="row">
                  </div>
                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-shopping-cart"></i> Masukan Keranjang</button>
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
                <a href="{{ url('/admin/checkout') }}" class="btn btn-primary float-right"><i class="fas fa-money-check"></i>&nbsp; Lihat Resi</a>
          </div>
        </div>
      </div>
    @endif
    
	</div>
@endsection

@section('script')
  <form id="destroy_form" action="" method="POST" style="display: none;">
    @csrf
    @method('delete')
  </form>

  <script type = "text/javascript" >
      var return_first = function() {
          var tmp = null;
          $.ajax({
              'async': false,
              'type': "get",
              'global': false,
              'dataType': 'json',
              'url': 'https://x.rajaapi.com/poe',
              'success': function(data) {
                  tmp = data.token;
              }
          });
          return tmp;
      }();
  $(document).ready(function() {
      $.ajax({
          url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
          type: 'GET',
          dataType: 'json',
          success: function(json) {
              if (json.code == 200) {
                  for (i = 0; i < Object.keys(json.data).length; i++) {
                      $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                  }
              } else {
                  $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
              }
          }
      });
      $("#propinsi").change(function() {
          var propinsi = $("#propinsi").val();
          var textProv = $('#propinsi option:selected').text();
          $('#input_propinsi').val(textProv);
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
              data: "idpropinsi=" + propinsi,
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                  $("#kabupaten").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                      $('#kecamatan').html($('<option>').text('-- Pilih Kecamatan --').attr('value', '-- Pilih Kecamatan --'));
                      $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));

                  } else {
                      $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
      });
      $("#kabupaten").change(function() {
          var kabupaten = $("#kabupaten").val();
          var textKab = $('#kabupaten option:selected').text();
          $('#input_kabupaten').val(textKab);

          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kecamatan',
              data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi,
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                  $("#kecamatan").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kecamatan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                      $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));
                      
                  } else {
                      $('#kecamatan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
      });
      $("#kecamatan").change(function() {
          var kecamatan = $("#kecamatan").val();
          var textKec = $('#kecamatan option:selected').text();
          $('#input_kecamatan').val(textKec);
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kelurahan',
              data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi + "&idkecamatan=" + kecamatan,
              type: 'GET',
              dataType: 'json',
              cache: false,
              success: function(json) {
                  $("#kelurahan").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kelurahan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                  } else {
                      $('#kelurahan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
      });
      $("#kelurahan").change(function() {
          var textLur = $('#kelurahan option:selected').text();
          $('#input_kelurahan').val(textLur);
      });
  });
</script>
@endsection