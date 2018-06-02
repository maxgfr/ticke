@extends('layouts.app')

@section ('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="fa fa-ticket-alt"></i></span> Abonnement</h1>
        </div>

        <div class="px-content">
            <!-- Plans & pricing -->
            @role('basic')
                Tu as payé :-)
            @else
              <div class="pricing-page-header page-header panel text-xs-center">
                <h1 class="font-size-24 font-weight-bold m-b-1">Bénéficiez de 14 jours d'essai.</h1>
                <p class="m-b-4 font-size-18 text-muted">Pas besoin de carte de crédit.</p>
                <a href="#" class="btn btn-lg btn-primary font-weight-bold">CHOISISSEZ L'OFFRE GRATUITE</a>
              </div>

              <hr class="page-wide-block m-y-0">

              <div class="widget-pricing widget-pricing-expanded">

                  <div class="col-md-8">
                    <div class="widget-pricing-item">
                      <h2 class="widget-pricing-plan">Pro</h2>
                      <div class="widget-pricing-section p-y-2 bg-primary">
                        <div class="font-size-24"><small>$</small>36</div>
                        <div class="font-size-11 font-weight-semibold text-muted">PER MONTH</div>
                      </div>
                      <div class="widget-pricing-section">
                        <strong>20</strong> users<br>
                        <strong>100</strong> projects<br>
                        <strong>300GB</strong> space<br>
                      </div>
                      <div class="widget-pricing-section">
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
                              data-label="Choisir"
                              data-email="{{ auth()->check()?auth()->user()->email: null}}"
                              data-locale="auto"
                              data-currency="eur">
                            </script>
                          </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="widget-pricing-item">
                      <h2 class="widget-pricing-plan">Team</h2>
                      <div class="widget-pricing-section p-y-2 bg-white darker">
                        <div class="font-size-24"><small>$</small>200</div>
                        <div class="font-size-11 font-weight-semibold text-muted">PER MONTH</div>
                      </div>
                      <div class="widget-pricing-section">
                        <strong>Unlimited</strong> users<br>
                        <strong>Unlimited</strong> projects<br>
                        <strong>1000GB</strong> space<br>
                      </div>
                      <div class="widget-pricing-section"><button type="button" class="btn btn-lg btn-outline btn-primary btn-outline-colorless">Contact Us</button></div>
                    </div>
                  </div>
                </div>
              </div>
              @if ((Session::has('success-message')))
                  <div class="alert alert-success col-md-12">{{Session::get('success-message') }}</div>
              @endif
              @if ((Session::has('fail-message')))
                  <div class="alert alert-danger col-md-12">{{Session::get('fail-message') }}</div>
              @endif

          <!-- / Plans & pricing -->

          <!-- Customers -->

          <div class="pricing-page-customers page-block p-y-4 text-xs-center">
            <div class="m-t-0 text-muted m-b-2 font-size-18 font-weight-semibold">Plusieurs client font confiance :</div>
            <div class="pricing-page-customers-logos">

            </div>
          </div>

          <!-- / Customers -->

          @endrole

          <h3 class="m-y-4 text-xs-center">Common questions</h3>

          <!-- FAQ -->

          <div class="row">
            <div class="col-md-6">
              <div class="panel">
                <div class="panel-title">What is included in the free trial?</div>
                <div class="panel-body">
                  All plans begin with a 14-day no-obligation trial of our Pro tier.
                </div>
              </div>
              <div class="panel">
                <div class="panel-title">What happens when my free trial expires?</div>
                <div class="panel-body">
                  When your trial expires we'll downgrade you to our free tier. Our free tier is limited to a single user and 2 projects.
                </div>
              </div>
              <div class="panel">
                <div class="panel-title">Do you offer yearly plans?</div>
                <div class="panel-body">
                  If you pay for a year upfront (optional) you are eligible for a 15% discount.
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel">
                <div class="panel-title">Do you restrict features with a free trial?</div>
                <div class="panel-body">
                  While trials are more limited than paid accounts, you will be able to try most of our features.
                </div>
              </div>
              <div class="panel">
                <div class="panel-title">What payment methods do you accept?</div>
                <div class="panel-body">
                  Visa, MasterCard, and American Express. For annual plans we also accept Paypal, checks, and wire transfers.
                </div>
              </div>
              <div class="panel">
                <div class="panel-title">Do you have a setup cost?</div>
                <div class="panel-body">
                  Absolutely not. All plans are month to month with no contracts, no setup fees, and no hidden gimmicks. Cancel anytime.
                </div>
              </div>
            </div>
          </div>

          <!-- / FAQ -->

        </div>

    </div>
@endsection
