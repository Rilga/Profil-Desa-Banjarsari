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
    }

    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

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
          background-color: #eeeeee;
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
          background-color: #eeeeee;
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
        <!-- Hero Section -->
        <div class="relative h-screen">
            <div class="absolute inset-0 w-full h-full">
                <img src="{{ asset('images/bgtes.jpg') }}" alt="Background" class="w-full h-full object-cover">
            </div>
            <div class="relative h-full flex items-center">
                <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <!-- Left Column -->
                        <div class="text-white">
                            <h1 class="header-text">
                                Desa Banjarsari<br>
                                Surakarta
                            </h1>
                            <br>
                        </div>
                        
                        <!-- Right Column - Can be used for image or other content -->
                        <div class="hidden lg:block">
                            <!-- Additional content can be added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->

    <section class="stats-card">
        <div class="stats-container">
            <div class="stat-box">
            <h2>1.257</h2>
            <p>Jumlah Penduduk (Jiwa)</p>
            </div>
            <div class="divider"></div>
            <div class="stat-box">
            <h2>322</h2>
            <p>Jumlah Kepala Keluarga (KK)</p>
            </div>
            <div class="divider"></div>
            <div class="stat-box">
            <h2>15.4 km²</h2>
            <p>Luas Wilayah</p>
            </div>
        </div>
    </section>
    <br>
    <section id="sejarah">
        <div class="w-full flex justify-center">
            <div class="max-w-7xl w-full flex flex-col items-center gap-4 phone:gap-2">
                <div class="w-full 2xl:h-[calc((100vw-24rem)*9/24)] xl:h-[calc((100vw-22rem)*9/19)] lg:h-[calc((100vw-10rem)*9/19)] md:h-[calc((100vw-8rem)*9/16)] sm:h-auto phone:h-auto flex 2xl:flex-row xl:flex-row lg:flex-row md:flex-row sm:flex-col phone:flex-col 2xl:items-start xl:items-start lg:items-start md:items-center sm:items-center phone:items-center rounded-md mb-4">
                <div class="2xl:w-[65%] xl:w-[65%] lg:w-[60%] md:w-[60%] sm:w-full phone:w-full h-full flex flex-col justify-start items-start p-5 2xl:pr-20 xl:pr-10 phone:p-2 lg:pr-8 gap-2 2xl:order-1 xl:order-1 lg:order-1 md:order-1 sm:order-2 phone:order-2">
                    <div class="w-auto h-auto flex flex-col 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center gap-1">
                    <h2>
                        Sejarah Desa
                    </h2>
                    <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-8"></div>
                    </div>
                    <div class="mt-2 font-light text-justify text-base phone:text-xs text-gray-700 reveal-r animate">
                    Banjarsari (bahasa Jawa: ꦧꦚ꧀ꦗꦂꦱꦫꦶ) adalah salah satu dari lima kecamatan yang ada di Kota Surakarta, Provinsi Jawa Tengah, Indonesia.[1] Kecamatan ini merupakan satu-satunya di kota Surakarta yang sebelum kemerdekaan Indonesia menjadi bagian dari wilayah kota 
                    raja dari Kadipaten Praja Mangkunegaran; empat kecamatan lainnya merupakan wilayah dari kota raja Kasunanan Surakarta. Di kecamatan ini terletak banyak objek penting bagi kebudayaan dan pariwisata Surakarta: Istana Mangkunegaran, Stadion Manahan, stasiun Solo Balapan (stasiun terbesar di Surakarta), terminal bus Tirtonadi, dan Pasar Legi (pasar pusat bagi kawasan Solo Raya).
                    Presiden ke-7 Republik Indonesia, Joko Widodo dan ibu negara Iriana Joko Widodo tinggal di kecamatan ini, tepatnya di Kelurahan Sumber setelah purnatugas sebagai presiden Republik Indonesia.[2]
                    </div>
                </div>
                <div class="2xl:w-auto xl:w-auto lg:w-auto md:w-auto sm:w-[60%] phone:w-[70%] h-full flex flex-col 2xl:p-8 xl:p-8 lg:p-8 md:p-7 sm:p-8 phone:p-5 sm:order-1 phone:order-1 self-center relative">
                    <img class="h-full w-full bg-cover bg-center self-center z-10 reveal rounded-lg shadow-product animate" src="{{ asset('images/logo.png') }}" alt="">
                    
                    
                </div>
                </div>
            </div>
        </div>
    </section>

<section id="misi">
    <h2 class="text-3xl font-bold uppercase mb-4">Visi & Misi Desa</h2>
    <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-8"></div>

    <!-- VISI -->
    <div class="mb-10">
      <h3 class="text-xl font-semibold text-gray-800 mb-2">Visi:</h3>
      <p class="text-gray-700 italic">
        “Terwujudnya Desa Mandiri, Sejahtera, dan Berbasis Teknologi serta Kearifan Lokal.”
      </p>
    </div>

    <!-- MISI -->
    <div class="grid-container">
      <div class="card">
        <h3>Tekad Kami</h3>
        <p>
          Meningkatkan kualitas pelayanan publik yang cepat, transparan, dan berbasis teknologi digital.
        </p>
      </div>
      <div class="card">
        <h3>Tekad Kami</h3>
        <p>
          Mendorong kemandirian ekonomi masyarakat desa melalui pengembangan UMKM, pertanian, dan potensi lokal lainnya.
        </p>
      </div>
      <div class="card">
        <h3>Tekad Kami</h3>
        <p>
          Menjaga kelestarian lingkungan hidup dan budaya lokal sebagai aset berharga desa.
        </p>
      </div>
      <div class="card">
        <h3>Tekad Kami</h3>
        <p>
          Mengembangkan infrastruktur desa yang merata dan berkelanjutan.
        </p>
      </div>
      <div class="card">
        <h3>Tekad Kami</h3>
        <p>
          Meningkatkan partisipasi masyarakat dalam pembangunan desa melalui kolaborasi yang inklusif dan demokratis.
        </p>
      </div>
      <div class="card">
        <h3>Tekad Kami</h3>
        <p>
          Memberikan kemudahan untuk semua orang mencari informasi melalui sistem dan platform yang terpercaya, cepat, dan efisien.
        </p>
      </div>
    </div>
