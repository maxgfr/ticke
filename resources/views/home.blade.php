@extends('layouts.app')

@section ('content')
    <!-- Content -->
    <div class="px-content">

        <div class="page-header m-b-0">
            <div class="row">
                <div class="col-md-4">
                    <h1><i class="page-header-icon fa fa-th"></i>Dashboard <span class="text-muted font-weight-light"></span></h1>
                </div>
            </div>
        </div>


        <div class="px-content">

            <div class="col-md-6">
                <a href="/batch" class="panel panel-primary widget p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-eye fa-4x"></i>
                        <h3 class="font-bold no-margins">
                            Voir mes batchs
                        </h3>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="/pattern" class="panel panel-primary widget p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-plus fa-4x"></i>
                        <h3 class="font-bold no-margins">
                            Ajouter un pattern
                        </h3>
                    </div>
                </a>
            </div>


        </div>

    </div>


@endsection
