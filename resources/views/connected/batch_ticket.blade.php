@extends('layouts.app')

@section ('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="fa fa-thumbtack"></i></span> Tickets</h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="col-lg-12">
                    <div class="panel-title">
                        Ticket
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
                                @foreach($repartitions as $repart)
                                    <th class="text-center">{{$repart->nom}}</th>
                                @endforeach
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($repartitions as $rep)
                                <tr class="post{{$rep->pivot->id}}">
                                    @foreach($repartitions as $rep)
                                        <td class="text-center">{{$rep->pivot->value}}</td>
                                    @endforeach
                                    <td class="text-center">
                                        {!! Form::model($rep, ['method' => 'DELETE', 'route' => ['batch.destroy_tickets', $entity->id, $pattern->id, $batch->id, $rep->pivot->id], 'style' => 'display:inline;']) !!}
                                        {!! csrf_field() !!}
                                        {!! Form::submit('Supprimer', ['class' => 'btn btn-outline btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
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
