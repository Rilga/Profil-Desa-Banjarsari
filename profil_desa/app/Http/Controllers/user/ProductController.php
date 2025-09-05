<?php

namespace App\Http\Controllers\user; // Pastikan namespace-nya user

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use App\Imports\ProductsImport;
use App\Exports\ProductsTemplateExport;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Menampilkan halaman utama (tabel produk).
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        // Arahkan ke view di dalam folder user/products
        return view('user.products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk menambah produk baru.
     */
    public function create()
    {
        $categories = Category::all();
        // Arahkan ke view di dalam folder user/products
        return view('user.products.create', compact('categories'));
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'shoppee' => 'nullable|url',
            'whatsapp' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'seller' => 'required|string|max:255',
        ]);

        if ($request->has('is_featured')) {
            $countFeatured = Product::where('is_featured', true)->count();
            if ($countFeatured >= 3) {
                return back()->withErrors(['is_featured' => 'Maksimal hanya boleh ada 3 produk unggulan.'])
                             ->withInput();
            }
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        $validatedData['slug'] = Str::slug($request->name);
        $validatedData['is_featured'] = $request->has('is_featured');
        Product::create($validatedData);

        // Arahkan kembali ke route user.products.index
        return redirect()->route('user.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        // Arahkan ke view di dalam folder user/products
        return view('user.products.edit', compact('product', 'categories'));
    }

    /**
     * Memperbarui data produk di database.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($product->id)],
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'shoppee' => 'nullable|url',
            'whatsapp' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'seller' => 'required|string|max:255',
        ]);

        if ($request->has('is_featured') && !$product->is_featured) {
            $countFeatured = Product::where('is_featured', true)->count();
            if ($countFeatured >= 3) {
                return back()->withErrors(['is_featured' => 'Maksimal hanya boleh ada 3 produk unggulan.'])
                             ->withInput();
            }
        }
        
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        $validatedData['slug'] = Str::slug($request->name);
        $validatedData['is_featured'] = $request->has('is_featured');
        $product->update($validatedData);

        // Arahkan kembali ke route user.products.index
        return redirect()->route('user.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        // Arahkan kembali ke route user.products.index
        return redirect()->route('user.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        try {
            Excel::import(new ProductsImport, $request->file('file'));
            return redirect()->route('user.products.index')->with('success', 'Produk berhasil diimport!');
        } catch (\Exception $e) {
            Log::error('Import failed: ' . $e->getMessage());
            // Perbaikan: Menggunakan 'error' untuk pesan flash agar konsisten
            return redirect()->back()->with('error', 'Import gagal: ' . $e->getMessage());
        }
    }

    // ---------------------------
    // Download Template
    // ---------------------------
    public function downloadTemplate()
    {
        $filePath = public_path('template/template_produk.xlsx');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'template_produk.xlsx');
        }

        return redirect()->back()->with('error', 'File template tidak ditemukan.');
    }

}