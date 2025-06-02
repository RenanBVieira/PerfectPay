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

        // Verifica se o usuário já existe na base
        $customer = $asaasService->findCustomerByCpf($request->input('cpf_cnpj'));

        // Se ainda não existe, cria ele primeiro
        if (!$customer) {
            $customerData = [
                'name' => $request->input('name'),
                'cpfCnpj' => $request->input('cpf_cnpj'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ];
            
            $customer = $asaasService->createCustomer($customerData);

            if (isset($customer['errors'])) {
                return back()->withErrors('Erro ao criar cliente: ' . $customer['errors'][0]['description']);
            }
        }

        // Cria o pagamento com o ID do cliente
        $paymentData = [
            'customer' => $customer['id'],
            'billingType' => $request->input('billingType'),
            'value' => $request->input('value'),
        ];

        $payment = $asaasService->createPayment($paymentData);

        if (isset($payment['errors'])) {
            return back()->withErrors('Erro ao criar pagamento: ' . $payment['errors'][0]['description']);
        }

        // Redireciona para página de obrigado
        return redirect('/obrigado/' . $payment['id']);
    }

    public function showThankYouPage($paymentId, AsaasService $asaasService) {
        $paymentData = $asaasService->getPaymentDetails($paymentId);
        return view('thank-you', compact('paymentData'));
    }    
}
