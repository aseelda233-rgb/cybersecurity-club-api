<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=Product::with('orders')->get();
        return response()->json([
            'status'=>'success',
            'message'=>"products retrieved successfully",
            'data'=>$product
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product=Product::create($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"product created successfully",
            'data'=>$product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('orders');
        return response()->json([
            'status'=>'success',
            'message'=>"product retrieved successfully",
            'data'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product,$id)
    {
        $product=Product::findOrFail($id);
        $product->update($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"product updated successfully",
            'data'=>$product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product,$id)
    {
        $product=Product::findOrFail($id);
        $product->orders()->detach();
        $product->delete();
        return response()->json([
            'status'=>'success',
            'message'=>"product deleted successfully",
            'data'=>$product
        ]);
    }
}
