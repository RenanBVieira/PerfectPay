<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestCreditCard extends TestCase
{
    /**
     * Simula o teste de um pagamento no cartão de crédito.
     */
    public function test_payment_by_credit_card(): void
    {
        $response = $this->post('/processar-pagamento', [
            'customer' => 'Jovanio',
            'billingType' => 'CREDIT_CARD',
            'value' => 700.00
        ]);
    
        $response->assertRedirect('/obrigado/');
    }
}
