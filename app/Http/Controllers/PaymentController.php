<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\AsaasService;

class PaymentController extends Controller {
    public function showPaymentForm() {
        return view('payment');
    }

    public function processPayment(Request $request) {
        $asaasService = new AsaasService();
        $response = $asaasService->createPayment($request->all());

        return response()->json($response);
    }

    public function showThankYouPage($paymentId, AsaasService $asaasService) {
        $paymentData = $asaasService->getPaymentDetails($paymentId);
        return view('thank-you', compact('paymentData'));
    }    
}
