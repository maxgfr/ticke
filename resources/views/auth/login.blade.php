<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>Ticki - Connexion</title>

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
    .page-signin-modal {
      position: relative;
      top: auto;
      right: auto;
      bottom: auto;
      left: auto;
      z-index: 1;
      display: block;
    }

    .page-signin-form-group { position: relative; }

    .page-signin-icon {
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

    html[dir="rtl"] .page-signin-icon {
      border-right: 0;
      border-left-width: 1px;
      border-left-style: solid;
      left: auto;
      right: 1px;
    }

    html:not([dir="rtl"]) .page-signin-icon + .page-signin-form-control { padding-left: 50px; }
    html[dir="rtl"] .page-signin-icon + .page-signin-form-control { padding-right: 50px; }

    #page-signin-forgot-form {
      display: none;
    }

    /* Margins */

    .page-signin-modal > .modal-dialog { margin: 30px 10px; }

    @media (min-width: 544px) {
      .page-signin-modal > .modal-dialog { margin: 60px auto; }
    }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  <div class="page-signin-modal modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="box m-a-0">
          <div class="box-row">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif

            <div class="box-cell col-md-5 bg-primary p-a-4">
              <div class="text-xs-center text-md-left">
                <a class="px-demo-brand px-demo-brand-lg" href="/"><span class="font-size-20 line-height-1">Ticki</span></a>
                <div class="font-size-15 m-t-1 line-height-1">Simple. Flexible. Powerful.</div>
              </div>
              <ul class="list-group m-t-3 m-b-0 visible-md visible-lg visible-xl">
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-sitemap text-white"></i> Une interface claire</li>
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-file-text-o text-white"></i> Des données coordonées</li>
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-outdent text-white"></i> Un professionalisme</li>
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-heart text-white"></i> Un support présent</li>
              </ul>
            </div>

            <div class="box-cell col-md-7">

              <!-- Sign In form -->
              <form method="POST" action="{{ route('login') }}" class="p-a-4" id="page-signin-form">
                <h4 class="m-t-0 m-b-4 text-xs-center font-weight-semibold">Se connecter</h4>

                @csrf

                <fieldset class="page-signin-form-group form-group form-group-lg">
                  <div class="page-signin-icon text-muted"><i class="ion-person"></i></div>
                  <input id="email" type="email" class="page-signin-form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </fieldset>

                <fieldset class="page-signin-form-group form-group form-group-lg">
                  <div class="page-signin-icon text-muted"><i class="ion-asterisk"></i></div>
                  <input id="password" type="password" class="page-signin-form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                  @if ($errors->has('password'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </fieldset>

                <div class="clearfix">
                  <label class="custom-control custom-checkbox pull-xs-left">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    Se souvenir de moi
                  </label>
                  <a href="{{ route('password.request') }}" class="font-size-12 text-muted pull-xs-right" id="page-signin-forgot-link">Mot de passe oublié?</a>
                </div>

                <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Se connecter</button>
              </form>

              <div class="p-y-3 p-x-4 b-t-1 bg-white darken" id="page-signin-social">
                <a href="{{route ('register')}}" class="btn btn-block btn-lg font-size-13"><span class="btn-label-icon left fa fa-user-plus"></span>Testez <strong>Ticki</strong></a>
              </div>
              <!-- / Sign In form -->

              <!-- Reset form -->
              <form method="POST" action="{{ route('password.email') }}" class="p-a-4" id="page-signin-forgot-form">
                  @csrf
                <h4 class="m-t-0 m-b-4 text-xs-center font-weight-semibold">Ré-initialisation du mot de passe</h4>

                <fieldset class="page-signin-form-group form-group form-group-lg">
                  <div class="page-signin-icon text-muted"><i class="ion-at"></i></div>
                  <input id="email_re" type="email" class="page-signin-form-control form-control{{ $errors->has('email_re') ? ' is-invalid' : '' }}" name="email_re" value="{{ old('email_re') }}" placeholder="Ton email">
                </fieldset>

                @if ($errors->has('email_re'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email_re') }}</strong>
                    </span>
                @endif

                <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Envoyez le mail</button>
                <div class="m-t-2 text-muted">
                  <a href="#" id="page-signin-forgot-back">&larr; Back</a>
                </div>
              </form>

              <!-- / Reset form -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/pixeladmin.min.js"></script>

  <script>
    // -------------------------------------------------------------------------
    // Initialize page components

    $(function() {

      $('#page-signin-forgot-link').on('click', function(e) {
        e.preventDefault();

        $('#page-signin-form, #page-signin-social')
          .css({ opacity: '1' })
          .animate({ opacity: '0' }, 200, function() {
            $(this).hide();

            $('#page-signin-forgot-form')
              .css({ opacity: '0', display: 'block' })
              .animate({ opacity: '1' }, 200)
              .find('.form-control').first().focus();

            $(window).trigger('resize');
          });
      });

      $('#page-signin-forgot-back').on('click', function(e) {
        e.preventDefault();

        $('#page-signin-forgot-form')
          .animate({ opacity: '0' }, 200, function() {
            $(this).css({ display: 'none' });

            $('#page-signin-form, #page-signin-social')
              .show()
              .animate({ opacity: '1' }, 200)
              .find('.form-control').first().focus();

            $(window).trigger('resize');
          });
      });
    });
  </script>
</body>
</html>
