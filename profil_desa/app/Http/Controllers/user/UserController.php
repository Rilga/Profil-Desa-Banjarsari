<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function produkunggulan()
    {
        $featuredProducts = Product::with('category')
        ->where('is_featured', 1)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('user.produkunggulan', compact('featuredProducts'));
    }

    public function katalog()
    {
        $categories = Category::all();
        
        $products = Product::latest()->paginate(10); 

        return view('user.katalog', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}