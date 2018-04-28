{!! Form::model($restaurant, [
    'route' => $restaurant->id ? ['restaurant.update', $restaurant] : 'restaurant.index',
    'method' => $restaurant->id ? 'PUT' : 'POST',
    'class' => 'form-horizontal',
    'files' => true,
    ]) !!}

{!! csrf_field() !!}

<div class="form-group @if($errors->first('nom')) has-error @endif">
    {!! Form::label('nom', 'Nom du restaurant',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('nom', null, ['class' => 'form-control']) !!}
        @if($errors->first('nom'))
            <small class="form-message light">{{ $errors->first('nom') }}</small>
        @endif
    </div>
</div>


<div class="form-group @if($errors->first('adr')) has-error @endif">
    {!! Form::label('adr', 'Adresse',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('adr', null, ['class' => 'form-control']) !!}
        @if($errors->first('adr'))
            <small class="form-message light">{{ $errors->first('adr') }}</small>
        @endif
    </div>
</div>

<div class="form-group @if($errors->first('cp')) has-error @endif">
    {!! Form::label('cp', 'Code Postal',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('cp', null, ['class' => 'form-control']) !!}
        @if($errors->first('cp'))
            <small class="form-message light">{{ $errors->first('cp') }}</small>
        @endif
    </div>
</div>


<div class="form-group @if($errors->first('ville')) has-error @endif">
    {!! Form::label('ville', 'Ville',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('ville', null, ['class' => 'form-control']) !!}
        @if($errors->first('ville'))
            <small class="form-message light">{{ $errors->first('ville') }}</small>
        @endif
    </div>
</div>

<div class="form-group @if($errors->first('mobile')) has-error @endif">
    {!! Form::label('mobile', 'Numéro de Téléphone',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
        @if($errors->first('mobile'))
            <small class="form-message light">{{ $errors->first('mobile') }}</small>
        @endif
    </div>
</div>

{!! Form::hidden('responsable', Auth::user()->id, ['class' => 'form-control']) !!}

<hr>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        {!! Form::submit($restaurant->id ? 'Sauvegarder les changements' : 'Ajouter', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
