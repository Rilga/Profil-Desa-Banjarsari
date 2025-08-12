<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistikDashboardController extends Controller
{
    public function index()
    {
        // Data dummy sementara
        $statistik = [
            'total_orders' => 0,
            'total_revenue' => 0,
            'best_selling_product' => null,
            'monthly_sales' => [
                'Jan' => 0,
                'Feb' => 0,
                'Mar' => 0,
                'Apr' => 0,
                'May' => 0,
                'Jun' => 0,
                'Jul' => 0,
                'Aug' => 0,
                'Sep' => 0,
                'Oct' => 0,
                'Nov' => 0,
                'Dec' => 0
            ]
        ];

        // Return ke view
        return view('user.statistik.index', compact('statistik'));
    }
}
