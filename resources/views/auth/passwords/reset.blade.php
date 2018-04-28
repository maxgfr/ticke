<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">


  <title>Tickit - Changement de mot de passe</title>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


  <!-- Core stylesheets -->
  <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('assets/css/pixeladmin.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('assets/css/widgets.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="{{ URL::asset('assets/css/themes/clean.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Pace.js -->
  <script src="{{ URL::asset('pace/pace.min.js') }}"></script>

  <!-- Custom styling -->
  <style>
    .page-signin-header {
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
    }

    .page-signin-header .btn {
      position: absolute;
      top: 12px;
      right: 15px;
    }

    html[dir="rtl"] .page-signin-header .btn {
      right: auto;
      left: 15px;
    }

    .page-signin-container {
      width: auto;
      margin: 30px 10px;
    }

    .page-signin-container form {
      border: 0;
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
    }

    @media (min-width: 544px) {
      .page-signin-container {
        width: 350px;
        margin: 60px auto;
      }
    }

    .page-signin-social-btn {
      width: 40px;
      padding: 0;
      line-height: 40px;
      text-align: center;
      border: none !important;
    }

    #page-signin-forgot-form { display: none; }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  <div class="page-signin-header p-a-2 text-sm-center bg-white">
    <a class="px-demo-brand px-demo-brand-lg text-default" href="index.html">Ticki</a>
  </div>

  <!-- Sign In form -->

  <div class="page-signin-container" id="page-signin-form">
    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold font-size-20">Réinitialiser son mot de passe</h2>

    <form method="POST" action="{{ route('password.request') }}" class="panel p-a-4">
         @csrf
      <fieldset class="form-group form-group-lg">
        <input id="email" placeholder="Ton email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </fieldset>

      <fieldset class="form-group form-group-lg">
          <input id="password" placeholder="Ton mot de passe" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
          @if ($errors->has('password'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
      </fieldset>

      <fieldset class="form-group form-group-lg">
          <input id="password-confirm" placeholder="Ton mot de passe" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password-confirm" required>
          @if ($errors->has('password-confirm'))
              <span class="invalid-feedback">
                  <strong>{{ $errors->first('password-confirm') }}</strong>
              </span>
          @endif
      </fieldset>

      <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Envoyez</button>

    </form>

  </div>
  <!-- / Sign In form -->



  <!-- / Reset form -->

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

</body>
</html>
