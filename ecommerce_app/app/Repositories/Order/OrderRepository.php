<?php
    
    namespace App\Repositories\Order;
    
    use App\Models\Order;

    class OrderRepository 
    {
        public function create(array $data)
        {
            $order = Order::create($data);
            return $order->load(['user', 'product']);
        }        

        public function find($id)
        {   
            $order = Order::find($id);
            if(!$order) {
                return null;
            }
            return $order->load(['user', 'product']);
        }

        public function update($id, array $data)
        {
            $order = Order::find($id);
            
            if (!$order) {
                return null;
            }

            $order->update($data);

            return $order->load(['user', 'product'])->fresh();
        }

        public function delete($id)
        {
            $order = Order::find($id);
            if(!$order) {
                return null;
            }

            $order->delete();

            return $order->load(['user', 'product']);
        }

        public function all()
        {
            return Order::get()->load(['user','product']);
        }
    }
    