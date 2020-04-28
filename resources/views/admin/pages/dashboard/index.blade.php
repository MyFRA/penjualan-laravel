@extends('admin.layouts.app')
@section('rekap')
          <div class="row">
            <div class="col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Anggota</h5>
                      <span class="h2 font-weight-bold mb-0">{{ number_format($jmlAnggota, 0, '.', '.') }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Penjualan</h5>
                      <span class="h2 font-weight-bold mb-0">{{ number_format($jmlPenjualan, 0, '.', '.') }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="ni ni-cart "></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Keuntungan</h5>
                      <span class="h2 font-weight-bold mb-0">Rp. {{ number_format($jmlKeuntungan, 0, '.', '.') }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-money-bill-wave"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Kas</h5>
                      <span class="h2 font-weight-bold mb-0">Rp. {{ number_format($jmlKas, 0, '.', '.') }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-wallet"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
@endsection
@section('content')
	<div class="row">
    <div class="col-xl-6 ">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Top Traffic</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th style="width: 10%" scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jml</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topTraffics as $traffic)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <th scope="row">
                    {{ $traffic->nama }}
                  </th>
                  <th>
                    {{ $traffic->jumlah }}
                  </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xl-6 ">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Penjualan /tahun</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th style="width: 10%" scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Jml</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penjualanPerTahun as $perTahun)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <th scope="row">
                    {{ $perTahun->year }}
                  </th>
                  <th>
                    {{ $perTahun->jumlah }}
                  </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
	</div>
  <div class="row mt-3">
    <div class="col-xl-6 ">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Penjualan /bulan</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th style="width: 10%" scope="col">No</th>
                <th scope="col">Bulan</th>
                <th scope="col">Jml</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penjualanPerBulan as $perBulan)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <th scope="row">
                    {{ $perBulan->month }} {{ $perBulan->year }}
                  </th>
                  <th>
                    {{ $perBulan->jumlah }}
                  </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xl-6 ">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Penjualan /hari</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th style="width: 10%" scope="col">No</th>
                <th scope="col">Hari</th>
                <th scope="col">Jml</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penjualanPerDay as $perDay)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <th scope="row">
                    {{ $perDay->dayname }}, {{ $perDay->day }} {{ $perDay->month }} {{ $perDay->year }}
                  </th>
                  <th>
                    {{ $perDay->jumlah }}
                  </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-xl-6 ">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Top Provinsi</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th style="width: 10%" scope="col">No</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Jml</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topProvinsi as $provinsi)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <th scope="row">
                    {{ $provinsi->provinsi }}
                  </th>
                  <th>
                    {{ $provinsi->jumlah }}
                  </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xl-6 ">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Top Kabupaten</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th style="width: 10%" scope="col">No</th>
                <th scope="col">Kabupaten</th>
                <th scope="col">Jml</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topKabupaten as $kabupaten)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <th scope="row">
                    {{ $kabupaten->kabupaten }}
                  </th>
                  <th>
                    {{ $kabupaten->jumlah }}
                  </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-xl-6 ">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Top Kecamatan</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th style="width: 10%" scope="col">No</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Jml</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topKecamatan as $kecamatan)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <th scope="row">
                    {{ $kecamatan->kecamatan }}
                  </th>
                  <th>
                    {{ $kecamatan->jumlah }}
                  </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xl-6 ">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Top Kelurahan</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th style="width: 10%" scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jml</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topKelurahan as $kelurahan)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <th scope="row">
                    {{ $kelurahan->kelurahan }}
                  </th>
                  <th>
                    {{ $kelurahan->jumlah }}
                  </th>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

@if(session('perusahaanSukses'))
<script>
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Perusahaan Berhasil Dibuat',
    showConfirmButton: false,
    timer: 1500
  })
</script>
@endif
@endsection