<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AsaasService {
    protected $apiKey;
    protected $baseUrl = "https://sandbox.asaas.com/api/v3/";

    public function __construct() {
        $this->apiKey = env('ASAAS_API_KEY');
    }

    public function createPayment(array $data) {

        return Http::withHeaders([
                'Content-Type' => 'application/json',
                'access_token' => $this->apiKey
            ])->post($this->baseUrl . 'payments', [
                'customer' => "cus_1234567890",
                'billingType' => $data['billingType'],
                'value' => $data['value'],
                'dueDate' => now()->addDays(3)->toDateString()
        ])->json();
    }

    public function createCustomer(array $data) {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'access_token' => $this->apiKey
        ])->post($this->baseUrl . 'customers', $data)->json();
    }

    // public function createPayment(array $data) {
    //     dd([
    //         'enviado_para_asaas' => $data,
    //         'url' => $this->baseUrl . 'payments',
    //         'headers' => [
    //             'Content-Type' => 'application/json',
    //             'access_token' => $this->apiKey,
    //         ],
    //     ]);
    // }    

    public function getPaymentDetails($paymentId) {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'access_token' => $this->apiKey
        ])->get($this->baseUrl . 'payments/' . $paymentId)->json();
    }
}
