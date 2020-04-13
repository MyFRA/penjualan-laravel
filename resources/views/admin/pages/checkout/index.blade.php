@extends('admin.layouts.app')

@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white"><i class="far fa-handshake"></i> Checkout</h1>
	    	<p class="text-white mt-0 mb-5">Halaman untuk checkout penjualan ( Pembayaran )</p>
	  	</div>
	</div>

@endsection

@section('content')
	<div class="row">
		<div class="col-xl-7">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="align-items-center table-flush mt-3">
						<tr>
							<th class="pr-2"><h4 class="card-title text-uppercase ">Penjual</h4></th>
							<th><h4 class="card-title text-uppercase ">:</h4></th>
							<th class="pl-2"><h4 class="card-title text-uppercase ">{{ $keranjang[0]->name }}</h4></th>
						</tr>
						<tr>
							<th class="pr-2"><h4 class="card-title text-uppercase ">Pembeli</h4></th>
							<th><h4 class="card-title text-uppercase ">:</h4></th>
							<th class="pl-2"><h4 class="card-title text-uppercase ">{{ $keranjang[0]->nama_pembeli }}</h4></th>
						</tr>
						<tr>
							<th class="pr-2"><h4 class="card-title text-uppercase ">Status</h4></th>
							<th><h4 class="card-title text-uppercase ">:</h4></th>
							<th class="pl-2"><h4 class="card-title text-uppercase ">{{ $keranjang[0]->status }}</h4></th>
						</tr>
						<tr>
							<th class="pr-2"><h4 class="card-title text-uppercase ">Traffic</h4></th>
							<th><h4 class="card-title text-uppercase ">:</h4></th>
							<th class="pl-2"><h4 class="card-title text-uppercase ">{{ $keranjang[0]->nama_traffic }}</h4></th>
						</tr>
					</table>	
            	</div>
				
				<hr>
				<h4 class="card-title text-uppercase ">Produk</h4>
				<hr style="margin-top: 0">
				<div class="table-responsive">
					@foreach ($keranjang as $cart)
						<table class="table align-items-center table-flush mt-4">
							<tr>
								<td class="pr-2"><h5 class="card-title text-uppercase ">Nama Produk</h5></td>
								<td><h5 class="card-title text-uppercase ">:</h5></td>
								<td class="pl-2"><h5 class="card-title text-uppercase text-muted">{{ $cart->nama_barang }}</h5></td>
							</tr>
							<tr>
								<td class="pr-2"><h5 class="card-title text-uppercase ">Jumlah</h5></td>
								<td><h5 class="card-title text-uppercase ">:</h5></td>
								<td class="pl-2"><h5 class="card-title text-uppercase text-muted">{{ $cart->jumlah }} {{ $cart->satuan }}</h5></td>
							</tr>
							<tr>
								<td class="pr-2"><h5 class="card-title text-uppercase ">Harga Jual /{{ $cart->satuan }}</h5></td>
								<td><h5 class="card-title text-uppercase ">:</h5></td>
								<td class="pl-2"><h5 class="card-title text-uppercase text-muted">Rp {{ number_format($cart->harga_jual, 0, '.', '.') }}</h5></td>
							</tr>
							<tr>
								<td class="pr-2"><h5 class="card-title text-uppercase ">Keuntungan /{{ $cart->satuan }}</h5></td>
								<td><h5 class="card-title text-uppercase ">:</h5></td>
								<td class="pl-2"><h3 class="card-title text-uppercase">Rp {{ number_format(($cart->harga_jual - $cart->harga_asli), 0, '.', '.') }}</h3></td>
							</tr>
							<tr>
								<td class="pr-2"><h5 class="card-title text-uppercase ">Keuntungan total</h5></td>
								<td><h5 class="card-title text-uppercase ">:</h5></td>
								<td class="pl-2"><h3 class="card-title text-uppercase text-">Rp {{ number_format($cart->keuntungan, 0, '.', '.') }}</h3></td>
							</tr>
							<tr>
								<td class="pr-2"><h5 class="card-title text-uppercase ">Biaya</h5></td>
								<td><h5 class="card-title text-uppercase ">:</h5></td>
								<td class="pl-2"><h5 class="card-title text-uppercase text-muted">harga jual &nbsp; x &nbsp; jumlah</h5></td>
							</tr>
							<tr>
								<td class="pr-2"><h5 class="card-title text-uppercase "></h5></td>
								<td><h5 class="card-title text-uppercase "></h5></td>
								<td class="pl-2"><h5 class="card-title text-uppercase text-muted">Rp {{ number_format($cart->harga_jual, 0, '.', '.') }} &nbsp; x &nbsp; {{ $cart->jumlah }}</h5></td>
							</tr>
							<tr>
								<td class="pr-2"><h5 class="card-title text-uppercase "></h5></td>
								<td><h5 class="card-title text-uppercase "></h5></td>
								<td class="pl-2"><h3 class="card-title text-uppercase">Rp {{ number_format($cart->total_biaya, 0, '.', '.') }}</h3></td>
							</tr>
						</table>
						<hr style="border: 1px solid black">
					@endforeach
					<p class="mt-2 text-dark " style="font-size: 18px"  >Alamat  &nbsp;&nbsp;:&nbsp; <span>{{ $keranjang[0]->provinsi }},&nbsp; {{ $keranjang[0]->kabupaten }},&nbsp; {{ $keranjang[0]->kecamatan }},&nbsp; {{ $keranjang[0]->kelurahan }}</span></p>
				</div>
				
            </div>
          </div>
        </div>
        <div class="col-xl-5">
        	<div class="card card-stats mb-4 mb-xl-0">
            	<div class="card-body">
            		<div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h2><i class="fas fa-money-bill-wave"></i> Total Biaya</h2>
            		<h1 class="ml-4 mt-4">RP {{ number_format($jumlah_biaya_total, 0, '.', '.') }}</h1>
            		<form method="post" id="input_penjualan" action="{{ url('/admin/checkout') }}">
						@csrf
            		</form>
            		<button onclick="input_penjualan()" type="button" class="btn btn-primary mt-3"><i class="fas fa-cash-register"></i> Bayar Sekarang</button>
                    </div>
                  </div>
                </div>
            		
            	</div>
        	</div>
        </div>
		
        
	</div>

@endsection

@section('script')

	<script>
		function input_penjualan () {
			let form = document.getElementById('input_penjualan').submit()
		}
	</script>

@endsection