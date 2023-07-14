<?php

namespace App\Http\Controllers;

use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Illuminate\Support\Facades\Cache;

class WifiController extends Controller
{

    public function generateQrCode()
    {
        $username = Cache::get('username', 'Martelo de pedreiro');
        $password = Cache::get('password', '123456');
        $wifiString = "WIFI:T:WPA;S:$username;P:$password;;";

        $qrCode = QRCode::create($wifiString)
        ->setSize(300);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $qrCodeFinal = $result->getDataUri();

        return response()->json(['qrCodeUrl' => $qrCodeFinal]);
    }

    public function updateCredentials(Request $request)
    {
        $data = $request->json()->all();
        $username = $data['username'];
        $password = $data['password'];

        Cache::put('username', $username);
        Cache::put('password', $password);

        return response()->json(['message' => 'Credenciais do Wi-Fi atualizadas com sucesso.']);
    }
}