</section>

<section class="py-10 px-4">
  <h2 class="text-3xl font-bold text-center mb-4 uppercase">Struktur Organisasi Desa</h2>
  <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-8"></div>
  <br><br>
  <div class="flex flex-col items-center gap-6">

    <!-- Kepala Desa -->
    <div class="bg-white shadow-md p-4 rounded-md flex flex-col items-center w-60">
      <img src="{{ asset('images/profile.png') }}" alt="Kepala Desa" class="w-24 h-24 object-cover rounded-full border-2 border-gray-300">
      <h3 class="mt-2 text-lg font-semibold text-green-700">Kepala Desa</h3>
      <p class="text-sm text-gray-700">Nama Kepala Desa</p>
    </div>

    <!-- Sekretaris Desa -->
    <div class="flex flex-wrap justify-center gap-6 mt-4">
      <div class="bg-white shadow-md p-4 rounded-md flex flex-col items-center w-60">
        <img src="{{ asset('images/profile.png') }}" alt="Sekretaris Desa" class="w-20 h-20 object-cover rounded-full border border-gray-300">
        <h3 class="mt-2 text-md font-semibold text-green-600">Sekretaris Desa</h3>
        <p class="text-sm text-gray-700">Nama Sekretaris</p>
      </div>
    </div>

    <!-- Kaur & Kasi -->
    <div class="flex flex-wrap justify-center gap-6 mt-4">
      <!-- KAUR -->
      <div class="bg-white shadow-md p-4 rounded-md flex flex-col items-center w-60">
        <img src="{{ asset('images/profile.png') }}" alt="Kaur Keuangan" class="w-20 h-20 object-cover rounded-full">
        <h3 class="mt-2 font-semibold text-green-600">Kaur Keuangan</h3>
        <p class="text-sm text-gray-700">Nama Petugas</p>
      </div>
      <div class="bg-white shadow-md p-4 rounded-md flex flex-col items-center w-60">
        <img src="{{ asset('images/profile.png') }}" alt="Kaur Umum" class="w-20 h-20 object-cover rounded-full">
        <h3 class="mt-2 font-semibold text-green-600">Kaur Umum & TU</h3>
        <p class="text-sm text-gray-700">Nama Petugas</p>
      </div>

      <!-- KASI -->
      <div class="bg-white shadow-md p-4 rounded-md flex flex-col items-center w-60">
        <img src="{{ asset('images/profile.png') }}" alt="Kasi Pemerintahan" class="w-20 h-20 object-cover rounded-full">
        <h3 class="mt-2 font-semibold text-green-600">Kasi Pemerintahan</h3>
        <p class="text-sm text-gray-700">Nama Petugas</p>
      </div>
      <div class="bg-white shadow-md p-4 rounded-md flex flex-col items-center w-60">
        <img src="{{ asset('images/profile.png') }}" alt="Kasi Pelayanan" class="w-20 h-20 object-cover rounded-full">
        <h3 class="mt-2 font-semibold text-green-600">Kasi Pelayanan</h3>
        <p class="text-sm text-gray-700">Nama Petugas</p>
      </div>
    </div>

    <!-- Kepala Dusun -->
    <div class="flex flex-wrap justify-center gap-6 mt-6">
      <div class="bg-white shadow-md p-4 rounded-md flex flex-col items-center w-60">
        <img src="{{ asset('images/profile.png') }}" alt="Kepala Dusun 1" class="w-20 h-20 object-cover rounded-full">
        <h3 class="mt-2 font-semibold text-green-600">Kepala Dusun 1</h3>
        <p class="text-sm text-gray-700">Nama Petugas</p>
      </div>
      <div class="bg-white shadow-md p-4 rounded-md flex flex-col items-center w-60">
        <img src="{{ asset('images/profile.png') }}" alt="Kepala Dusun 2" class="w-20 h-20 object-cover rounded-full">
        <h3 class="mt-2 font-semibold text-green-600">Kepala Dusun 2</h3>
        <p class="text-sm text-gray-700">Nama Petugas</p>
      </div>
    </div>
  </div>
</section>

<section id="peta" class="my-10">
  <h2 class="text-3xl font-bold uppercase mb-4 text-center">Peta Desa</h2>
  <div class="border-t-4 border-yellow-400 w-20 mx-auto mb-8"></div>

  <!-- Container Peta -->
  <div id="map" class="w-[80%] h-96 rounded-lg shadow-md mx-auto"></div>
</section>


  {{-- Footer (Only for regular users) --}}
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
    </div>

    <script>
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