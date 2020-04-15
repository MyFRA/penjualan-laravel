
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MyPenjualan - Landing Page</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="{{ asset('/landing-template/vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/landing-template/vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/landing-template/vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('/landing-template/vendors/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/landing-template/vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/landing-template/vendors/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/landing-template/vendors/flat-icon/font/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('/landing-template/vendors/nice-select/nice-select.css') }}">

  <link rel="stylesheet" href="{{ asset('/landing-template/css/style.css') }}">
</head>
<body class="bg-shape">

  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('/landing-template/img/logo.png') }}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
            	<li></li>
            </ul>

            <div class="nav-right text-center text-lg-right py-4 py-lg-0 d-flex">
              <a class="button mt-3 mb-3" href="{{ url('/login') }}">Masuk</a>
              <a href="{{ url('/register') }}" style="background: #f5365c;" class="button ml-3 mt-3 mb-3">Daftar</a>
            </div>
            <br>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->


  <!--================Hero Banner Area Start =================-->
  <section class="hero-banner magic-ball">
    <div class="container">

      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
          <h1>MyPenjualan</h1><br>
          <h1>Kelola Penjualanmu</h1>
          <p>
          	MyPenjualan, Aplikasi yang bisa anda gunakan untuk melihat data penjualan, data transaksi, riset penjualan, dsb. 
          </p>
          <a class="button button-hero mt-4" style="background: #f5365c;" href="{{ url('/register') }}">Daftar Sekarang!</a>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
          <img class="img-fluid" src="{{ asset('/landing-template/img/home/hero-img.png') }}" alt="">
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->


  <!--================Service Area Start =================-->
  <section class="section-margin generic-margin">
    <div class="container">
      <div class="section-intro text-center">
        <img class="section-intro-img" src="{{ asset('/landing-template/img/home/section-icon.png') }}" alt="">
        <h2>MyFRA</h2>
        <p>Maturnuwun</p>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="service-card text-center">
            <div class="service-card-img">
              <img class="img-fluid" src="{{ asset('/landing-template/img/home/service1.png') }}" alt="">
            </div>
            <div class="service-card-body">
              <h3>Tomy Wibowo</h3>
              <p>
                Baru aja bisa ngobrol, &nbsp;tapi dia malah ngilang lagi <i class="fas fa-leaf"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-8">
          <div class="service-card text-center mt-5">
            <div class="service-card-body">
              <h2>Contact Us</h2><br>
              <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                  <h3>tomyntapss@gmail.com</h3>
                  <p>Hubungi saya, eapss ...</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Service Area End =================-->


  <!-- ================ start footer Area ================= -->
  <footer class="footer-area">
    <div class="container">
      <div class="footer-bottom">
        <div class="row align-items-center">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
            <a href="#"><i class="fab fa-behance"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ================ End footer Area ================= -->




  <script src="{{ asset('/landing-template/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('/landing-template/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/landing-template/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('/landing-template/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('/landing-template/js/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('/landing-template/js/mail-script.js') }}"></script>
  <script src="{{ asset('/landing-template/js/skrollr.min.js') }}"></script>
  <script src="{{ asset('/landing-template/js/main.js') }}"></script>
  <script>
  	function hover()
  	{
  		console.log('ok')
  	}
  </script>
</body>
</html>