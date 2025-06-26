<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;


class ProductController extends Controller
{
        public function index() {
        $products = Product::all();

        if($products->count() < 1){
            return response()->json([
                'message' => 'No Products Available'
            ], 201);
        }

        return response()->json([
            'status' => 'success',
            'data' => ProductResource::collection($products)
        ], 201);
    }

    public function show($id){
        $product = Product::find($id);

        if(!$product){
            return response()->json([
                'status' => 'error',
                'message' => 'Product Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new ProductResource($product)
        ], 201);
    }

    public function create(StoreProductRequest $request) {

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return response()->json([
            'status' => 'success',
            'data' => new ProductResource($product)
        ], 201);
    }

    public function update(StoreProductRequest $request, $id) {

        $product = Product::find($id);

        if(!$product){
            return response()->json([
                'status' => 'error',
                'message' => 'Product Not Found!'
            ], 404);
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return response()->json([
            'status' => 'success',
            'data' => new ProductResource($product)
        ], 201);
    }

    public function delete($id){
        $product = Product::find($id);

        if(!$product){
            return response()->json([
                'status' => 'error',
                'message' => 'Product Not Found!'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product Deleted Successfully!',
        ], 201);
    }

}
