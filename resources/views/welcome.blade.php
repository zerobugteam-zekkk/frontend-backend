<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abdurachman Saleh Hub - Gerbang Udara Jawa Timur</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .lion-red { color: #ed1c24; }
        .bg-lion { background-color: #ed1c24; }
        .navy-custom { background-color: #0f172a; }

        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #ed1c24; border-radius: 10px; }

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
                radial-gradient(#ed1c2408 1px, transparent 1px),
                radial-gradient(#ed1c2408 1px, #f8fafc 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }

        .blob-bg {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(237, 28, 36, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(60px);
            z-index: -1;
        }

        /* Chatbot Style */
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
<script>
    // 1. FUNGSI JAM
    function updateClock() {
        const clockEl = document.getElementById('realtime-clock');
        if (clockEl) {
            const now = new Date();
            const options = { timeZone: 'Asia/Jakarta', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const timeString = new Intl.DateTimeFormat('id-ID', options).format(now);
            clockEl.textContent = timeString.replace(/\./g, ':');
        }
    }

    // 2. FUNGSI CUACA
    async function fetchWeather() {
        const apiKey = '8a8db4b35f665e7cb03b00081f767e4b';
        const city = 'Malang,ID';
        const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=id`;

        try {
            const response = await fetch(url);
            const data = await response.json();

            if (data.main && data.weather) {
                let temp = data.main.temp;
                if (temp > 100) temp = temp - 273.15;
                
                const finalTemp = Math.round(temp);
                
                const tempEl = document.getElementById('weather-temp');
                const iconEl = document.getElementById('weather-icon');

                if (tempEl) tempEl.textContent = finalTemp;

                if (iconEl) {
                    const id = data.weather[0].id;
                    if (id >= 200 && id < 600) iconEl.className = 'fas fa-cloud-showers-heavy mr-2 text-blue-400';
                    else if (id === 800) iconEl.className = 'fas fa-sun mr-2 text-orange-400';
                    else iconEl.className = 'fas fa-cloud mr-2 text-slate-400';
                }
                console.log("Cuaca Malang Berhasil Diperbarui: " + finalTemp + "°C");
            }
        } catch (error) {
            console.error("Gagal mengambil data cuaca:", error);
        }
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
        <i class="fas fa-clock mr-2 text-red-500"></i> 
        <span id="realtime-clock">--:--</span>&nbsp;WIB
    </span>
    
    <span class="hidden md:flex items-center">
        <i id="weather-icon" class="fas fa-cloud-sun mr-2 text-orange-400"></i> 
        <span id="weather-temp">--</span>°C MALANG
    </span>
</div>
            <div class="flex space-x-6">
                <a href="{{ url('/info-parkir') }}" class="hover:text-red-600 transition border-b-2 border-transparent hover:border-red-600 pb-1 {{ Request::is('info-parkir') ? 'text-red-600 border-red-600' : '' }}">
    Info Parkir
</a>
<a href="{{ url('/bantuan') }}" 
   class="hover:text-red-600 transition border-b-2 border-transparent hover:border-red-600 pb-1 {{ Request::is('bantuan') ? 'text-red-600 border-red-600' : '' }}">
   Bantuan
</a>            </div>
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

<header class="relative h-[90vh] flex flex-col justify-center overflow-hidden bg-slate-900">
    <img src="{{ asset('images/Bandara Malang Abdurachman Saleh.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover opacity-50" 
         alt="Gerbang Udara Malang">
    
    <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/60 to-transparent"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl pt-20"> 
            <div class="mb-6">
                <h1 class="text-6xl md:text-8xl font-black text-white leading-[0.85] uppercase tracking-tighter">
                    Gerbang Udara <br>
                    <span class="text-transparent border-y-2 border-red-600 bg-clip-text bg-gradient-to-r from-white to-red-500 py-2 inline-block">
                        Malang Raya
                    </span>
                </h1>
            </div>
            
            <div class="max-w-xl mb-10"> 
                <p class="text-slate-300 text-lg md:text-xl font-medium leading-relaxed opacity-90 border-l-4 border-red-600 pl-6">
Bandara Abdurachman Saleh merupakan pintu utama transportasi udara yang menghubungkan Malang Raya dengan kota-kota besar di seluruh nusantara.      
            </div>
            
            <div class="flex flex-wrap gap-4">
                <a href="{{ url('/jadwal') }}" class="bg-red-600 hover:bg-red-700 text-white px-10 py-5 rounded-full font-black uppercase text-[11px] tracking-widest transition-all transform hover:scale-105 shadow-2xl shadow-red-600/40">
                    Cek Keberangkatan
                </a>
                <a href="{{ url('/sejarah') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/20 px-10 py-5 rounded-full font-black uppercase text-[11px] tracking-widest transition-all">
                    Eksplor Sejarah
                </a>
            </div>

        </div>
    </div>
</header>

    <section class="container mx-auto px-6 mt-16 relative z-20">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $stats = [
                    ['val' => '15+', 'label' => 'Penerbangan/Hari', 'icon' => 'fa-plane'],
                    ['val' => '1.2M', 'label' => 'Penumpang/Tahun', 'icon' => 'fa-users'],
                    ['val' => '04/22', 'label' => 'Runway Direction', 'icon' => 'fa-road'],
                    ['val' => '24/7', 'label' => 'Keamanan Terpadu', 'icon' => 'fa-shield-alt'],
                ];
            @endphp

            @foreach($stats as $stat)
            <div class="bg-white p-10 rounded-[2.5rem] shadow-xl border border-slate-100 text-center transform hover:-translate-y-2 transition-transform duration-300">
                <div class="w-14 h-14 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas {{ $stat['icon'] }} text-red-600 text-xl"></i>
                </div>
                <h3 class="text-4xl font-black text-slate-900 leading-none mb-3 tracking-tighter">{{ $stat['val'] }}</h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <main class="container mx-auto px-6 py-32 relative">
        
        <section id="history" class="mb-48">
            <div class="flex flex-col lg:flex-row gap-24 items-center">
                <div class="lg:w-1/2 relative">
                    <div class="absolute -bottom-12 -left-12 w-72 h-72 bg-red-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
                    <div class="relative z-10 rounded-[4rem] overflow-hidden shadow-2xl border-8 border-white">
                        <img src="https://images.unsplash.com/photo-1569154941061-e231b4725ef1?auto=format&fit=crop&w=1000" class="w-full grayscale hover:grayscale-0 transition-all duration-1000 scale-105 hover:scale-100 object-cover">
                    </div>
                    <div class="absolute -bottom-8 -right-8 bg-slate-900 text-white p-10 rounded-[2.5rem] z-20 hidden md:block shadow-2xl">
                        <p class="text-5xl font-black italic text-red-500">1994</p>
                        <p class="text-[10px] font-bold uppercase tracking-[0.3em] opacity-60 mt-2">Tahun Berdiri</p>
                    </div>
                </div>

                <div class="lg:w-1/2 flex flex-col space-y-10">
                    <div>
                        <h6 class="text-red-600 font-black uppercase tracking-[0.4em] text-[11px] mb-6">Historical Archive</h6>
                        <h2 class="text-5xl md:text-7xl font-black text-slate-900 tracking-tighter leading-[0.85] uppercase">
                            Warisan Sang <br>
                            <span class="text-red-600">Abdurachman</span> Saleh
                        </h2>
                    </div>
                    <div class="space-y-6 text-slate-600 leading-relaxed font-medium text-lg">
                        <p>
                            Dinamakan berdasarkan pahlawan nasional <strong class="text-slate-900">Prof. Dr. Abdurachman Saleh</strong>, bandara ini memiliki akar militer yang kuat sebagai pangkalan udara (Lanud) utama di Jawa Timur. Lokasinya yang dikelilingi oleh Gunung Arjuno, Gunung Semeru, dan Gunung Bromo menjadikannya salah satu bandara dengan pemandangan terindah namun menantang di Indonesia.
                        </p>
                        <p>
                            Transformasi besar terjadi pada **2005**, ketika gerbang militer ini dibuka untuk melayani masyarakat sipil. Sejak saat itu, Abdurachman Saleh telah menjadi nadi utama bagi wisatawan mancanegara yang ingin mengeksplorasi keajaiban alam Bromo.
                        </p>
                    </div>
                </div>
            </div>
        </section>

       <section id="facilities" class="bg-slate-900 rounded-[3rem] md:rounded-[5rem] p-10 md:p-24 text-white overflow-hidden relative shadow-3xl">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-red-600/10 skew-x-12 translate-x-32"></div>
    
    <div class="relative z-10">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tighter italic">Layanan Terminal</h2>
            <div class="w-20 h-1.5 bg-red-600 mx-auto mt-6 rounded-full"></div>
            <p class="text-slate-400 mt-8 uppercase text-xs tracking-[0.3em] font-bold">Gerbang Udara Utama Malang Raya</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
            
            <div class="bg-white/5 p-10 rounded-[3rem] border border-white/10 hover:bg-white/10 transition-all group">
                <div class="w-14 h-14 bg-red-600/20 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-couch text-red-500 text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold mb-4 uppercase tracking-tight">Singhasari Lounge</h4>
                <p class="text-sm text-slate-400 leading-relaxed">Fasilitas ruang tunggu eksklusif di lantai 2 terminal keberangkatan yang nyaman bagi penumpang kelas bisnis dan mitra perbankan.</p>
            </div>
            
            <div class="bg-white/5 p-10 rounded-[3rem] border border-white/10 hover:bg-white/10 transition-all group">
                <div class="w-14 h-14 bg-red-600/20 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-store text-red-500 text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold mb-4 uppercase tracking-tight">Oleh-Oleh Area</h4>
                <p class="text-sm text-slate-400 leading-relaxed">Tersedia berbagai gerai UMKM lokal yang menjajakan Keripik Tempe, Apel Malang, hingga bakso kemasan khas Malang siap bawa.</p>
            </div>
            
            <div class="bg-white/5 p-10 rounded-[3rem] border border-white/10 hover:bg-white/10 transition-all group">
                <div class="w-14 h-14 bg-red-600/20 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-wheelchair text-red-500 text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold mb-4 uppercase tracking-tight">Layanan Prioritas</h4>
                <p class="text-sm text-slate-400 leading-relaxed">Bantuan kursi roda dan petugas pendamping khusus bagi lansia serta penumpang berkebutuhan khusus selama proses check-in hingga boarding.</p>
            </div>
            
        </div>

        <div class="mt-16 pt-10 border-t border-white/5 text-center">
            <p class="text-slate-500 text-xs font-medium uppercase tracking-widest">
                <i class="fas fa-info-circle mr-2 text-red-600"></i> Jam Operasional Terminal: 06:00 - 17:00 WIB
            </p>
        </div>
    </div>
</section>
    </main>

    <footer class="bg-white/50 backdrop-blur-sm border-t border-slate-200 pt-32 pb-16 relative z-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-24">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-4 mb-10">
                        <div class="p-2.5 bg-red-600 rounded-xl">
                            <i class="fas fa-plane-departure text-white text-lg"></i>
                        </div>
                        <span class="text-2xl font-black uppercase tracking-tighter">Abdurachman Saleh Hub</span>
                    </div>
                    <p class="text-slate-500 text-base leading-relaxed max-w-sm mb-12 font-medium italic">
                        Otoritas Bandara Kelas II - Melayani konektivitas udara yang aman, nyaman, dan terpercaya bagi masyarakat Indonesia.
                    </p>
                    <div class="flex space-x-5">
    <a href="https://www.instagram.com/abdulrachmansaleh_airport?igsh=dGQxZHk3b3J6ODc0" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="w-14 h-14 rounded-2xl bg-white flex items-center justify-center text-slate-900 hover:bg-red-600 hover:text-white transition-all shadow-sm border border-slate-100">
       <i class="fab fa-instagram"></i>
    </a>

    <a href="https://www.facebook.com/bandaraabd.saleh/" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="w-14 h-14 rounded-2xl bg-white flex items-center justify-center text-slate-900 hover:bg-red-600 hover:text-white transition-all shadow-sm border border-slate-100">
       <i class="fab fa-facebook-f"></i>
    </a>
</div>
                </div>

                <div>
                    <h5 class="font-black uppercase text-[11px] tracking-[0.4em] text-red-600 mb-12">Layanan Informasi</h5>
                    <ul class="text-[12px] text-slate-500 space-y-6 font-bold uppercase tracking-[0.15em]">
                        <li>
    <a href="{{ url('/panduan-checkin') }}" class="hover:text-red-600 transition-colors flex items-center">
        <i class="fas fa-chevron-right text-[8px] mr-3 opacity-50"></i> 
        Panduan Check-in
    </a>
</li>
<li>
    <a href="{{ url('/keamanan') }}" class="hover:text-red-600 transition-colors flex items-center">
        <i class="fas fa-chevron-right text-[8px] mr-3 opacity-50"></i> 
        Prosedur Keamanan
    </a>
<li>
    <a href="{{ url('/layanan-cargo') }}" class="hover:text-red-600 transition-colors flex items-center">
        <i class="fas fa-chevron-right text-[8px] mr-3 opacity-50"></i> 
        Layanan Kargo
    </a>
</li>                    </ul>
                </div>

                <div>
                    <h5 class="font-black uppercase text-[11px] tracking-[0.4em] text-red-600 mb-12">Hubungi Kami</h5>
                    <div class="text-[12px] text-slate-500 space-y-7 font-bold uppercase tracking-[0.15em]">
                        <p class="flex items-start leading-relaxed">
                            <i class="fas fa-phone mr-4 text-slate-900 mt-0.5"></i> 
                            <span>(0341) 791554</span>
                        </p>
                        <p class="flex items-start leading-relaxed lowercase">
                            <i class="fas fa-envelope mr-4 text-slate-900 mt-0.5"></i> 
                            <span>info@mlg-airport.id</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="pt-12 border-t border-slate-100 text-center">
                <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.6em]">
                    © {{ date('Y') }} Bandara Abdurachman Saleh - Malang station hub
                </p>
            </div>
        </div>
    </footer>

    <button id="chat-toggle" class="fixed bottom-6 right-6 w-16 h-16 bg-red-600 text-white rounded-full shadow-2xl z-[100] hover:scale-110 transition-transform flex items-center justify-center">
        <i class="fas fa-comment-dots text-2xl"></i>
    </button>
<div id="chat-window">
    <div class="bg-red-600 p-4 text-white font-bold flex justify-between items-center shadow-lg">
        <span class="flex items-center gap-2 text-xs uppercase tracking-widest">
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
            MLG Assistant
        </span>
        <button id="close-chat" class="hover:rotate-90 transition-transform"><i class="fas fa-times"></i></button>
    </div>
    
    <div id="chat-messages" class="bg-slate-50 flex flex-col gap-3">
        <div class="flex justify-start">
            <span class="bg-white border border-slate-200 p-3 rounded-2xl rounded-tl-none shadow-sm text-slate-700">
                Halo! Saya asisten virtual Bandara. Klik bantuan cepat di bawah atau ketik pertanyaan Anda.
            </span>
        </div>
        
        <div class="flex flex-wrap gap-2 mt-2">
            <button onclick="quickAction('Jadwal')" class="text-[10px] bg-white border border-red-200 text-red-600 px-3 py-1.5 rounded-full hover:bg-red-600 hover:text-white transition shadow-sm font-bold uppercase">Cek Jadwal</button>
            <button onclick="quickAction('Parkir')" class="text-[10px] bg-white border border-red-200 text-red-600 px-3 py-1.5 rounded-full hover:bg-red-600 hover:text-white transition shadow-sm font-bold uppercase">Info Parkir</button>
            <button onclick="quickAction('Lokasi')" class="text-[10px] bg-white border border-red-200 text-red-600 px-3 py-1.5 rounded-full hover:bg-red-600 hover:text-white transition shadow-sm font-bold uppercase">Lokasi</button>
        </div>
    </div>

    <div class="p-4 border-t bg-white flex gap-2">
        <input type="text" id="chat-input" placeholder="Tanya sesuatu..." class="flex-1 text-sm outline-none border border-slate-100 bg-slate-50 rounded-full px-4 py-2 focus:ring-1 focus:ring-red-600 transition-all">
        <button id="send-btn" class="bg-red-600 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-slate-900 transition-colors shadow-lg shadow-red-200">
            <i class="fas fa-paper-plane text-xs"></i>
        </button>
    </div>
</div>
    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('show');
            const icon = hamburger.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });

        const chatToggle = document.getElementById('chat-toggle');
        const chatWindow = document.getElementById('chat-window');
        const closeChat = document.getElementById('close-chat');
        const chatMessages = document.getElementById('chat-messages');
        const chatInput = document.getElementById('chat-input');
        const sendBtn = document.getElementById('send-btn');

        chatToggle.onclick = () => {
            const isHidden = chatWindow.style.display === 'none' || chatWindow.style.display === '';
            chatWindow.style.display = isHidden ? 'flex' : 'none';
        };

        closeChat.onclick = () => chatWindow.style.display = 'none';

        function addMessage(text, isUser = false) {
            const div = document.createElement('div');
            div.className = `mb-4 flex ${isUser ? 'justify-end' : 'justify-start'}`;
            
            const contentClass = isUser 
                ? 'bg-red-600 text-white rounded-2xl rounded-tr-none shadow-md' 
                : 'bg-white border border-slate-200 text-slate-800 rounded-2xl rounded-tl-none shadow-sm';
            
            div.innerHTML = `<span class="${contentClass} p-3 max-w-[80%] text-sm font-medium">${text}</span>`;
            chatMessages.appendChild(div);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function handleChat() {
            const msg = chatInput.value.trim();
            if(!msg) return;

            addMessage(msg, true);
            chatInput.value = '';

            setTimeout(() => {
                let reply = "Maaf, saat ini agen kami sedang sibuk. Silakan hubungi pusat informasi kami di (0341) 791554.";
                const lowerMsg = msg.toLowerCase();
                
                if(lowerMsg.includes('jadwal')) reply = "Anda bisa melihat jadwal keberangkatan dan kedatangan terbaru pada tombol 'Cek Keberangkatan' di atas.";
                if(lowerMsg.includes('parkir')) reply = "Fasilitas parkir kami tersedia luas untuk kendaraan roda 2 dan roda 4 dengan tarif resmi Dinas Perhubungan.";
                if(lowerMsg.includes('lokasi')) reply = "Bandara berada di wilayah Pakis, Kabupaten Malang. Sekitar 30-40 menit dari pusat Kota Malang.";
                
                addMessage(reply);
            }, 800);
        }

        sendBtn.onclick = handleChat;
        chatInput.onkeypress = (e) => { if(e.key === 'Enter') handleChat(); };
    </script>

</body>
</html>