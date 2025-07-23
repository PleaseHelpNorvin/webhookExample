<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderCreateRequest;
use App\Http\Requests\Order\OrderUpdateRequest;
// use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\User\UserRepository;

class OrderController extends Controller
{
    protected $orderRepo;
    protected $userRepo;
    protected $productRepo;

    public function __construct(OrderRepository $orderRepo,UserRepository $userRepo, ProductRepository $productRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->userRepo = $userRepo;
        $this->productRepo = $productRepo;
    }

    public function store(OrderCreateRequest $request) 
    {
        $fields = $request->validated();
        $user = $request->user();
        $fields['user_id'] = $user->id;
        $order = $this->orderRepo->create($fields);

        return $this->respondWithCreated([
            'order' => $order,
        ],'Order created successfully!');
    }

    public function index() {
        $orders = $this->orderRepo->all();

        return $this->respondWithSuccess([
            'order' => $orders,
        ],'Order fetched successfully!');
    }
    
    public function show($id) {
        $order = $this->orderRepo->find($id);

        if(!$order) {
            return $this->respondWithNotFound([
                'order' => $order,
            ],'Order not found');
        }

        return $this->respondWithSuccess([
            'order' => $order,
        ],'Order found');
    }

    public function update($id, OrderUpdateRequest $request) {

        $order = $request->validated();
        
        $update = $this->orderRepo->update($id, $order);

        if(!$update) {
            return $this->respondWithNotFound([
                'order' => $order,
            ],'Order not found');
        }

        return $this->respondWithSuccess([
            'order' => $order,
        ],'Order updated successfully!');
    }

    public function destroy($id) {

        $order = $this->orderRepo->delete($id);

        if (!$order) {
            return $this->respondWithNotFound([
                'order' => $order,
            ],'Order not found');
        }

          return $this->respondWithSuccess([
            'order' => $order,
        ],'Order deleted successfully!');
    }
}