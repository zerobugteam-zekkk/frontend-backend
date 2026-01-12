<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportasi - Abdurachman Saleh Hub</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap');
        
        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            background-image: radial-gradient(#ed1c2405 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .glass-header {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
        }

        .premium-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .premium-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px -12px rgba(15, 23, 42, 0.15);
        }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-thumb { background: #ed1c24; border-radius: 10px; }
    </style>
</head>
<body class="antialiased text-slate-900">

    <nav class="glass-header text-white sticky top-0 z-50 border-b border-white/10">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="group flex items-center space-x-4">
                <div class="bg-red-600 p-2.5 rounded-xl shadow-lg shadow-red-600/20 group-hover:scale-110 transition-transform">
                    <i class="fas fa-plane-departure text-white"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-red-500">Official Portal</span>
                    <span class="text-lg font-black tracking-tighter uppercase">Abdurachman <span class="text-red-600">Saleh</span></span>
                </div>
            </a>
            

            <button id="hamburger" class="lg:hidden text-2xl"><i class="fas fa-bars"></i></button>
        </div>
    </nav>

    <header class="relative bg-slate-900 py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <img src="https://www.transparenttextures.com/patterns/carbon-fibre.png" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 container mx-auto px-6 text-center">
            <h6 class="text-red-600 font-black uppercase tracking-[0.5em] text-xs mb-4">Accessibility Guide</h6>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter uppercase leading-none mb-6">
                Panduan <span class="text-red-600">Transportasi</span>
            </h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg font-medium">
                Akses eksklusif dan kemudahan mobilitas dari pusat kota menuju gerbang udara Malang Raya.
            </p>
        </div>
    </header>

    <main class="container mx-auto px-6 -mt-16 relative z-20 pb-24">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white rounded-[2.5rem] premium-card overflow-hidden flex flex-col">
                <div class="p-8 bg-slate-50 border-b border-slate-100 flex justify-between items-center">
                    <div class="w-14 h-14 bg-red-600 rounded-2xl flex items-center justify-center shadow-lg shadow-red-600/30">
                        <i class="fas fa-bus text-white text-2xl"></i>
                    </div>
                    <span class="text-[9px] bg-red-100 text-red-600 px-3 py-1.5 rounded-full font-black tracking-widest uppercase">Rekomendasi</span>
                </div>
                <div class="p-10 flex-grow">
                    <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tighter mb-4">Bus Damri</h3>
                    <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium">Layanan transportasi publik premium dengan rute strategis menuju pusat Kota Malang dan destinasi wisata Batu.</p>
                    <ul class="space-y-5 text-[13px] text-slate-700 font-bold">
                        <li class="flex items-center space-x-4">
                            <i class="fas fa-map-marked-alt text-red-600 text-lg"></i> 
                            <span>Pool Damri (Klojen) - Bandara</span>
                        </li>
                        <li class="flex items-center space-x-4">
                            <i class="fas fa-stopwatch text-red-600 text-lg"></i> 
                            <span>Interval Keberangkatan: 60 Menit</span>
                        </li>
                        <li class="flex items-center space-x-4">
                            <i class="fas fa-tag text-red-600 text-lg"></i> 
                            <span>Tarif: IDR 40.000 - 60.000</span>
                        </li>
                    </ul>
                </div>
                <div class="p-8 pt-0">
                    <button class="w-full py-5 bg-slate-900 text-white rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] hover:bg-red-600 transition-all shadow-xl shadow-slate-900/20">Cek Jadwal Operasional</button>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] premium-card overflow-hidden flex flex-col">
                <div class="p-8 bg-slate-50 border-b border-slate-100">
                    <div class="w-14 h-14 bg-slate-900 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-taxi text-white text-2xl"></i>
                    </div>
                </div>
                <div class="p-10 flex-grow">
                    <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tighter mb-4">Taksi Bandara</h3>
                    <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium">Layanan taksi resmi tersedia 24 jam dengan sistem tarif zona yang transparan dan pengemudi profesional.</p>
                    <ul class="space-y-5 text-[13px] text-slate-700 font-bold">
                        <li class="flex items-center space-x-4"><i class="fas fa-clock text-red-600 text-lg"></i> <span>Siaga 24/7 di Area Kedatangan</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-user-check text-red-600 text-lg"></i> <span>Sistem Kupon Resmi Bandara</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-shield-alt text-red-600 text-lg"></i> <span>Keamanan & Kenyamanan Terjamin</span></li>
                    </ul>
                </div>
                <div class="p-8 pt-0">
                    <button class="w-full py-5 border-2 border-slate-900 text-slate-900 rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] hover:bg-slate-900 hover:text-white transition-all">Daftar Tarif Per Zona</button>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] premium-card overflow-hidden flex flex-col">
                <div class="p-8 bg-slate-50 border-b border-slate-100">
                    <div class="w-14 h-14 bg-slate-200 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-mobile-alt text-slate-900 text-2xl"></i>
                    </div>
                </div>
                <div class="p-10 flex-grow">
                    <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tighter mb-4">Transportasi Online</h3>
                    <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium">Pemesanan via aplikasi Gojek atau Grab. Mengikuti regulasi titik jemput khusus yang telah ditetapkan.</p>
                    <ul class="space-y-5 text-[13px] text-slate-700 font-bold">
                        <li class="flex items-center space-x-4"><i class="fas fa-walking text-red-600 text-lg"></i> <span>Titik Jemput: Gerbang Luar</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-info-circle text-red-600 text-lg"></i> <span>Jarak Tempuh Kaki: ± 5 Menit</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-credit-card text-red-600 text-lg"></i> <span>Cashless & Digital Payment</span></li>
                    </ul>
                </div>
                <div class="p-8 pt-0">
                    <a href="#" class="block w-full py-5 bg-slate-100 text-slate-600 text-center rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] hover:bg-slate-200 transition-all">Panduan Titik Jemput</a>
                </div>
            </div>
        </div>

        <section class="mt-20 bg-slate-900 rounded-[3rem] overflow-hidden shadow-2xl relative">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-red-600/10 skew-x-12 translate-x-32"></div>
            <div class="flex flex-col lg:flex-row relative z-10">
                <div class="p-12 lg:p-20 lg:w-2/3">
                    <div class="inline-flex items-center space-x-3 text-red-500 font-black uppercase tracking-[0.4em] text-[10px] mb-6">
                        <div class="w-10 h-[2px] bg-red-600"></div>
                        <span>Secure Parking Facility</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tighter mb-8 leading-none">
                        Layanan Parkir <br> <span class="text-red-600">Inap Terpadu</span>
                    </h2>
                    <p class="text-slate-400 text-lg font-medium mb-12 max-w-xl">Dilengkapi sistem keamanan CCTV 24 jam dan manajemen parkir modern untuk keamanan kendaraan Anda selama bepergian.</p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-white/5 border border-white/10 p-8 rounded-3xl backdrop-blur-sm">
                            <p class="text-red-500 font-black uppercase text-[10px] tracking-widest mb-2">Kendaraan Roda 2</p>
                            <p class="text-3xl font-black text-white">IDR 20.000 <span class="text-xs text-slate-500 font-bold uppercase tracking-widest">/ Hari</span></p>
                        </div>
                        <div class="bg-white/5 border border-white/10 p-8 rounded-3xl backdrop-blur-sm">
                            <p class="text-red-500 font-black uppercase text-[10px] tracking-widest mb-2">Kendaraan Roda 4</p>
                            <p class="text-3xl font-black text-white">IDR 50.000 <span class="text-xs text-slate-500 font-bold uppercase tracking-widest">/ Hari</span></p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/5 lg:w-1/3 flex flex-col justify-center items-center p-12 text-center border-l border-white/10">
                    <div class="w-20 h-20 bg-red-600 rounded-full flex items-center justify-center mb-6 shadow-lg shadow-red-600/40">
                        <i class="fas fa-shield-alt text-white text-3xl"></i>
                    </div>
                    <h4 class="text-white font-black uppercase tracking-tighter text-xl mb-2">Aman & Terpantau</h4>
                    <p class="text-slate-400 text-sm font-medium">Patroli petugas keamanan 24 jam penuh standar Avsec.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white border-t border-slate-100 py-16">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-4 mb-8 md:mb-0">
                <div class="w-10 h-10 bg-slate-900 rounded-lg flex items-center justify-center">
                    <i class="fas fa-plane text-white text-xs"></i>
                </div>
                <span class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-400">© 2026 MLG HUB PORTAL</span>
            </div>
            <div class="flex space-x-8 text-[10px] font-black uppercase tracking-widest text-slate-400">
                <a href="#" class="hover:text-red-600 transition">Privacy Policy</a>
                <a href="#" class="hover:text-red-600 transition">Term of Services</a>
                <a href="#" class="hover:text-red-600 transition">Contact Us</a>
            </div>
        </div>
    </footer>

    <script>
        const hamburger = document.getElementById('hamburger');
    </script>
</body>
</html>