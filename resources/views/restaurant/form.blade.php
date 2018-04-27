{!! Form::model($restaurant, [
    'route' => $restaurant->id ? ['restaurant.update', $restaurant] : 'restaurant.index',
    'method' => $restaurant->id ? 'PUT' : 'POST',
    'class' => 'form-horizontal',
    'files' => true,
    ]) !!}

{!! csrf_field() !!}

<div class="form-group @if($errors->first('nom')) has-error @endif">
    {!! Form::label('nom', 'Nom de la catégorie',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('nom', null, ['class' => 'form-control']) !!}
        @if($errors->first('nom'))
            <small class="form-message light">{{ $errors->first('nom') }}</small>
        @endif
    </div>
</div>

<hr>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        {!! Form::submit($restaurant->id ? 'Sauvegarder les changements' : 'Ajouter', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
