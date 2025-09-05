<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6">Dashboard Statistik</h1>

        {{-- Kartu Statistik Utama --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-gray-500">Total Produk</p>
                {{-- Variabel baru: $statistik['total_products'] --}}
                <h2 class="text-3xl font-bold">{{ $statistik['total_products'] ?? 0 }}</h2>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-gray-500">Total Kategori</p>
                 {{-- Variabel baru: $statistik['total_categories'] --}}
                <h2 class="text-3xl font-bold">{{ $statistik['total_categories'] ?? 0 }}</h2>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-gray-500">Produk Terpopuler (by views)</p>
                 {{-- Variabel baru: $statistik['most_popular_product'] --}}
                <h2 class="text-xl font-semibold">{{ $statistik['most_popular_product'] ?? '-' }}</h2>
            </div>
        </div>

        {{-- Grafik Pengunjung --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold mb-4">Grafik Pengunjung Harian</h3>
            {{-- Mengganti ID canvas untuk kejelasan --}}
            <canvas id="visitorChart"></canvas>
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('visitorChart').getContext('2d');
        
        const visitorChart = new Chart(ctx, {
            // Mengganti tipe chart menjadi 'line' untuk tren pengunjung
            type: 'line', 
            data: {
                // Label untuk sumbu X (misal: tanggal)
                labels: {!! json_encode(array_keys($statistik['daily_visitors'])) !!},
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    // Data untuk sumbu Y (misal: jumlah pengunjung per tanggal)
                    data: {!! json_encode(array_values($statistik['daily_visitors'])) !!},
                    backgroundColor: 'rgba(59, 130, 246, 0.2)', // Warna biru muda
                    borderColor: 'rgba(59, 130, 246, 1)', // Warna biru
                    borderWidth: 2,
                    fill: true, // Memberi warna di bawah garis
                    tension: 0.4 // Membuat garis lebih melengkung (smooth)
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: {
                            // Memastikan angka di sumbu Y adalah integer
                            precision: 0
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                }
            }
        });
    </script>
</x-app-layout>