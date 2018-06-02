<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Ticket;
use App\BigTicket;
use App\Pattern;
use App\Entity;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BatchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $entities = Auth::user()->entity()->get();
        $patterns = Auth::user()->pattern()->get();
        return view('connected.batch_index', compact( 'patterns', 'entities'));
    }

    public function post(Request $request){
        return redirect()->route('batch.getbatch', ['id_pattern' => $request->get('pattern'), 'id_entity' => $request->get('entity')]);
    }

    public function getBatch($id_entity, $id_pattern){
        $entity = Entity::findOrFail($id_entity);
        $pattern = Pattern::findOrFail($id_pattern);
        $batchs = $pattern->batch()->get();
        return view('connected.batch_show', compact( 'id_pattern', 'id_entity', 'batchs', 'entity', 'pattern'));
    }

    public function import (Request $request){

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
            $created_at = now();

            $id_pattern = $request->get('id_pattern');
            $id_entity = $request->get('id_entity');

            $batch = Batch::create([
                'date' => Carbon::now(),
                'pattern_id' => $id_pattern,
                'entity_id' => $id_entity
            ]);
            $batch_id = $batch->id;

            $pattern = Pattern::findOrFail($id_pattern);
            $repartitions = $pattern->repartition()->get()->sortBy('emplacement');

            $total_item = 0;
            $nb_emplacement = 0;
            foreach ($repartitions as $repartition) {
                $total[$nb_emplacement] = $repartition->total;
                $repartition_id[$nb_emplacement] = $repartition->id;
                $total_item += $repartition->total;
                $nb_emplacement++;
            }
            //dd($repartitions,$batch_id, $repartition_id, $total, $total_item, $nb_emplacement);
            $length_tab = 0;
            $length_realtab = 0;
            $answers = [];
            $realvalue = [];
            $content = file($file);
            $fake_value = BigTicket::create(['bigvalue' => 0, 'batch_id' => null]);
            $last_increment = $fake_value->id;
            $id_to_delete = $fake_value->id;
            foreach ($content as $line) {
                if (strlen($line) == $total_item+1) {
                    $then = 0;
                    $last_increment++;
                    $realvalue[$length_realtab] = ['bigvalue' => $line, 'batch_id' => $batch_id, 'created_at' => $created_at];
                    $length_realtab++;
                    for ($i = 0; $i<$nb_emplacement ; $i++) {
                        $nb_total_take = $total[$i];
                        $id_repartiton = $repartition_id[$i];
                        $value = substr($line, $then, $nb_total_take);
                        //DB::table('ticket')->insertGetId(['value' => $value, 'batch_id' => $batch_id, 'repartition_id' => $id_repartiton]);
                        $answers[$length_tab] = ['value' => $value, 'big_ticket_id' => $last_increment, 'repartition_id' => $id_repartiton, 'created_at' => $created_at];
                        $length_tab++;
                        $then += $nb_total_take;
                    }
                } else {
                    $batch->delete();
                    return redirect()->route('batch.getbatch', ['id_pattern' => $request->get('id_pattern'), 'id_entity' => $request->get('id_entity')])->with('error', 'Batch ne correspondant pas au pattern associé!');
                }
            }
            //dd($answers,$realvalue);
            BigTicket::insert($realvalue);
            Ticket::insert($answers);
            //delete NULL object
            BigTicket::destroy($id_to_delete);
        }

        return redirect()->route('batch.getbatch', ['id_pattern' => $request->get('id_pattern'), 'id_entity' => $request->get('id_entity')])->with('success', 'Batch ajouté à la base avec succès!');
    }

    public function showBatch ($id_entity, $id_pattern, $id_batch) {
        $entity = Entity::findOrFail($id_entity);
        /* Security */
        $id_user = Auth::user()->id;
        if ($id_user != $entity->users_id) {
            abort(404);
        }
        /* End security */
        $batch = Batch::findOrFail($id_batch);
        $pattern = Pattern::findOrFail($id_pattern);
        $repartitions = $pattern->repartition()->get()->sortBy('emplacement');
        $bigtickets = $batch->bigticket()->get();
        $nb_repartitions = count($repartitions);
        /*foreach($bigtickets as $bticket) {
            $tickets[0] = $bticket->repartition()->get();
            dd($tickets);
        }*/
        //dd($bigtickets, $repartitions);
        return view('connected.batch_ticket', compact('batch', 'bigtickets', 'entity', 'pattern', 'repartitions', 'nb_repartitions'));

    }

    public function destroyBatch ($id_entity, $id_batch) {
        /* Security */
        $entity = Entity::findOrFail($id_entity);
        $id_user = Auth::user()->id;
        if ($id_user != $entity->users_id) {
            abort(404);
        }
        /* End security */
        $bt = Batch::findOrFail($id_batch);
        $id_pattern = $bt->pattern_id;
        $bt->delete();
        return redirect()->route('batch.getbatch', ['id_pattern' => $id_pattern, 'id_entity' => $id_entity])->with('error', 'Batch supprimé...');
    }

    public function destroyTickets ($id_entity, $id_pattern, $id_batch, $id_ticket) {
        $tk = BigTicket::findOrFail($id_ticket);
        $tk->delete();
        return redirect()->route('batch.show', ['id_entity' => $id_entity, 'id_batch' => $id_batch, 'id_pattern' => $id_pattern])->with('error', 'Ticket supprimé...');
    }

}
