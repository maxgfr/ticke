@extends('layouts.app')

@section ('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><a href="{{route('restaurant.index')}}"><i class="fa fa-ticket-alt"></i> Gestion des tickets restaurant</a>  / </span>{{$restau->nom}}</h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="col-lg-12">
                    <div class="panel-title">
                        {!! Form::open(['route' => 'upload_tickets',
                                                    'method' => 'POST',
                                                    'class' => 'form-horizontal',
                                                    'files' => true])
                                      !!}

                        {!! csrf_field() !!}

                        {{ Form::hidden('restaurant_id', $restau->id) }}

                        <label class="pull-right btn btn-primary btn-outline btn-sm">
                            <i class="fa fa-upload" aria-hidden="true"></i>   Upload TXT   <input type="file" onchange="this.form.submit()" name="file" style="display: none;"/>
                        </label>

                        <div style="display: none;">
                            {!! Form::submit('Upload', ['class' => 'btn btn-primary', 'id' => 'submit-all']) !!}
                        </div>
                        {!! Form::close() !!}
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
                                <th class="text-center">Identifiant</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Envoyé</th>
                                <th class="text-center">Payé</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batchs as $btch)
                                <tr class="post{{$btch->id}}">
                                    <td class="text-center">{{$btch->id}}</td>
                                    <td class="text-center">{{$btch->date}}</td>
                                    <td class="text-center">
                                        @if ($btch->envoye== 0)
                                            Non
                                        @else
                                            Oui
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($btch->paye== 0)
                                            Non
                                        @else
                                            Oui
                                        @endif
                                    </td>
                                    <td class="text-center">

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a href="{{ route('show_batch', ['id_batch' => $btch->id, 'id_restau' => $restau->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i> Informations</a>
                                            </div>
                                            <div class="col-lg-4">
                                                <button class="btn btn btn-warning btn-sm"><i class="fa fa-edit"></i> Editer</button>
                                            </div>
                                            <div class="col-lg-4">
                                                {!! Form::model($btch, ['method' => 'DELETE', 'route' => ['destroy_batch', ['id_batch' => $btch->id, 'id_restau' => $restau->id]], 'style' => 'display:inline;']) !!}
                                                {!! csrf_field() !!}

                                                {!! Form::button('<i class="fa fa-trash-alt" aria-hidden="true"></i> Supprimer', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) !!}
                                                {!! Form::close() !!}
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
