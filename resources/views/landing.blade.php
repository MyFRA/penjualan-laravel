
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Safario Travel - Home</title>
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
              {{-- <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>  --}}
{{--               <li class="nav-item"><a class="nav-link" href="about.html">About</a></li> 
              <li class="nav-item"><a class="nav-link" href="package.html">Packages</a>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="amentities.html">Amentities</a>                 
                </ul>
							</li>

              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog Single</a></li>
                  <li class="nav-item"><a class="nav-link" href="blog-details.html">Blog Details</a></li>
                </ul>
							</li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> --}}
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
          	MyPenjualan, Aplikasi yang bisa anda gunakan untuk mengelola Perusahaanmu, meliputi data penjualan, data transaksi, riset penjualan, dsb. 
          </p>
          <a class="button button-hero mt-4" style="background: #f5365c;" href="#">Daftar Sekarang!</a>
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
        <p>Fowl have fruit moveth male they are that place you will lesser</p>
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
              	Seseorang yang sedang menyukai pemrograman, dan menginginkan adanya seseorang yang bisa menyemangat... ahh,sudahlah... <i class="fas fa-leaf"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-8">
          <div class="service-card text-center mt-5">
            <div class="service-card-body">
              <h2>Contact Us</h2><br>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Buttonwood, California.</h3>
              <p>Rosemead, CA 91770</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
            </div>
          </div>
        </div>
{{--         <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            <div class="service-card-img">
              <img class="img-fluid" src="img/home/service2.png" alt="">
            </div>
            <div class="service-card-body">
              <h3>Flight Booking</h3>
              <p>Great so dominion two seed give dry rule be fowl him female you will gathered creeping and created air</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            <div class="service-card-img">
              <img class="img-fluid" src="img/home/service3.png" alt="">
            </div>
            <div class="service-card-body">
              <h3>Destination Booking</h3>
              <p>Great so dominion two seed give dry rule be fowl him female you will gathered creeping and created air</p>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
  <!--================Service Area End =================-->

{{-- 
  <!--================About Area Start =================-->
  <section class="bg-gray section-padding magic-ball magic-ball-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-6 mb-4 mb-md-0">
          <div class="about-img">
            <img class="img-fluid" src="img/home/about-img.png" alt="">
          </div>
        </div>
        <div class="col-lg-5 col-md-6 align-self-center about-content">
          <h2>Exploration is <br class="d-none d-xl-block"> really the essence <br class="d-none d-xl-block"> of the human spirit</h2>
          <p>Make she'd moved divided air. Whose tree that replenish tone hath own upon them it multiply was blessed is lights make gathering so day dominion so creeping air was made.</p>
          <a class="button" href="#">Learn More</a>
        </div>
      </div>
    </div>
  </section>
  <!--================About Area End =================-->

  <!--================Tour section Start =================-->
  <section class="section-margin pb-xl-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="tour-card">
            <img class="card-img rounded-0" src="img/home/tour1.png" alt="">
            <div class="tour-card-overlay">
              <div class="media">
                <div class="media-body">
                  <h4>Paris tour offer</h4>
                  <small>5 days offer</small>
                  <p>We proper guided our tourist</p>
                </div>
                <div class="media-price">
                  <h4 class="text-primary">$65/day</h4>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <div class="tour-content">
                <h2>We offer worldwise tour plan recently</h2>
                <p>Make she'd moved divided air. Whose tree that hath own upon them it multiply was blessed </p>
              </div>
            </div>
          </div>

          <div class="tour-card">
            <img class="card-img rounded-0" src="img/home/tour2.png" alt="">
            <div class="tour-card-overlay">
              <div class="media">
                <div class="media-body">
                  <h4>Paris tour offer</h4>
                  <small>5 days offer</small>
                  <p>We proper guided our tourist</p>
                </div>
                <div class="media-price">
                  <h4 class="text-primary">$65/day</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-7">
          <div class="tour-card">
            <img class="card-img rounded-0" src="img/home/tour3.png" alt="">
            <div class="tour-card-overlay">
              <div class="media">
                <div class="media-body">
                  <h4>Paris tour offer</h4>
                  <small>5 days offer</small>
                  <p>We proper guided our tourist</p>
                </div>
                <div class="media-price">
                  <h4 class="text-primary">$65/day</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5">
          <div class="tour-card">
            <img class="card-img rounded-0" src="img/home/tour4.png" alt="">
            <div class="tour-card-overlay">
              <div class="media">
                <div class="media-body">
                  <h4>Paris tour offer</h4>
                  <small>5 days offer</small>
                  <p>We proper guided our tourist</p>
                </div>
                <div class="media-price">
                  <h4 class="text-primary">$65/day</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Tour section End =================-->


  <!--================Testimonial section Start =================-->
  <section class="bg-gray section-padding magic-ball magic-ball-testimonial pb-xl-5">
    <div class="container">
      <div class="section-intro text-center pb-90px">
        <img class="section-intro-img" src="img/home/section-icon.png" alt="">
        <h2>Our client says</h2>
        <p>Fowl have fruit moveth male they are that place you will lesser</p>
      </div>


      <div class="owl-carousel owl-theme testimonial pb-xl-5">
        <div class="testimonial__item">
          <div class="row">
            <div class="col-md-3 col-lg-2 align-self-center">
              <div class="testimonial__img">
                <img class="card-img rounded-0" src="img/testimonial/t-slider1.png" alt="">
              </div>
            </div>
            <div class="col-md-9 col-lg-10">
              <div class="testimonial__content mt-3 mt-sm-0">
                <h3>Daniel heart</h3>
                <p>Project manager, Nestle</p>
                <p class="testimonial__i">Also made from. Give may saying meat there from heaven it lights face had is gathered god earth light for life may itself shall whales made they're blessed whales also made from give may saying meat. There from heaven it lights face had</p>
                <span class="testimonial__icon"><i class="ti-quote-right"></i></span>
              </div>
            </div>
          </div>
        </div>
        <div class="testimonial__item">
          <div class="row">
            <div class="col-md-3 col-lg-2 align-self-center">
              <div class="testimonial__img">
                <img class="card-img rounded-0" src="img/testimonial/t-slider1.png" alt="">
              </div>
            </div>
            <div class="col-md-9 col-lg-10">
              <div class="testimonial__content mt-3 mt-sm-0">
                <h3>Daniel heart</h3>
                <p>Project manager, Nestle</p>
                <p class="testimonial__i">Also made from. Give may saying meat there from heaven it lights face had is gathered god earth light for life may itself shall whales made they're blessed whales also made from give may saying meat. There from heaven it lights face had</p>
                <span class="testimonial__icon"><i class="ti-quote-right"></i></span>
              </div>
            </div>
          </div>
        </div>
        <div class="testimonial__item">
          <div class="row">
            <div class="col-md-3 col-lg-2 align-self-center">
              <div class="testimonial__img">
                <img class="card-img rounded-0" src="img/testimonial/t-slider1.png" alt="">
              </div>
            </div>
            <div class="col-md-9 col-lg-10">
              <div class="testimonial__content mt-3 mt-sm-0">
                <h3>Daniel heart</h3>
                <p>Project manager, Nestle</p>
                <p class="testimonial__i">Also made from. Give may saying meat there from heaven it lights face had is gathered god earth light for life may itself shall whales made they're blessed whales also made from give may saying meat. There from heaven it lights face had</p>
                <span class="testimonial__icon"><i class="ti-quote-right"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Testimonial section End =================-->


  <!--================Search Package section Start =================-->
  <section class="section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-xl-5 align-self-center mb-5 mb-lg-0">
          <div class="search-content">
            <h2>Search suitable <br class="d-none d-xl-block"> and affordable plan <br class="d-none d-xl-block"> for your tour</h2>
            <p>Make she'd moved divided air. Whose tree that replenish tone hath own upon them it multiply was blessed is lights make gathering so day dominion so creeping</p>
            <a class="button" href="#">Learn More</a>
          </div>
        </div>
        <div class="col-lg-6 col-xl-6 offset-xl-1">
          <div class="search-wrapper">
            <h3>Search Package</h3>

            <form class="search-form" action="#">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Recipient's username">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-search"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <select name="category" id="category">
                  <option value="disabled" disabled selected>Category</option>
                  <option value="8 AM">8 AM</option>
                  <option value="12 PM">12 PM</option>
                </select>
              </div>
              <div class="form-group">
                <select name="tourDucation" id="tourDuration">
                  <option value="disabled" disabled selected>Tour duration</option>
                  <option value="8 AM">8 AM</option>
                  <option value="12 PM">12 PM</option>
                </select>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="date" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="ti-notepad"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <select name="priceRange" id="priceRange">
                  <option value="disabled" disabled selected>Price range</option>
                  <option value="8 AM">8 AM</option>
                  <option value="12 PM">12 PM</option>
                </select>
              </div>
              <div class="form-group">
                <button class="button border-0 mt-3" type="submit">Search Package</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--================Search Package section End =================-->


  <!--================Blog section Start =================-->
  <section class="section-padding bg-gray">
    <div class="container">
      <div class="section-intro text-center pb-90px">
        <img class="section-intro-img" src="img/home/section-icon.png" alt="">
        <h2>From our Blog</h2>
        <p>Fowl have fruit moveth male they are that place you will lesser</p>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card-blog">
            <img class="card-img rounded-0" src="img/blog/blog-1.png" alt="">
            <div class="card-blog-body">
              <a href="#">
                <h4>Forest responds to consultation smoking in al fresco.</h4>
              </a>
              <ul class="card-blog-info">
                <li><a href="#"><span class="align-middle"><i class="ti-notepad"></i></span>Jan 03, 2018</a></li>
                <li><a href="#"><span class="align-middle"><i class="ti-comments-smiley"></i></span>03 Comments</a></li>
              </ul>
              <p>Varius metus morbi ferme libero vehic on porta malesuada ut interdu estmales torquent vehicula parturient </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card-blog">
            <img class="card-img rounded-0" src="img/blog/blog-2.png" alt="">
            <div class="card-blog-body">
              <a href="#">
                <h4>Forest responds to consultation smoking in al fresco.</h4>
              </a>
              <ul class="card-blog-info">
                <li><a href="#"><span class="align-middle"><i class="ti-notepad"></i></span>Jan 03, 2018</a></li>
                <li><a href="#"><span class="align-middle"><i class="ti-comments-smiley"></i></span>03 Comments</a></li>
              </ul>
              <p>Varius metus morbi ferme libero vehic on porta malesuada ut interdu estmales torquent vehicula parturient </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card-blog">
            <img class="card-img rounded-0" src="img/blog/blog-3.png" alt="">
            <div class="card-blog-body">
              <a href="#">
                <h4>Forest responds to consultation smoking in al fresco.</h4>
              </a>
              <ul class="card-blog-info">
                <li><a href="#"><span class="align-middle"><i class="ti-notepad"></i></span>Jan 03, 2018</a></li>
                <li><a href="#"><span class="align-middle"><i class="ti-comments-smiley"></i></span>03 Comments</a></li>
              </ul>
              <p>Varius metus morbi ferme libero vehic on porta malesuada ut interdu estmales torquent vehicula parturient </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Blog section End =================-->
 --}}

  <!-- ================ start footer Area ================= -->
  <footer class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>About Agency</h6>
            <p>
              The world has become so fast paced that people don’t want to stand by reading a page of information to be  they would much rather look at a presentation and understand
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Navigation Links</h6>
            <div class="row">
              <div class="col">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Feature</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Portfolio</a></li>
                </ul>
              </div>
              <div class="col">
                <ul>
                  <li><a href="#">Team</a></li>
                  <li><a href="#">Pricing</a></li>
                  <li><a href="#">Blog</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </div>										
            </div>							
          </div>
        </div>							
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Newsletter</h6>
            <p>
              For business professionals caught between high OEM price and mediocre print and graphic output.									
            </p>								
            <div id="mc_embed_signup">
              <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
                <div class="input-group d-flex flex-row">
                  <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                  <button class="btn bb-btn"><span class="lnr lnr-location"></span></button>		
                </div>									
                <div class="mt-10 info"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget mail-chimp">
            <h6 class="mb-20">InstaFeed</h6>
            <ul class="instafeed d-flex flex-wrap">
              <li><img src="img/instagram/i1.jpg" alt=""></li>
              <li><img src="img/instagram/i2.jpg" alt=""></li>
              <li><img src="img/instagram/i3.jpg" alt=""></li>
              <li><img src="img/instagram/i4.jpg" alt=""></li>
              <li><img src="img/instagram/i5.jpg" alt=""></li>
              <li><img src="img/instagram/i6.jpg" alt=""></li>
              <li><img src="img/instagram/i7.jpg" alt=""></li>
              <li><img src="img/instagram/i8.jpg" alt=""></li>
            </ul>
          </div>
        </div>						
      </div>

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