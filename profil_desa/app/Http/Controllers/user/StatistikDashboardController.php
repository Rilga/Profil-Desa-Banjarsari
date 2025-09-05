<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category; // <-- Tambahkan ini
use App\Models\Product;  // <-- Tambahkan ini
use App\Models\VisitorLog; // <-- Tambahkan model untuk visitor jika ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- Tambahkan ini
use Carbon\Carbon; // <-- Tambahkan ini

class StatistikDashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard statistik.
     */
    public function index()
    {
        // 1. Menghitung Total Produk
        $totalProducts = Product::count();

        // 2. Menghitung Total Kategori
        $totalCategories = Category::count();

        // 3. Mendapatkan Produk Terpopuler berdasarkan kolom 'views'
        //    Pastikan Anda memiliki kolom 'views' (atau sejenisnya) di tabel products.
        $popularProduct = Product::orderBy('views', 'desc')->first();
        $mostPopularProduct = $popularProduct ? $popularProduct->name : 'Belum ada data';

        // 4. Mengambil data pengunjung untuk 7 hari terakhir
        //    Ini mengasumsikan Anda memiliki tabel 'visitor_logs' dengan timestamp 'created_at'
        $dailyVisitors = $this->getDailyVisitorsForChart();

        // Menyatukan semua data ke dalam satu array
        $statistik = [
            'total_products'       => $totalProducts,
            'total_categories'     => $totalCategories,
            'most_popular_product' => $mostPopularProduct,
            'daily_visitors'       => $dailyVisitors,
        ];

        // Return ke view dengan data yang sudah disiapkan
        return view('user.dashboard', compact('statistik'));
    }

    /**
     * Helper function untuk menyiapkan data grafik pengunjung.
     * Mengambil data 7 hari terakhir dan memastikan semua hari ada (meskipun nilainya 0).
     *
     * @return array
     */
    private function getDailyVisitorsForChart(): array
    {
        // Ambil data dari database, kelompokkan per hari
        $visitorCounts = VisitorLog::query()
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('count', 'date'); // Hasilnya: ['2025-09-01' => 150, '2025-09-03' => 180]

        // Buat array template untuk 7 hari terakhir dengan nilai default 0
        $dateRange = [];
        for ($i = 6; $i >= 0; $i--) {
            // Format tanggalnya harus 'Y-m-d' agar cocok dengan hasil query
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dateRange[$date] = 0;
        }

        // Gabungkan data dari database ke dalam template.
        // Nilai dari $visitorCounts akan menimpa nilai 0 di $dateRange jika tanggalnya sama.
        foreach ($visitorCounts as $date => $count) {
            if (isset($dateRange[$date])) {
                $dateRange[$date] = $count;
            }
        }

        return $dateRange;
    }
}