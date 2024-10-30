<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SteadfastCourierService
{
    protected $baseUrl;
    protected $apiKey;
    protected $secretKey;

    public function __construct()
    {
        $this->baseUrl = env('STEADFAST_BASE_URL', 'https://portal.packzy.com/api/v1');
        $this->apiKey = env('STEADFAST_API_KEY');
        $this->secretKey = env('STEADFAST_SECRET_KEY');
    }

    protected function headers()
    {
        return [
            'Api-Key' => $this->apiKey,
            'Secret-Key' => $this->secretKey,
            'Content-Type' => 'application/json',
        ];
    }
}
