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
                        <button type="button" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> Ajouter un restaurant</button>
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
                                    <button class="edit-modal btn btn-warning btn-sm" data-id="{{$resto->id}}" data-nom="{{$resto->nom}}" data-adr="{{$resto->adr}}" data-ville="{{$resto->ville}}" data-cp="{{$resto->cp}}"  data-mobile="{{$resto->mobile}}" >
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button class="delete-modal btn btn-danger btn-sm" data-id="{{$resto->id}}" data-nom="{{$resto->nom}}" data-adr="{{$resto->adr}}" data-ville="{{$resto->ville}}" data-cp="{{$resto->cp}}"  data-mobile="{{$resto->mobile}}">
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

    {{-- Modal Form Create Post --}}
    <div id="create" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title" id="myModalLabel">Ajouter un restaurant</h4>
          </div>
          <div class="modal-body">
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
                  <span class="glyphicon glyphicon-plus"></span>Enregistrer
                </button>
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                  <span class="glyphicon glyphicon-remobe"></span>Annuler
                </button>
              </div>
        </div>
      </div>
    </div>

    {{-- Modal Form Edit and Delete Post --}}
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="modal">

              <div class="form-group">
                <label class="control-label col-sm-2"for="id">ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="fid" disabled>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2"for="title">Title</label>
                <div class="col-sm-10">
                <input type="name" class="form-control" id="t">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2"for="body">Body</label>
                <div class="col-sm-10">
                <textarea type="name" class="form-control" id="b"></textarea>
                </div>
              </div>
            </form>
                    {{-- Form Delete Post --}}
            <div class="deleteContent">
              Are You sure want to delete <span class="title"></span>?
              <span class="hidden id"></span>
            </div>

          </div>
          <div class="modal-footer">

            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class="glyphicon"></span>
            </button>

            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class="glyphicon glyphicon"></span>close
            </button>

          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-default" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" role="form">


        		</form>
					<div class="deleteContent">
						Are you Sure you want to delete <span class="dname"></span> ? <span
							class="hidden did"></span>
					</div>
          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
                <span id="footer_action_button" class="glyphicon"> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> Close
            </button>
          </div>
        </div>
      </div>
    </div>
@endsection
