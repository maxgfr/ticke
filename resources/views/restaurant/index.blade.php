@extends('layouts.app')

@section ('content')


    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Restaurant</h1>
        </div>

            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-10"><div class="panel-title">Vos restaurants</div></div>
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
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0</td>
                                        <td>Win 95+</td>
                                        <td class="center"> 4</td>
                                        <td class="center">X</td>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">5</td>
                                            <td class="center">C</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                </div>
            </div>
    </div>


@endsection
