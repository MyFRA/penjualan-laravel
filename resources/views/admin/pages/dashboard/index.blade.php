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
		<div class="col-xl-8">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performa</h6>
                  <h2 class="mb-0">Graffik Penjualan</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              Chart
              <div class="chart">
              	<div class="chartjs-size-monitor">
              		<div class="chartjs-size-monitor-expand">
              			<div class="">
              				
              			</div>
              		</div>
              		<div class="chartjs-size-monitor-shrink">
              			<div class="">
              				
              			</div>
              		</div>
              	</div>
                <canvas id="chart-orders" class="chart-canvas chartjs-render-monitor" style="display: block; width: 376px; height: 350px;" width="376" height="350">
                	
                </canvas>
              </div>
            </div>
          </div>
    </div>
    <div class="col-xl-4 ">
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
                    {{ $traffic->jumlahOrder }}
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
                  <th>1</th>
                  <th scope="row">
                    {{ $provinsi->provinsi }}
                  </th>
                  <th>
                    {{ $provinsi->jumlahProvinsi }}
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
                  <th>1</th>
                  <th scope="row">
                    {{ $kabupaten->kabupaten }}
                  </th>
                  <th>
                    {{ $kabupaten->jumlahKabupaten }}
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
                      <th>1</th>
                      <th scope="row">
                        {{ $kecamatan->kecamatan }}
                      </th>
                      <th>
                        {{ $kecamatan->jumlahKecamatan }}
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
                      <th>1</th>
                      <th scope="row">
                        {{ $kelurahan->kelurahan }}
                      </th>
                      <th>
                        {{ $kelurahan->jumlahKelurahan }}
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
<script>
  var OrdersChart = (function() {
  
  var $chart = $('#chart-orders');
  var $ordersSelect = $('[name="ordersSelect"]');


  //
  // Methods
  //

  // Init chart
  function initChart($chart) {

    // Create chart
    var ordersChart = new Chart($chart, {
      type: 'bar',
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              lineWidth: 1,
              color: '#dfe2e6',
              zeroLineColor: '#dfe2e6'
            },
            ticks: {
              callback: function(value) {
                if (!(value % 10)) {
                  //return '$' + value + 'k'
                  return value
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">' + yLabel + '</span>';

              return content;
            }
          }
        }
      },
      data: {
        labels: [
          <?php foreach ($penjualanPerBulan as $perBulan) {?>
            <?= " '" . $perBulan->month . "'," ?>
          <?php } ?>
          
        ],
        datasets: [{
          label: 'Sales',
          data: [
            <?php foreach ($penjualanPerBulan as $jmlPerBulan) {?>
              <?= $jmlPerBulan->jumlah . ", " ?>
            <?php } ?>
          ]
        }]
      }
    });

    // Save to jQuery object
    $chart.data('chart', ordersChart);
  }


  // Init chart
  if ($chart.length) {
    initChart($chart);
  }

})();
</script>
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