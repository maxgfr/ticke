@extends('layouts.app')

@section ('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Restaurant</span></h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-10"><div class="panel-title">Mes restaurants</div></div>
                    <div class="col-lg-2">
                        <a class="btn btn-primary btn-outline btn-block" href="{{route('restaurant.create')}}"><i class="fa fa-plus"></i> Ajouter un restaurant</a>
                    </div>
                </div>

            </div>
            <div class="panel-body">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div><br />
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div> <br />
                @endif

                <div class="table-primary">
                    <table class="table table-striped table-bordered" id="datatables">
                        <thead>
                            <tr>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Adresse</th>
                                <th class="text-center">Ville</th>
                                <th class="text-center">Numéro</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($restaurant as $resto)
                            <tr>
                                <td class="text-center">{{$resto->nom}}</td>
                                <td class="text-center">{{$resto->adr}}</td>
                                <td class="text-center">{{$resto->ville}}</td>
                                <td class="text-center">{{$resto->mobile}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="{{ route('restaurant.edit', ['id' => $resto->id]) }}" class="btn btn-outline btn btn-primary btn-xs"><i class="fa fa-edit"></i> Modifier</a>
                                            </div>
                                            <div class="col-lg-6">
                                                {!! Form::model($resto, ['method' => 'DELETE', 'route' => ['restaurant.destroy', $resto], 'style' => 'display:inline;']) !!}
                                                {!! csrf_field() !!}
                                                {!! Form::submit('Supprimer', ['class' => 'btn btn-outline btn btn-danger btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
