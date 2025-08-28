<x-guest-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 h-screen w-full">
        
        <div class="bg-slate-50 flex flex-col justify-center items-center p-6 sm:p-8 lg:p-12 overflow-y-auto">
            <div class="w-full max-w-md my-auto"> <a href="/" class="mb-6 flex justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Desa" class="w-20 h-20 object-contain">
                </a>
                <div class="text-center">
                    <h1 class="mb-2 text-3xl font-bold text-slate-800">Selamat Datang Kembali</h1>
                    <p class="text-slate-500 mb-6">
                        Silakan masuk untuk melanjutkan
                    </p>
                </div>

                <x-auth-session-status class="mb-5" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <x-input-label for="email" value="Alamat Email" class="font-semibold text-slate-700 sr-only" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <x-text-input id="email" class="block w-full pl-12 pr-4 py-3 rounded-xl shadow-sm border-slate-300 bg-white focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50 transition duration-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Alamat Email" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" value="Password" class="font-semibold text-slate-700 sr-only" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <x-text-input id="password" class="block w-full pl-12 pr-4 py-3 rounded-xl shadow-sm border-slate-300 bg-white focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50 transition duration-300"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password"
                                            placeholder="Password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <button type="submit" class="w-full flex items-center justify-center bg-green-600 text-white py-3 px-4 rounded-xl shadow-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 font-semibold transition-all duration-300 ease-in-out transform hover:scale-[1.02]">
                        <span>Masuk Sekarang</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="relative hidden md:block">
            <img src="{{ asset('images/logindesa.jpeg') }}"
                alt="Suasana desa yang tenang"
                class="w-full h-screen object-cover" />
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-green-800/60 to-transparent"></div>
            <div class="absolute bottom-10 left-10 p-4">
                <h2 class="text-3xl font-bold text-white leading-tight shadow-text">Sistem Informasi<br>Desa Banjarsari</h2>
                <p class="text-green-200 mt-2 shadow-text">Digitalisasi untuk pelayanan desa yang lebih baik.</p>
            </div>
        </div>
    </div>
</x-guest-layout>

<style>
    .shadow-text {
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }
</style>