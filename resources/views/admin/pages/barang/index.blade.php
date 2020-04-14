@extends('admin.layouts.app')

@section('rekap')

  <div class="row">
    <div class="col-lg-7 col-md-9">
      <h1 class="display-2 text-white"><i class="fas fa-shopping-bag"></i> Produk</h1>
      <p class="text-white mt-0 mb-2">Menampilkan List Daftar Produk</p>
    </div>
    <div class="offset-md-1 col-md-2  offset-lg-1 col-lg-3">
      <h1 class="display-3 text-white float-right ">{{ $jmlProduk }} Produk</h1>
    </div>
  </div>

@endsection

@section('content')

  @if ( $user->role == 'pemilik' || $user->role == 'administrator' )
    <div class="row">
      <div style="margin-top: -20px" class="col-md-6 mb-3">
        <a href="{{ url('/admin/produk/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Produk</a> 
      </div>
    </div>
  @endif
	<div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <h1 class="display-3 mb-0">Daftar Produk</h1>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Jual</th>
                <th class="text-center" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    @if ( is_null($item->gambar) )
                      <div class="card text-center ml-1">
                        <i class="fas fa-shopping-bag fa-3x"></i>
                      </div>
                    @else
                      <a href="#" class="avatars rounded-circle mr-3">
                        <img class="img-thumbnail img-fluid" src="{{ asset('/storage/foto_produk') }}/{{ $item->gambar }}" alt="Card image cap">
                      </a>
                    @endif
                  </div>
                </th>
                <td>
                  {{ $item->nama }}
                </td>
                <td>
                  Rp. {{ number_format($item->harga_jual, 0, '.', '.') }}
                </td>
                <td class="text-center">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="btn  btn-success ml-3 mt-2" href="{{ url('/admin/produk') }}/{{encrypt($item->id)}}"><i class="fas fa-eye"></i> Lihat</a><br>
                      @if($user->role == 'pemilik' || $user->role == 'administrator')
                        <a class="btn  btn-primary ml-3 mt-2" href="{{ url('/admin/produk') }}/{{encrypt($item->id)}}/edit"><i class="fas fa-pen"></i> Edit</a><br>
                        <button type="button" onclick="onDestroy('{{ url('/admin/produk/' . encrypt($item->id)) }}', 'Yakin, produk {{ $item->nama }} akan dihapus?')" type="submit" class="btn  ml-3 mt-2 btn-danger "><i class="fa fa-trash"></i> Hapus</button>
                      @endif
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <br><br>
          </table>
        </div>
        <div class="card-footer py-4">
          <nav aria-label="...">
            {{ $items->onEachSide(5)->links() }}
          </nav>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')

  <form id="destroy_form" method="post" action="">
    @csrf
    @method('delete')
  </form>

@endsection

