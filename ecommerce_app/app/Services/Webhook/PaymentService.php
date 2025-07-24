<?php 

    namespace App\Webhook\Services;

    use Illuminate\Support\Facades\Http;

    class PaymentService
    {  
        

        public function sendWebhook($payment)
        {
            $response = Http::post('url-123',[
                'order_id' => $payment->id,
                'status' => $payment->status,
                'amount' => $payment->amount,
                'payment_reference' => $payment->payment_reference,
            ]);

            return $response;
        }
    }
    