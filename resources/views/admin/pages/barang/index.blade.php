@extends('admin.layouts.app')

@section('rekap')

  <div class="row">
    <div class="col-lg-7 col-md-9">
        <h1 class="display-2 text-white">{{ $namaPerusahaan }}</h1>
        <p class="text-white mt-0 mb-2">Belanja Gampang Penak Banget Lah Tur Ora Pusing</p>
      </div>
      <div class="offset-md-1 col-md-2  offset-lg-1 col-lg-3">
        <h1 class="display-3 text-white float-right ">{{ $jmlProduk }} Produk</h1>
      </div>
  </div>
@endsection

@section('content')
	<div class="row">
		<div style="margin-top: -20px" class="col-md-6 mb-3">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahProduk">Tambah Produk</button> 
		  @if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  <li style="font-size: 23px; list-style: none;" class="mb-2 ml-1">Alasan</li>
                  @foreach ($errors->all() as $error)
                      <li class="mt-2" style="font-size: 15px">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
	</div>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Terjual</th>
                    <th class="text-center" scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                          @if ($item->gambar != NULL)
                            <a href="#" class="avatars rounded-circle mr-3">
                            <img src="{{ asset('/storage') }}/{{ $namaPerusahaan }}/{{ $item->gambar }}">
                          @endif
                        </a>
                      </div>
                    </th>
                    <td>
                      {{ $item->nama }}
                    </td>
                    <td>
                      Rp. {{ $item->harga }}
                    </td>
                    <td>
                      50 Pcs
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="btn  btn-success ml-3 mt-2" href="{{ url('/admin/produk') }}/{{encrypt($item->id)}}"><i class="fas fa-eye"></i> Lihat</a><br>
                          <a class="btn  btn-primary ml-3 mt-2" href="{{ url('/admin/produk') }}/{{encrypt($item->id)}}/edit"><i class="fas fa-pen"></i> Edit</a><br>
                          <form class="d-inline" id="data-{{ $item->id }}"action="{{ url('/admin/produk') }}/{{encrypt($item->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                        </form>
                          <button name="submit" onclick="deleteRow( {{ $item->id }},'{{ $item->nama }}' )" type="submit" class="btn  ml-3 mt-2 btn-danger "><i class="fa fa-trash"></i>Hapus</button>
                            {{-- <button type="submit" class="btn btn-danger ml-3 mt-2" ><i class="fas fa-trash"></i> Hapus</button> --}}
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









      <!-- Modal -->
<div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" enctype="multipart/form-data">
        	@csrf
		  <div class="form-group">
		    <label for="nama">Nama</label>
		    <input type="text" required="" class="form-control" id="nama" name="nama" placeholder="Masukan nama produk">
		  </div>
		  <div class="form-group">
		    <label for="harga_asli">Harga Asli</label>
		    <input type="number" required="" class="form-control" id="harga_asli" name="harga_asli" placeholder="Masukan harga asli produk">
		  </div>
      <div class="form-group">
        <label for="harga_jual">Harga Jual</label>
        <input type="number" required="" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukan harga jual produk">
      </div>
      <div class="form-group">
        <label for="satuan">Satuan</label>
        <input type="text" required="" class="form-control" id="satuan" name="satuan" placeholder="contoh: pcs, kg, butir, dll">
      </div>
		  <div class="form-group">
		    <label for="gambar">Gambar</label>
		    <input type="file" class="form-control-file" id="gambar" name="gambar">
		  </div>
		   <div class="form-group">
		    <label for="deskripsi">Deskripsi</label>
		    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
      </div>
      </form>
    </div>
  </div>
</div>


@endsection

@section('script')
@if (session('gagal'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: "{{ session('gagal') }}",
      footer: '<a href>Laporkan Masalah</a>'
    })
  </script>
@elseif(session('success'))
  <script>
    Swal.fire(
      'Berhasil',
      '{{ session('success') }}',
      'success'
    )
  </script>
@endif
<script>
  function deleteRow(id, name)
  {
      Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Produk " + name + " akan dihapus",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus!'
    }).then((willDelete) => {
      if (willDelete.value) {
        $('#data-' + id).submit();
      }


    });
  }
</script>
@endsection