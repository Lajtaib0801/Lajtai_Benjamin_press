<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::with('category')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $request->validated();
        $order = Order::create($request->all()); //error status code + message
        return response()->json(["id" => $order->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::with('category')->find($id);
        if (is_null($order)) {
            return response()->json(['Message' => 'A megrendelés nem létezik.'], 404);
        }
        return response()->json($order);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return response()->json(['Message' => 'Hiányos adatok'], 404);
        }
        $order->update(request()->all());
        return response()->json($order, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return response()->json(['Message' => 'A megrendelés nem létezik.'], 404);
        }
        Order::destroy($id);
        return response()->noContent();
    }
}
