  <script src="{{ asset('/admin-template/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/admin-template/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <script src="{{ asset('/admin-template/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('/admin-template/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('/admin-template/js/argon-dashboard.min.js?v=1.1.0') }}"></script>
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
  @yield('script')