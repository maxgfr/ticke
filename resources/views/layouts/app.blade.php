<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Tickit</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

  <!-- Core stylesheets -->
  <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('css/pixeladmin.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('css/widgets.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="{{ URL::asset('css/themes/default.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Load jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Pace.js -->
  <script src="{{ URL::asset('pace/pace.min.js') }}"></script>

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
        <li class="px-nav-item">
          <a href="{{route('home')}}"><i class="px-nav-icon fa fa-th"></i><span class="px-nav-label"> Dashboard</span></a>
      </li>
      <li class="px-nav-item">
        <a href="{{route('barcode.index')}}"><i class="px-nav-icon fa fa-barcode"></i><span class="px-nav-label"> Barcode</span></a>
      </li>
      <li class="px-nav-item">
        <a href="{{route('batch.index')}}"><i class="px-nav-icon fa fa-thumbtack"></i><span class="px-nav-label"> Batch</span></a>
      </li>
      <li class="px-nav-item">
        <a href="{{route('pattern.index')}}"><i class="px-nav-icon fa fa-clipboard"></i><span class="px-nav-label"> Patterns</span></a>
      </li>
      <li class="px-nav-item">
        <a href="{{route('entity.index')}}"><i class="px-nav-icon fa fa-building"></i><span class="px-nav-label"> Entités</span></a>
      </li>
      <li class="px-nav-item">
        <a href="{{route('page_payment_stripe')}}"><i class="px-nav-icon fa fa-money-bill-alt"></i><span class="px-nav-label"> Abonnement</span></a>
      </li>
    </ul>
  </nav>

  <!-- Navbar -->
  <nav class="navbar px-navbar">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tickit</a>
    </div>

    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>

    <div class="collapse navbar-collapse" id="px-navbar-collapse">

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->firstname }} {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{route("user_profile")}}"><i class="fa fa-user"></i> Profil</a></li>
            <li class="divider"></li>
            <li><a href="{{route("logout")}}"><i class="fa fa-sign-out-alt"></i> Déconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>



  @yield('content')

  <!-- Footer -->
  <footer class="px-footer px-footer-bottom">
    Copyright © 2018 Tickit. All rights reserved.
  </footer>

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->


  <!-- Core scripts -->
  <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('js/pixeladmin.min.js') }}"></script>

  <!-- Your scripts -->
  <script src="{{ URL::asset('js/app.js') }}"></script>


</body>
</html>
