<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6">Dashboard Statistik</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-gray-500">Total Pesanan</p>
                <h2 class="text-3xl font-bold">{{ $statistik['total_orders'] }}</h2>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-gray-500">Total Pendapatan</p>
                <h2 class="text-3xl font-bold">Rp{{ number_format($statistik['total_revenue'], 0, ',', '.') }}</h2>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-gray-500">Produk Terlaris</p>
                <h2 class="text-xl font-semibold">{{ $statistik['best_selling_product'] ?? '-' }}</h2>
            </div>
        </div>

        {{-- Grafik Dummy --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold mb-4">Penjualan Bulanan</h3>
            <canvas id="salesChart"></canvas>
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($statistik['monthly_sales'])) !!},
                datasets: [{
                    label: 'Jumlah Penjualan',
                    data: {!! json_encode(array_values($statistik['monthly_sales'])) !!},
                    backgroundColor: 'rgba(34, 197, 94, 0.5)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-app-layout>
