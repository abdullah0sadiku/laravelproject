<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
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
        $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);

        $data = $request->except('_token');

        if($request->hasfile('image')){
            $image = $request->image->getClientOriginalName();
            $name = pathinfo($image ,PATHINFO_FILENAME);
            $ext = pathinfo($image ,PATHINFO_EXTENSION);

            $filename = time() . '.' . $request->image->extension();  
            $request->image->storeAs('public/storage/products/'. $filename);
            Storage::putFileAs('public/storage/products/',$request->image, $filename);

            $data['image'] = $filename;
        }

        Product::create($data);
        $products = Product::all();
        return redirect()->route('product.index')->with(['status' => 'Product was created successfully.', 'products' => $products]);
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
        $product = Product::findOrFail($id);

        // Delete the associated image if it exists
        if (!empty($product->image)) {
            $imagePath = 'public/products/' . $product->image;

        
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
    }

   
        $product->delete();
    
        return redirect()->back()->with('status', 'Product and associated image were deleted successfully.');
    }
}
