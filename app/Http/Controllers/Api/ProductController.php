<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request);
        $product = Product::create($request->all());
    
        return response()->json([
            'message' => "Product saved successfully!",
            'product' => $product
        ], 200);
    }


    public function createProduct(Request $request)
    {
        // dd($request);
        $product = Product::create($request->all());
    
        return response()->json([
            'message' => "Product saved successfully!",
            'product' => $product
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());
    
        return response()->json([
            'message' => "Product updated successfully!",
            'product' => $product
        ], 200);
    }


    public function updateProduct(Request $request)
    {
        // dd($request->all());
        $product=Product::find($request->id);
        if($product)
        {
        $product->update($request->all());
        return response()->json([
            'message' => "Product updated successfully!",
            'product' => $product
        ], 200);
        }
        else{
            return response()->json([
                'message' => "Product Not Found",
            ], 200);

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return response()->json([
            'message' => "Product deleted successfully!",
        ], 200);
    }
}
