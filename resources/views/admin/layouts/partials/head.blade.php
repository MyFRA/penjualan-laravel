<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    MyPenjualan | {{ $title }}
  </title>
  <!-- Favicon -->
  <link href="{{ asset('/admin-template/img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('/admin-template/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('/admin-template/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('/admin-template/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
  @if (session('success'))
    <script>
        Swal.fire(
          'Berhasil',
          '{{ session('success') }}',
          'success'
        )
    </script>
@elseif(session('gagal'))
    <script>
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '{{ session('gagal') }}',
        })
    </script>
@endif
  @yield('stylesheet')

</head>
