<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::with('products')->get();
        return response()->json([
            'status'=>'success',
            'message'=>"orders retrieved successfully",
            'data'=>$orders
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
        $order=Order::create($request->all());
        if($request->has('products')) {
            foreach ($request->products as $product) {
                $order->products()->attach($product['id'], [
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                ]);
            }
        }
        return response()->json([
            'status'=>'success',
            'message'=>"order created successfully",
            'data'=>$order
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('products');
        return response()->json([
            'status'=>'success',
            'message'=>"order retrieved successfully",
            'data'=>$order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order,$id)
    {
        $order=Order::findOrFail($id);
        $order->update($request->all());
        if($request->has('products')) {
            $syncData = [];
            foreach ($request->products as $product) {
                $syncData[$product['id']] = [
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                ];
            }
            $order->products()->sync($syncData);
        }
        return response()->json([
            'status'=>'success',
            'message'=>"order updated successfully",
            'data'=>$order
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order,$id)
    {
       
    
         $order=Order::findOrFail($id);
        $order->products()->detach();
        $order->delete();
        return response()->json([
            'status'=>'success',
            'message'=>"order deleted successfully"
        ]);
    }
}
