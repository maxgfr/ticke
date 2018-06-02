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

class BarcodeController extends Controller
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
        return view('connected.barcode_index', compact( 'patterns', 'entities'));
    }

    public function getBarcode(){
        return view('connected.barcode_show');
    }

}
