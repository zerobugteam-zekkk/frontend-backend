<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Check-in Detail - Abdurachman Saleh Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
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
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(237, 28, 36, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
        }
    </style>
</head>

<body class="main-bg-pattern font-sans text-slate-900 antialiased overflow-x-hidden">
    
    <div class="blob-bg -top-20 -left-20"></div>

    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="bg-red-600 p-2 rounded-lg group-hover:bg-slate-900 transition-colors">
                    <i class="fas fa-arrow-left text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900">Kembali ke Beranda</span>
            </a>
            <div class="hidden md:block">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest italic">Official Passenger Guide v1.0</span>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-20 relative">
        
        <div class="max-w-4xl mb-24">
            <h6 class="text-red-600 font-black uppercase tracking-[0.4em] text-[11px] mb-6 underline underline-offset-8 decoration-2">Travel Protocols</h6>
            <h1 class="text-6xl md:text-8xl font-black text-slate-900 leading-[0.85] uppercase tracking-tighter mb-8">
                Layanan <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-400 py-2 inline-block">Keberangkatan</span>
            </h1>
            <p class="text-slate-500 text-lg md:text-xl font-medium leading-relaxed max-w-2xl border-l-4 border-red-600 pl-6">
                Demi keamanan dan kenyamanan bersama, setiap penumpang di Bandara Abdurachman Saleh diwajibkan mengikuti standar prosedur pelaporan diri (Check-in) berikut ini.
            </p>
        </div>

        <div class="space-y-12 mb-32">
            
            <div class="flex flex-col md:flex-row gap-12 items-start bg-white p-8 md:p-16 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-slate-100">
                <div class="md:w-1/3">
                    <div class="text-7xl font-black text-red-600/10 mb-4">01</div>
                    <h3 class="text-3xl font-black uppercase tracking-tighter text-slate-900">Ketepatan Waktu (Timing)</h3>
                </div>
                <div class="md:w-2/3 space-y-4 text-slate-600 leading-relaxed font-medium">
                    <p>Sesuai dengan regulasi penerbangan sipil, loket pelaporan (Check-in Counter) dibuka <strong>2 jam</strong> sebelum jadwal keberangkatan dan akan ditutup secara sistem tepat <strong>30-45 menit</strong> sebelum pesawat lepas landas.</p>
                    <ul class="list-none space-y-2">
                        <li class="flex items-start"><i class="fas fa-check-circle text-red-600 mt-1 mr-3 text-xs"></i> Tiba lebih awal membantu Anda menghindari antrean di Security Check Point (SCP).</li>
                        <li class="flex items-start"><i class="fas fa-check-circle text-red-600 mt-1 mr-3 text-xs"></i> Keterlambatan pelaporan dapat mengakibatkan tiket dianggap hangus (No Show).</li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-12 items-start bg-white p-8 md:p-16 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-slate-100">
                <div class="md:w-1/3">
                    <div class="text-7xl font-black text-red-600/10 mb-4">02</div>
                    <h3 class="text-3xl font-black uppercase tracking-tighter text-slate-900">Validasi Identitas</h3>
                </div>
                <div class="md:w-2/3 space-y-4 text-slate-600 leading-relaxed font-medium">
                    <p>Petugas Aviation Security (Avsec) akan melakukan verifikasi berlapis untuk mencocokkan identitas fisik dengan dokumen perjalanan Anda.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <span class="block text-red-600 font-bold uppercase text-[10px] mb-1">Domestik</span>
                            <p class="text-xs uppercase font-black">KTP Asli / SIM / KIA / Paspor</p>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <span class="block text-red-600 font-bold uppercase text-[10px] mb-1">Digital</span>
                            <p class="text-xs uppercase font-black">E-Ticket / Kode Booking dari Aplikasi</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-12 items-start bg-white p-8 md:p-16 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-slate-100">
                <div class="md:w-1/3">
                    <div class="text-7xl font-black text-red-600/10 mb-4">03</div>
                    <h3 class="text-3xl font-black uppercase tracking-tighter text-slate-900">Keamanan Bagasi</h3>
                </div>
                <div class="md:w-2/3 space-y-4 text-slate-600 leading-relaxed font-medium">
                    <p>Semua barang bawaan wajib melalui pemeriksaan mesin X-Ray. Mohon perhatikan barang-barang yang dilarang dibawa demi keselamatan penerbangan.</p>
                    <div class="bg-red-50 p-6 rounded-2xl border-l-4 border-red-600">
                        <h4 class="text-red-600 font-black text-xs uppercase mb-3"><i class="fas fa-exclamation-triangle mr-2"></i> Perhatian Khusus Powerbank</h4>
                        <p class="text-xs text-red-800 leading-relaxed">Powerbank wajib dibawa ke dalam kabin pesawat. <strong>Dilarang keras</strong> memasukkan Powerbank ke dalam bagasi tercatat (perut pesawat) karena risiko kebakaran.</p>
                    </div>
                </div>
            </div>

        </div>

        <section class="bg-slate-900 rounded-[3rem] md:rounded-[5rem] p-10 md:p-20 text-white overflow-hidden relative shadow-3xl">
            <div class="absolute top-0 right-0 w-1/3 h-full bg-red-600/10 skew-x-12 translate-x-32"></div>
            
            <div class="relative z-10">
                <div class="max-w-xl mb-12">
                    <h2 class="text-4xl font-black uppercase tracking-tighter italic mb-4">Efisiensi dengan Web Check-in</h2>
                    <p class="text-slate-400 text-sm md:text-base leading-relaxed">Layanan ini tersedia 24 jam hingga 4 jam sebelum keberangkatan. Hemat waktu Anda tanpa perlu mengantre di loket bandara.</p>
                </div>
                <div class="flex flex-wrap gap-4">
                    <a href="https://www.lionair.co.id/" target="_blank" class="bg-red-600 hover:bg-white hover:text-red-600 text-white px-10 py-4 rounded-full font-black uppercase text-[10px] tracking-widest transition-all flex items-center shadow-2xl shadow-red-600/20">
                        Lion Air <i class="fas fa-external-link-alt ml-2 text-[8px]"></i>
                    </a>
                    <a href="https://www.garuda-indonesia.com/id/id" target="_blank" class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-10 py-4 rounded-full font-black uppercase text-[10px] tracking-widest transition-all flex items-center">
                        Garuda Indonesia <i class="fas fa-external-link-alt ml-2 text-[8px]"></i>
                    </a>
                </div>
            </div>
        </section>

        <div class="mt-32 max-w-3xl mx-auto">
            <h4 class="text-center font-black uppercase tracking-[0.3em] text-slate-400 text-[11px] mb-12">Pertanyaan Sering Diajukan</h4>
            <div class="space-y-6">
                <div class="border-b border-slate-200 pb-6">
                    <p class="font-black text-slate-900 uppercase text-sm mb-2 italic">Bagaimana jika saya tidak membawa KTP asli?</p>
                    <p class="text-sm text-slate-500 font-medium">Anda dapat menggunakan kartu identitas resmi lainnya seperti SIM atau Paspor asli yang masih berlaku.</p>
                </div>
                <div class="border-b border-slate-200 pb-6">
                    <p class="font-black text-slate-900 uppercase text-sm mb-2 italic">Apakah bayi memerlukan tiket untuk check-in?</p>
                    <p class="text-sm text-slate-500 font-medium">Ya, bayi wajib didaftarkan dalam manifes penumpang. Pastikan Anda membawa Akta Kelahiran atau Kartu Keluarga.</p>
                </div>
            </div>
        </div>

    </main>

    <footer class="py-12 border-t border-slate-200 text-center">
        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.6em]">
            © {{ date('Y') }} Bandara Abdurachman Saleh - Malang station hub
        </p>
    </footer>

</body>
</html>