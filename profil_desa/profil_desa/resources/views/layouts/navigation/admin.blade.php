<nav x-data="{ scrolled: false, open: false }"
     @scroll.window="scrolled = window.scrollY > 10"
     :class="{ 'navbar-scrolled': scrolled }"
     class="navbar">
     
  <div class="navbar-container">
    
    <!-- Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <img src="{{ asset('images/logo.png') }}" 
             alt="Logo"
             class="h-8 transition-all duration-300"
             style="width: 40px; height: auto; transition: all 0.3s ease;">
    </a>

    <!-- Menu Tengah -->
    <div class="nav-links hidden md:flex gap-4 items-center">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.berita') }}" class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">Berita</a>
        <a href="{{ route('admin.galeri') }}" class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">Galeri</a>
        <a href="{{ route('admin.aparat.index') }}" class="nav-link {{ request()->routeIs('admin.aparat.*') ? 'active' : '' }}">Aparat Desa</a>
        <a href="{{ route('admin.datalandingpage') }}" class="nav-link {{ request()->routeIs('admin.datalandingpage') ? 'active' : '' }}">Data Landing</a>
    </div>

    <!-- Dropdown Pengguna -->
    <div class="hidden sm:flex sm:items-center sm:ms-6">
        <div class="relative" x-data="{ dropdownOpen: false }" @click.away="dropdownOpen = false">
            <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                <div>{{ Auth::user()->name }}</div>
                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>

            <div x-show="dropdownOpen" 
                 x-transition:enter="transition ease-out duration-200" 
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-75" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95" 
                 class="absolute right-0 w-48 mt-2 origin-top-right bg-white rounded-md shadow-lg z-50 ring-1 ring-black ring-opacity-5 focus:outline-none">
                <div class="py-1">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Log Out
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hamburger -->
    <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="block ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.dashboard') ? 'border-indigo-400 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Dashboard</a>
        <a href="{{ route('admin.berita') }}" class="block ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.berita.*') ? 'border-indigo-400 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Berita</a>
    </div>
  </div>
</nav>

<style>
.navbar {
  width: 100%;
  padding: 30px 5%;
  position: relative; /* Changed from fixed */
  top: 0;
  left: 0;
  z-index: 1000;
  transition: all 0.3s ease;
  background-color: white;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.navbar-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  width: 100%;
  margin: 0 auto;
  padding: 0 15px;
}

.logo {
  flex-shrink: 0;
}

.nav-links {
  display: flex;
  gap: 25px;
  align-items: center;
}

.nav-link {
  color: #333;
  text-decoration: none;
  position: relative;
  padding-bottom: 5px;
}

.nav-link:hover,
.nav-link.active {
  color: #00923F;
}

.nav-link::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  background-color: #00923F;
  transition: width 0.3s ease;
}

.nav-link:hover::after,
.nav-link.active::after {
  width: 100%;
}
</style>
