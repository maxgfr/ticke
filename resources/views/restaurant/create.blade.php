@extends('layouts.app')

@section ('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Restaurant</span></h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">Vos restaurants</div>
            </div>
            <div class="panel-body">
                @include('restaurant.form')
            </div>
        </div>
    </div>

@endsection
