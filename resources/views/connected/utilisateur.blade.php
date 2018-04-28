@extends('layouts.app')

@section ('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-user"></i>Mon profil</span></h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">Mes informations</div>
            </div>
            <div class="panel-body">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div><br />
                @endif

                {!! Form::model($user, [
                    'route' => ['user_update', $user],
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    ]) !!}

                {!! csrf_field() !!}

                <div class="form-group @if($errors->first('firstname')) has-error @endif">
                    {!! Form::label('firstname', 'Prenom',['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                        @if($errors->first('firstname'))
                            <small class="form-message light">{{ $errors->first('firstname') }}</small>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group @if($errors->first('name')) has-error @endif">
                    {!! Form::label('name', 'Nom',['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @if($errors->first('name'))
                            <small class="form-message light">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group @if($errors->first('mobile')) has-error @endif">
                    {!! Form::label('mobile', 'Mobile',['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                        @if($errors->first('mobile'))
                            <small class="form-message light">{{ $errors->first('mobile') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group @if($errors->first('email')) has-error @endif">
                    {!! Form::label('email', 'E-mail',['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        @if($errors->first('email'))
                            <small class="form-message light">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-2 control-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input id="password" type="password" class="form-control" name="password" >
                        @if ($errors->has('password'))
                            <small class="form-message light">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-sm-2 control-label">Confirmer le mot de passe</label>
                    <div class="col-sm-10">
                        <input id="password-confirm" type="password" class="form-control" name="password-confirm" >
                        @if ($errors->has('password-confirm'))
                            <small class="form-message light">{{ $errors->first('password-confirm') }}</small>
                        @endif
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Sauvegarder les changements', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection
