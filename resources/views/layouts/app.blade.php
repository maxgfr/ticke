<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Ticki</title>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

  <!-- Core stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/pixeladmin.min.css" rel="stylesheet" type="text/css">
  <link href="css/widgets.min.css" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="css/themes/clean.min.css" rel="stylesheet" type="text/css">

  <!-- Pace.js -->
  <script src="pace/pace.min.js"></script>
</head>
<body>
  <!-- Nav -->
  <nav class="px-nav px-nav-left">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
      <span class="px-nav-toggle-arrow"></span>
      <span class="navbar-toggle-icon"></span>
      <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
      <li class="px-nav-item active">
        <a href="{{route('restaurant.index')}}"><i class="px-nav-icon ion-android-restaurant"></i><span class="px-nav-label">Restaurant</span></a>
      </li>
      <li class="px-nav-item">
        <a href="{{route('batch_restaurant', ['restaurant_id' => 0])}}"><i class="px-nav-icon ion-magnet"></i><span class="px-nav-label">Tickets</span></a>
      </li>
    </ul>
  </nav>

  <!-- Navbar -->
  <nav class="navbar px-navbar">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ticki</a>
    </div>

    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>

    <div class="collapse navbar-collapse" id="px-navbar-collapse">

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->firstname }} {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Profil</a></li>
            <li class="divider"></li>
            <li><a href="{{route("logout")}}">Déconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  @yield('content')

  <!-- Footer -->
  <footer class="px-footer px-footer-bottom">
    Copyright © 2018 Ticki. All rights reserved.
  </footer>

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- Load jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Core scripts -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/pixeladmin.min.js"></script>

  <!-- Your scripts -->
  <script src="js/app.js"></script>
</body>
</html>
