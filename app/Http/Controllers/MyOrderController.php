<?php

namespace App\Http\Controllers;

use App\Models\OrderP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve orders for the authenticated user
        $userOrders = OrderP::where('user_id', Auth::id())->get();
        
        // Return the view with the orders data
        return view('order.MyOrder', compact('userOrders'));
    }

    
}
