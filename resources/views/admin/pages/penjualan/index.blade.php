@extends('admin.layouts.app')
@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white"><i class="fas fa-poll-h"></i> &nbsp;Penjualan</h1>
	    	<p class="text-white mt-0 mb-5">Menampilkan Rincian Data Penjualan</p>
	  	</div>
	</div>

  @if ($user->role == 'pemilik' || $user->role == 'administrator')
    <div class="row">
      <div class="col">
        <a href="{{ url('/admin/keranjang/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp;Tambah Penjualan</a>
      </div>
    </div>
  @endif

@endsection

@section('content')
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">{{ $totalPenjualan }} Penjualan</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"></th>
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
                        @if ( is_null($sell->gambar) )
                          <div class="card text-center ml-1">
                            <i class="fas fa-shopping-bag fa-3x"></i>
                          </div>
                        @else
                          <a href="#" class="avatars rounded-circle mr-3">
                            <img class="img-thumbnail img-fluid" src="{{ asset('/storage/foto_produk') }}/{{ $sell->gambar }}" alt="Card image cap">
                          </a>
                        @endif
                      </div>
                    </th>
                    <th>
                      {{ $sell->nama_barang }}
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
                          
                          @if ( $user->role == 'pemilik' || $user->role == 'administrator')
                            <button name="submit" onclick="onDestroy('{{ url('/admin/penjualan/' . encrypt($sell->id)) }}', 'Yakin penjualan akan dihapus?')" type="submit" class="btn  ml-3 mt-2 btn-danger "><i class="fa fa-trash"></i> Hapus</button>
                          @endif

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
                {{ $penjualan->onEachSide(5)->links() }}
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