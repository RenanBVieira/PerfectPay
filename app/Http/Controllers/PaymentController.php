<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\AsaasService;

class PaymentController extends Controller {
    public function showPaymentForm() {
        return view('payment');
    }

    public function processPayment(Request $request, AsaasService $asaasService) {
        $paymentResponse = $asaasService->createPayment($request->all());

        if (!$paymentResponse['success']) {
            return back()->withErrors(['error' => $paymentResponse['message']]);
        }

        return redirect()->route('obrigado', ['paymentId' => $paymentResponse['paymentId']]);
    }

    public function showThankYouPage($paymentId, AsaasService $asaasService) {
        $paymentData = $asaasService->getPaymentDetails($paymentId);
        return view('thank-you', compact('paymentData'));
    }    
}
