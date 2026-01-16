<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jam Operasional - Abdurachman Saleh Hub</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&family=Inter:wght@400;500;600;700;800;900&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }

        .main-bg-pattern {
            background-color: #f8fafc;
            background-image: 
                radial-gradient(#2563eb08 1px, transparent 1px),
                radial-gradient(#2563eb08 1px, #f8fafc 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }

        .font-formal { font-family: 'Inter', sans-serif; }
        .no-italic { font-style: normal !important; }

        .text-gradient-blue {
            background: linear-gradient(to right, #1e40af, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .blue-gradient-card { 
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%); 
        }

        .custom-scrollbar::-webkit-scrollbar { width: 8px; }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #2563eb;
            border-radius: 10px;
        }
    </style>
</head>

<body class="main-bg-pattern text-slate-900 antialiased overflow-x-hidden custom-scrollbar">
    
    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex items-center justify-start space-x-6">
            <a href="/" class="flex items-center space-x-3 group">
                <div class="bg-blue-600 p-2 rounded-lg group-hover:bg-slate-900 transition-all duration-300">
                    <i class="fas fa-clock text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900 group-hover:text-blue-600 transition-colors">Kembali ke Beranda</span>
            </a>
            <div class="h-6 w-[1px] bg-slate-200 hidden md:block"></div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12 md:py-20 relative">
        
        <div class="max-w-4xl mb-24 font-formal no-italic" data-aos="fade-right">
            <h6 class="text-blue-700 font-extrabold uppercase tracking-[0.4em] text-[11px] mb-6 border-b-2 border-blue-600 w-fit pb-2 no-italic">
                Official Hub Schedule
            </h6>
            
            <h1 class="text-6xl md:text-8xl font-black text-slate-900 leading-[0.85] uppercase tracking-tighter mb-10 no-italic">
                Jam <br> 
                <span class="text-gradient-blue no-italic">Operasional</span>
            </h1>

            <div class="relative">
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-blue-700"></div>
                <p class="text-slate-500 text-lg md:text-xl font-medium leading-relaxed max-w-3xl pl-8 no-italic">
                    Aktivitas pelayanan di <span class="text-slate-900 font-bold">Bandar Udara Abdurachman Saleh</span> diselaraskan dengan dinamika jadwal penerbangan harian. Kami memastikan seluruh fasilitas siap melayani sejak penerbangan pertama hingga selesai.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-32">
            
            <div class="blue-gradient-card p-8 md:p-12 rounded-[3rem] text-white relative overflow-hidden shadow-2xl shadow-blue-900/20" 
                 data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-door-open absolute -bottom-10 -right-10 text-[15rem] opacity-10"></i>
                <div class="relative z-10">
                    <h3 class="text-2xl md:text-3xl font-black uppercase mb-6 no-italic">Waktu Pembukaan</h3>
                    <p class="text-blue-100 mb-8 text-sm md:text-base leading-relaxed font-medium">
                        Seluruh ekosistem pelayanan darat, mulai dari terminal keberangkatan hingga fasilitas keamanan, diaktifkan secara serentak untuk menyambut penumpang jadwal pagi.
                    </p>
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-white/10">
                        <p class="text-[10px] uppercase tracking-widest text-blue-300 font-bold mb-2">Mulai Pelayanan (WIB)</p>
                        <div class="flex items-baseline gap-2">
                            <span class="text-6xl font-black">07:30</span>
                            <span class="text-xl font-bold text-blue-400">WIB</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 md:p-12 rounded-[3rem] shadow-xl border border-slate-100 relative overflow-hidden" 
                 data-aos="fade-up" data-aos-delay="300">
                <div class="relative z-10">
                    <h3 class="text-2xl md:text-3xl font-black uppercase mb-6 no-italic text-slate-900">Waktu Penutupan</h3>
                    <p class="text-slate-500 mb-8 text-sm md:text-base leading-relaxed font-medium">
                        Sistem operasional kami bersifat dinamis. Penutupan layanan dilakukan setelah seluruh rangkaian proses kedatangan atau keberangkatan jadwal terakhir selesai dilaksanakan.
                    </p>
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-2">Status Operasional</p>
                        <span class="text-4xl md:text-5xl font-black text-blue-700 uppercase italic">Fleksibel</span>
                        <p class="mt-4 text-xs text-slate-400 font-semibold leading-relaxed">
                            *Mengikuti jadwal harian maskapai yang beroperasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-32">
            <div class="text-center mb-16" data-aos="zoom-in">
                <h4 class="font-black uppercase tracking-[0.3em] text-slate-400 text-[11px] mb-4">Informasi Terpadu</h4>
                <div class="w-12 h-1 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-8 bg-white rounded-[2.5rem] border border-slate-100 shadow-lg shadow-slate-200/50 transition-all hover:border-blue-200 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-check-double text-2xl text-blue-600 group-hover:text-white"></i>
                    </div>
                    <h5 class="text-xs font-black uppercase text-slate-900 mb-3">Layanan Check-in</h5>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Aktif sejak terminal dibuka pukul 07:30 WIB sesuai kesiapan masing-masing maskapai.</p>
                </div>

                <div class="p-8 bg-white rounded-[2.5rem] border border-slate-100 shadow-lg shadow-slate-200/50 transition-all hover:border-blue-200 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-shield-check text-2xl text-blue-600 group-hover:text-white"></i>
                    </div>
                    <h5 class="text-xs font-black uppercase text-slate-900 mb-3">Keamanan Avsec</h5>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Pemeriksaan SCP 1 dan SCP 2 bersiaga penuh sepanjang waktu operasional bandara.</p>
                </div>

                <div class="p-8 bg-white rounded-[2.5rem] border border-slate-100 shadow-lg shadow-slate-200/50 transition-all hover:border-blue-200 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-headset text-2xl text-blue-600 group-hover:text-white"></i>
                    </div>
                    <h5 class="text-xs font-black uppercase text-slate-900 mb-3">Pusat Informasi</h5>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Staf bandara siap melayani pertanyaan seiring dengan aktivitas penerbangan.</p>
                </div>
            </div>
        </div>

        <section class="bg-blue-700 rounded-[3rem] p-10 md:p-16 text-white shadow-2xl shadow-blue-200 relative overflow-hidden" data-aos="zoom-in">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
            <div class="flex flex-col lg:flex-row items-center gap-12 relative z-10">
                <div class="text-6xl font-black italic border-b-4 border-blue-400 pb-2">2 Jam</div>
                <div class="flex-1">
                    <h5 class="text-2xl font-black uppercase mb-4 tracking-tight">Imbauan Kehadiran</h5>
                    <p class="text-blue-50 opacity-90 leading-relaxed text-sm md:text-base font-medium">
                        Demi kelancaran proses validasi dokumen dan pemeriksaan keamanan, seluruh penumpang diimbau untuk tiba di bandara <strong>minimal 2 jam</strong> sebelum waktu keberangkatan yang tertera pada tiket.
                    </p>
                </div>
            </div>
        </section>

    </main>

    <footer class="py-16 border-t border-slate-200 text-center bg-white">
        <div class="container mx-auto px-6">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.6em]">
                © 2026 Bandara Abdurachman Saleh - Malang station hub <br>
                <span class="text-blue-500/50 mt-2 block">Official Operational Information Service</span>
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            mirror: true,
            easing: 'ease-in-out'
        });
    </script>
</body>
</html>