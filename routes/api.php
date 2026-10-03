<?php

use App\Http\Controllers\Api\VagaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
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
