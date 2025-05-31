<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestPix extends TestCase
{
    /**
     * Simula o teste básico de um pagamento por Pix
     */
    public function test_payment_by_pix(): void
    {
        $response = $this->post('/processar-pagamento', [
            'customer' => 'Joelcio',
            'billingType' => 'PIX',
            'value' => 100.00
        ]);
    
        $response->assertRedirect('/obrigado/');
    }
}
