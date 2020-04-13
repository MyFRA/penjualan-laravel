@extends('admin.layouts.app')

@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white"><i class="far fa-handshake"></i> Detail Penjualan</h1>
	    	<p class="text-white mt-0 mb-5">Halaman detail penjualan ( Pembayaran )</p>
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
							<th class="pl-2"><h4 class="card-title text-uppercase ">{{ $item->nama_penjual }}</h4></th>
						</tr>
						<tr>
							<th class="pr-2"><h4 class="card-title text-uppercase ">Pembeli</h4></th>
							<th><h4 class="card-title text-uppercase ">:</h4></th>
							<th class="pl-2"><h4 class="card-title text-uppercase ">{{ $item->nama_pembeli }}</h4></th>
						</tr>
						<tr>
							<th class="pr-2"><h4 class="card-title text-uppercase ">Status</h4></th>
							<th><h4 class="card-title text-uppercase ">:</h4></th>
							<th class="pl-2"><h4 class="card-title text-uppercase ">{{ $item->status }}</h4></th>
						</tr>
						<tr>
							<th class="pr-2"><h4 class="card-title text-uppercase ">Traffic</h4></th>
							<th><h4 class="card-title text-uppercase ">:</h4></th>
							<th class="pl-2"><h4 class="card-title text-uppercase ">{{ $item->nama_traffic }}</h4></th>
						</tr>
					</table>	
            	</div>
				
				<hr>
				<h4 class="card-title text-uppercase ">Produk</h4>
				<hr style="margin-top: 0">
				<div class="table-responsive">
					<table class="table align-items-center table-flush mt-4">
						<tr>
							<td class="pr-2"><h5 class="card-title text-uppercase ">Nama Produk</h5></td>
							<td><h5 class="card-title text-uppercase ">:</h5></td>
							<td class="pl-2"><h5 class="card-title text-uppercase text-muted">{{ $item->nama_barang }}</h5></td>
						</tr>
						<tr>
							<td class="pr-2"><h5 class="card-title text-uppercase ">Harga Jual</h5></td>
							<td><h5 class="card-title text-uppercase ">:</h5></td>
							<td class="pl-2"><h5 class="card-title text-uppercase text-muted">Rp {{ number_format($item->harga_jual, 0, '.', '.') }}</h5></td>
						</tr>
						<tr>
							<td class="pr-2"><h5 class="card-title text-uppercase ">Jumlah</h5></td>
							<td><h5 class="card-title text-uppercase ">:</h5></td>
							<td class="pl-2"><h5 class="card-title text-uppercase text-muted">{{ $item->jumlah }} {{ $item->satuan }}</h5></td>
						</tr>
						<tr>
							<td class="pr-2"><h5 class="card-title text-uppercase ">Keuntungan /pcs</h5></td>
							<td><h5 class="card-title text-uppercase ">:</h5></td>
							<td class="pl-2"><h3 class="card-title text-uppercase">Rp {{ number_format(($item->harga_jual - $item->harga_asli), 0, '.', '.') }}</h3></td>
						</tr>
						<tr>
							<td class="pr-2"><h5 class="card-title text-uppercase ">Keuntungan total</h5></td>
							<td><h5 class="card-title text-uppercase ">:</h5></td>
							<td class="pl-2"><h3 class="card-title text-uppercase text-">Rp {{ number_format($item->keuntungan, 0, '.', '.') }}</h3></td>
						</tr>
						<tr>
							<td class="pr-2"><h5 class="card-title text-uppercase ">Biaya</h5></td>
							<td><h5 class="card-title text-uppercase ">:</h5></td>
							<td class="pl-2"><h5 class="card-title text-uppercase text-muted">harga jual &nbsp; x &nbsp; jumlah</h5></td>
						</tr>
						<tr>
							<td class="pr-2"><h5 class="card-title text-uppercase "></h5></td>
							<td><h5 class="card-title text-uppercase "></h5></td>
							<td class="pl-2"><h5 class="card-title text-uppercase text-muted">Rp {{ number_format($item->harga_jual, 0, '.', '.') }} &nbsp; x &nbsp; {{ $item->jumlah }} {{ $item->satuan }}</h5></td>
						</tr>
						<tr>
							<td class="pr-2"><h5 class="card-title text-uppercase "></h5></td>
							<td><h5 class="card-title text-uppercase "></h5></td>
							<td class="pl-2"><h3 class="card-title text-uppercase">Rp {{ number_format($item->total_biaya, 0, '.', '.') }}</h3></td>
						</tr>
						<tr>
							<td class="pr-2"><h5 class="card-title text-uppercase ">Tanggal</h5></td>
							<td><h5 class="card-title text-uppercase "></h5></td>
							<td class="pl-2"><h3 class="card-title text-uppercase">{{ $item->created_at->format('l d-M-Y') }} </h3></td>
						</tr>
					</table>
					<hr style="border: 1px solid black">
					<p class="mt-2 text-dark " style="font-size: 18px"  >Alamat  &nbsp;&nbsp;:&nbsp; <span>{{ $item->provinsi }},&nbsp; {{ $item->kabupaten }},&nbsp; {{ $item->kecamatan }},&nbsp; {{ $item->kelurahan }}</span></p>
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
		            			<h1 class="ml-4 mt-3">RP {{ number_format($item->total_biaya, 0, '.', '.') }}</h1>
		            			<hr>
		                      	<h2 class="mt-4"><i class="fas fa-hand-holding-usd"></i> Total Keuntungan</h2>
		            			<h1 class="ml-4 mt-3 text-success"><i class="fas fa-plus"></i> RP {{ number_format($item->keuntungan, 0, '.', '.') }}</h1>
		                      	<h2 class="mt-4"><i class="fas fa-wallet"></i> Masuk Kas</h2>
		            			<h1 class="ml-4 mt-3 text-success" ><i class="fas fa-plus"></i> RP {{ number_format($item->total_biaya, 0, '.', '.') }}</h1>
								<a class="btn btn-dark float-right mt-3" href="{{ url('/admin/penjualan') }}">Kembali</a>
                    		</div>
                  		</div>
                	</div>
            	</div>
        	</div>
        </div>
	</div>

@endsection
