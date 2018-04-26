<?php

namespace App\Http\Controllers;

use App\BatchTicket;
use App\Ticket;
use Carbon\Carbon;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexId($id_restau)
    {
        $batchs = BatchTicket::filter($id_restau)->get();
        return view('batch.index', compact( 'batchs', 'id_restau'));
    }

    public function import (Request $request)
    {
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
            DB::table('batchtickets')->insertGetId(
                ['date' => Carbon::now(), 'envoye' => false, 'paye' => false, 'restaurant_id' => $request->get('restaurant_id')]
            );
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

    public function showBatch ($id) {
        $batch = BatchTicket::findOrFail($id);
        $tickets = Ticket::filter($id)->get();
        return view('batch_tickets.show_id', compact('tickets','batch'));

    }

    public function destroyBatch ($id, $id_etbalissements) {
        $bt = BatchTicket::findOrFail($id);
        $bt->delete();
        return redirect()->route('batch_restaurant', $id_etbalissements)->with('error', 'Batch supprimé...');
    }

    public function destroyTickets ($id, $batch_id) {
        $tk = Ticket::findOrFail($id);
        $tk->delete();
        return redirect()->route('show_batch', $batch_id)->with('error', 'Ticket restaurant supprimé...');
    }
}
