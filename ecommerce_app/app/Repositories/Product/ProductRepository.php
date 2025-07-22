<?php

    namespace App\Repositories\Product;

    use App\Models\Product;
    
    class  ProductRepository 
    {
        public function create(array $data) 
        {
            return Product::create($data);
        }
        public function find($id)
        {
            return Product::find($id);
        }

        public function update($id ,array $data)
        {
            $product = Product::find($id);

            if ($product) {
                $product->update($data);
                return $product->fresh();
            }
            return $product;
        }

        public function delete($id)
        {
            $product = Product::find($id);
            if (!$product) {
                return null;
            }

            $product->delete();
            return $product;
        }

        public function all()
        {
            return Product::all();
        }
    }
    