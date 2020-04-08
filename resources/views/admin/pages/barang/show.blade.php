@extends('admin.layouts.app')
@section('rekap')
  <div class="row">
    <div class="col-lg-7 col-md-9">
        <h1 class="display-2 text-white">Detail Produk</h1>
        <p class="text-white mt-0 mb-2">{{ $item->nama }}</p>
      </div>
  </div>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-5">
  			<img class="img-thumbnail img-fluid" src="{{ asset('/storage') }}/{{ $namaPerusahaan }}/{{ $item->gambar }}" alt="Card image cap">
		</div>
		<div class="col-md-7">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
    			<h1 class="mt-3 ml-2 mr-2" style="font-size: 28px">{{ $item->nama }}</h1>
    			<div class="mt-4" style="width: 60%">
    				<table class="table">
        				<tr>
        					<th><h3>Harga</h3></th>
        					<th><h3>:</h3></th>
        					<th><h3>Rp. {{ $item->harga }}</h3></th>
        				</tr>
        				<tr>
        					<th><h3>Terjual</h3></th>
        					<th><h3>:</h3></th>
        					<th><h3>59</h3></th>
        				</tr>
        			</table>
    			</div>
    			<div class="mt-4">
    				<h2>Deskripsi : </h2>
    				<p style="text-indent: 20px; ">{{ $item->deskripsi }}</p>
    			</div>
    			<div>
    				<a href="{{ url('/admin/produk') }}" class="mt-2 btn btn-dark float-right">Kembali</a>
    			</div>
            </div>
          </div>
        </div>
	</div>
@endsection