@extends('layouts.landing')

@section('content')

<!-- SVG Background Decoration -->
<div class="absolute top-0 left-0 w-screen h-[520px] z-10 overflow-hidden pointer-events-none">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 1440 320"
        class="w-full h-full"
        preserveAspectRatio="none"
    >
    <path
        fill="#ffffff"
        fill-opacity="1"
        d="M0,32L80,42.7C160,53,320,75,480,80C640,85,800,75,960,69.3C1120,64,1280,64,1360,64L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"
    ></path>
    </svg>
</div>

<!-- Hero Section dengan warna hijau pastel -->
<section class="relative w-full py-20 bg-green-600 z-0 shadow-inner">
    <br><br><br><br>
    <div class="max-w-4xl mx-auto text-center px-6">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Kelembagaan Desa</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">
            Desa Banjarsari memiliki kelembagaan yang berfungsi sebagai pilar utama dalam penyelenggaraan pemerintahan, pembangunan, dan pelayanan masyarakat. Struktur kelembagaan terdiri dari Pemerintah Desa yang dipimpin oleh Kepala Desa beserta perangkatnya,
        </p>
    </div>
</section>

<section class="py-16 bg-gray-50 relative z-10">
    <div class="max-w-5xl mx-auto px-4 space-y-12">

        <!-- A. KONDISI PEMERINTAHAN DESA -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">A. Kondisi Pemerintahan Desa</h2>
            <div class="space-y-8">
                <!-- 1. Pembagian Wilayah Desa -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">1. Pembagian Wilayah Desa</h3>
                    <div class="bg-white p-6 rounded-lg shadow-md text-gray-700 leading-relaxed">
                        <p>Desa Banjarsari terdiri dari 3 (Tiga) dusun dan 36 RT, dengan sebaran sebagai berikut:</p>
                        <ul class="list-disc list-inside pl-4 mt-2 space-y-1">
                            <li><b>Dusun I:</b> Terletak di sebelah Selatan dan Barat</li>
                            <li><b>Dusun II:</b> Terletak di sebelah Utara</li>
                            <li><b>Dusun III:</b> Terletak di sebelah Timur</li>
                        </ul>
                    </div>
                </div>

                <!-- 2. Struktur Organisasi Desa Banjarsari -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">2. Struktur Organisasi Desa Banjarsari</h3>
                    <div class="bg-white rounded-lg shadow-md p-6 overflow-x-auto">
                        <div class="flex flex-col items-center text-center min-w-max mx-auto">
                            <!-- Kepala Desa -->
                            <div class="relative">
                                <div class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg font-bold text-lg">KEPALA DESA<br>BANJARSARI</div>
                                <!-- Line down from Kades -->
                                <div class="absolute top-full left-1/2 -translate-x-1/2 w-px h-8 bg-gray-400"></div>
                            </div>

                            <!-- Horizontal Line Connector -->
                            <div class="relative mt-8 w-[48rem]">
                                <div class="absolute top-0 left-0 w-full h-px bg-gray-400"></div>
                                <!-- Vertical line down to Kasi branch -->
                                <div class="absolute top-0 left-1/4 w-px h-8 bg-gray-400"></div>
                                <!-- Vertical line down to Sekdes branch -->
                                <div class="absolute top-0 right-1/4 w-px h-8 bg-gray-400"></div>
                            </div>

                            <!-- Branches Container -->
                            <div class="flex justify-between w-[48rem] mt-8">
                                <!-- Left Branch: Kasi -->
                                <div class="w-1/2 flex justify-center">
                                    <div class="flex space-x-4">
                                        <div class="flex flex-col items-center">
                                            <div class="bg-orange-100 text-orange-800 px-3 py-2 rounded-md shadow-sm text-sm font-medium">Kasi Pemerintahan</div>
                                        </div>
                                        <div class="flex flex-col items-center">
                                            <div class="bg-orange-100 text-orange-800 px-3 py-2 rounded-md shadow-sm text-sm font-medium">Kasi Kesra</div>
                                        </div>
                                        <div class="flex flex-col items-center">
                                            <div class="bg-orange-100 text-orange-800 px-3 py-2 rounded-md shadow-sm text-sm font-medium">Kasi Pelayanan</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Branch: Sekretaris & Kaur -->
                                <div class="w-1/2 flex justify-center">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-blue-500 text-white px-5 py-2 rounded-lg shadow-md font-semibold">SEKRETARIS DESA</div>
                                        <div class="relative mt-8">
                                            <div class="absolute -top-8 left-1/2 w-px h-8 bg-gray-400"></div>
                                            <div class="flex space-x-4">
                                                <div class="bg-blue-100 text-blue-800 px-3 py-2 rounded-md shadow-sm text-sm font-medium">Kaur Perencanaan</div>
                                                <div class="bg-blue-100 text-blue-800 px-3 py-2 rounded-md shadow-sm text-sm font-medium">Kaur Keuangan</div>
                                                <div class="bg-blue-100 text-blue-800 px-3 py-2 rounded-md shadow-sm text-sm font-medium">Kaur TU</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kepala Dusun -->
                            <div class="relative mt-12">
                                <div class="absolute -top-6 left-1/2 w-px h-6 bg-gray-400"></div>
                                <div class="bg-purple-500 text-white px-6 py-3 rounded-lg shadow-md font-semibold">KEPALA DUSUN</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- B. KONDISI PEMERINTAHAN UMUM -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">B. Kondisi Pemerintahan Umum</h2>
            <div class="space-y-8">
                <!-- 1. Pelayanan Catatan Sipil -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">1. Pelayanan Catatan Sipil</h3>
                    <div class="bg-white p-6 rounded-lg shadow-md text-gray-700">
                        <p class="mb-4">Pelayanan catatan sipil yang paling banyak digunakan oleh masyarakat disajikan pada tabel di bawah ini:</p>
                        <p class="font-semibold text-center mb-4">Data Pelayanan Catatan Sipil Desa Banjarsari Tahun 2024</p>
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full border-collapse text-sm">
                                <thead>
                                    <tr class="bg-green-600 text-white text-center">
                                        <th class="border border-gray-300 px-4 py-2">No</th>
                                        <th class="border border-gray-300 px-4 py-2">Jenis Layanan</th>
                                        <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                                        <th class="border border-gray-300 px-4 py-2">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">NIK</td>
                                        <td class="border border-gray-300 px-4 py-2">-</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">2</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">KK</td>
                                        <td class="border border-gray-300 px-4 py-2">2.253</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">3</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">KTP</td>
                                        <td class="border border-gray-300 px-4 py-2">5.947</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">4</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">Akta Kelahiran</td>
                                        <td class="border border-gray-300 px-4 py-2">523</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">5</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">Akta-akta Lainnya</td>
                                        <td class="border border-gray-300 px-4 py-2">1.500</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="text-sm text-right italic mt-2">Sumber: Data Desa Banjarsari</p>
                    </div>
                </div>

                <!-- 2. Perizinan -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">2. Perizinan</h3>
                    <div class="bg-white p-6 rounded-lg shadow-md text-gray-700">
                        <p>Jenis perizinan yang sering diajukan oleh masyarakat antara lain:</p>
                        <ul class="list-disc list-inside pl-4 mt-2 space-y-1">
                            <li>Izin Mendirikan Bangunan (IMB)</li>
                            <li>Izin Peruntukan Penggunaan Tanah (IPPT)</li>
                            <li>Izin Gangguan (HO)</li>
                            <li>Surat Izin Usaha Perdagangan (SIUP)</li>
                            <li>Izin Usaha Pertambangan Bahan Galian Golongan C</li>
                        </ul>
                    </div>
                </div>

                <!-- 3. Aparatur Pemerintahan -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">3. Aparatur Pemerintahan</h3>
                    <div class="bg-white p-6 rounded-lg shadow-md text-gray-700">
                        <p class="font-semibold text-center mb-4">Jumlah Aparatur Pemerintahan dan Anggota Kelembagaan Desa Banjarsari Tahun 2024</p>
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full border-collapse text-sm">
                                <thead>
                                    <tr class="bg-green-600 text-white text-center">
                                        <th class="border border-gray-300 px-4 py-2">No</th>
                                        <th class="border border-gray-300 px-4 py-2">Uraian</th>
                                        <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                                        <th class="border border-gray-300 px-4 py-2">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">Kepala Desa</td>
                                        <td class="border border-gray-300 px-4 py-2">1</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">2</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">Sekretaris Desa</td>
                                        <td class="border border-gray-300 px-4 py-2">1</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">3</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">Kepala Urusan</td>
                                        <td class="border border-gray-300 px-4 py-2">6</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">4</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">Kepala Dusun</td>
                                        <td class="border border-gray-300 px-4 py-2">3</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">5</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">Ketua RW</td>
                                        <td class="border border-gray-300 px-4 py-2">8</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">6</td>
                                        <td class="border border-gray-300 px-4 py-2 text-left">Ketua RT</td>
                                        <td class="border border-gray-300 px-4 py-2">36</td>
                                        <td class="border border-gray-300 px-4 py-2"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="text-sm text-right italic mt-2">Sumber: Data Desa BANJARSARI</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<br><br><br>
<footer class="bg-[#00923F] text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-4">
            <a href="" class="text-white text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt="Banjarsari" class="logo-img" style="height: 45px; width: auto; object-fit: contain;">
            </a>
            <div class="d-flex gap-4">
                <a href="" class="text-white text-decoration-none hover:text-white/80">Privacy Policy</a>
                <a href="" class="text-white text-decoration-none hover:text-white/80">Hubungi Kami</a>
            </div>
        </div>
        <div class="text-white/80">
            © {{ date('Y') }} Banjarsari. All Rights Reserved.
        </div>
    </div>
</footer>
@endsection
