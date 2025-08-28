<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Banjarsari') }}</title>
    
    {{-- liml sweeper --}}
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- FS Lightbox untuk preview -->
    <script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js"></script>


    {{-- link Leaflet CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html, body, * {
            font-family: 'Poppins', Arial, sans-serif !important;
        }
    </style>

    {{-- alpine carousel --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data x-init="$el.classList.add('opacity-0'); setTimeout(() => $el.classList.remove('opacity-0'), 100)" class="transition-opacity duration-700 ease-in-out opacity-0">
    <div>
        {{-- Navbar --}}
        @include('layouts.navigation.landing')

        {{-- Page Content --}}
        <main>
            @yield('content')
        </main>
        
    </div>
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
    <script>
    document.addEventListener('DOMContentLoaded', () => {
      const links = document.querySelectorAll('a[href]:not([target="_blank"]):not([href^="#"])');

      links.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const href = this.href;
          document.body.classList.add('opacity-0');
          setTimeout(() => {
            window.location.href = href;
          }, 150); // waktu fade-out
        });
      });
    });
  </script>

</body>
</html>              
