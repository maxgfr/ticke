@extends('layouts.app')

@section ('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><a href="{{route('restaurant.index')}}"><i class="fa fa-ticket-alt"></i> Gestion des tickets restaurant</a>  / <a href="{{route('batch_restaurant', $restau->id)}}">{{$restau->nom}}</a> / </span> {{$batch->date}}</h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="col-lg-12">
                    <div class="panel-title">

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

                            <th class="text-center">Numero titre</th>
                            <th class="text-center">Valeur</th>
                            <th class="text-center">Emetteur</th>
                            <th class="text-center">Millesime</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <div style="display: none;">
                            {!! $cheque_service = 0;
                               $ticket_restaurant = 0;
                               $cheque_table = 0;
                               $cheque_restaurant = 0;
                               $nb_cheque_service = 0;
                               $nb_ticket_restaurant = 0;
                               $nb_cheque_table = 0;
                               $nb_cheque_restaurant = 0;
                               $nb_tot = 0;
                               $val_tot = 0;
                            !!}
                        </div>
                        @foreach($tickets as $tk)
                            <tr>
                                <td class="text-center">
                                    {{ $tk->numero_titre }}
                                </td>
                                <td class="text-center">
                                    {{ $tk->valeur/100 }} €
                                </td>
                                <td class="text-center">
                                    @if($tk->emetteur == 1)
                                        CHEQUES SERVICE / CHEQUES DEJEUNER
                                        <div style="display: none;">
                                            {{$cheque_service += $tk->valeur/100}}
                                            {{$nb_cheque_service++}}
                                            {{$nb_tot++}}
                                            {{$val_tot+= $tk->valeur/100}}
                                        </div>
                                    @elseif($tk->emetteur == 2)
                                        TICKET RESTAURANT
                                        <div style="display: none;">
                                            {{$ticket_restaurant += $tk->valeur/100}}
                                            {{$nb_ticket_restaurant++}}
                                            {{$nb_tot++}}
                                            {{$val_tot+= $tk->valeur/100}}
                                        </div>
                                    @elseif($tk->emetteur == 3)
                                        CHEQUES DE TABLE
                                        <div style="display: none;">
                                            {{$cheque_table += $tk->valeur/100}}
                                            {{$nb_cheque_table++}}
                                            {{$nb_tot++}}
                                            {{$val_tot+= $tk->valeur/100}}
                                        </div>
                                    @elseif($tk->emetteur == 4)
                                        CHEQUES RESTAURANT
                                        <div style="display: none;">
                                            {{$cheque_restaurant += $tk->valeur/100}}
                                            {{$nb_cheque_restaurant++}}
                                            {{$nb_tot++}}
                                            {{$val_tot+= $tk->valeur/100}}
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $tk->millesime }}
                                </td>
                                <td class="text-center">
                                    {!! Form::model($tk, ['method' => 'DELETE', 'route' => ['destroy_tickets', ['id_batch' => $btch->id, 'id_restau' => $restau->id, 'id_ticket' => $tk->id]], 'style' => 'display:inline;']) !!}
                                    {!! csrf_field() !!}
                                    {!! Form::button('<i class="fa fa-trash-alt" aria-hidden="true"></i> Supprimer', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <div class="media-body">
                            <strong>CHEQUES SERVICE / CHEQUES DEJEUNER :</strong> {{$nb_cheque_service}} tickets de valeur : {{ $cheque_service }} €<br>
                            <strong>TICKET RESTAURANT :</strong> {{$nb_ticket_restaurant}} tickets de valeur : {{ $ticket_restaurant }} €<br>
                            <strong>CHEQUES DE TABLE :</strong> {{$nb_cheque_table}} tickets de valeur : {{ $cheque_table }} €<br>
                            <strong>CHEQUES RESTAURANT :</strong> {{$nb_cheque_restaurant}} tickets de valeur : {{ $cheque_restaurant }} €<br><br>
                            <strong>TOTAL :</strong> {{$nb_tot}} tickets de valeur : {{ $val_tot}} €<br><br>
                        </div>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
