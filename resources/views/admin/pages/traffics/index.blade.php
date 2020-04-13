@extends('admin.layouts.app')

@section('rekap')

	<div class="row">
		<div class="col-lg-7 col-md-10">
	    	<h1 class="display-2 text-white"><i class="fas fa-map "></i> Traffics</h1>
	  	</div>
	</div>


@endsection

@section('content')
	    <div class="row mt-4">
		    <div class="col-xl-4">
          <div class="card bg-secondary shadow">
            <div class="card-body">
              <form method="post" action="{{ url('/admin/traffics') }}">
              	@csrf
                <h6 class="heading-small text-muted mb-4">Tambahkan Traffic</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="nama" >Nama</label>
                        <input type="text" id="nama" name="nama" required="" class="form-control form-control-alternative" value="{{ old('nama') }}">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-2">
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
              </form>
            </div>
          </div>
        </div>
		    <div class="col-xl-4 offset-xl-1">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">List Traffic</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama</th>
                    <th class="text-center" scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach ($traffics as $traffic)
              		  <tr>
	                    <th scope="row">
	                      {{ $traffic->nama }}
	                    </th>
	                    <td class="text-center text-white">
	                      <a id="edit" data="{{ url('/admin/traffics/' . encrypt($traffic->id)) }}" href="{{ url('/admin/traffics/' . encrypt($traffic->id) . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
	                      <button type="button" onclick="onDestroy('{{ url('/admin/traffics/' . encrypt($traffic->id)) }}', 'Traffic {{$traffic->nama}} akan dihapus?')" data="" class="btn btn-sm btn-danger">Hapus</a>
	                    </td>
	                  </tr>
                	@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <button id="buttonModal" style="display: none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"></button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateTraffic" method="post" action="">
        @csrf
        @method('PUT')
        <h6 class="heading-small text-muted mb-4">Edit Traffic</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group focused">
                <label class="form-control-label" for="nama" >Nama</label>
                <input type="text" id="namaUpdate" name="nama" required="" class="form-control form-control-alternative" value="{{ old('nama') }}">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
  <form id="destroy_form" action="" method="POST" style="display: none;">
    @csrf
    @method('delete')
  </form>

	<script>
		const tombolEdit  = document.querySelectorAll('a#edit');
		const formUpdate  = document.getElementById('updateTraffic');

		tombolEdit.forEach(function (e) {
			e.addEventListener('click', function (e) {
				e.preventDefault()
				var xhr = new XMLHttpRequest();

				const url = this.getAttribute('href')
				const action = this.getAttribute('data')
				document.getElementById('buttonModal').click()

				xhr.onreadystatechange = function() {

					if( xhr.readyState == 4 && xhr.status == 200 ) {
						trafficById = JSON.parse(xhr.response) 
						
						const namaUpdate = document.getElementById('namaUpdate')

						namaUpdate.setAttribute('value', trafficById.nama)
						formUpdate.action = action
					}
				}

				xhr.open('GET', url, true);
				xhr.send()
			})
		})
  </script>

@endsection