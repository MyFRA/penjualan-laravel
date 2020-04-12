  <script src="{{ asset('/admin-template/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/admin-template/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <script src="{{ asset('/admin-template/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('/admin-template/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('/admin-template/js/argon-dashboard.min.js?v=1.1.0') }}"></script>
  <script src="{{ asset('/admin-template/sweetalert2/dist/sweetalert2.all.js') }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    
  </script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  <script src="{{ asset('/admin-template/js/app.js') }}">
    
  </script>
      @if (Session::get('gagal'))
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ Session::get('gagal') }}',
      })
    </script>
    @elseif(Session::get('success'))
    <script>
      Swal.fire(
        'Berhasil!',
        '{{ Session::get('success') }}',
        'success'
      )
    </script>
  @endif
  @yield('script')
