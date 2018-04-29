<?php

namespace App\Http\Controllers;

use App\BatchTicket;
use App\Ticket;
use App\Restaurant;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BatchTicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        $restau = Restaurant::findOrFail($id);
        /* Security */
        $id_user = Auth::user()->id;
        if ($id_user != $restau->responsable) {
            abort(404);
        }
        /* End security */
        $batchs = $restau->batch()->get();
        return view('connected.batch.index', compact( 'batchs', 'restau'));
    }

    public function import (Request $request){
        //etape 0 valider la requête
        $file = $request->file('file');
        $validator = Validator::make(
            [
                'file'      => $file,
                'extension' => strtolower($file->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required',
                'extension'      => 'required|in:txt',
            ]
        );
        if ($validator->fails())
        {
            $messages = $validator->messages();
            return redirect()->back()->with('error', $messages);
        }
        else {
            //etape 1 : créer un batch
            /*DB::table('batchtickets')->insertGetId(
                ['date' => Carbon::now(), 'envoye' => false, 'paye' => false, 'restaurant_id' => $request->get('restaurant_id')]
            );*/
            BatchTicket::create([
                'date' => Carbon::now(),
                'envoye' => false,
                'paye' => false,
                'restaurant_id' => $request->get('restaurant_id'),
            ]);
            //etape 2 : créer pour chaque ligne un ticket
            $content = file($file);
            foreach ($content as $line) {
                if (strlen($line) == 25) {
                    $numero_titre= substr($line,0, 9);
                    $cle_cryptage= substr($line,9, 2);
                    $valeur= substr($line,11, 5);
                    $emetteur= substr($line,16, 1);
                    $cle_controle= substr($line,17, 2);
                    $code_famille= substr($line,19, 3);
                    $produit= substr($line,22, 1);
                    $millesime= substr($line,23, 1);
                    $batch_id = BatchTicket::last();
                    $res = Ticket::ligne($line)->get();
                    if (count($res) == 0) {
                        DB::table('tickets')->insertGetId(
                            [   'numero_titre' => $numero_titre, 'cle_cryptage' => $cle_cryptage, 'valeur' => $valeur, 'emetteur' => $emetteur,
                                'cle_controle' => $cle_controle, 'code_famille' => $code_famille, 'produit' => $produit, 'millesime' => $millesime,
                                'batchticket_id' => $batch_id, 'ligne' => $line
                            ]
                        );
                    }
                }
            }
        }
        $id_etbalissements = $request->get('restaurant_id');
        return redirect()->route('batch_restaurant', $id_etbalissements)->with('success', 'Batch ajouté à la base avec succès!');
    }

    public function destroyBatch ($id, $id_etbalissements) {
        /* Security */
        $restau = Restaurant::findOrFail($id_etbalissements);
        $id_user = Auth::user()->id;
        if ($id_user != $restau->responsable) {
            abort(404);
        }
        /* End security */
        $bt = BatchTicket::findOrFail($id);
        $bt->delete();
        return redirect()->route('batch_restaurant', $id_etbalissements)->with('error', 'Batch supprimé...');
    }

    public function showBatch ($id_restau, $id_batch) {
        $restau = Restaurant::findOrFail($id_restau);
        /* Security */
        $id_user = Auth::user()->id;
        if ($id_user != $restau->responsable) {
            abort(404);
        }
        /* End security */
        $batch = BatchTicket::findOrFail($id_batch);
        $tickets = $batch->ticket()->get();
        return view('connected.batch.show', compact('tickets','batch', 'restau'));

    }

    public function destroyTickets ($id_restau, $id_batch, $id_ticket) {
        $tk = Ticket::findOrFail($id_ticket);
        $tk->delete();
        return redirect()->route('show_batch', $batch_id)->with('error', 'Ticket restaurant supprimé...');
    }
}
