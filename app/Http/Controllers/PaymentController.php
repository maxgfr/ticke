<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function indexPaiement(){
        if (Auth::user() == null) {
            abort(404);
        }
        return view('backoffice.paiement');
    }

    public function payment(Request $request){
        $token = $request->input('stripeToken');
        $to = auth()->user()->email;
        \Stripe\Stripe::setApiKey ('sk_test_fTwYzeKr9T58Wv14EX7n7Ea8');
        try {
            $customer = \Stripe\Customer::create(array(
                        "email"  => $to,
                        "source" => $token,
                    ));
            $charge = \Stripe\Charge::create ( array (
                "amount" => 55000,
                "currency" => "eur",
                "customer" => $customer->id,
                "description" => "Your Orientation - Stage 2018"
            ) );
            $role = Role::where('name', 'stage_paye')->first();
            if ($role == null) {
                $role = Role::create(['name' => 'stage_paye']);
            }
            Auth::user()->assignRole('stage_paye');
            $for_yo = "contact@your-orientation.com";
            Mail::send('mails.mail4', [], function ($message) use($to,$for_yo)
            {
                $message->from('no-reply@your-orientation.com', 'Your Orientation');
                $message->to($to)->subject("Confirmation paiement du stage d'été")->bcc($for_yo);
            });
            Session::flash('success-message', 'Paiement réalisé avec succès!');
            return redirect()->back();
        } catch ( \Exception $e ) {
            Session::flash('fail-message', "Erreur! Veuillez réessayer.");
            return redirect()->back();
        }


    }
}
