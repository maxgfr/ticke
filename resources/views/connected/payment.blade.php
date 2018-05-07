@extends('layouts.app')

@section ('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="fa fa-ticket-alt"></i></span> Paiements mensuels</h1>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <div class="col-lg-12">
                    <div class="panel-title">
                        Paiement
                    </div>
                </div>
            </div>
            <div class="panel-body text-center">

                @role('basic')
                    Tu as payé :-)
                @else
                    <!-- Stripe -->
                    <form action="{{route('payment_stripe')}}" method="POST">
                        {!! csrf_field() !!}
                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_YxmYk6I6l0tDwGTCl6eVFCTG"
                        data-amount="500"
                        data-name="Tickit"
                        data-description="Souscription mensuelle"
                        data-locale="auto"
                        data-label="Payer maintenant"
                        data-email="{{ auth()->check()?auth()->user()->email: null}}"
                        data-locale="auto"
                        data-currency="eur">
                      </script>
                    </form>
                    @if ((Session::has('success-message')))
                        <div class="alert alert-success col-md-12">{{Session::get('success-message') }}</div>
                    @endif
                    @if ((Session::has('fail-message')))
                        <div class="alert alert-danger col-md-12">{{Session::get('fail-message') }}</div>
                    @endif
                @endrole
                <!-- End stripe -->

            </div>
        </div>

    </div>
@endsection
