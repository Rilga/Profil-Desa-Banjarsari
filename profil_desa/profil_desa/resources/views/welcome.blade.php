@extends('layouts.landing')

@section('content')
<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    /* Base Styles */
    html, body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.5;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #ecf2ea;
    }

    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    /* === CSS BARU UNTUK HORIZONTAL SCROLL === */
    .horizontal-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    .horizontal-scrollbar::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
    }
    /* === AKHIR CSS BARU === */


    /* Layout */
    .w-screen { width: 100vw; }
    .h-screen { height: 100vh; }
    .min-h-screen { min-height: 100vh; }
    .w-full { width: 100%; }
    .h-full { height: 100%; }
        
    /* Positioning */
    .relative { position: relative; }
    .inset-0 { top: 0; right: 0; bottom: 0; left: 0; }

    /* Flex & Grid */
    .flex { display: flex; }
    .grid { display: grid; }
    .items-center { align-items: center; }
    .justify-center { justify-content: center; }
    .grid-cols-1 { grid-template-columns: 1fr; }
    .gap-12 { gap: 3rem; }
        
    /* Spacing */
    .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
    .py-12 { padding-top: 3rem; padding-bottom: 3rem; }
    .mb-6 { margin-bottom: 1.5rem; }
    .mr-12 { margin-right: 3rem; }
    .mx-auto { margin-left: auto; margin-right: auto; }

    /* Typography */
    .header-text {
        font-size: 40px;
        line-height: 3rem;
        color: white;
        margin: 20px;
        font-weight: bold;
    }
        
    /* Utilities */
    .object-cover { object-fit: cover; }

    /* Responsive */
    @media (min-width: 768px) {
        .md\:text-5xl { font-size: 3rem; line-height: 1; }
    }

    @media (min-width: 1024px) {
        .lg\:px-12 { padding-left: 3rem; padding-right: 3rem; }
        .lg\:text-6xl { font-size: 3.75rem; line-height: 1; }
        .lg\:grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
    }

    .stats-card {
        display: flex;
        justify-content: center;
        margin-top: -60px; /* untuk overlap ke Hero jika perlu */
        z-index: 2;
        position: relative;
    }

        .stats-container {
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        display: flex;
        padding: 30px 40px;
        gap: 20px;
        align-items: center;
        max-width: 1100px;
        width: 100%;
        justify-content: space-around;
        }

        .stat-box {
        text-align: center;
        }

        .stat-box h2 {
        font-size: 3.2rem;
        margin: 0;
        color: #111;
        font-weight: 700;
        }

        .stat-box p {
        margin: 6px 0 0;
        color: #666;
        font-size: 1.2rem;
        }

        .divider {
        width: 1px;
        height: 70px;
        background-color: #e0e0e0;
        }

        @media (max-width: 768px) {
        .stats-container {
            flex-direction: column;
            gap: 20px;
            padding: 20px;
        }

        .divider {
            display: none;
        }
        }

        section#misi {
            padding: 60px 20px;
            text-align: center;
            background-color: #ffffff;
        }

        section#misi h2 {
            font-size: 2.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        section#misi p {
            max-width: 720px;
            margin: 0 auto 40px auto;
            color: #555;
            font-size: 1rem;
            line-height: 1.6;
        }

        section#peta {
            padding: 60px 20px;
            text-align: center;
            background-color: #ffffff;
        }

        section#peta h2 {
            font-size: 2.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        section#peta p {
            max-width: 720px;
            margin: 0 auto 40px auto;
            color: #555;
            font-size: 1rem;
            line-height: 1.6;
        }

    section#sejarah {
        padding: 60px 20px;
        text-align: center;
        background-color: #ffffff;
    }

    section#sejarah h2 {
        font-size: 2.2rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    section#sejarah p {
        max-width: 720px;
        margin: 0 auto 40px auto;
        color: #555;
        font-size: 1rem;
        line-height: 1.6;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        max-width: 1140px;
        margin: 0 auto;
    }

    .card {
        background: #f9f9f9;
        padding: 24px;
        border-radius: 16px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h3 {
        margin-bottom: 12px;
        font-size: 1.2rem;
        font-weight: 600;
    }

    .card p {
        font-size: 0.95rem;
        color: #555;
        line-height: 1.5;
    }

    @media screen and (max-width: 600px) {
        section#misi h2 {
        font-size: 1.6rem;
        }

        .card {
        padding: 20px;
        }
    }


    .about-text {
        flex: 1 1 300px;
        max-width: 400px;
        color: #ffffff;
        padding: 30px 30px;
    }

    .about-text h2 {
        font-size: 2rem;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .about-text p {
        font-size: 1rem;
        color: #e0e0e0;
    }

    .card-container {
        flex: 2 1 500px;
        display: flex;
        flex-direction: column;
        padding: 30px 20px;
        gap: 20px;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 24px;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        color: #ffffff;
        transition: transform 0.3s ease;
    }

    .glass-card:hover {
        transform: translateY(-5px);
    }

    .glass-card h3 {
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    .glass-card p {
        font-size: 0.95rem;
        color: #e0e0e0;
        line-height: 1.5;
    }
    
    .testimonials-section {
        max-width: 1200px;
        margin: auto;
        padding: 60px 20px;
        text-align: center;
    }
    .testimonials-section h2 {
        font-size: 2rem;
        margin-bottom: 10px;
        color: #222;
        font-weight: bold;
    }

    .testimonials-section p.subtitle {
        color: #666;
        margin-bottom: 40px;
        font-size: 1rem;
    }

    .testimonial-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .testimonial-card {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 24px;
        max-width: 320px;
        text-align: left;
        position: relative;
    }

    .testimonial-card::before {
        content: "❝";
        font-size: 4rem;
        color: #007e3e;
        position: absolute;
        top: 16px;
        left: 20px;
    }

    .testimonial-text {
        color: #333;
        font-size: 0.95rem;
        margin-bottom: 20px;
        margin-top: 60px;
    }

    @media (max-width: 768px) {
        .testimonial-cards {
        flex-direction: column;
        align-items: center;
        }
    }
    </style>
    </head>
    <body class="font-sans antialiased m-0 p-0 flex flex-col min-h-screen">
        
        <div class="relative h-[90vh] sm:h-screen">
        
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('images/bgtes.jpg') }}" alt="Background" class="w-full h-full object-cover">
        </div>
        
        <div class="absolute inset-0 bg-black/40 z-10"></div>

        {{-- Svg --}}
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


        <div class="relative z-20 h-full flex items-center">
            <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                        <div class="flex flex-col items-start space-y-2">
                            <h1 id="typing-text" class="header-text whitespace-pre-line text-white m-0 p-0"></h1>
                            <h3 class="text-white text-lg m-0 p-0">Kec. Bayongbong Kab. Garut</h3>
                        </div>

                        <div class="hidden lg:block">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="absolute z-30 left-1/2 transform -translate-x-1/2 -bottom-12 w-full max-w-5xl px-4">
        <div class="stats-container">
            <div class="stat-box">
            <h2>7.682</h2>
            <p>Jumlah Penduduk (Jiwa)</p>
            </div>
            <div class="divider"></div>
            <div class="stat-box">
            <h2>2.293</h2>
            <p>Jumlah Kepala Keluarga (KK)</p>
            </div>
            <div class="divider"></div>
            <div class="stat-box">
            <h2>140 Ha/m²</h2>
            <p>Luas Wilayah</p>
            </div>
        </div>
    </section>
    <br>

    <div class="w-[85%] mx-auto shadow-md rounded-2xl p-1 bg-white">
        <section id="sejarah">
            <div class="w-full flex justify-center">
                <div class="max-w-7xl w-full flex flex-col items-center gap-4 phone:gap-2">
                    <div class="w-full 2xl:h-[calc((100vw-24rem)*9/24)] xl:h-[calc((100vw-22rem)*9/19)] lg:h-[calc((100vw-10rem)*9/19)] md:h-[calc((100vw-8rem)*9/16)] sm:h-auto phone:h-auto flex 2xl:flex-row xl:flex-row lg:flex-row md:flex-row sm:flex-col phone:flex-col 2xl:items-start xl:items-start lg:items-start md:items-center sm:items-center phone:items-center rounded-md mb-4">
                        <div class="2xl:w-[65%] xl:w-[65%] lg:w-[60%] md:w-[60%] sm:w-full phone:w-full h-full flex flex-col justify-start items-start p-5 2xl:pr-20 xl:pr-10 phone:p-2 lg:pr-8 gap-2 2xl:order-1 xl:order-1 lg:order-1 md:order-1 sm:order-2 phone:order-2">
                            <div class="w-auto h-auto flex flex-col gap-1">
                                <h2>Sambutan Kepala Desa</h2>
                                <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-8"></div>
                            </div>
                            <div class="mt-2 font-light text-justify text-base phone:text-xs text-gray-700 reveal-r animate">
                                {!! nl2br(e($sambutan->sambutan ?? 'Belum ada sambutan.')) !!}
                                @if(!empty($sambutan->nama_kepala_desa))
                                    <br><br><br>— {{ strtoupper($sambutan->nama_kepala_desa) }}, KEPALA DESA BANJARSARI —
                                @endif
                            </div>
                        </div>
                        <div class="2xl:w-auto xl:w-auto lg:w-auto md:w-auto sm:w-[60%] phone:w-[70%] h-full flex flex-col 2xl:p-8 xl:p-8 lg:p-8 md:p-7 sm:p-8 phone:p-5 sm:order-1 phone:order-1 self-center relative">
                            @if (!empty($sambutan->foto))
                                <img src="{{ asset('storage/' . $sambutan->foto) }}"
                                    class="h-full w-full bg-cover bg-center self-center z-10 reveal rounded-lg shadow-product animate"
                                    alt="Foto Kepala Desa">
                            @else
                                <img src="{{ asset('images/logo.png') }}" alt="Default"
                                    class="h-full w-full bg-cover bg-center self-center z-10 reveal rounded-lg shadow-product animate" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br>
    
    {{-- sekilas info --}}
    @if($infos->count())
        <div class="w-[85%] mx-auto rounded-md border border-yellow-300 overflow-hidden shadow-md">
            <div class="flex">
                
                <div class="bg-blue-600 px-4 py-2 text-white font-semibold text-sm flex items-center gap-2 shrink-0">
                    <i class="bx bx-bell text-xl"></i>
                    Sekilas Info
                </div>

                <div class="bg-yellow-400 flex-1 px-4 py-2">
                    <marquee behavior="scroll" direction="left" scrollamount="7"
                                class="text-sm text-gray-800 font-medium tracking-wide">
                        @foreach($infos as $info)
                            {{ $info->sekilas_info }}
                            @if(!$loop->last) &nbsp;&nbsp;•&nbsp;&nbsp; @endif
                        @endforeach
                    </marquee>
                </div>

            </div>
        </div>
    @endif


    <br>

    <div class="w-[85%] mx-auto shadow-md rounded-2xl bg-white">
        <div class="flex flex-col md:flex-row gap-6 h-[600px] p-4">

            @if($kontens->count())
                <div x-data="carousel()" class="w-[70%] relative overflow-hidden rounded-lg h-full shadow-lg">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="currentIndex === index" class="relative w-full h-full transition-all duration-500 ease-in-out">
                            <img :src="slide.image" alt="Slide Image"
                                class="w-full h-full object-cover rounded-lg" />
                            <div class="absolute bottom-0 left-0 bg-black/50 text-white p-4 w-full">
                                <h2 class="text-xl font-bold" x-text="slide.title"></h2>
                            </div>
                        </div>
                    </template>

                    <button @click="prev"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black/30 text-white px-3 py-1 rounded-r z-10 hover:bg-black/60">‹</button>
                    <button @click="next"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black/30 text-white px-3 py-1 rounded-l z-10 hover:bg-black/60">›</button>
                </div>

                @php $utama = $kontens->first(); @endphp
                <div class="w-[30%] bg-yellow-600 text-white p-6 rounded-lg flex flex-col justify-between h-full shadow-lg">
                    <div>
                        <img src="{{ asset('storage/' . $utama->cover) }}"
                            class="rounded-md mb-4 h-64 w-full object-cover shadow" 
                            alt="Cover Konten">
                        <h3 class="text-xl font-bold leading-snug break-words whitespace-normal">{{ $utama->judul }}</h3>
                        <p class="text-sm mt-3 text-white/90 line-clamp-3">
                            {{ \Illuminate\Support\Str::limit(strip_tags($utama->deskripsi), 120) }}
                        </p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('user.berita.show', $utama->id) }}"
                            class="inline-block bg-blue-600 text-white hover:bg-blue-800 text-yellow-800 font-semibold px-4 py-2 rounded hover:bg-yellow-300 transition">
                            Selengkapnya →
                        </a>
                    </div>
                </div>
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <p class="text-gray-500 text-lg font-semibold">No Data</p>
                </div>
            @endif

        </div>
    </div><br>

    {{-- hari kemerdekaan --}}
<div class="w-[85%] mx-auto rounded-2xl" style="background-color: #ecf2ea;">
    <section>
        <div x-data="countdown('08','17')" x-init="start()" class="flex flex-col md:flex-row items-stretch gap-4">

            <div class="flex-1 bg-cyan-600 text-white rounded-xl flex flex-col justify-center p-6">
                <p class="text-base opacity-80">Hari Libur Nasional (Umum)</p>
                <h2 class="text-3xl font-bold">Hari Kemerdekaan Republik Indonesia</h2>
                <div class="flex items-center gap-2 mt-2 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10m-9 4h8m-7 4h6" />
                    </svg>
                    <span>17 Agustus <span x-text="target.getFullYear()"></span></span>
                </div>
            </div>

            <div class="flex gap-4 justify-center md:justify-start items-center">
                <div class="bg-white rounded-xl shadow p-10 w-28 text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-12 h-12 bg-indigo-100 rounded-br-full"></div>
                    <div class="text-lg text-gray-500 relative z-10">Hari</div>
                    <div class="text-4xl font-bold relative z-10" x-text="days"></div>
                </div>
                <div class="bg-white rounded-xl shadow p-10 w-28 text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-12 h-12 bg-indigo-100 rounded-br-full"></div>
                    <div class="text-lg text-gray-500 relative z-10">Jam</div>
                    <div class="text-4xl font-bold relative z-10" x-text="hours"></div>
                </div>
                <div class="bg-white rounded-xl shadow p-10 w-28 text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-12 h-12 bg-indigo-100 rounded-br-full"></div>
                    <div class="text-lg text-gray-500 relative z-10">Menit</div>
                    <div class="text-4xl font-bold relative z-10" x-text="minutes"></div>
                </div>
                <div class="bg-white rounded-xl shadow p-10 w-28 text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-12 h-12 bg-indigo-100 rounded-br-full"></div>
                    <div class="text-lg text-gray-500 relative z-10">Detik</div>
                    <div class="text-4xl font-bold relative z-10" x-text="seconds"></div>
                </div>
            </div>
        </div>
    </section>
</div>
    <br>

<style>
    /* Modal background */
    .modal-bg {
    display: none;
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(4px);
    justify-content: center;
    align-items: center;
    z-index: 999;
    }

    /* Modal content */
    .modal-content {
    max-width: 90%;
    max-height: 85%;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    animation: fadeIn 0.3s ease;
    }

    /* Animation */
    @keyframes fadeIn {
    from { transform: scale(0.95); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
    }
</style>

<div class="w-[85%] mx-auto shadow-md rounded-2xl p-1 bg-white" x-data="gallery()">
    <section class="py-10 px-4">
        <h2 class="text-4xl font-bold uppercase mb-4 text-center">Galeri Desa</h2>
        <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-8"></div>

        <!-- Tabs -->
        <div class="flex justify-center mb-8">
            <div class="flex space-x-1 bg-gray-200 p-1 rounded-full">
                <button @click="filter = 'all'" :class="{'bg-blue-500 text-white': filter === 'all', 'bg-gray-200 text-gray-700': filter !== 'all'}" class="px-4 py-2 rounded-full text-sm font-semibold transition-colors duration-300">Semua</button>
                <button @click="filter = 'gambar'" :class="{'bg-blue-500 text-white': filter === 'gambar', 'bg-gray-200 text-gray-700': filter !== 'gambar'}" class="px-4 py-2 rounded-full text-sm font-semibold transition-colors duration-300">Foto</button>
                <button @click="filter = 'video'" :class="{'bg-blue-500 text-white': filter === 'video', 'bg-gray-200 text-gray-700': filter !== 'video'}" class="px-4 py-2 rounded-full text-sm font-semibold transition-colors duration-300">Video</button>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($galeris as $item)
                <div x-show="filter === 'all' || filter === '{{ $item->tipe }}'" 
                     class="relative group overflow-hidden rounded-lg shadow-lg cursor-pointer bg-gray-200" 
                     @click="openLightbox('{{ $item->tipe }}', '{{ asset('storage/galeri/' . $item->file) }}', '{{ $item->judul }}')">

                    @if($item->tipe == 'gambar')
                        <img src="{{ asset('storage/galeri/' . $item->file) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover transform transition-transform duration-300 group-hover:scale-110">
                    @else
                        <video class="w-full h-full object-cover gallery-video" preload="metadata" muted playsinline crossOrigin="anonymous">
                            <source src="{{ asset('storage/galeri/' . $item->file) }}" type="video/mp4">
                        </video>
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none bg-black/10 group-hover:bg-black/40 transition-all duration-300">
                            <div class="w-16 h-16 bg-black/30 rounded-full flex items-center justify-center group-hover:bg-black/50 transition-all duration-300">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"></path></svg>
                            </div>
                        </div>
                    @endif

                    <div class="absolute bottom-0 left-0 w-full p-2 bg-gradient-to-t from-black to-transparent pointer-events-none">
                        <h3 class="text-white text-sm font-semibold truncate">{{ $item->judul }}</h3>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('user.galeri') }}" class="bg-blue-500 text-white px-6 py-2 rounded-full shadow-md hover:bg-blue-600 transition-all duration-300 ease-in-out transform hover:scale-105">
                Lihat Semua Galeri
            </a>
        </div>
    </section>

    <!-- Lightbox -->
    <div x-show="lightboxOpen" @keydown.escape.window="closeLightbox()" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4" x-cloak>
        <div class="relative bg-white rounded-lg shadow-xl max-w-3xl max-h-full overflow-auto" @click.away="closeLightbox()">
            <button @click="closeLightbox()" class="absolute -top-2 -right-2 w-8 h-8 bg-white text-gray-700 rounded-full flex items-center justify-center z-10">&times;</button>
            <div x-show="lightboxType === 'gambar'">
                <img :src="lightboxSrc" :alt="lightboxTitle" class="w-full h-auto rounded-lg">
                <p class="p-4 text-center" x-text="lightboxTitle"></p>
            </div>
            <div x-show="lightboxType === 'video'">
                <video :src="lightboxSrc" class="w-full h-auto rounded-lg" controls autoplay></video>
                <p class="p-4 text-center" x-text="lightboxTitle"></p>
            </div>
        </div>
    </div>
</div>

<div id="imgModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden justify-center items-center z-50">
    <img id="modalImage" class="max-w-[80%] max-h-[80%] object-contain rounded-lg shadow-lg border border-white">
</div>

<br>

    <div class="w-[85%] mx-auto shadow-md rounded-2xl p-4 bg-white" x-data="aparaturSlider()">
    <section class="py-10">
        <div class="px-4">
            <h2 class="text-4xl font-bold uppercase mb-4 text-center">Aparatur Desa</h2>
            <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-12"></div>
        </div>

        <div x-ref="slider" class="flex overflow-x-auto gap-6 pb-4 pl-4 md:pl-8 lg:pl-12 horizontal-scrollbar snap-x snap-mandatory scroll-smooth" style="-webkit-overflow-scrolling: touch; scrollbar-width: none;">
            @foreach($aparatur as $index => $aparat)
                <div :id="'aparatur-' + {{ $index }}" class="flex-shrink-0 w-64 bg-gray-50 rounded-lg shadow-md text-center overflow-hidden transform transition-all duration-500 snap-center" 
                     :class="{'filter grayscale-0 scale-105': activeIndex === {{ $index }}, 'filter grayscale scale-90 opacity-80': activeIndex !== {{ $index }} }">
                    <img src="{{ $aparat->foto ? Storage::url($aparat->foto) : asset('images/profile.png') }}"
                         alt="Foto {{ $aparat->nama }}"
                         class="w-full h-56 object-cover object-center">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 truncate" title="{{ $aparat->nama }}">{{ $aparat->nama }}</h3>
                        <p class="text-sm text-gray-500">{{ $aparat->jabatan }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
<br>
<div class="w-[85%] mx-auto shadow-md rounded-2xl p-1 bg-white">
    <section id="peta" class="">
        <h2 class="text-3xl font-bold uppercase mb-4 text-center">Peta Desa</h2>
        <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-8"></div>

        <div id="map" class="w-[80%] h-96 rounded-lg shadow-md mx-auto"></div>
    </section>
    </div>


    <br><br><br><br>
    </div>

    <script>
        function aparaturSlider() {
        return {
            activeIndex: 0,
            slider: null,
            interval: null,
            totalItems: 0,
            init() {
                this.slider = this.$refs.slider;
                this.totalItems = this.slider.children.length;
                if (this.totalItems > 0) {
                    this.startSlider();
                    this.$watch('activeIndex', () => this.scrollToActive());
                }
            },
            startSlider() {
                this.interval = setInterval(() => {
                    this.activeIndex = (this.activeIndex + 1) % this.totalItems;
                }, 3000);
            },
            scrollToActive() {
                const activeElement = this.slider.children[this.activeIndex];
                if (activeElement) {
                    const sliderWidth = this.slider.offsetWidth;
                    const elementWidth = activeElement.offsetWidth;
                    const elementLeft = activeElement.offsetLeft;
                    const scrollPosition = elementLeft - (sliderWidth / 2) + (elementWidth / 2);
                    this.slider.scrollTo({
                        left: scrollPosition,
                        behavior: 'smooth'
                    });
                }
            }
        }
    }

    function gallery() {
        return {
            filter: 'all',
            lightboxOpen: false,
            lightboxType: '',
            lightboxSrc: '',
            lightboxTitle: '',
            openLightbox(type, src, title) {
                this.lightboxType = type;
                this.lightboxSrc = src;
                this.lightboxTitle = title;
                this.lightboxOpen = true;
            },
            closeLightbox() {
                this.lightboxOpen = false;
            }
        }
    }

    function countdown(targetMonth, targetDay) {
    return {
        days: '00', hours: '00', minutes: '00', seconds: '00',
        finished: false,
        target: null,
        start() {
        const now = new Date();
        let year = now.getFullYear();
        // buat target tanggal 17 Agustus tahun ini
        this.target = new Date(year, parseInt(targetMonth)-1, parseInt(targetDay), 0, 0, 0);

        // jika sudah lewat, pindah ke tahun berikutnya
        if (now >= this.target) {
            this.target = new Date(year+1, parseInt(targetMonth)-1, parseInt(targetDay), 0, 0, 0);
        }

        this.update();
        this._interval = setInterval(() => this.update(), 1000);
        },
        update() {
        const now = new Date().getTime();
        const distance = this.target.getTime() - now;

        if (distance <= 0) {
            this.days = this.hours = this.minutes = this.seconds = '00';
            this.finished = true;
            clearInterval(this._interval);
            return;
        }

        const d = Math.floor(distance / (1000 * 60 * 60 * 24));
        const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const s = Math.floor((distance % (1000 * 60)) / 1000);

        this.days = String(d).padStart(2,'0');
        this.hours = String(h).padStart(2,'0');
        this.minutes = String(m).padStart(2,'0');
        this.seconds = String(s).padStart(2,'0');
        }
    }
    }


        // Ambil elemen modal
    const modal = document.getElementById("imgModal");
    const modalImg = document.getElementById("modalImage");
    const images = document.querySelectorAll(".preview-img");

    // Event klik gambar
    images.forEach(img => {
    img.addEventListener("click", () => {
        modal.style.display = "flex";
        modalImg.src = img.src;
    });
    });

    // Klik di luar gambar untuk menutup modal
    modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
    }
    });


        function carousel() {
            return {
                currentIndex: 0,
                slides: @json($slides), // <-- pastikan ini menghasilkan data valid
                prev() {
                    this.currentIndex = (this.currentIndex === 0) ? this.slides.length - 1 : this.currentIndex - 1;
                },
                next() {
                    this.currentIndex = (this.currentIndex === this.slides.length - 1) ? 0 : this.currentIndex + 1;
                }
            };
        }

        // Typing text
        const text = "SISTEM INFORMASI DESA BANJARSARI";
        const target = document.getElementById("typing-text");
        let index = 0;

        function typeWriter() {
            if (index < text.length) {
                target.innerHTML += text.charAt(index) === "\n" ? "<br>" : text.charAt(index);
                index++;
                setTimeout(typeWriter, 100); // Kecepatan ketik
            } else {
                setTimeout(() => {
                    target.innerHTML = ""; // Hapus tulisan
                    index = 0;              // Reset index
                    typeWriter();           // Mulai ulang
                }, 2000); // Jeda sebelum mengulang lagi (dalam ms)
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            typeWriter();

            const videos = document.querySelectorAll('.gallery-video');
            videos.forEach(video => {
                video.addEventListener('loadeddata', () => {
                    video.currentTime = 0.1; // Seek to a non-black frame
                }, { once: true });

                video.addEventListener('seeked', () => {
                    try {
                        const canvas = document.createElement('canvas');
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                        video.poster = canvas.toDataURL();
                    } catch (e) {
                        console.error('Error generating thumbnail:', e);
                    }
                }, { once: true });
            });
        });

        // Koordinat Banjarsari, Surakarta
        const desaLat = -7.559575;
        const desaLng = 110.822467;

        // Inisialisasi Peta
        const map = L.map('map').setView([desaLat, desaLng], 13); // zoom out

        // Layer OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        // Marker Desa
        L.marker([desaLat, desaLng])
        .addTo(map)
        .bindPopup('Ini lokasi Desa di Banjarsari, Surakarta.')
        .openPopup();
    </script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        footer a:hover {
            opacity: 0.8;
            transition: opacity 0.2s ease-in-out;
        }
    </style>
@endsection