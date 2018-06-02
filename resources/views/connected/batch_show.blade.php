@extends('layouts.app')

@section ('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><a href="{{route('batch.index')}}"><i class="fa fa-ticket-alt"></i> Gestion des batchs </a>  / </span>{{$entity->nom}}  (pattern : {{$pattern->nom}}) </h1>
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

                        {{ Form::hidden('id_entity', $entity->id) }}
                        {{ Form::hidden('id_pattern', $pattern->id) }}

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
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batchs as $btch)
                                <tr class="post{{$btch->pivot->id}}">
                                    <td class="text-center">{{$btch->pivot->id}}</td>
                                    <td class="text-center">{{$btch->pivot->date}}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="{{ route('batch.show', ['id_entity' => $entity->id, 'id_pattern' => $pattern->id, 'id_batch' => $btch->pivot->id, 'id_entity' => $entity->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i> Informations</a>
                                            </div>
                                            <div class="col-lg-6">
                                                {!! Form::model($btch, ['method' => 'DELETE', 'route' => ['batch.destroy', $entity->id, $btch->pivot->id ], 'style' => 'display:inline;']) !!}
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
