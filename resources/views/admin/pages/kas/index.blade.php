@extends('admin.layouts.app')

@section('rekap')

  <div class="row">
    <div class="col-lg-7 col-md-9">
      <h1 class="display-2 text-white"><i class="fas fa-wallet"></i> Kas</h1>
      <p class="text-white mt-0 mb-2">Menampilkan Jumlah kas saat ini</p>
    </div>
  </div>

@endsection

@section('content')
	<div class="row">
    <div class="col-xl-4 order-xl-2" >
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="card-body">
            <div class="row">
              <div class="col">
                  <h2 class="mt-4"><i class="fas fa-wallet fa-2x"></i>&nbsp; Total Kas</h2>
                  <h1 class="ml-4 mt-3 {{ ( $jumlahKas <= 0 ) ? 'text-danger' : 'text-success' }}"> RP {{ number_format($jumlahKas, 0, '.', '.') }}</h1>
                  @if ($user->role == 'pemilik' || $user->role == 'administrator')
                    <button type="button" data-toggle="modal" data-target="#ambilUang" class="btn btn-danger float-right mt-3 d-inline" >Ambil Uang</button>
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
		<div class="col-xl-8 order-xl-1">
      <div class="card shadow">
        <div class="card-header border-0">
          <h3 class="mb-0">Card tables</h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th style="min-width: 20%" scope="col">Kas</th>
                <th scope="col">Pesan</th>
                <th scope="col">Tanggal</th>
              </tr>
            </thead>
            <tbody>
            	@foreach ($kas as $row)
            		<tr>
                    <th scope="row">
                    	<span style="font-size: 17px" class="{{ ( $row->kas <= 0 ) ? 'text-danger' : 'text-success' }}" >
                    		<i class="{{ ( $row->kas <= 0 ) ? 'fas fa-minus' : 'fas fa-plus' }}" ></i> Rp. {{ number_format($row->kas, 0, '.', '.') }}
                    	</span>
                    </th>
                    <td>
                      {{ $row->pesan }}
                    </td>
                    <td>
                     {{ $row->created_at->format('l, d-M-Y')}}
                    </td>
                  </tr>
            	@endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer py-4">
          <nav aria-label="...">
            {{ $kas->onEachSide(5)->links() }}
          </nav>
        </div>
      </div>
    </div>

	</div>


  @if ($user->role == 'pemilik' || $user->role == 'administrator')
    <div class="modal fade" id="ambilUang" tabindex="-1" role="dialog" aria-labelledby="ambilUangLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ambilUangLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
      		<form method="POST" action="{{ url('/admin/kas') }}" >
      			 @csrf
      			<div class="form-group">
    			    <label for="kas">Jumlah Nominal</label>
    			    <input type="number" required="" class="form-control" id="kas" name="kas" placeholder="masukan nominal">
      			</div>
    		    <div class="form-group">
    			    <label for="pesan">Masukan Pesan</label>
    			    <textarea required="" class="form-control" id="pesan" name="pesan" rows="3"></textarea>
    		  	</div>
    		  </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger">Ambil Uang</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  @endif
@endsection