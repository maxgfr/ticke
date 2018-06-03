<?php

use Illuminate\Http\Request;
use App\Batch;
use App\BigTicket;
use App\Entity;
use App\Pattern;
use App\Repartition;
use App\Ticket;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);

Route::get('batchs', function() {
    Auth::guard('remember_token')->id();
    $entities = Auth::user()->entity()->get();
    $patterns = Auth::user()->pattern()->get();
    return Batch::all();
});

Route::get('batchs/{id}', function($id) {
    return Batch::find($id);
});

Route::post('batchs', function(Request $request) {
    return Batch::create($request->all);
});

Route::put('batchs/{id}', function(Request $request, $id) {
    $batch = Batch::findOrFail($id);
    $batch->update($request->all());
    $batch->update($request->all());

    return response()->json($batch, 200);

});

Route::delete('batchs/{id}', function($id) {
    Batch::find($id)->delete();

    return response()->json(null, 204);
});
