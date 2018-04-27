<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Ticki</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


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

  <!-- / Custom styling -->
</head>
<body>

    @yield('content')

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/pixeladmin.min.js"></script>

</body>
</html>
