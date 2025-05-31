<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestBoleto extends TestCase
{
    /**
     * Simula o teste de um pagamento no boleto.
     */
    public function test_payment_by_boleto(): void
    {
        $response = $this->post('/processar-pagamento', [
            'customer' => 'Jovanio',
            'billingType' => 'BOLETO',
            'value' => 150.00
        ]);
    
        $response->assertRedirect('/obrigado/');
    }
}
