<?php

namespace App\Http\Controllers\product;

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
        ],'Product created successfully!');
    }

    public function index() {
        $products = $this->productRepo->all();

        return $this->respondWithSuccess([
            'products' => $products,
        ],'Product fetched successfully!');
    }

    public function show($id) {
        $product = $this->productRepo->find($id);
        
        if (!$product) {
            return $this->respondWithNotFound([
                'product' => $product,
            ],'Product not found');
        }

        return $this->respondWithSuccess([
            'product' => $product,
        ],'Product found');
    }
    
    public function update($id, ProductUpdateRequest $request) { 

        $fields = $request->validated();

        $product = $this->productRepo->update($id, $fields);

        if (!$product) {
            return $this->respondWithNotFound([
                'product' => $product,
            ], 'Product not found');
        }
        
        return $this->respondWithSuccess([
            'product' => $product,
        ],'Product updated successfully!');

    }
    public function destroy($id) {
        $product = $this->productRepo->delete($id);

        if(!$product) {
            return $this->respondWithNotFound([
                'product' => $product,
            ],'Product not found'); 
        }

        return $this->respondWithSuccess([
            'product' => $product,
        ],'Product deleted successfully!');
    }

}
