<?php

namespace App\Http\Controllers;

use App\Models\OrderP;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = OrderP::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = OrderP::findOrFail($id);
        return view('order.edit', compact('order'));
    }

    public function complete(OrderP $order)
    {
        $order->status = 'completed';
        $order->save();

        return redirect()->route('order.index')->with('success', 'Order completed successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = OrderP::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully.');
    }
}
