@extends('admin.layouts.app')
@section('content')
	<div class="row">
		<div class="col-xl-8">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Total orders</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
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
	</div>
@endsection