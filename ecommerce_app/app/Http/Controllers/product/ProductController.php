<?php

namespace App\Http\Controllers\product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo) 
    {
        $this->productRepo = $productRepo;
    }

    public function store(ProductCreateRequest $request)
    {   
        $fields = $request->validated();

        $product = $this->productRepo->create($fields);

        return $this->respondWithCreated([
            'product' => $product,
            'message' => 'Product created successfully!',
        ]);
    }

    public function index() {
        $products = $this->productRepo->all();

        return $this->respondWithSuccess([
            'products' => $products,
            'message' => 'Product fetched successfully!',

        ]);
    }

    public function show($id) {
        $product = $this->productRepo->find($id);
        
        if (!$product) {
            return $this->respondWithNotFound([
                'product' => $product,
                'message' => 'Product not found',
            ]);
        }

        return $this->respondWithSuccess([
            'product' => $product,
            'message' => 'Product found',
        ]);
    }
    
    public function update($id, ProductUpdateRequest $request) { 

        $fields = $request->validated();

        $product = $this->productRepo->update($id, $fields);

        if (!$product) {
            return $this->respondWithNotFound([
                'product' => $product,
                'message' => 'Product not found',
            ]);
        }
        
        return $this->respondWithSuccess([
            'product' => $product,
            'message' => 'Product updated successfully!',
        ]);

    }
    public function destroy($id) {
        $product = $this->productRepo->delete($id);

        if(!$product) {
            return $this->respondWithNotFound([
                'product' => $product,
                'message' => 'Product not found',
            ]); 
        }

        return $this->respondWithSuccess([
            'product' => $product,
            'message' => 'Product deleted successfully!',
        ]);
    }

}
