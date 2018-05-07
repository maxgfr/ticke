<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function indexPaiement(){
        if (Auth::user() == null) {
            abort(404);
        }
        return view('connected.payment');
    }

    public function payment(Request $request){
        $token = $request->input('stripeToken');
        $to = auth()->user()->email;
        \Stripe\Stripe::setApiKey ('sk_test_fTwYzeKr9T58Wv14EX7n7Ea8');
        try {
            $product = \Stripe\Product::create([
                'name' => 'Tickit',
                'type' => 'service',
            ]);
            $plan = \Stripe\Plan::create([
              'product' => $product->id,
              'nickname' => 'Monthly Payment for Tickit',
              'interval' => 'month',
              'currency' => 'eur',
              'amount' => 500,
            ]);
            $customer = \Stripe\Customer::create([
                "email"  => $to,
                "source" => $token,
            ]);
            $subscription = \Stripe\Subscription::create([
                'customer' => $customer->id,
                'items' => [['plan' => $plan->id]],
            ]);
            $role = Role::where('name', 'basic')->first();
            if ($role == null) {
                $role = Role::create(['name' => 'basic']);
            }
            Auth::user()->assignRole('basic');
            Session::flash('success-message', 'Paiement réalisé avec succès!');
            return redirect()->back();
        } catch ( \Exception $e ) {
            Session::flash('fail-message', "Erreur! Veuillez réessayer.");
            return redirect()->back();
        }


    }
}
