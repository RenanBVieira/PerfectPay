<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', [PaymentController::class, 'showPaymentForm']);
Route::post('/processar-pagamento', [PaymentController::class, 'processPayment']);
Route::get('/obrigado/{paymentId}', [PaymentController::class, 'showThankYouPage']);