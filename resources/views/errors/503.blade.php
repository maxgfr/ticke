<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Ticki - Error 503</title>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


  <!-- Core stylesheets -->
  <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('css/pixeladmin.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('css/widgets.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="{{ URL::asset('css/themes/clean.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Pace.js -->
  <script src="{{ URL::asset('pace/pace.min.js') }}"></script>

  <!-- Custom styling -->
  <style>
    .page-500-bg {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
    }

    .page-500-header,
    .page-500-error-code,
    .page-500-subheader,
    .page-500-text {
      position: relative;

      padding: 0 30px;

      text-align: center;
    }

    .page-500-header {
      width: 100%;
      padding: 20px 0;

      box-shadow: 0 4px 0 rgba(0,0,0,.1);
    }

    .page-500-error-code {
      margin-top: 60px;

      color: #fff;
      text-shadow: 0 4px 0 rgba(0,0,0,.1);

      font-size: 120px;
      font-weight: 700;
      line-height: 140px;
    }

    .page-500-subheader,
    .page-500-text {
      margin-bottom: 60px;

      color: rgba(0,0,0,.5);

      font-weight: 600;
    }

    .page-500-subheader {
      font-size: 50px;
    }

    .page-500-subheader:after {
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

    .page-500-text {
      font-size: 20px;
    }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  <div class="page-500-bg bg-danger"></div>
  <div class="page-500-header bg-white">
    <a class="px-demo-brand px-demo-brand-lg text-default" href="index.html"><span class="px-demo-logo bg-black"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span>Ticki</a>
  </div>
  <h1 class="page-500-error-code"><strong>503</strong></h1>
  <h2 class="page-500-subheader">OUCH!</h2>
  <h3 class="page-500-text">
    Tu ne peux pas accéder à cette page. Il te manque les droits /:
    <br>
    <br>
    <span class="font-size-16 font-weight-normal"><a href="{{route('accueil')}}" class="btn m-t">Accueil</a></span>
  </h3>



  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Core scripts -->
  <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('js/pixeladmin.min.js') }}"></script>


</body>
</html>
