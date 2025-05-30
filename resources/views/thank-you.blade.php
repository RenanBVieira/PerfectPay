@if($paymentData['billingType'] == 'BOLETO')
    <a href="{{ $paymentData['bankSlipUrl'] }}" target="_blank">Clique aqui para acessar seu boleto</a>
@elseif($paymentData['billingType'] == 'PIX')
    <img src="{{ $paymentData['pixQrCodeImage'] }}" alt="QR Code Pix">
    <p>{{ $paymentData['pixCopyPaste'] }}</p>
@endif
<p>Obrigado pelo pagamento!</p>
