@extends('layouts.landing')

@section('content')

<!-- SVG Background Decoration -->
<div class="absolute w-full overflow-hidden z-10">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="#ffffff" fill-opacity="1"
              d="M0,32L80,42.7C160,53,320,75,480,80C640,85,800,75,960,69.3C1120,64,1280,64,1360,64L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
        </path>
    </svg>
</div>

<!-- Hero Section dengan warna hijau pastel -->
<section class="relative w-full py-20 bg-green-600 z-0 shadow-inner">
    <br><br><br><br>
    <div class="max-w-4xl mx-auto text-center px-6">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">Visi & Misi</h1>
        <p class="text-white text-lg max-w-2xl mx-auto">
            Wujudkan masa depan Desa Banjarsari yang berdaya, mandiri, dan sejahtera melalui visi & misi bersama.
        </p>
    </div>
</section>

<!-- Visi Section -->
<section class="py-16 bg-gray-50 relative z-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">Visi Desa</h2>
        <div class="bg-white p-6 rounded-lg shadow-md text-gray-700 text-lg leading-relaxed">
            <p class="italic">
                “Terwujudnya Desa Banjarsari sebagai desa yang mandiri, religius, berbudaya, dan berwawasan lingkungan,
                dengan masyarakat yang sejahtera dan berkeadilan.”
            </p>
        </div>
    </div>
</section>

<!-- Misi Section -->
<section class="py-16 bg-white relative z-10">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 border-l-4 border-yellow-400 pl-4">Misi Desa</h2>
        <ul class="space-y-5 text-gray-700 text-base leading-relaxed">
            @php
                $misi = [
                    "Meningkatkan pelayanan publik yang transparan, akuntabel, dan responsif.",
                    "Memberdayakan potensi lokal melalui sektor pertanian, UMKM, dan pariwisata.",
                    "Meningkatkan kualitas pendidikan dan kesehatan masyarakat desa.",
                    "Mewujudkan lingkungan desa yang bersih, hijau, dan lestari.",
                    "Menumbuhkan semangat gotong-royong dan partisipasi aktif warga dalam pembangunan.",
                ];
            @endphp
            @foreach($misi as $item)
                <li class="flex items-start gap-3">
                    <span class="text-green-500 text-lg"><i class='bx bx-check-circle'></i></span>
                    <span>{{ $item }}</span>
                </li>
            @endforeach
        </ul>
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
