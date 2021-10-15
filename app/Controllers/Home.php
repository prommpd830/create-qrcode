<?php

namespace App\Controllers;

use App\Controllers\Auth;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Home extends ResourceController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    use ResponseTrait;
    public function index()
    {
        $key = getenv('TOKEN_SECRET');

        if (!$this->session->has('token')) {
            return redirect('login')->with('error', 'You must be login!');
        }

        $token = $this->session->get('token');

        try {
            $decoded = JWT::decode($token, $key, ['HS256']);

            $data = [
                'title' => 'Create Your Code!',
                'user' => [
                    'id' => $decoded->id,
                    'name' => $decoded->name,
                    'email' => $decoded->email,
                    'img' => $decoded->img
                ]
            ];

            // dd($data);

            return view('index.php', $data);
            
        } catch (\Exception $e) {
            return redirect('login')->with('error', 'Token is invalid');
        }
    }


    public function qrcode()
    {
        $content = $this->request->getPost('content');
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($content)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->build();

        $data = [
            'content' => $content,
            'url' => $result->getDataUri()
        ];

        return $this->respond($data);
    }
}
