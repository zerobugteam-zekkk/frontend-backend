<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportasi & Aksesibilitas Terpadu - Abdurachman Saleh Hub</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        html { scroll-behavior: smooth; }

        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            background-image: radial-gradient(#2563eb08 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .glass-header {
            background: rgba(15, 23, 42, 0.98);
            backdrop-filter: blur(12px);
        }

        .premium-card {
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            border: 1px solid rgba(37, 99, 235, 0.1);
        }

        .premium-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 40px 80px -15px rgba(30, 58, 138, 0.15);
            border-color: rgba(37, 99, 235, 0.3);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: float 4s ease-in-out infinite; }

        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(10px); }
        }
        .animate-bounce-slow { animation: bounce-slow 2s infinite; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-thumb { background: #1e40af; border-radius: 10px; }

        #backToTop.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }
    </style>
</head>
<body class="antialiased text-slate-900 overflow-x-hidden">

    <nav class="glass-header text-white sticky top-0 z-50 border-b border-white/10">
        <div class="container mx-auto px-6 py-5 flex items-center justify-between">
            <a href="/" class="group flex items-center space-x-4">
                <div class="bg-blue-600 p-2.5 rounded-xl shadow-lg shadow-blue-600/30 group-hover:bg-blue-500 transition-all">
                    <i class="fas fa-plane-departure text-white text-sm"></i>
                </div>
                <div class="flex flex-col border-l border-white/20 pl-4">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-400">Portal Transportasi</span>
                    <span class="text-lg font-black tracking-tighter uppercase">Abdurachman <span class="text-blue-500">Saleh</span></span>
                </div>
            </a>
            <div class="hidden lg:flex items-center space-x-8 text-[11px] font-bold uppercase tracking-widest">
                <span class="text-blue-500 flex items-center"><span class="relative flex h-2 w-2 mr-3"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span></span> Status: Operasional Normal</span>
            </div>
        </div>
    </nav>

    <header class="relative bg-slate-950 py-32 lg:py-48 overflow-hidden flex items-center justify-center min-h-[95vh]">
        <div class="absolute inset-0 opacity-20">
            <img src="https://www.transparenttextures.com/patterns/carbon-fibre.png" class="w-full h-full object-cover">
        </div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-600/20 rounded-full blur-[120px]"></div>
        
        <div class="relative z-10 container mx-auto px-6 text-center" data-aos="zoom-out">
            <h6 class="text-blue-500 font-black uppercase tracking-[0.5em] text-[11px] mb-6 flex items-center justify-center">
                <span class="w-12 h-[1px] bg-blue-500 mr-4"></span>
                Official Transport Guide 2026
                <span class="w-12 h-[1px] bg-blue-500 ml-4"></span>
            </h6>
            <h1 class="text-5xl md:text-8xl font-black text-white tracking-tighter uppercase leading-[0.9] mb-8">
                Konektivitas <br> <span class="text-blue-600">Tanpa Batas</span>
            </h1>
            <p class="text-slate-400 max-w-4xl mx-auto text-lg md:text-xl font-medium leading-relaxed mb-10">
                Selamat datang di pusat panduan transportasi resmi Bandar Udara Abdurachman Saleh Malang. Kami berkomitmen menyediakan sistem mobilitas yang cerdas, terintegrasi, dan aman untuk mendukung setiap perjalanan Anda di wilayah Malang Raya, Kota Batu, dan sekitarnya. Navigasi perjalanan Anda dimulai dari sini.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#layanan" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-blue-700 transition-all">Eksplorasi Moda</a>
                <a href="#prosedur" class="px-8 py-4 bg-transparent border border-white/20 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-white/10 transition-all">Prosedur Keamanan</a>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white/30 flex flex-col items-center animate-bounce-slow">
            <span class="text-[9px] font-black uppercase tracking-[0.3em] mb-2">Scroll Down</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </header>

    <main id="layanan" class="container mx-auto px-6 -mt-20 relative z-20 pb-32">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
            
            <div class="bg-white rounded-[2.5rem] premium-card overflow-hidden flex flex-col" data-aos="fade-up" data-aos-delay="100">
                <div class="p-8 bg-slate-50 border-b border-slate-100 flex justify-between items-center">
                    <div class="w-14 h-14 bg-blue-700 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-700/30 animate-float">
                        <i class="fas fa-bus text-white text-2xl"></i>
                    </div>
                    <span class="text-[9px] bg-blue-100 text-blue-700 px-4 py-2 rounded-lg font-black tracking-widest uppercase">Angkutan Publik</span>
                </div>
                <div class="p-10 flex-grow">
                    <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tighter mb-4">Shuttle Bus Damri</h3>
                    <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium">Layanan angkutan pemadu moda resmi pemerintah yang menghubungkan bandara dengan pusat mobilitas Kota Malang. Armada ini dirancang khusus dengan kompartemen bagasi yang luas dan pendingin udara yang optimal untuk kenyamanan kelompok maupun individu.</p>
                    <ul class="space-y-5 text-[13px] text-slate-700 font-bold">
                        <li class="flex items-center space-x-4"><i class="fas fa-history text-blue-600 text-lg"></i> <span>Interval: Setiap 60 Menit</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-id-card-alt text-blue-600 text-lg"></i> <span>Dukungan Pembayaran Non-Tunai</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-map-marked-alt text-blue-600 text-lg"></i> <span>Rute: Stasiun Malang & Klojen</span></li>
                    </ul>
                </div>
                <div class="p-8 pt-0">
                    <button class="w-full py-5 bg-slate-900 text-white rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] hover:bg-blue-700 transition-all">Cek Jadwal Keberangkatan</button>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] premium-card overflow-hidden flex flex-col" data-aos="fade-up" data-aos-delay="200">
                <div class="p-8 bg-slate-50 border-b border-slate-100">
                    <div class="w-14 h-14 bg-slate-900 rounded-2xl flex items-center justify-center animate-float" style="animation-delay: 0.5s">
                        <i class="fas fa-taxi text-white text-2xl"></i>
                    </div>
                </div>
                <div class="p-10 flex-grow">
                    <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tighter mb-4">Taksi Bandara Resmi</h3>
                    <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium">Tersedia armada taksi konvensional yang dikelola oleh koperasi bandara. Layanan ini menawarkan kepastian biaya dengan sistem zona tarif tetap (Fixed Rate), sehingga Anda tidak perlu khawatir tentang fluktuasi harga akibat kemacetan atau rute alternatif.</p>
                    <ul class="space-y-5 text-[13px] text-slate-700 font-bold">
                        <li class="flex items-center space-x-4"><i class="fas fa-tags text-blue-600 text-lg"></i> <span>Transparansi Tarif per Zona</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-user-shield text-blue-600 text-lg"></i> <span>Pengemudi Berizin Resmi</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-clock text-blue-600 text-lg"></i> <span>Siaga 24 Jam Sesuai Flight</span></li>
                    </ul>
                </div>
                <div class="p-8 pt-0">
                    <button class="w-full py-5 border-2 border-slate-900 text-slate-900 rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] hover:bg-slate-900 hover:text-white transition-all">Lihat Daftar Tarif Zona</button>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] premium-card overflow-hidden flex flex-col" data-aos="fade-up" data-aos-delay="300">
                <div class="p-8 bg-slate-50 border-b border-slate-100">
                    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center animate-float" style="animation-delay: 1s">
                        <i class="fas fa-mobile-alt text-blue-900 text-2xl"></i>
                    </div>
                </div>
                <div class="p-10 flex-grow">
                    <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tighter mb-4">Transportasi Online</h3>
                    <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium">Untuk menjaga ketertiban area terminal utama, layanan ride-hailing seperti Grab dan Gojek memiliki titik penjemputan khusus (Shelter). Lokasi ini terletak di area gerbang luar yang dapat ditempuh dengan berjalan kaki singkat melalui jalur pedestrian yang nyaman.</p>
                    <ul class="space-y-5 text-[13px] text-slate-700 font-bold">
                        <li class="flex items-center space-x-4"><i class="fas fa-walking text-blue-600 text-lg"></i> <span>Jarak Tempuh: 300 Meter</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-info-circle text-blue-600 text-lg"></i> <span>Titik Jemput: Shelter Gate Luar</span></li>
                        <li class="flex items-center space-x-4"><i class="fas fa-map-pin text-blue-600 text-lg"></i> <span>Lokasi Sesuai Aplikasi</span></li>
                    </ul>
                </div>
                <div class="p-8 pt-0">
                    <a href="#" class="block w-full py-5 bg-slate-100 text-slate-600 text-center rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] hover:bg-slate-200 transition-all">Panduan Navigasi Shelter</a>
                </div>
            </div>
        </div>

        <section id="prosedur" class="mb-24 py-16 px-8 md:px-20 bg-white rounded-[3rem] border border-slate-100 shadow-sm" data-aos="fade-up">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter mb-10 text-center">Prosedur Keamanan & <span class="text-blue-600">Etika Bertransportasi</span></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div data-aos="fade-right" data-aos-delay="200">
                        <h4 class="text-blue-600 font-black uppercase text-xs tracking-widest mb-4">Langkah Keamanan Penumpang</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6">Setiap operasional transportasi di area Lanud Abdurachman Saleh wajib mengikuti regulasi ketat Aviation Security (Avsec). Kami sangat menyarankan pengguna jasa untuk selalu memesan layanan melalui loket resmi atau aplikasi terdaftar. Selalu pastikan Anda mencatat identitas pengemudi dan pelat nomor kendaraan sebelum meninggalkan area terminal.</p>
                    </div>
                    <div data-aos="fade-left" data-aos-delay="200">
                        <h4 class="text-blue-600 font-black uppercase text-xs tracking-widest mb-4">Regulasi Bagasi & Barang Bawaan</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6">Demi kenyamanan bersama, pengguna bus Damri diwajibkan memberikan label identitas pada setiap barang yang diletakkan di bagasi bawah. Bagi pengguna taksi, pastikan volume barang tidak menghalangi pandangan pengemudi. Barang-barang kategori mudah terbakar atau berbahaya (Dangerous Goods) dilarang keras diangkut menggunakan moda transportasi publik bandara.</p>
                    </div>
                </div>
                <div class="bg-blue-50 border border-blue-100 p-8 rounded-[2rem] mt-10">
                    <div class="flex items-start">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl mr-6 mt-1"></i>
                        <div>
                            <h5 class="text-blue-900 font-black text-xs uppercase tracking-widest mb-2">Pemberitahuan Penting</h5>
                            <p class="text-blue-800/80 text-xs font-medium leading-relaxed">Hindari transaksi dengan oknum yang menawarkan jasa transportasi tanpa seragam resmi atau tanda pengenal bandara. Pihak otoritas tidak bertanggung jawab atas kerugian atau masalah keamanan yang muncul dari penggunaan layanan transportasi tidak resmi (taksi gelap).</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-950 rounded-[3.5rem] overflow-hidden shadow-3xl relative mb-24" data-aos="zoom-in-up">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/5 skew-x-12 translate-x-32"></div>
            <div class="flex flex-col lg:flex-row relative z-10">
                <div class="p-12 lg:p-24 lg:w-2/3">
                    <div class="inline-flex items-center space-x-4 text-blue-500 font-black uppercase tracking-[0.5em] text-[10px] mb-8">
                        <div class="w-12 h-[2px] bg-blue-600"></div>
                        <span>Secure Parking Facility</span>
                    </div>
                    <h2 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter mb-10 leading-[0.9]">
                        Fasilitas Parkir <br> <span class="text-blue-600">Inap Premium</span>
                    </h2>
                    <p class="text-slate-400 text-lg font-medium mb-12 max-w-2xl leading-relaxed">
                        Bepergian jauh tanpa rasa khawatir. Layanan parkir inap kami dilengkapi dengan sistem pengawasan CCTV 24 jam, patroli rutin oleh petugas keamanan, serta area yang diterangi maksimal. Kami menyediakan perlindungan total bagi kendaraan Anda selama Anda berada di luar kota.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div class="bg-white/5 border border-white/10 p-10 rounded-[2rem] backdrop-blur-md" data-aos="flip-left" data-aos-delay="300">
                            <p class="text-blue-500 font-black uppercase text-[10px] tracking-widest mb-4">Tarif Motor</p>
                            <p class="text-4xl font-black text-white">IDR 20.000 <span class="text-xs text-slate-500 uppercase tracking-[0.2em] ml-2">/ Hari</span></p>
                        </div>
                        <div class="bg-white/5 border border-white/10 p-10 rounded-[2rem] backdrop-blur-md" data-aos="flip-left" data-aos-delay="500">
                            <p class="text-blue-500 font-black uppercase text-[10px] tracking-widest mb-4">Tarif Mobil</p>
                            <p class="text-4xl font-black text-white">IDR 50.000 <span class="text-xs text-slate-500 uppercase tracking-[0.2em] ml-2">/ Hari</span></p>
                        </div>
                    </div>
                </div>
                <div class="bg-blue-600/10 lg:w-1/3 flex flex-col justify-center items-center p-16 text-center border-l border-white/5">
                    <div class="w-24 h-24 bg-blue-600 rounded-[2.5rem] flex items-center justify-center mb-8 rotate-12 animate-float">
                        <i class="fas fa-shield-check text-white text-4xl"></i>
                    </div>
                    <h4 class="text-white font-black uppercase tracking-tighter text-2xl mb-4">Proteksi Penuh</h4>
                    <p class="text-slate-400 text-xs leading-relaxed font-medium">Sistem manajemen parkir berbasis digital untuk menjamin akurasi waktu dan keamanan kendaraan Anda.</p>
                </div>
            </div>
        </section>

        <section class="max-w-4xl mx-auto mb-24" data-aos="fade-up">
            <h3 class="text-3xl font-black text-slate-900 uppercase tracking-tighter mb-12 text-center">Pertanyaan yang Sering Diajukan</h3>
            <div class="grid gap-6">
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 transition-all hover:border-blue-200">
                    <h5 class="font-black text-slate-900 text-sm mb-4 uppercase tracking-tight">Apakah armada transportasi tersedia untuk penerbangan malam?</h5>
                    <p class="text-slate-500 text-sm leading-relaxed">Tentu. Layanan taksi bandara resmi diatur untuk selalu siaga hingga jadwal penerbangan terakhir mendarat. Sedangkan untuk bus Damri, jadwal disesuaikan dengan rata-rata jam sibuk kedatangan pesawat di sore hari.</p>
                </div>
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 transition-all hover:border-blue-200">
                    <h5 class="font-black text-slate-900 text-sm mb-4 uppercase tracking-tight">Bagaimana cara menuju kawasan wisata Kota Batu?</h5>
                    <p class="text-slate-500 text-sm leading-relaxed">Dari bandara, Anda dapat menggunakan taksi bandara langsung ke Kota Batu dengan tarif zona yang sudah ditentukan. Alternatif lainnya adalah menggunakan bus Damri menuju pusat kota Malang dan melanjutkan perjalanan dengan layanan transportasi online.</p>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-white border-t border-slate-100 py-24 text-center">
        <div class="container mx-auto px-6">
            <div class="w-20 h-20 bg-slate-950 rounded-[2rem] flex items-center justify-center mx-auto mb-12 animate-float shadow-2xl shadow-blue-500/20">
                <i class="fas fa-plane text-blue-500 text-2xl"></i>
            </div>
            <h4 class="text-slate-900 font-black uppercase tracking-widest text-lg mb-4">Abdurachman Saleh Hub</h4>
            <p class="text-[11px] font-bold uppercase tracking-[0.5em] text-slate-400 mb-12">Pusat Informasi Transportasi Terpadu Malang Raya</p>
            <div class="flex justify-center space-x-8 mb-16">
                <a href="#" class="text-slate-400 hover:text-blue-600 transition-colors"><i class="fab fa-instagram text-xl"></i></a>
                <a href="#" class="text-slate-400 hover:text-blue-600 transition-colors"><i class="fab fa-twitter text-xl"></i></a>
                <a href="#" class="text-slate-400 hover:text-blue-600 transition-colors"><i class="fab fa-facebook text-xl"></i></a>
            </div>
            <div class="max-w-2xl mx-auto">
                <p class="text-[10px] text-slate-400 leading-relaxed uppercase tracking-[0.2em]">© 2026 Otoritas Bandar Udara Abdurachman Saleh. Seluruh informasi yang tersaji dalam portal ini bersifat dinamis dan dapat berubah sesuai kebijakan operasional dan regulasi pemerintah yang berlaku.</p>
            </div>
        </div>
    </footer>

    <button id="backToTop" class="fixed bottom-8 right-8 z-50 bg-blue-600 text-white w-14 h-14 rounded-2xl shadow-2xl flex items-center justify-center opacity-0 -translate-y-10 transition-all duration-500 pointer-events-none hover:bg-blue-700 hover:scale-110 active:scale-95">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            offset: 80,
            easing: 'ease-out-quint'
        });

        const backToTopBtn = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                backToTopBtn.classList.add('visible');
                backToTopBtn.classList.remove('-translate-y-10');
            } else {
                backToTopBtn.classList.remove('visible');
                backToTopBtn.classList.add('-translate-y-10');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>