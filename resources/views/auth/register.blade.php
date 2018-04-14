<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Ticki - Inscription</title>


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
    .page-signup-modal {
      position: relative;
      top: auto;
      right: auto;
      bottom: auto;
      left: auto;
      z-index: 1;
      display: block;
    }

    .page-signup-form-group { position: relative; }

    .page-signup-icon {
      position: absolute;
      line-height: 21px;
      width: 36px;
      border-color: rgba(0, 0, 0, .14);
      border-right-width: 1px;
      border-right-style: solid;
      left: 1px;
      top: 9px;
      text-align: center;
      font-size: 15px;
    }

    html[dir="rtl"] .page-signup-icon {
      border-right: 0;
      border-left-width: 1px;
      border-left-style: solid;
      left: auto;
      right: 1px;
    }

    html:not([dir="rtl"]) .page-signup-icon + .page-signup-form-control { padding-left: 50px; }
    html[dir="rtl"] .page-signup-icon + .page-signup-form-control { padding-right: 50px; }

    /* Margins */

    .page-signup-modal > .modal-dialog { margin: 30px 10px; }

    @media (min-width: 544px) {
      .page-signup-modal > .modal-dialog {
        width: 400px;
        margin: 60px auto;
      }
    }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  <div class="page-signup-modal modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="text-xs-center bg-primary p-y-4">
          <a class="px-demo-brand px-demo-brand-lg" href="index.html"><span class="px-demo-logo bg-primary m-t-0"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span><span class="font-size-20 line-height-1">Ticki</span></span></a>
          <div class="font-size-15 m-t-1 line-height-1">Simple. Basique. Efficace.</div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="p-a-4">
            @csrf
          <h4 class="m-t-0 m-b-4 text-xs-center font-weight-semibold">Créer votre compte</h4>

          <fieldset class="page-signup-form-group form-group form-group-lg">
              <div class="page-signup-icon text-muted"><i class="ion-ios-person-outline"></i></div>
              <input id="firstname" type="text" class="page-signup-form-control form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus placeholder="Prénom">
              @if ($errors->has('firstname'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('firstname') }}</strong>
                  </span>
              @endif
          </fieldset>

            <fieldset class="page-signup-form-group form-group form-group-lg">
                <div class="page-signup-icon text-muted"><i class="ion-ios-person"></i></div>
                <input id="name" type="text" class="page-signup-form-control form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="Nom">
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </fieldset>

          <fieldset class="page-signup-form-group form-group form-group-lg">
            <div class="page-signup-icon text-muted"><i class="ion-at"></i></div>
            <input id="email" type="email" class="page-signup-form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ old('email') }}" required placeholder="Email">
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </fieldset>

          <fieldset class="page-signup-form-group form-group form-group-lg">
            <div class="page-signup-icon text-muted"><i class="ion-iphone"></i></div>
            <input id="mobile" type="mobile" class="page-signup-form-control form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"  name="mobile" value="{{ old('mobile') }}" required placeholder="Numéro">
            @if ($errors->has('mobile'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
            @endif
          </fieldset>


          <fieldset class="page-signup-form-group form-group form-group-lg">
            <div class="page-signup-icon text-muted"><i class="ion-asterisk"></i></div>
            <input id="password" type="password" class="page-signup-form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  name="password" required placeholder="Mot de passe">
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <small class="text-muted">Minimum 6 caractères</small>
          </fieldset>

          <fieldset class="page-signup-form-group form-group form-group-lg">
            <div class="page-signup-icon text-muted"><i class="ion-asterisk"></i></div>
            <input type="password-confirm" name="password_confirmation" required class="page-signup-form-control form-control" placeholder="Confirmation du mot de passe">
            <small class="text-muted">Minimum 6 caractères</small>
          </fieldset>

          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input">
            <span class="custom-control-indicator"></span>
            I agree with the <a href="#" target="_blank">Terms and Conditions</a>
          </label>

          <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">S'inscrire</button>
        </form>

        <div class="p-y-3 p-x-4 b-t-1 bg-white darken">
            <p align="center">Tu as déjà un compte ? </p>
            <a href="{{route('login')}}" class="btn btn-block btn-lg btn-info font-size-13"><span class="btn-label-icon left fa fa-plug"></span>Se Connecter</a>
        </div>
      </div>


    </div>
  </div>


  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/pixeladmin.min.js"></script>

</body>
</html>
