@extends('layouts.app')

@section ('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="fa fa-ticket-alt"></i></span> Gestion des répartitions</h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="col-lg-12">
                    <div class="panel-title">
                        <button type="button" class="pull-right btn btn-primary btn-outline btn-sm" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> Ajouter une répartition</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div><br />
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('error') }}
                    </div> <br />
                @endif

                <div class="table-primary">
                    <table class="table table-striped table-bordered" id="datatables">
                        <thead>
                            <tr>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Emplacement</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($répartitions as $répartition)
                                <tr class="post{{$répartition->id}}">
                                    <td class="text-center">{{$répartition->nom}}</td>
                                    <td class="text-center">{{$répartition->total}}</td>
                                    <td class="text-center">{{$répartition->emplacement}}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button class="btn btn-warning btn-sm edit-modal" data-id="{{$répartition->id}}" data-nom="{{$répartition->nom}}" data-total="{{$répartition->total}}" data-ville="{{$répartition->ville}}" data-cp="{{$répartition->cp}}"  data-mobile="{{$répartition->mobile}}" >
                                                    <span class="glyphicon glyphicon-pencil"></span> Editer
                                                </button>
                                            </div>
                                            <div class="col-lg-6">
                                                <button class="btn btn-danger btn-sm delete-modal" data-id="{{$répartition->id}}">
                                                    <span class="glyphicon glyphicon-trash"></span> Supprimer
                                                </button>
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

    <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter une répartition</h4>
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
                            <label class="control-label col-sm-2" for="total">Total:</label>
                            <div class="col-sm-10">
                                <input type="text" name="total" class="form-control" id="total">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="total">Emplacement:</label>
                            <div class="col-sm-10">
                                <input type="text" name="emplacement" class="form-control" id="emplacement">
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
                <div class="modal-title">Suppression d'une répartition</div>
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
                    <h4 class="modal-title">Modification d'une répartition</h4>
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
                            <label class="control-label col-sm-2" for="total">Total:</label>
                            <div class="col-sm-10">
                                <input type="text" name="total_edit" class="form-control" id="total_edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="total">Emplacement:</label>
                            <div class="col-sm-10">
                                <input type="text" name="emplacement_edit" class="form-control" id="emplacement_edit">
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

    </div>

    <script src="{{ URL::asset('js/repartition.js') }}"></script>

@endsection
