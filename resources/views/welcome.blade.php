<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abdurachman Saleh Hub - Gerbang Udara Jawa Timur</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Aksentuasi Biru Kustom */
        .blue-custom { color: #1c54ed; }
        .bg-blue-custom { background-color: #1c54ed; }
        .navy-custom { background-color: #0f172a; }

        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        /* Scrollbar menjadi Biru */
        ::-webkit-scrollbar-thumb { background: #1c54ed; border-radius: 10px; }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        #mobile-menu { 
            transition: all 0.3s ease-in-out; 
            max-height: 0; 
            overflow: hidden; 
        }
        #mobile-menu.show { 
            max-height: 500px; 
            padding-bottom: 2rem;
        }

        .main-bg-pattern {
            background-color: #f8fafc;
            background-image: 
                radial-gradient(#1c54ed08 1px, transparent 1px),
                radial-gradient(#1c54ed08 1px, #f8fafc 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }

        .blob-bg {
            position: absolute;
            width: 500px;
            height: 500px;
            /* Blob menjadi nuansa Biru */
            background: radial-gradient(circle, rgba(28, 84, 237, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(60px);
            z-index: -1;
        }

        /* Chatbot Style dengan aksen Biru */
        #chat-window {
            display: none;
            flex-direction: column;
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 320px;
            height: 400px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            z-index: 100;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        #chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            font-size: 13px;
        }
    </style>
</head>
<style>
        .blue-custom { color: #1c54ed; }
        .bg-blue-custom { background-color: #1c54ed; }
        
        /* Mencegah scroll horizontal secara total */
        html, body { 
            max-width: 100%;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #1c54ed; border-radius: 10px; }

        /* Animasi Menu Mobile */
        #mobile-menu {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            transform: translateY(-10px);
            pointer-events: none;
            display: none;
        }
        #mobile-menu.active {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
            display: block;
        }

        .main-bg-pattern {
            background-color: #f8fafc;
            background-image: radial-gradient(#1c54ed08 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Perbaikan untuk elemen yang meluber */
        .container {
            width: 100% !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
            margin-right: auto !important;
            margin-left: auto !important;
        }

        @media (max-width: 640px) {
            h1 { font-size: 2.5rem !important; }
            .header-content { padding-top: 2rem; }
        }
        /* Animasi Menu Garis Tiga (Mobile Menu) */
        #mobile-menu {
            transition: all 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        #mobile-menu.show {
            max-height: 400px; /* Sesuaikan dengan jumlah menu */
            opacity: 1;
            padding-bottom: 1.5rem;
        }

        .main-bg-pattern {
            background-color: #f8fafc;
            background-image: radial-gradient(#1c54ed08 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
    
</head>
<script>
   // FUNGSI JAM & CUACA (Tetap berfungsi seperti sebelumnya)
    function updateClock() {
        const clockEl = document.getElementById('realtime-clock');
        if (clockEl) {
            const now = new Date();
            const options = { timeZone: 'Asia/Jakarta', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const timeString = new Intl.DateTimeFormat('id-ID', options).format(now);
            clockEl.textContent = timeString.replace(/\./g, ':');
        }
    }

    async function fetchWeather() {
        const apiKey = '8a8db4b35f665e7cb03b00081f767e4b';
        const lat = -7.9266; 
        const lon = 112.7136;
        const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric&lang=id&t=${Date.now()}`;

        try {
            const response = await fetch(url);
            const data = await response.json();
            if (data.main && data.weather) {
                const temp = Math.round(data.main.temp);
                document.getElementById('weather-temp').textContent = temp;
                const iconEl = document.getElementById('weather-icon');
                const id = data.weather[0].id;
                // Warna icon cuaca disesuaikan ke Biru
                iconEl.className = (id >= 200 && id < 600) ? 'fas fa-cloud-showers-heavy mr-2 text-blue-500' : 
                                   (id === 800) ? 'fas fa-sun mr-2 text-orange-400' : 'fas fa-cloud mr-2 text-slate-400';
            }
        } catch (error) { console.error("Gagal ambil data:", error); }
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateClock();
        setInterval(updateClock, 1000);
        fetchWeather();
        setInterval(fetchWeather, 900000);
    });
</script>

<body class="main-bg-pattern font-sans text-slate-900 antialiased relative overflow-x-hidden">

    <div class="blob-bg top-[10%] -left-[10%]"></div>
    <div class="blob-bg top-[40%] -right-[10%]" style="background: radial-gradient(circle, rgba(15, 23, 42, 0.03) 0%, transparent 70%);"></div>

    <div class="bg-slate-900 text-white py-3 text-[10px] md:text-xs uppercase tracking-[0.2em] z-[60] relative">
        <div class="container mx-auto px-6 flex justify-between items-center font-bold">
           <div class="flex space-x-6">
                <span class="flex items-center">
                    <i class="fas fa-clock mr-2 text-blue-500"></i> 
                    <span id="realtime-clock">--:--</span>&nbsp;WIB
                </span>
                <span class="hidden md:flex items-center">
                    <i id="weather-icon" class="fas fa-cloud-sun mr-2 text-orange-400"></i> 
                    <span id="weather-temp">--</span>°C MALANG
                </span>
            </div>
            <div class="flex space-x-6">
                <a href="{{ url('/info-parkir') }}" class="hover:text-blue-500 transition border-b-2 border-transparent hover:border-blue-500 pb-1">Fasilitas</a>
                <a href="{{ url('/bantuan') }}" class="hover:text-blue-500 transition border-b-2 border-transparent hover:border-blue-500 pb-1">Bantuan</a>
            </div>
        </div>
    </div>

   <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex items-center space-x-3">
            <div class="bg-blue-600 p-2 rounded-lg">
                <i class="fas fa-plane-departure text-white text-sm"></i>
            </div>
            <span class="text-sm font-black uppercase tracking-tighter text-slate-900">
                Abdurachman <span class="text-blue-600">Saleh</span>
            </span>
        </a>

        <div class="hidden lg:flex items-center space-x-10 text-[11px] font-black uppercase tracking-widest text-slate-600">
            <a href="{{ url('/jadwal') }}" class="hover:text-blue-600 transition border-b-2 border-transparent hover:border-blue-600 pb-1">Jadwal Penerbangan</a>
            <a href="{{ url('/sejarah') }}" class="hover:text-blue-600 transition border-b-2 border-transparent hover:border-blue-600 pb-1">Sejarah</a>
            <a href="{{ url('/transportasi') }}" class="hover:text-blue-600 transition border-b-2 border-transparent hover:border-blue-600 pb-1">Transportasi</a>
            <a href="{{ url('/routes') }}" class="hover:text-blue-600 transition border-b-2 border-transparent hover:border-blue-600 pb-1">Rute</a>
        </div>

        <div class="relative hidden sm:block group">
            <form action="{{ url('/jadwal') }}" method="GET" class="relative">
                <input type="text" name="search" placeholder="Cari rute..." class="bg-slate-100 text-[11px] font-bold uppercase py-2.5 pl-5 pr-12 rounded-full border border-transparent focus:border-blue-600 outline-none w-48 transition-all">
                <button type="submit" class="absolute right-1 top-1 bg-slate-900 text-white p-2 rounded-full hover:bg-blue-600 transition-all">
                    <i class="fas fa-search text-[10px]"></i>
                </button>
            </form>
        </div>
    </div>
</nav>

<script>

    <div class="blob-bg top-[10%] -left-[10%]"></div>
    <div class="blob-bg top-[40%] -right-[10%]" style="background: radial-gradient(circle, rgba(15, 23, 42, 0.03) 0%, transparent 70%);"></div>

    <div class="bg-slate-900 text-white py-3 text-[10px] md:text-xs uppercase tracking-[0.2em] z-[60] relative">
        <div class="container mx-auto px-6 flex justify-between items-center font-bold">
           <div class="flex space-x-6">
    <span class="flex items-center">
        <i class="fas fa-clock mr-2 text-red-500"></i> 
        <span id="realtime-clock">--:--</span>&nbsp;WIB
    </span>
    
    <span class="hidden md:flex items-center">
        <i id="weather-icon" class="fas fa-cloud-sun mr-2 text-orange-400"></i> 
        <span id="weather-temp">--</span>°C MALANG
    </span>
</div>
            <div class="flex space-x-6">
    <a href="{{ url('/fasilitas') }}" 
       class="font-bold text-sm uppercase tracking-tight pb-1 transition border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 {{ Request::is('fasilitas') ? 'text-blue-600 border-blue-600' : 'text-slate-600' }}">
        Fasilitas
    </a>

    <a href="{{ url('/bantuan') }}" 
       class="font-bold text-sm uppercase tracking-tight pb-1 transition border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 {{ Request::is('bantuan') ? 'text-blue-600 border-blue-600' : 'text-slate-600' }}">
        Bantuan
    </a>
</div>
    </div>

   <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        
<a href="{{ url('/') }}" class="flex items-center space-x-3">
    <div class="bg-red-600 p-2 rounded-lg">
        <i class="fas fa-plane-departure text-white text-sm"></i>
    </div>
    <span class="text-sm font-black uppercase tracking-tighter text-slate-900">
        Abdurachman <span class="text-red-600">Saleh</span>
    </span>
</a>

<button id="hamburger" class="lg:hidden text-slate-900 p-2 focus:outline-none">
    <i class="fas fa-bars text-xl"></i>
</button>

        <div class="hidden lg:flex items-center space-x-10 text-[11px] font-black uppercase tracking-widest text-slate-600">
            <a href="{{ url('/jadwal') }}" class="hover:text-red-600 transition border-b-2 border-transparent hover:border-red-600 pb-1 {{ Request::is('jadwal') ? 'text-red-600 border-red-600' : '' }}">
                Jadwal Penerbangan
            </a>
            <a href="{{ url('/sejarah') }}" class="hover:text-red-600 transition border-b-2 border-transparent hover:border-red-600 pb-1 {{ Request::is('sejarah') ? 'text-red-600 border-red-600' : '' }}">
                Sejarah
            </a>
            <a href="{{ url('/transportasi') }}" class="hover:text-red-600 transition border-b-2 border-transparent hover:border-red-600 pb-1 {{ Request::is('transportasi') ? 'text-red-600 border-red-600' : '' }}">
                Transportasi
            </a>
            <a href="{{ url('/routes') }}" class="hover:text-red-600 transition border-b-2 border-transparent hover:border-red-600 pb-1 {{ Request::is('routes') ? 'text-red-600 border-red-600' : '' }}">
                Rute
            </a>
        </div>

    <div class="relative hidden sm:block group">
    <form action="{{ url('/jadwal') }}" method="GET" class="relative">
        <input 
            type="text" 
            name="search" 
            placeholder="Cari rute penerbangan..." 
            class="bg-slate-100 text-slate-900 text-[11px] font-bold uppercase tracking-wider py-2.5 pl-5 pr-12 rounded-full border border-transparent focus:border-red-600 focus:bg-white focus:ring-4 focus:ring-red-600/5 transition-all outline-none w-48 md:w-64"
        >
        <button type="submit" class="absolute right-1 top-1 bg-slate-900 text-white p-2 rounded-full hover:bg-red-600 transition-all group-hover:scale-95">
            <i class="fas fa-search text-[10px]"></i>
        </button>
    </form>
</div>

    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100 px-6 overflow-hidden transition-all duration-300">
        <div class="flex flex-col space-y-5 py-6 font-bold uppercase text-xs tracking-widest text-slate-600">
            <a href="{{ url('/jadwal') }}" class="hover:text-red-600 flex items-center justify-between">
                Jadwal Penerbangan <i class="fas fa-chevron-right text-[10px] opacity-30"></i>
            </a>
            <a href="{{ url('/sejarah') }}" class="hover:text-red-600 flex items-center justify-between">
                Sejarah <i class="fas fa-chevron-right text-[10px] opacity-30"></i>
            </a>
            <a href="{{ url('/transportasi') }}" class="hover:text-red-600 flex items-center justify-between">
                Transportasi <i class="fas fa-chevron-right text-[10px] opacity-30"></i>
            </a>
            <a href="{{ url('/routes') }}" class="hover:text-red-600 flex items-center justify-between">
                Rute Penerbangan <i class="fas fa-chevron-right text-[10px] opacity-30"></i>
            </a>
        </div>
    </div>
</nav>

<script>
    const btn = document.getElementById('hamburger');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700;900&display=swap');
    
    .font-formal {
        font-family: 'Libre Franklin', sans-serif;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
</style>

<header class="relative h-[90vh] flex flex-col justify-center overflow-hidden bg-slate-900 font-formal">
    <img src="{{ asset('images/Bandara Malang Abdurachman Saleh.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover opacity-40" 
         alt="Gerbang Udara Malang">
    
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/70 to-transparent"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl pt-20"> 
            
            <div class="mb-8 animate-fade-up" data-aos="fade-up" data-aos-duration="800">
                <h1 class="text-6xl md:text-8xl font-black text-white leading-[0.85] uppercase tracking-tighter">
                    Gerbang Udara <br>
                    <span class="text-transparent border-y-2 border-blue-600 bg-clip-text bg-gradient-to-r from-white to-blue-400 py-3 inline-block">
                        Malang Raya
                    </span>
                </h1>
            </div>
            
            <div class="max-w-xl mb-12 animate-fade-up" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"> 
                <p class="text-slate-300 text-lg md:text-xl font-normal leading-relaxed opacity-90 border-l-4 border-blue-600 pl-6 text-justify">
                    Bandara Abdurachman Saleh Malang merupakan salah satu pilar transportasi utama yang menghubungkan keindahan Malang Raya dengan berbagai kota besar di Nusantara, menyatukan kenyamanan modern dengan nilai sejarah yang mendalam.
                </p>
            </div>
            
            <div class="flex flex-wrap gap-5 animate-fade-up" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <a href="{{ url('/jadwal') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-5 rounded-full font-bold uppercase text-[11px] tracking-widest transition-all transform hover:scale-105 shadow-2xl shadow-blue-600/30">
                    Cek Keberangkatan
                </a>
                <a href="{{ url('/sejarah') }}" 
                   class="bg-white/5 hover:bg-white/10 backdrop-blur-md text-white border border-white/20 px-10 py-5 rounded-full font-bold uppercase text-[11px] tracking-widest transition-all hover:border-blue-400">
                    Eksplor Sejarah
                </a>
            </div>

        </div>
    </div>
</header>
   <section class="container mx-auto px-6 mt-16 relative z-20">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-6">
        <div class="bg-white p-6 md:p-10 rounded-[1.5rem] md:rounded-[2.5rem] shadow-xl border border-slate-100 text-center transform hover:-translate-y-2 transition-transform duration-300" data-aos="zoom-in-up" data-aos-delay="0" data-aos-duration="800">
            <div class="w-10 md:w-14 h-10 md:h-14 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                <i class="fas fa-plane text-blue-600 text-lg md:text-xl"></i>
            </div>
            <h3 id="stat-flights" class="text-2xl md:text-4xl font-black text-slate-900 leading-none mb-2 md:mb-3 tracking-tighter">0</h3>
            <p class="text-[8px] md:text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Penerbangan Hari Ini</p>
        </div>

        <div class="bg-white p-6 md:p-10 rounded-[1.5rem] md:rounded-[2.5rem] shadow-xl border border-slate-100 text-center transform hover:-translate-y-2 transition-transform duration-300" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="800">
            <div class="w-10 md:w-14 h-10 md:h-14 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                <i class="fas fa-users text-blue-600 text-lg md:text-xl"></i>
            </div>
            <h3 id="stat-passengers" class="text-2xl md:text-4xl font-black text-slate-900 leading-none mb-2 md:mb-3 tracking-tighter">0</h3>
            <p class="text-[8px] md:text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Estimasi Penumpang</p>
        </div>

        <div class="bg-white p-6 md:p-10 rounded-[1.5rem] md:rounded-[2.5rem] shadow-xl border border-slate-100 text-center transform hover:-translate-y-2 transition-transform duration-300" data-aos="zoom-in-up" data-aos-delay="200" data-aos-duration="800">
            <div class="w-10 md:w-14 h-10 md:h-14 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                <i class="fas fa-road text-blue-600 text-lg md:text-xl"></i>
            </div>
            <h3 class="text-2xl md:text-4xl font-black text-slate-900 leading-none mb-2 md:mb-3 tracking-tighter">17/35</h3>
            <p class="text-[8px] md:text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Runway Direction</p>
        </div>

        <div class="bg-white p-6 md:p-10 rounded-[1.5rem] md:rounded-[2.5rem] shadow-xl border border-slate-100 text-center transform hover:-translate-y-2 transition-transform duration-300" data-aos="zoom-in-up" data-aos-delay="300" data-aos-duration="800">
            <div class="w-10 md:w-14 h-10 md:h-14 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                <i class="fas fa-shield-alt text-blue-600 text-lg md:text-xl"></i>
            </div>
            <h3 class="text-2xl md:text-4xl font-black text-slate-900 leading-none mb-2 md:mb-3 tracking-tighter">Active</h3>
            <p class="text-[8px] md:text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Security Status</p>
        </div>
    </div>
</section>

    <main class="container mx-auto px-6 py-32 relative">
        <div class="bg-white overflow-x-hidden">

    <section id="history" class="py-20 lg:py-32">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-24 items-center">
                <div class="w-full lg:w-1/2 relative" data-aos="fade-right" data-aos-duration="800">
                    <div class="absolute -bottom-12 -left-12 w-40 md:w-64 h-40 md:h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
                    
                    <div class="relative z-10 rounded-2xl md:rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white">
                        <img src="https://images.unsplash.com/photo-1569154941061-e231b4725ef1?auto=format&fit=crop&w=1000" 
                             alt="Historical Archive"
                             class="w-full h-[300px] md:h-[400px] lg:h-[500px] grayscale hover:grayscale-0 transition-all duration-1000 object-cover scale-105 hover:scale-100">
                    </div>

                    <div class="absolute -bottom-6 -right-6 bg-slate-900 text-white p-6 md:p-8 rounded-2xl md:rounded-[2rem] z-20 hidden md:block shadow-2xl border-4 border-slate-800">
                        <p class="text-3xl md:text-5xl font-black italic text-blue-500 leading-none">1994</p>
                        <p class="text-[9px] md:text-[10px] font-bold uppercase tracking-[0.3em] opacity-60 mt-2">Tahun Berdiri</p>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 flex flex-col space-y-6 md:space-y-8" data-aos="fade-left" data-aos-duration="800">
                    <div>
                        <span class="inline-block text-blue-600 font-black uppercase tracking-[0.4em] text-xs mb-4 px-4 py-1 bg-blue-50 rounded-full">
                            Historical Archive
                        </span>
                        <h2 class="text-3xl md:text-6xl font-black text-slate-900 tracking-tighter leading-tight uppercase">
                            Warisan Sang <br>
                            <span class="text-blue-600">Abdurachman</span> Saleh
                        </h2>
                    </div>
                    
                    <div class="space-y-4 md:space-y-6 text-slate-600 leading-relaxed font-normal text-sm md:text-lg">
                        <p class="text-justify">
                            Dinamakan berdasarkan pahlawan nasional <strong class="text-slate-900 font-bold">Prof. Dr. Abdurachman Saleh</strong>, bandara ini memiliki akar militer yang kuat sebagai pangkalan udara (Lanud) utama di Jawa Timur. Lokasinya yang dikelilingi oleh <span class="text-slate-800 font-semibold">Gunung Arjuno, Gunung Semeru, dan Gunung Bromo</span> menjadikannya salah satu bandara dengan pemandangan terindah namun menantang di Indonesia.
                        </p>
                        <p class="text-justify border-l-4 border-blue-600 pl-4 md:pl-6 py-2 bg-slate-50 rounded-r-xl">
                            Transformasi besar terjadi pada <strong class="text-blue-600">2005</strong>, ketika gerbang militer ini dibuka untuk melayani masyarakat sipil. Sejak saat itu, Abdurachman Saleh telah menjadi nadi utama bagi wisatawan mancanegara yang ingin mengeksplorasi keajaiban alam Bromo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-30 pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-200 rounded-full filter blur-[120px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-100 rounded-full filter blur-[120px]"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 md:mb-20 scroll-animate-down" data-aos="zoom-in" data-aos-duration="800">
                <h2 class="text-blue-600 font-black uppercase tracking-[0.3em] text-xs md:text-sm mb-4">Management</h2>
                <h3 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight uppercase tracking-tighter">
                    Struktur <span class="text-blue-600">Organisasi</span>
                </h3>
                <p class="mt-4 text-slate-500 font-bold uppercase tracking-[0.2em] text-[9px] md:text-[10px] max-w-2xl mx-auto">
                    UPT Pelayanan Jasa Kebandarudaraan Abdulrachman Saleh Malang
                </p>
                <div class="w-24 h-1.5 bg-blue-600 mx-auto mt-6 md:mt-8 rounded-full"></div>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="flex justify-center mb-10 md:mb-16 relative" data-aos="fade-down" data-aos-duration="800">
                    <div class="bg-blue-600 p-6 md:p-8 rounded-2xl md:rounded-[2rem] shadow-2xl shadow-blue-200 border-4 border-white text-center w-full max-w-md group hover:scale-105 transition-all duration-500">
                        <div class="w-10 md:w-12 h-10 md:h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                            <i class="fas fa-user-tie text-white text-lg md:text-xl"></i>
                        </div>
                        <h4 class="text-white font-black uppercase tracking-tight text-sm md:text-lg leading-snug">
                            Kepala UPT Pelayanan Jasa Kebandarudaraan Abdulrachman Saleh
                        </h4>
                    </div>
                    <div class="absolute -bottom-12 md:-bottom-16 left-1/2 -translate-x-1/2 w-0.5 h-12 md:h-16 bg-blue-200 hidden md:block"></div>
                </div>

                <div class="relative pt-8">
                    <div class="absolute top-0 left-[16.6%] right-[16.6%] h-0.5 bg-blue-200 hidden md:block"></div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                        <div class="relative flex flex-col items-center group" data-aos="fade-up" data-aos-delay="0" data-aos-duration="800">
                            <div class="w-0.5 h-6 md:h-8 bg-blue-200 hidden md:block"></div>
                            <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-blue-50 shadow-xl shadow-slate-200/50 text-center w-full group-hover:-translate-y-2 transition-all duration-500 border-t-4 border-t-blue-400">
                                <h5 class="text-slate-400 font-bold uppercase tracking-widest text-[9px] md:text-[10px] mb-2">Kepala Sub Bagian</h5>
                                <p class="text-slate-800 font-black uppercase text-sm md:text-lg tracking-tight">Tata Usaha</p>
                            </div>
                        </div>

                        <div class="relative flex flex-col items-center group" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                            <div class="w-0.5 h-6 md:h-8 bg-blue-200 hidden md:block"></div>
                            <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-blue-50 shadow-xl shadow-slate-200/50 text-center w-full group-hover:-translate-y-2 transition-all duration-500 border-t-4 border-t-blue-600">
                                <h5 class="text-slate-400 font-bold uppercase tracking-widest text-[9px] md:text-[10px] mb-2">Kepala Seksi</h5>
                                <p class="text-slate-800 font-black uppercase text-sm md:text-lg tracking-tight leading-tight">
                                    Keamanan Penerbangan & Pelayanan Darurat
                                </p>
                            </div>
                        </div>

                        <div class="relative flex flex-col items-center group" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                            <div class="w-0.5 h-6 md:h-8 bg-blue-200 hidden md:block"></div>
                            <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-blue-50 shadow-xl shadow-slate-200/50 text-center w-full group-hover:-translate-y-2 transition-all duration-500 border-t-4 border-t-blue-400">
                                <h5 class="text-slate-400 font-bold uppercase tracking-widest text-[9px] md:text-[10px] mb-2">Kepala Seksi</h5>
                                <p class="text-slate-800 font-black uppercase text-sm md:text-lg tracking-tight">Teknik & Pelayanan Jasa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 md:mb-20 scroll-animate-down" data-aos="zoom-in" data-aos-duration="800">
                <h2 class="text-blue-600 font-black uppercase tracking-[0.3em] text-[10px] md:text-xs mb-4">Strategic Goals</h2>
                <h3 class="text-3xl md:text-5xl font-black text-slate-800 leading-tight uppercase tracking-tighter">
                    Visi & <span class="text-blue-600">Misi</span>
                </h3>
                <div class="w-16 h-1.5 bg-blue-600 mx-auto mt-4 md:mt-6 rounded-full"></div>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-16 items-start">
                    
                    <div class="lg:col-span-5" data-aos="fade-right" data-aos-duration="800">
                        <div class="sticky top-24">
                            <div class="bg-slate-900 p-8 md:p-12 rounded-2xl md:rounded-[3rem] shadow-2xl text-white relative overflow-hidden">
                                <i class="fas fa-quote-right absolute -right-4 -bottom-4 text-white/5 text-6xl md:text-9xl"></i>
                                
                                <h4 class="text-blue-400 font-black uppercase tracking-widest text-xs mb-4 md:mb-6 flex items-center gap-3">
                                    <span class="w-8 h-[1px] bg-blue-400"></span> Filosofi Utama
                                </h4>
                                <p class="text-xl md:text-3xl font-bold leading-snug italic relative z-10">
                                    "Menjadi fondasi strategis dalam pelayanan transportasi udara yang berkualitas, aman, dan selaras dengan pembangunan daerah."
                                </p>
                            </div>
                            <p class="mt-6 md:mt-8 text-slate-500 text-xs md:text-sm leading-relaxed font-medium px-4 border-l-2 border-slate-100">
                                Perumusan visi dan misi ini berfungsi sebagai arah kebijakan bagi seluruh pengelola bandara dalam menjalankan tanggung jawab secara terintegrasi.
                            </p>
                        </div>
                    </div>

                    <div class="lg:col-span-7 space-y-3 md:space-y-4" data-aos="fade-left" data-aos-duration="800">
                        <div class="group flex items-center p-5 md:p-8 bg-slate-50 border border-slate-100 rounded-2xl md:rounded-3xl hover:bg-white hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-100 transition-all duration-300">
                            <div class="w-12 md:w-14 h-12 md:h-14 bg-white rounded-xl md:rounded-2xl flex items-center justify-center text-blue-600 font-black shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all shrink-0 text-sm md:text-base">
                                01
                            </div>
                            <p class="ml-4 md:ml-8 text-slate-700 font-bold uppercase tracking-tight text-xs md:text-sm lg:text-base leading-snug">
                                Meningkatkan pemerataan pelayanan dengan prioritas wilayah kepulauan & masyarakat berpenghasilan rendah.
                            </p>
                        </div>

                        <div class="group flex items-center p-5 md:p-8 bg-slate-50 border border-slate-100 rounded-2xl md:rounded-3xl hover:bg-white hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-100 transition-all duration-300">
                            <div class="w-12 md:w-14 h-12 md:h-14 bg-white rounded-xl md:rounded-2xl flex items-center justify-center text-blue-600 font-black shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all shrink-0 text-sm md:text-base">
                                02
                            </div>
                            <p class="ml-4 md:ml-8 text-slate-700 font-bold uppercase tracking-tight text-xs md:text-sm lg:text-base leading-snug">
                                Meningkatkan layanan transportasi yang murah, mudah, aman, nyaman, dan cepat.
                            </p>
                        </div>

                        <div class="group flex items-center p-5 md:p-8 bg-slate-50 border border-slate-100 rounded-2xl md:rounded-3xl hover:bg-white hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-100 transition-all duration-300">
                            <div class="w-12 md:w-14 h-12 md:h-14 bg-white rounded-xl md:rounded-2xl flex items-center justify-center text-blue-600 font-black shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all shrink-0 text-sm md:text-base">
                                03
                            </div>
                            <p class="ml-4 md:ml-8 text-slate-700 font-bold uppercase tracking-tight text-xs md:text-sm lg:text-base leading-snug">
                                Meningkatkan peran sektor transportasi dalam mempercepat pembangunan daerah.
                            </p>
                        </div>

                        <div class="group flex items-center p-5 md:p-8 bg-slate-50 border border-slate-100 rounded-2xl md:rounded-3xl hover:bg-white hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-100 transition-all duration-300">
                            <div class="w-12 md:w-14 h-12 md:h-14 bg-white rounded-xl md:rounded-2xl flex items-center justify-center text-blue-600 font-black shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all shrink-0 text-sm md:text-base">
                                04
                            </div>
                            <p class="ml-4 md:ml-8 text-slate-700 font-bold uppercase tracking-tight text-xs md:text-sm lg:text-base leading-snug">
                                Mendorong partisipasi masyarakat & pelaku usaha dalam meningkatkan kualitas layanan.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<section id="facilities" class="bg-slate-900 rounded-2xl md:rounded-[3rem] lg:rounded-[5rem] p-8 md:p-16 lg:p-24 text-white overflow-hidden relative shadow-3xl font-formal mx-6 lg:mx-auto" data-aos="zoom-in" data-aos-duration="800">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-600/10 skew-x-12 translate-x-32"></div>
    
    <div class="relative z-10">
        <div class="text-center mb-12 md:mb-20">
            <h2 class="text-2xl md:text-5xl font-black uppercase tracking-tighter italic">Layanan Terminal</h2>
            <div class="w-16 md:w-20 h-1.5 bg-blue-600 mx-auto mt-4 md:mt-6 rounded-full"></div>
            <p class="text-slate-400 mt-6 md:mt-8 uppercase text-[9px] md:text-xs tracking-[0.3em] font-bold">Standardisasi Pelayanan Bandar Udara Internasional</p>
        </div>

        <div class="flex overflow-x-auto gap-6 md:gap-8 pb-8 md:pb-12 snap-x no-scrollbar" style="scrollbar-width: none; -ms-overflow-style: none;">
            
            <div class="min-w-[280px] md:min-w-[320px] lg:min-w-[400px] bg-white/5 p-6 md:p-10 rounded-2xl md:rounded-[3rem] border border-white/10 hover:bg-white/10 transition-all group snap-center" data-aos="flip-left" data-aos-duration="800">
                <div class="w-12 md:w-14 h-12 md:h-14 bg-blue-600/20 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 md:mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-couch text-blue-500 text-xl md:text-2xl"></i>
                </div>
                <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4 uppercase tracking-tight text-blue-400">Singhasari Premium Lounge</h4>
                <p class="text-xs md:text-sm text-slate-400 leading-relaxed text-justify">
                    Fasilitas ruang tunggu eksklusif yang terletak strategis di lantai 2 terminal keberangkatan. Lounge ini dirancang khusus untuk memberikan kenyamanan paripurna bagi penumpang kelas bisnis dan mitra perbankan. Tersedia hidangan prasmanan khas nusantara, area kerja dengan koneksi internet berkecepatan tinggi, serta ruang ibadah pribadi.
                </p>
            </div>
            
            <div class="min-w-[280px] md:min-w-[320px] lg:min-w-[400px] bg-white/5 p-6 md:p-10 rounded-2xl md:rounded-[3rem] border border-white/10 hover:bg-white/10 transition-all group snap-center" data-aos="flip-left" data-aos-duration="800" data-aos-delay="100">
                <div class="w-12 md:w-14 h-12 md:h-14 bg-blue-600/20 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 md:mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-store text-blue-500 text-xl md:text-2xl"></i>
                </div>
                <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4 uppercase tracking-tight text-blue-400">Area Komersial & UMKM</h4>
                <p class="text-xs md:text-sm text-slate-400 leading-relaxed text-justify">
                    Pusat perbelanjaan terminal yang menghadirkan sinergi antara gerai modern dan UMKM lokal unggulan Malang Raya. Para penumpang dapat menemukan berbagai pilihan buah tangan otentik seperti Keripik Tempe Sanan, Apel Manalagi segar, hingga olahan bakso kemasan vakum.
                </p>
            </div>
            
            <div class="min-w-[280px] md:min-w-[320px] lg:min-w-[400px] bg-white/5 p-6 md:p-10 rounded-2xl md:rounded-[3rem] border border-white/10 hover:bg-white/10 transition-all group snap-center" data-aos="flip-left" data-aos-duration="800" data-aos-delay="200">
                <div class="w-12 md:w-14 h-12 md:h-14 bg-blue-600/20 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 md:mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-wheelchair text-blue-500 text-xl md:text-2xl"></i>
                </div>
                <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4 uppercase tracking-tight text-blue-400">Manajemen Layanan Prioritas</h4>
                <p class="text-xs md:text-sm text-slate-400 leading-relaxed text-justify">
                    Komitmen kami terhadap inklusivitas diwujudkan melalui penyediaan fasilitas bantuan mobilitas penuh. Tersedia armada kursi roda modern dan petugas pendamping terlatih (Special Assistant) yang siap membantu penumpang lansia, ibu hamil, serta penyandang disabilitas.
                </p>
            </div>

            <div class="min-w-[280px] md:min-w-[320px] lg:min-w-[400px] bg-white/5 p-6 md:p-10 rounded-2xl md:rounded-[3rem] border border-white/10 hover:bg-white/10 transition-all group snap-center" data-aos="flip-left" data-aos-duration="800" data-aos-delay="300">
                <div class="w-12 md:w-14 h-12 md:h-14 bg-blue-600/20 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 md:mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-wifi text-blue-500 text-xl md:text-2xl"></i>
                </div>
                <h4 class="text-lg md:text-xl font-bold mb-3 md:mb-4 uppercase tracking-tight text-blue-400">Konektivitas Digital</h4>
                <p class="text-xs md:text-sm text-slate-400 leading-relaxed text-justify">
                    Bandara Abdurachman Saleh mendukung kebutuhan digital para pelancong dengan menyediakan akses Wi-Fi gratis di seluruh area terminal penumpang. Selain itu, tersedia stasiun pengisian daya (charging station) yang tersebar di area ruang tunggu untuk memastikan perangkat Anda tetap aktif.
                </p>
            </div>
            
        </div>

        <div class="flex justify-center gap-2 mt-4 animate-pulse">
            <div class="w-12 h-1 bg-blue-600 rounded-full"></div>
            <div class="w-2 h-1 bg-slate-700 rounded-full"></div>
            <div class="w-2 h-1 bg-slate-700 rounded-full"></div>
        </div>

        <div class="mt-12 md:mt-16 pt-8 md:pt-10 border-t border-white/5 text-center">
            <p class="text-slate-500 text-[8px] md:text-xs font-medium uppercase tracking-widest">
                <i class="fas fa-info-circle mr-2 text-blue-600"></i> Jam Operasional: 07:30 - 17:00 WIB
            </p>
        </div>
    </div>
</section>

<style>
    /* Menyembunyikan scrollbar di Chrome, Safari, dan Opera */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
</style>
    </main>
<footer class="bg-white/70 backdrop-blur-md border-t border-blue-100 pt-20 md:pt-32 pb-12 md:pb-16 relative z-10 font-sans">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12 lg:gap-16 mb-16 md:mb-24">
            
            <div class="col-span-1 md:col-span-1 lg:col-span-2" data-aos="fade-up" data-aos-duration="800">
                <div class="flex items-center space-x-3 md:space-x-4 mb-8 md:mb-10 group">
                    <div class="p-2 md:p-2.5 bg-blue-600 rounded-lg md:rounded-xl shadow-lg shadow-blue-200 group-hover:rotate-6 transition-transform">
                        <i class="fas fa-plane-departure text-white text-base md:text-lg"></i>
                    </div>
                    <span class="text-lg md:text-2xl font-black uppercase tracking-tighter text-slate-800">
                        Abdurachman <span class="text-blue-600">Saleh Hub</span>
                    </span>
                </div>
                <p class="text-slate-500 text-xs md:text-base leading-relaxed max-w-sm mb-8 md:mb-12 font-medium italic">
                    Otoritas Bandara Kelas II - Melayani konektivitas udara yang aman, nyaman, dan terpercaya bagi masyarakat Indonesia.
                </p>
                <div class="flex space-x-4 md:space-x-5">
                    <a href="https://www.instagram.com/abdulrachmansaleh_airport" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="w-12 md:w-14 h-12 md:h-14 rounded-xl md:rounded-2xl bg-white flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm border border-slate-100 hover:-translate-y-1">
                        <i class="fab fa-instagram text-lg md:text-xl"></i>
                    </a>

                    <a href="https://www.facebook.com/bandaraabd.saleh/" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="w-12 md:w-14 h-12 md:h-14 rounded-xl md:rounded-2xl bg-white flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm border border-slate-100 hover:-translate-y-1">
                        <i class="fab fa-facebook-f text-lg md:text-xl"></i>
                    </a>
                </div>
            </div>

            <div class="max-w-xs" data-aos="fade-up" data-aos-delay="0" data-aos-duration="800">
    <h5 class="font-black uppercase text-[10px] md:text-[11px] tracking-[0.4em] text-blue-600 mb-6 md:mb-8 flex items-center">
        <span class="w-8 h-[1px] bg-blue-600 mr-3"></span>
        Layanan Informasi
    </h5>

    <ul class="text-[10px] md:text-[12px] text-slate-500 space-y-3 md:space-y-5 font-bold uppercase tracking-[0.15em]">
        <li>
            <a href="{{ url('/panduan-checkin') }}" class="group flex items-center hover:text-red-600 transition-all duration-300">
                <i class="fas fa-chevron-right text-[7px] md:text-[8px] mr-3 opacity-30 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i> 
                <span>Panduan Check-in</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/keamanan') }}" class="group flex items-center hover:text-red-600 transition-all duration-300">
                <i class="fas fa-chevron-right text-[7px] md:text-[8px] mr-3 opacity-30 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i> 
                <span>Prosedur Keamanan</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/layanan-cargo') }}" class="group flex items-center hover:text-red-600 transition-all duration-300">
                <i class="fas fa-chevron-right text-[7px] md:text-[8px] mr-3 opacity-30 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i> 
                <span>Layanan Kargo</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/jam-operasional') }}" class="group flex items-center hover:text-red-600 transition-all duration-300">
                <i class="fas fa-chevron-right text-[7px] md:text-[8px] mr-3 opacity-30 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i> 
                <span>Jam Operasional</span>
            </a>
        </li>
    </ul>
</div>       
            <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <h5 class="font-black uppercase text-[10px] md:text-[11px] tracking-[0.4em] text-blue-600 mb-6 md:mb-12">Hubungi Kami</h5>
                <div class="text-[10px] md:text-[12px] text-slate-500 space-y-4 md:space-y-7 font-bold uppercase tracking-[0.15em]">
                    <p class="flex items-start leading-relaxed">
                        <i class="fas fa-phone mr-2 md:mr-4 text-blue-600 mt-0.5"></i> 
                        <span class="text-slate-700">(0341) 791554</span>
                    </p>
                    <p class="flex items-start leading-relaxed lowercase">
                        <i class="fas fa-envelope mr-2 md:mr-4 text-blue-600 mt-0.5"></i> 
                        <span class="text-slate-700 font-bold uppercase tracking-wider">info@mlg-airport.id</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="pt-8 md:pt-12 border-t border-slate-100 text-center">
            <p class="text-[8px] md:text-[9px] font-black text-slate-400 uppercase tracking-[0.6em]">
                © 2024 Bandara Abdurachman Saleh - Malang Station Hub
            </p>
        </div>
    </div>
</footer>

<button id="chat-toggle" class="fixed bottom-6 right-6 w-16 h-16 bg-blue-600 text-white rounded-full shadow-[0_10px_25px_rgba(37,99,235,0.4)] z-[100] hover:scale-110 active:scale-95 transition-all flex items-center justify-center">
    <i class="fas fa-comment-dots text-2xl"></i>
</button>

<div id="chat-window" class="fixed bottom-24 right-6 w-[350px] max-h-[500px] bg-white rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.15)] z-[100] flex-col hidden overflow-hidden border border-blue-50">
    <div class="bg-blue-600 p-5 text-white font-bold flex justify-between items-center shadow-lg">
        <span class="flex items-center gap-3 text-xs uppercase tracking-widest">
            <div class="w-2.5 h-2.5 bg-green-400 rounded-full animate-pulse border-2 border-blue-500"></div>
            MLG Assistant
        </span>
        <button id="close-chat" class="hover:rotate-90 transition-transform p-1">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <div id="chat-messages" class="bg-slate-50 flex-1 overflow-y-auto p-5 flex flex-col gap-4 custom-scrollbar" style="height: 350px;">
        <div class="flex justify-start">
            <span class="bg-white border border-blue-50 p-4 rounded-2xl rounded-tl-none shadow-sm text-slate-700 text-sm leading-relaxed">
                Halo! Saya asisten virtual Bandara. Klik bantuan cepat di bawah atau ketik pertanyaan Anda.
            </span>
        </div>
        
        <div class="flex flex-wrap gap-2 mt-2">
            <button onclick="quickAction('Jadwal')" class="text-[9px] bg-white border border-blue-200 text-blue-600 px-4 py-2 rounded-full hover:bg-blue-600 hover:text-white transition shadow-sm font-black uppercase tracking-wider">Cek Jadwal</button>
            <button onclick="quickAction('Parkir')" class="text-[9px] bg-white border border-blue-200 text-blue-600 px-4 py-2 rounded-full hover:bg-blue-600 hover:text-white transition shadow-sm font-black uppercase tracking-wider">Info Parkir</button>
            <button onclick="quickAction('Lokasi')" class="text-[9px] bg-white border border-blue-200 text-blue-600 px-4 py-2 rounded-full hover:bg-blue-600 hover:text-white transition shadow-sm font-black uppercase tracking-wider">Lokasi</button>
        </div>
    </div>

    <div class="p-4 border-t bg-white flex gap-3">
        <input type="text" id="chat-input" placeholder="Tanya sesuatu..." class="flex-1 text-sm outline-none border border-slate-100 bg-slate-50 rounded-full px-5 py-3 focus:ring-2 focus:ring-blue-600/20 transition-all">
        <button id="send-btn" class="bg-blue-600 text-white w-11 h-11 rounded-full flex items-center justify-center hover:bg-slate-900 transition-all shadow-lg shadow-blue-200">
            <i class="fas fa-paper-plane text-xs"></i>
        </button>
    </div>
</div>

<style>
    /* Custom Scrollbar Animation */
    .custom-scrollbar::-webkit-scrollbar {
        width: 5px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f8fafc;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
        transition: all 0.3s;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #2563eb;
    }

    #chat-window.show {
        display: flex !important;
        animation: slideUp 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    body {
        animation: welcomeFade 1.5s ease-out;
    }

    @keyframes welcomeFade {
        from { 
            opacity: 0; 
            transform: translateY(10px);
            filter: blur(8px);
        }
        to { 
            opacity: 1; 
            transform: translateY(0);
            filter: blur(0);
        }
    }
</style>

<script>
    // Elements
    const chatToggle = document.getElementById('chat-toggle');
    const chatWindow = document.getElementById('chat-window');
    const closeChat = document.getElementById('close-chat');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-input');
    const sendBtn = document.getElementById('send-btn');

    // Toggle Chat
    chatToggle.onclick = () => {
        chatWindow.classList.toggle('show');
    };

    closeChat.onclick = () => {
        chatWindow.classList.remove('show');
    };

    // Add Message Function
    function addMessage(text, isUser = false) {
        const div = document.createElement('div');
        div.className = `flex ${isUser ? 'justify-end' : 'justify-start'} animate-fade-in`;
        
        const contentClass = isUser 
            ? 'bg-blue-600 text-white rounded-2xl rounded-tr-none shadow-md' 
            : 'bg-white border border-blue-50 text-slate-800 rounded-2xl rounded-tl-none shadow-sm';
        
        div.innerHTML = `<span class="${contentClass} p-3.5 max-w-[85%] text-sm font-medium leading-relaxed">${text}</span>`;
        chatMessages.appendChild(div);
        
        // Auto Scroll
        chatMessages.scrollTo({
            top: chatMessages.scrollHeight,
            behavior: 'smooth'
        });
    }

    // Handle Quick Action
    function quickAction(action) {
        addMessage(`Tanya tentang ${action}`, true);
        handleResponse(action.toLowerCase());
    }

    // Process Response
    function handleResponse(query) {
        setTimeout(() => {
            let reply = "Maaf, saat ini agen kami sedang sibuk. Silakan hubungi pusat informasi kami di (0341) 791554.";
            
            if(query.includes('jadwal')) reply = "Jadwal keberangkatan tersedia secara real-time di bagian atas website ini pada tombol 'Cek Keberangkatan'.";
            if(query.includes('parkir')) reply = "Area parkir kami mendukung pembayaran non-tunai dengan tarif flat untuk 2 jam pertama sesuai aturan Dishub.";
            if(query.includes('lokasi')) reply = "Bandara Abdurachman Saleh terletak di Kec. Pakis, Kabupaten Malang, sekitar 11km dari pusat kota.";
            
            addMessage(reply);
        }, 600);
    }

    // Send Message Logic
    function handleChat() {
        const msg = chatInput.value.trim();
        if(!msg) return;

        addMessage(msg, true);
        chatInput.value = '';
        handleResponse(msg.toLowerCase());
    }

    sendBtn.onclick = handleChat;
    chatInput.onkeypress = (e) => { if(e.key === 'Enter') handleChat(); };
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: false,
        offset: 100,
        easing: 'ease-in-out-cubic'
    });
</script>
<script>
    // Burger Menu Logic
    const burgerBtn = document.getElementById('burger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    burgerBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        const icon = burgerBtn.querySelector('i');
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
    });

    // Jam Realtime
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { hour12: false });
        document.getElementById('realtime-clock').textContent = timeString;
    }
    setInterval(updateTime, 1000);
    updateTime();

    // AOS
    document.addEventListener('DOMContentLoaded', () => {
        AOS.init({ duration: 800, once: true });
    });
</script>
</body>
</html>