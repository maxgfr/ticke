@extends('layouts.app')

@section ('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="fa fa-barcode"></i></span> Barcode 1D</h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="col-lg-12">
                    <div class="panel-title">
                        Barcode 1D
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

                    <form class="panel-body">
                         @csrf
                        <fieldset class="form-group">
                            <label for="form-group-input-1">Pattern</label>
                            <select class="form-control" name="pattern" id="pattern">
                                @foreach ($patterns as $pat)
                                    <option value="{{ $pat->id }}">{{ $pat->nom }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="form-group-input-2">Entité</label>
                            <select class="form-control" name="entity" id="entity">
                                @foreach ($entities as $ent)
                                    <option value="{{ $ent->id }}">{{ $ent->nom }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                            <button id="validate" type="button" class="btn btn-lg btn-primary btn-block">J'ai choisi !</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
    $(document).ready(function() {
        $(document).on('click','#validate', function() {
            var val_pattern = $("#pattern").val();
            var val_entity = $("#entity").val();
            window.location.href = '/entity/'+val_entity+'/pattern/'+val_pattern+'/barcode';
        });
    });
    </script>


@endsection
