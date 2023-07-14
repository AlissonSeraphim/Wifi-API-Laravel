<?php

use App\Http\Controllers\WifiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return response()->json([
        'message' => 'Bem vindo a API de QRCode, para requisições get e post acesse o /wifi!',
    ]);
});

Route::get('/wifi', [WifiController::class, 'generateQrCode']);
Route::post('/wifi', [WifiController::class, 'updateCredentials']);
