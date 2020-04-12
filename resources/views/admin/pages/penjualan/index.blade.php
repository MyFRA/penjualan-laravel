@extends('admin.layouts.app')
@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white"><i class="fas fa-poll-h"></i> &nbsp;Penjualan</h1>
	    	<p class="text-white mt-0 mb-5">Menampilkan Rincian Data Penjualan</p>
	  	</div>
	</div>

	<div class="row">
		<div class="col">
			<a href="{{ url('/admin/keranjang/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp;Tambah Penjualan</a>
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
                    <th scope="col">Status</th>
                    <th scope="col">Traffic</th>
                    <th scope="col">Jml</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($penjualan as $sell)
                    <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatars rounded-circle mr-3">
                          <img alt="Image placeholder" src="{{ asset('/storage/foto_produk/'. $sell->gambar) }}">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{ $sell->nama_barang }}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                     {{ $sell->nama_penjual }}
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class=" {{ $sell->status == 'Offline' ? 'bg-warning' : 'bg-success' }} "></i> {{ $sell->status }}
                      </span>
                    </td>
                    <td>
                      {{ $sell->nama_traffic }}
                    </td>
                    <td>
                      {{ $sell->jumlah }} {{ $sell->satuan }}
                    </td>
                    <td>
                      {{ $sell->created_at->format('l, d, M, Y') }}
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="btn  btn-success ml-3 mt-2" href="{{ url('/admin/penjualan') }}/{{encrypt($sell->id)}}"><i class="fas fa-eye"></i> Detail</a><br>
                          <button name="submit" onclick="onDestroy('{{ url('/admin/penjualan/' . encrypt($sell->id)) }}', 'Yakin penjualan akan dihapus?')" type="submit" class="btn  ml-3 mt-2 btn-danger "><i class="fa fa-trash"></i> Hapus</button>
                            {{-- <button type="submit" class="btn btn-danger ml-3 mt-2" ><i class="fas fa-trash"></i> Hapus</button> --}}
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
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

@section('script')
  <form class="d-inline" id="destroy_form" action="" method="post">
    @method('DELETE')
    @csrf
  </form>
@endsection