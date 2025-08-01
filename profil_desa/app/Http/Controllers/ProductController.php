<?php

// app/Http/Controllers/ProductController.php

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
        $products = Product::paginate(10);

        // Kiim data tersebut ke view 'katalog'
        return view('katalog', ['products' => $products]);

        return response()->json($products);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Kirim data produk tersebut ke view 'detail-produk'
        return view('detail-produk', ['product' => $product]);

        return response()->json($product);
    }
}