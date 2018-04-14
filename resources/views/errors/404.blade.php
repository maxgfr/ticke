<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Ticki - Error 404</title>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


  <!-- Core stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/pixeladmin.min.css" rel="stylesheet" type="text/css">
  <link href="css/widgets.min.css" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="css/themes/clean.min.css" rel="stylesheet" type="text/css">

  <!-- Pace.js -->
  <script src="pace/pace.min.js"></script>

  <!-- Custom styling -->
  <style>
    .page-404-bg {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
    }

    .page-404-header,
    .page-404-error-code,
    .page-404-subheader,
    .page-404-text,
    .page-404-form {
      position: relative;

      padding: 0 30px;

      text-align: center;
    }

    .page-404-header {
      width: 100%;
      padding: 20px 0;

      box-shadow: 0 4px 0 rgba(0,0,0,.1);
    }

    .page-404-error-code {
      margin-top: 60px;

      color: #fff;
      text-shadow: 0 4px 0 rgba(0,0,0,.1);

      font-size: 120px;
      font-weight: 700;
      line-height: 140px;
    }

    .page-404-subheader,
    .page-404-text {
      margin-bottom: 60px;

      color: rgba(0,0,0,.5);

      font-weight: 600;
    }

    .page-404-subheader {
      font-size: 50px;
    }

    .page-404-subheader:after {
      position: absolute;
      bottom: -30px;
      left: 50%;

      display: block;

      width: 40px;
      height: 4px;
      margin-left: -20px;

      content: "";

      background: rgba(0,0,0,.2);
    }

    .page-404-text {
      font-size: 20px;
    }

    .page-404-form {
      max-width: 500px;
      margin: 0 auto 60px auto;
    }

    .page-404-form * {
      margin: 0 !important;

      border: none !important;
    }

    .page-404-form .btn {
      background: rgba(0, 0, 0, .3);
    }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  <div class="page-404-bg bg-warning"></div>
  <div class="page-404-header bg-white">
    <a class="px-demo-brand px-demo-brand-lg text-default" href="index.html"><span class="px-demo-logo bg-black"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span>Ticki</a>
  </div>
  <h1 class="page-404-error-code"><strong>404</strong></h1>
  <h2 class="page-404-subheader">OOPS!</h2>
  <h3 class="page-404-text">
    La page est portée disparue :(
  </h3>
  <a href="/" class="btn btn-primary m-t">Accueil</a>
  <form class="page-404-form" action="">
    <div class="input-group input-group-lg">
      <span class="input-group-btn">
        <a href="{{route('accueil')}}" class="btn btn-primary m-t">Accueil</a>
      </span>
    </div>
  </form>


  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/pixeladmin.min.js"></script>


</body>
</html>
