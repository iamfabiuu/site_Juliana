<?php

<<<<<<< HEAD
use App\Http\Controllers\Api\VagaController;
=======
use Illuminate\Http\Request;
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
<<<<<<< HEAD
| API Routes - Site público (Next.js)
|--------------------------------------------------------------------------
*/

// Monitoramento (UptimeRobot, BetterStack etc.)
Route::get('/health', fn () => response()->json(['status' => 'ok']));

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/vagas', [VagaController::class, 'index']);
    Route::get('/vagas/{id}', [VagaController::class, 'show'])->whereNumber('id');
});

Route::post('/candidaturas', [VagaController::class, 'candidatar'])
    ->middleware('throttle:5,1');
=======
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
