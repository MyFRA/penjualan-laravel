@extends('admin.layouts.app')
@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white">Penjualan</h1>
	    	<p class="text-white mt-0 mb-5">Menampilkan Rincian Data Penjualan</p>
	  	</div>
	</div>

	<div class="row">
		<div class="col">
			<a href="{{ url('/admin/penjualan/create') }}" class="btn btn-success">Tambah Penjualan</a>
		</div>
	</div>
@endsection

@section('content')
<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">10 Penjualan</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Produk</th>
                    <th scope="col">Penjual</th>
                    <th scope="col">Traffic</th>
                    <th scope="col">Jml</th>
                    <th scope="col">Keuntungan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatars rounded-circle mr-3">
                          <img alt="Image placeholder" src="http://127.0.0.1:8000/storage/Perum Susanti Nasyidah edit/Hydrangeas-1586424512.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Lily HomeCare Pewangi Pakaian</span>
                        </div>
                      </div>
                    </th>
                    <td>
                     lorem10
                    </td>
                    <td class="text-center">

                    </td>
                    <td>
                      
                    </td>
                    <td></td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> offline
                      </span>
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection