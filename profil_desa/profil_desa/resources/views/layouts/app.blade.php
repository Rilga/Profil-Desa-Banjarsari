<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Banjarsari') }}</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Internal Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ecf2ea;
        }
        .content-wrapper {
            background-color: #ffffff;
            margin: -60px auto 2rem auto;
            position: relative;
            z-index: 10;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            max-width: 1200px;
            padding: 2rem;
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen flex flex-col">
        
        {{-- Navigation --}}
        @if(Auth::user()->role === 'admin')
            @include('layouts.navigation.admin')
        @else
            @include('layouts.navigation.user')
        @endif

        {{-- Page Heading --}}
        @isset($header)
            <header class="bg-white shadow-md" style="background-image: url('{{ asset('images/bgtes.jpg') }}'); background-size: cover; background-position: center;">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                    <div style="background-color: rgba(0,0,0,0.5); padding: 1rem; border-radius: 0.5rem;">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endisset

        {{-- Page Content --}}
        <main class="flex-grow">
            <div class="content-wrapper">
                {{ $slot }}
            </div>
        </main>

        {{-- Footer --}}
        <footer class="bg-[#00923F] text-white py-4 mt-auto">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-4">
                    <a href="/" class="text-white text-decoration-none">
                        <img src="{{ asset('images/logo.png') }}" alt="Banjarsari" class="logo-img" style="height: 45px; width: auto; object-fit: contain;">
                    </a>
                    <div class="d-flex gap-4">
                        <a href="#" class="text-white text-decoration-none hover:text-white/80">Privacy Policy</a>
                        <a href="#" class="text-white text-decoration-none hover:text-white/80">Hubungi Kami</a>
                    </div>
                </div>
                <div class="text-white/80">
                    © {{ date('Y') }} Banjarsari. All Rights Reserved.
                </div>
            </div>
        </footer>
    </div>

    <!-- External JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        AOS.init();

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        @endif
    </script>
</body>
</html>