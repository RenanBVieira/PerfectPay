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
            'customer' => $data['customer'],
            'billingType' => $data['billingType'],
            'value' => $data['value'],
            'dueDate' => now()->addDays(3)->toDateString()
        ])->json();
    }

    public function getPaymentDetails($paymentId) {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'access_token' => $this->apiKey
        ])->get($this->baseUrl . 'payments/' . $paymentId)->json();
    }
}
