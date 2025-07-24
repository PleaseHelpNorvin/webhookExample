<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepository;
use App\Webhook\Services\PaymentService;
use App\Http\Requests\Payment\paymentRequest;


class PaymentController extends Controller
{
    protected $orderRepo;
    protected $paymentService;
    public function __construct(PaymentService $paymentService, OrderRepository $orderRepo)
    { 
        $this->$orderRepo = $orderRepo;
        $this->$paymentService = $paymentService;        
    }

    public function store(PaymentRequest $request) 
    {
        $orderId = $request->input('order_id');
        $order = $this->orderRepo->find($orderId);

        if (!$order) {
            return $this->respondWithNotFound([], 'Order not found');
        }

        $webhookResponse = $this->paymentService->sendWebhook($order);

        return $this->respondWithCreated([
            'order' => $order, 
            'webhook_status' => $webhookResponse,
        ], 'Payment created successfully!');
    }
}
