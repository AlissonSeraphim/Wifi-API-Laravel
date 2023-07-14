<?php

namespace App\Http\Controllers;

use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;

class WifiController extends Controller
{
    private $credentialsFile;
    private $wifiCredentials;


    public function __construct()
    {
        $this->credentialsFile = storage_path('data/credentials.json');
        $this->loadCredentials();
    }

    private function loadCredentials()
    {
        $credentials = file_get_contents($this->credentialsFile);
        $this->wifiCredentials = json_decode($credentials, true);
    }

    public function generateQrCode()
    {
        $username = $this->wifiCredentials['username'];
        $password = $this->wifiCredentials['password'];
        $wifiString = "WIFI:T:WPA;S:$username;P:$password;;";

        $qrCode = QRCode::create($wifiString)
        ->setSize(300);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $qrCodeFinal = $result->getDataUri();

        return response()->json(['qrCodeUrl' => $qrCodeFinal,
        'credentialsRefreshed' => $this->wifiCredentials,
    ]);
    }

    public function updateCredentials(Request $request)
    {
        $data = $request->json()->all();
        $this->wifiCredentials['username'] = $data['username'];
        $this->wifiCredentials['password'] = $data['password'];

        file_put_contents($this->credentialsFile, json_encode($this->wifiCredentials));

        return response()->json([
            'message' => 'Credenciais do Wi-Fi atualizadas com sucesso.',
            'credentialsRefreshed' => $this->wifiCredentials,
        ]);
    }
}

