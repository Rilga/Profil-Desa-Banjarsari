<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VisitorLog; // <-- Pastikan model di-import

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jangan catat jika yang mengunjungi adalah bot/crawler (opsional tapi direkomendasikan)
        if ($this->isBot($request->userAgent())) {
            return $next($request);
        }

        // Simpan data pengunjung ke database
        VisitorLog::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Lanjutkan request ke tujuan berikutnya
        return $next($request);
    }

    /**
     * Cek apakah user agent adalah bot.
     *
     * @param string|null $userAgent
     * @return bool
     */
    private function isBot(?string $userAgent): bool
    {
        if (is_null($userAgent)) {
            return false;
        }

        // Daftar kata kunci umum pada user agent bot
        $botKeywords = [
            'bot', 'crawl', 'spider', 'slurp', 'google', 'bing', 'yahoo', 'duckduckgo', 'yandex'
        ];

        foreach ($botKeywords as $keyword) {
            if (stripos($userAgent, $keyword) !== false) {
                return true;
            }
        }

        return false;
    }
}
