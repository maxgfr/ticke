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

        <!-- Balance -->
        <div class="page-wide-block">
            <div class="box m-b-0 valign-middle bg-white">

                <div class="box-cell col-md-7 p-a-4">
                    <div>
                        <span class="font-size-18 font-weight-light">Balance</span>&nbsp;&nbsp;
                        <span class="text-success">12% <i class="ion-arrow-up-c"></i></span>
                    </div>
                    <div class="font-size-34"><small class="font-weight-light text-muted">$</small><strong>31,600</strong></div>
                </div>

                <!-- Balance chart -->
                <div class="box-cell col-sm-5 p-a-4">
                    <span id="balance-chart"></span>
                </div>
            </div>
        </div>
        <!-- / Balance -->

        <!-- Money flow charts -->
        <div class="page-wide-block">
            <div class="box border-radius-0 bg-black">

                <!-- Revenue -->
                <div class="box-cell col-md-6 p-a-4 bg-black darken">
                    <div>
                        <span class="font-size-17 font-weight-light">Revenue</span>&nbsp;&nbsp;
                        <span class="text-success">9% <i class="ion-arrow-up-c"></i></span>
                    </div>
                    <div class="text-muted font-size-11 font-weight-light">past 30 days</div>
                    <div class="font-size-34"><small class="font-weight-light text-muted">$</small><strong>3,239</strong></div>

                    <!-- Chart -->
                    <div class="p-t-4">
                        <canvas id="revenue-chart" width="400" height="150"></canvas>
                    </div>
                </div>

                <hr class="m-a-0 visible-xs visible-sm">

                <!-- Expenses -->
                <div class="box-cell col-md-6 p-a-4">
                    <div>
                        <span class="font-size-17 font-weight-light">Expenses</span>&nbsp;&nbsp;
                        <span class="text-danger">5% <i class="ion-arrow-down-c"></i></span>
                    </div>
                    <div class="text-muted font-size-11 font-weight-light">past 30 days</div>
                    <div class="font-size-34"><small class="font-weight-light text-muted">$</small><strong>1,273</strong></div>

                    <!-- Chart -->
                    <div class="p-t-4">
                        <canvas id="expenses-chart" width="400" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Money flow charts -->
    </div>



@endsection
