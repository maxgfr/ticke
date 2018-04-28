@extends('layouts.app')

@section ('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="fa fa-utensils"></i> Gestion des restaurants</span></h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="col-lg-12">
                    <div class="panel-title">
                        <button type="button" class="pull-right btn btn-primary btn-outline btn-sm" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> Ajouter un restaurant</button>
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
                            @foreach($restaurants as $resto)
                                <tr class="post{{$resto->id}}">
                                    <td class="text-center">{{$resto->nom}}</td>
                                    <td class="text-center">{{$resto->adr}}</td>
                                    <td class="text-center">{{$resto->ville}}</td>
                                    <td class="text-center">{{$resto->mobile}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm edit-modal" data-id="{{$resto->id}}" data-nom="{{$resto->nom}}" data-adr="{{$resto->adr}}" data-ville="{{$resto->ville}}" data-cp="{{$resto->cp}}"  data-mobile="{{$resto->mobile}}" >
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <button class="btn btn-danger btn-sm delete-modal" data-id="{{$resto->id}}">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un restaurant</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-max hidden">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="error-max"></strong>
                    </div>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nom">Nom:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nom" class="form-control" id="nom">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="adr">Adresse:</label>
                            <div class="col-sm-10">
                                <input type="text" name="adr" class="form-control" id="adr">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ville">Ville:</label>
                            <div class="col-sm-10">
                                <input type="text" name="ville" class="form-control" id="ville">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cp">Code Postal:</label>
                            <div class="col-sm-10">
                                <input type="text" name="cp" class="form-control" id="cp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="mobile">Numéro:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="mobile" id="mobile">
                            </div>
                        </div>

                        {!! csrf_field() !!}

                        <input type="hidden" class="form-control" id="responsable" value="{{Auth::user()->id}}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" id="add">
                        <span class="glyphicon glyphicon-plus"></span> Enregistrer
                    </button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="delete" class="modal fade modal-alert modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><i class="fa fa-times-circle"></i></div>
                <div class="modal-title">Suppression du restaurant</div>
                <div class="modal-body">Impossible de revenir en arrière</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" id="delete-object">
                        Oui
                    </button>
                    <button class="btn" type="submit" data-dismiss="modal">
                        Non
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modification du restaurant</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-max-edit hidden">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="error-max-edit"></strong>
                    </div>
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nom">Nom:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nom_edit" class="form-control" id="nom_edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="adr">Adresse:</label>
                            <div class="col-sm-10">
                                <input type="text" name="adr_edit" class="form-control" id="adr_edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ville">Ville:</label>
                            <div class="col-sm-10">
                                <input type="text" name="ville_edit" class="form-control" id="ville_edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cp">Code Postal:</label>
                            <div class="col-sm-10">
                                <input type="text" name="cp_edit" class="form-control" id="cp_edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="mobile">Numéro:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="mobile_edit" id="mobile_edit">
                            </div>
                        </div>

                        {!! csrf_field() !!}

                        <input type="hidden" class="form-control" id="responsable" value="{{Auth::user()->id}}">
                    </form>
                    <div class="modal-footer">

                        <button class="btn btn-primary" type="submit" id="footer_edit_button">
                            <span class="glyphicon glyphicon-plus"></span> Enregistrer
                        </button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> Annuler
                        </button>

                    </div>
                </div>
            </div>
        </div>

@endsection
