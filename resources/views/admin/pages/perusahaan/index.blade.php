@extends('admin.layouts.app')
@section('content')
	<div class="row">
		<div class="col-xl-6  col-lg-6">
      		<div class="card card-stats mb-4 mb-xl-0" >
        		<div class="card-body">
          			<div class="row">
            			<div class="col">
              				<h5 class="card-title text-uppercase text-muted mb-0">Perusahaan</h5>
              				<span class="h2 font-weight-bold mb-0">Kamu Belum Mempunyai Perusahaan, Ayo Buat Sekarang !</span>
            			</div>
            			<div class="col-auto">
              				<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                				<i class="fas fa-chart-bar"></i>
             	 			</div>
            			</div>
          			</div>
      				<p class="mt-3 mb-0 text-muted text-sm">
      					<button type="submit" class="btn-lg btn btn-primary" data-toggle="modal" data-target="#exampleModal">Buat Perusahaan</button>
      				</p>
        		</div>
      		</div>
    	</div>
	</div>























	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/admin/perusahaan') }}">
          @csrf
    		  <div class="form-group">
    		    <label for="nama">Nama Perusahaan</label>
    		    <input type="text" autocomplete="off" required="" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Masukan nama perusahaan">
    		  </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Buat</button>
          </div>
        </form>

      </div>
      
    </div>
  </div>
</div>
@endsection

