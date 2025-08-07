<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar produk dengan filter dan pencarian.
     */
    public function index(Request $request)
    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        // Query dasar produk
        $query = Product::query();

        // Filter berdasarkan kategori (jika dipilih)
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Pencarian nama produk, seller, atau tag
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('seller', 'like', "%$search%")
                  ->orWhereJsonContains('tags', $search);
            });
        }

        // Paginate hasilnya
        $products = $query->paginate(10);

        // Kirim ke view katalog
        return view('katalog', compact('products', 'categories'));
    }

    /**
     * Tampilkan detail produk berdasarkan slug.
     */
    public function show($slug)
    {
    // Langkah 1: Ambil produk utama yang sedang dilihat
    $product = Product::with('category')->where('slug', $slug)->firstOrFail();

    // Langkah 2: Ambil produk lain dari kategori yang sama
    $relatedProducts = collect(); // Buat koleksi kosong untuk jaga-jaga
    if ($product->category) {
        $relatedProducts = Product::where('category_id', $product->category_id)
                                  ->where('id', '!=', $product->id) // Jangan tampilkan produk ini lagi
                                  ->inRandomOrder()
                                  ->limit(4) // Ambil maksimal 4
                                  ->get();
    }

    // Langkah 3: Kirim kedua data ke view
    return view('detail-produk', compact('product', 'relatedProducts'));
    }
}
