<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Ticki</title>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="http://cdn.linearicons.com/free/1.0.0/icon-font.min.css" rel="stylesheet" type="text/css">

  <!-- Core stylesheets -->
  <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('assets/css/pixeladmin.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('assets/css/widgets.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="{{ URL::asset('assets/css/themes/default.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Landing page CSS -->
  <link href="{{ URL::asset('assets/css/landing.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

  <!-- Navbar -->

  <nav class="navbar px-navbar">
    <div class="container">
      <div class="navbar-header">
        <a href="#home" class="scroll-to navbar-brand">Ticki</a>
      </div>

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>

      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#features" class="scroll-to">FONCTIONNALITÉS</a></li>
          <li><a href="#pricing" class="scroll-to">PRIX</a></li>
          @guest
          <li><a href="{{route ('register')}}" class="btn-primary">JE DÉCOUVRE TICKI</a></li>
          <li><a href="{{route ('login')}}">SE CONNECTER</a></li>
          @else
          <li><a href="{{route ('login')}}" class="btn-primary">ACCEDER A MON ESPACE</a></li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero block -->

  <a class="position-relative" name="home"></a>
  <div id="landing-hero" class="text-xs-center clearfix">
    <div class="container">
      <!-- Header -->
      <h1 class="font-weight-semibold">Ticki</h1>
      <h2 class="font-weight-light">
        Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad
      </h2>

      <!-- Buttons -->
      <div>
        <a href="#" class="btn btn-rounded btn-xl btn-primary m-x-1">Souscrire</a>
        <a href="#" class="btn btn-xl btn-outline btn-outline-colorless-inverted btn-rounded m-x-1">
          En savoir plus
        </a>
      </div>

      <!-- App sample -->
      <div class="sample">
        <img src="assets/img/sample-img.png" alt="" class="sample-img">
        <img src="assets/img/sample-win.png" alt="" class="sample-win">
      </div>
    </div>
  </div>

  <!-- Features -->

  <a class="position-relative" name="features"></a>
  <div class="landing-section landing-features-grid bg-white b-y-1">
    <div class="container">
      <h1 class="landing-heading text-xs-center">Fonctionnalités</h1>
      <h2 class="landing-subheading text-xs-center text-muted">Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</h2>

      <div class="row">
        <div class="col-md-4">
          <i class="icon bg-primary lnr lnr-inbox"></i>
          <h3>29 integrated plugins</h3>
          <p>Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</p>
        </div>
        <div class="col-md-4">
          <i class="icon bg-primary lnr lnr-diamond"></i>
          <h3>13 exclusive plugins</h3>
          <p>Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</p>
        </div>
        <div class="col-md-4">
          <i class="icon bg-primary lnr lnr-chart-bars"></i>
          <h3>7 chart plugins</h3>
          <p>Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <i class="icon bg-primary lnr lnr-briefcase"></i>
          <h3>18 ready-to-use widgets</h3>
          <p>Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</p>
        </div>
        <div class="col-md-4">
          <i class="icon bg-primary lnr lnr-heart-pulse"></i>
          <h3>5 dashboards</h3>
          <p>Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</p>
        </div>
        <div class="col-md-4">
          <i class="icon bg-primary lnr lnr-file-empty"></i>
          <h3>24 pages</h3>
          <p>Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</p>
        </div>
      </div>

    </div>
  </div>

  <!-- Other Features -->

  <div class="landing-section landing-features bg-white b-b-1">
    <div class="container">
      <div class="col-md-7 text-xs-center text-md-left">
        <i class="icon lnr lnr-layers text-primary"></i>

        <h2 class="landing-heading">OTHER FEATURES</h2>
        <h3 class="landing-subheading text-muted">Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</h3>

        <ul class="list-group">
          <li class="list-group-item"><i class="list-group-icon lnr lnr-chevron-right"></i>Clean code base</li>
          <li class="list-group-item"><i class="list-group-icon lnr lnr-chevron-right"></i>Crafted with modern technologies</li>
          <li class="list-group-item"><i class="list-group-icon lnr lnr-chevron-right"></i>Built with performance in mind</li>
          <li class="list-group-item"><i class="list-group-icon lnr lnr-chevron-right"></i>Flexible and modular code structure</li>
          <li class="list-group-item"><i class="list-group-icon lnr lnr-chevron-right"></i>Built with mobile-first approach</li>
          <li class="list-group-item"><i class="list-group-icon lnr lnr-chevron-right"></i>Powerful layout with responsive functionality</li>
          <li class="list-group-item"><i class="list-group-icon lnr lnr-chevron-right"></i>Full support of RTL languages</li>
          <li class="list-group-item"><i class="list-group-icon lnr lnr-chevron-right"></i>Light and dark color schemes</li>
          <li class="list-group-item"><i class="list-group-icon lnr lnr-chevron-right"></i>Usage instructions for the variuous components</li>
        </ul>
      </div>

      <!-- spacer -->
      <div class="col-md-1 p-y-4"></div>

      <div class="col-md-4">
        <img data-src="assets/img/macbook.png" class="lazyload image pull-md-left">
      </div>
    </div>
  </div>

  <!-- Mobile support -->

  <div class="landing-section landing-features bg-white">
    <div class="container">
      <div class="col-md-4 text-xs-center">
        <img data-src="assets/img/iphone.png" class="lazyload image">
      </div>

      <!-- spacer -->
      <div class="col-md-1 p-y-4"></div>

      <div class="col-md-7">
        <i class="icon lnr lnr-tablet text-primary text-xs-center"></i>

        <h2 class="landing-heading text-xs-center">MOBILE SUPPORT</h2>
        <h3 class="landing-subheading text-muted text-xs-center">Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</h3>

        <div class="panel-group p-t-3 font-size-14" id="accordion-example">
          <div class="panel">
            <div class="panel-heading">
              <a class="accordion-toggle font-size-14" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne">
                Collapsible Group Item #1
              </a>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
                Lorem ipsum dolor sit amet, hendrerit quaerendum cu nam. Elitr sensibus incorrupte nam ex. Nusquam civibus sit ei, vel quem mucius cu. Nullam tibique an vel. Ne vix quodsi euismod, ei explicari efficiendi sea.
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <a class="accordion-toggle font-size-14 collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseTwo">
                Collapsible Group Item #2
              </a>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
                Lorem ipsum dolor sit amet, hendrerit quaerendum cu nam. Elitr sensibus incorrupte nam ex. Nusquam civibus sit ei, vel quem mucius cu. Nullam tibique an vel. Ne vix quodsi euismod, ei explicari efficiendi sea.
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <a class="accordion-toggle font-size-14 collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseThree">
                Collapsible Group Item #3
              </a>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">
                Lorem ipsum dolor sit amet, hendrerit quaerendum cu nam. Elitr sensibus incorrupte nam ex. Nusquam civibus sit ei, vel quem mucius cu. Nullam tibique an vel. Ne vix quodsi euismod, ei explicari efficiendi sea.
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <a class="accordion-toggle font-size-14 collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseFour">
                Collapsible Group Item #4
              </a>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
              <div class="panel-body">
                Lorem ipsum dolor sit amet, hendrerit quaerendum cu nam. Elitr sensibus incorrupte nam ex. Nusquam civibus sit ei, vel quem mucius cu. Nullam tibique an vel. Ne vix quodsi euismod, ei explicari efficiendi sea.
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <hr class="m-a-0">

  <!-- Pricing -->

  <a class="position-relative" name="pricing"></a>
  <div class="landing-section">
    <div class="container">
      <h1 class="landing-heading text-xs-center">Pricing</h1>
      <h2 class="landing-subheading text-muted text-xs-center">Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</h2>

      <div class="widget-pricing widget-pricing-simple widget-pricing-expanded">
        <div class="widget-pricing-inner row">
          <div class="col-md-4">
            <div class="widget-pricing-item">
              <h2 class="widget-pricing-plan m-a-0">SINGLE</h2>
              <div class="widget-pricing-section p-y-2 b-y-1 bg-white darken">
                <div class="widget-pricing-price font-size-24 font-weight-bold"><small>$</small>12</div>
              </div>
              <div class="widget-pricing-section font-size-15">
                <p>Customer support</p>
                <p>Free Updates</p>
                <p>Limited to one client</p>
                <p class="text-muted"><i class="lnr lnr-cross m-r-1 text-danger"></i>Multiple installation</p>
                <p class="text-muted"><i class="lnr lnr-cross m-r-1 text-danger"></i>Resale</p>
              </div>
              <div class="widget-pricing-section"><a href="https://wrapbootstrap.com/theme/pixeladmin-responsive-admin-theme-WB07403R9" type="button" class="btn btn-lg btn-primary">Get It!</a></div>
            </div>
          </div>

          <!-- spacer -->
          <div class="p-t-3 visible-xs visible-sm"></div>

          <div class="col-md-4">
            <div class="widget-pricing-item">
              <h2 class="widget-pricing-plan m-a-0">MULTIPLE</h2>
              <div class="widget-pricing-section p-y-2 b-y-1 bg-white darken">
                <div class="widget-pricing-price font-size-24 font-weight-bold"><small>$</small>60</div>
              </div>
              <div class="widget-pricing-section font-size-15">
                <p>Customer support</p>
                <p>Free Updates</p>
                <p>Unlimited clients</p>
                <p>Multiple installation</p>
                <p class="text-muted"><i class="lnr lnr-cross m-r-1 text-danger"></i>Resale</p>
              </div>
              <div class="widget-pricing-section"><a href="https://wrapbootstrap.com/theme/pixeladmin-responsive-admin-theme-WB07403R9?l=m" type="button" class="btn btn-lg btn-primary">Get It!</a></div>
            </div>
          </div>

          <!-- spacer -->
          <div class="p-t-3 visible-xs visible-sm"></div>

          <div class="col-md-4">
            <div class="widget-pricing-item">
              <h2 class="widget-pricing-plan m-a-0">EXTENDED</h2>
              <div class="widget-pricing-section p-y-2 b-y-1 bg-white darken">
                <div class="widget-pricing-price font-size-24 font-weight-bold"><small>$</small>800</div>
              </div>
              <div class="widget-pricing-section font-size-15">
                <p>Customer support</p>
                <p>Free Updates</p>
                <p>Unlimited clients</p>
                <p>Multiple installation</p>
                <p>Resale</p>
              </div>
              <div class="widget-pricing-section"><a href="https://wrapbootstrap.com/theme/pixeladmin-responsive-admin-theme-WB07403R9?l=e" type="button" class="btn btn-lg btn-primary">Get It!</a></div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Social buttons -->

  <div class="landing-section landing-social bg-white darker b-t-1">
    <div class="container text-xs-center">
      <h1 class="landing-heading">Get Social With Us</h1>
      <h2 class="landing-subheading text-muted">Lorem ipsum dolor sit amet, singulis efficiendi necessitatibus qui ad</h2>

      <a href="#" class="btn btn-primary btn-outline"><i class="fa fa-facebook"></i></a>
      &nbsp;&nbsp;&nbsp;
      <a href="#" class="btn btn-primary btn-outline"><i class="fa fa-twitter"></i></a>
      &nbsp;&nbsp;&nbsp;
      <a href="#" class="btn btn-primary btn-outline"><i class="fa fa-google"></i></a>
      &nbsp;&nbsp;&nbsp;
      <a href="#" class="btn btn-primary btn-outline"><i class="fa fa-pinterest"></i></a>
    </div>
  </div>

  <!-- Subscribe -->

  <div class="landing-section bg-primary p-y-3">
    <div class="container text-xs-center p-y-4">
      <h2 class="landing-heading m-b-3">SUBSCRIBE TO OUR NEWSLETTER</h2>

      <form action="" class="landing-subscribe input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
        <input type="text" class="form-control" placeholder="Your E-mail">
        <span class="input-group-btn">
          <button type="submit" class="btn font-weight-semibold font-size-14">SUBSCRIBE</button>
        </span>
      </form>
    </div>
  </div>

  <!-- Footer -->

  <div class="px-footer">
    <div class="container p-t-3">
      <div class="row">

        <div class="col-sm-3">
          <h5 class="m-t-0 m-b-1">QUICK LINKS</h5>
          <div style="line-height: 1.7;">
            <a href="#">About</a><br>
            <a href="#">Home</a><br>
            <a href="#">Blog</a><br>
            <a href="#">Support Center</a><br>
            <a href="#">Contact</a><br>
            <a href="#">Terms</a><br>
            <a href="#">Privacy</a>
          </div>
        </div>

        <!-- spacer -->
        <div class="m-t-4 visible-xs"></div>

        <div class="col-sm-3">
          <h5 class="m-t-0 m-b-1">CATEGORIES</h5>
          <div style="line-height: 1.7;">
            <a href="#">Business</a><br>
            <a href="#">Fashion</a><br>
            <a href="#">Featured</a><br>
            <a href="#">Food for thought</a><br>
            <a href="#">Gaming</a><br>
            <a href="#">Music</a><br>
          </div>
        </div>

        <!-- spacer -->
        <div class="m-t-4 visible-xs"></div>

        <div class="col-sm-6">
          <h5 class="m-t-0 m-b-1">RECENT POSTS</h5>
          <p>
            <a href="#">Lorem ipsum dolor sit amet, consectetur</a><br>
            <span class="text-muted font-size-11">12 MAR 2017</span>
          </p>
          <p>
            <a href="#">Lorem ipsum dolor sit amet, consectetur</a><br>
            <span class="text-muted font-size-11">12 MAR 2017</span>
          </p>
          <p>
            <a href="#">Lorem ipsum dolor sit amet, consectetur</a><br>
            <span class="text-muted font-size-11">12 MAR 2017</span>
          </p>
        </div>
      </div>

      <hr>

      <span class="text-muted">Copyright © 2017 Your Company. All rights reserved.</span>
    </div>
  </div>

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Core scripts -->
  <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/pixeladmin.min.js') }}"></script>

  <!-- Landing page dependencies -->
  <script src="{{ URL::asset('assets/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/lazysizes.min.js') }}"></script>

  <!-- Landing page JS -->
  <script src="{{ URL::asset('assets/js/landing.js') }}"></script>
</body>
</html>
