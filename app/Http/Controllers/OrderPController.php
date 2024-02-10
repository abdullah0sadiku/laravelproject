<?php

namespace App\Http\Controllers;

use App\Models\OrderP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class OrderPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
        {
        $productName = $request->input('name');
        $productImage = $request->input('image');
        $productPrice = $request->input('price');
        $productStock = $request->input('stock');
            
        return view('order.orderpage', compact('productName', 'productImage', 'productPrice', 'productStock'));
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
         $validatedData = $request->validate([
             'product_name' => 'required|string',
             'product_image' => 'required|string',
             'product_price' => 'required|numeric',
             'product_stock' => 'required|integer',
             
             'email' => 'required|email',
             'shipping_method' => 'required|string',
             'payment_method' => 'required|string',
             'address' => 'required|string',
         ]);
         $validatedData['user_id'] = Auth::id();
         OrderP::create($validatedData);
         return Redirect::away('/dashboard')->with('success', 'Order placed successfully!');
     }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
