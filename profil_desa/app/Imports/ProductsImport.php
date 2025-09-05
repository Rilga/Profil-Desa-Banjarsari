<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;

class ProductsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Lewati baris header
        $rows->shift();
        
        $productsToInsert = [];

        foreach ($rows as $index => $row) {
            // Pastikan nama produk ada
            if (empty($row[0])) {
                continue;
            }

            // Temukan ID kategori berdasarkan nama dari Excel
            $categoryName = trim($row[3]);
            $category = null;
            if (!empty($categoryName)) {
                $category = Category::where('name', $categoryName)->first();
            }

            // Jika kategori tidak ditemukan, lewati baris dan catat kesalahannya
            if (!$category) {
                Log::error("Skipping row " . ($index + 2) . ": Category name '{$categoryName}' not found or is empty.");
                continue;
            }

            // Buat slug yang unik
            $baseSlug = Str::slug($row[0]);
            $slug = $baseSlug;
            $counter = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }
            
            
            // Siapkan data untuk dimasukkan
            $productsToInsert[] = [
                'name'        => $row[0],
                'slug'        => $slug,
                'seller'      => $row[1] ?? '',
                'price'       => $row[2] ?? 0,
                'category_id' => $category->id,
                'description' => $row[4] ?? '',
                'shoppee'     => $row[6] ?? '',
                'whatsapp'    => $row[7] ?? '',
                'is_featured' => isset($row[8]) && $row[8] == 1 ? 1 : 0,
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        // Lakukan bulk insert
        if (!empty($productsToInsert)) {
            try {
                Product::insert($productsToInsert);
                Log::info("Import completed. Processed: " . count($productsToInsert) . " products");
            } catch (\Exception $e) {
                Log::error("Bulk insert failed: " . $e->getMessage());
                // Controller akan menangani notifikasi error ini
            }
        }
    }
}