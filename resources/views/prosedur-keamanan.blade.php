<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosedur Keamanan - Abdurachman Saleh Hub</title>
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
        .security-gradient { background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); }
    </style>
</head>

<body class="main-bg-pattern font-sans text-slate-900 antialiased overflow-x-hidden">
    
    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="bg-slate-900 p-2 rounded-lg group-hover:bg-red-600 transition-colors">
                    <i class="fas fa-shield-halved text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter">Kembali ke Beranda</span>
            </a>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-20">
        
        <div class="max-w-4xl mb-24">
            <h6 class="text-red-600 font-black uppercase tracking-[0.4em] text-[11px] mb-6">Aviation Security (AVSEC)</h6>
            <h1 class="text-6xl md:text-7xl font-black text-slate-900 leading-[0.85] uppercase tracking-tighter mb-8">
                Protokol <br> <span class="text-red-600 italic">Keamanan</span>
            </h1>
            <p class="text-slate-500 text-lg font-medium leading-relaxed max-w-2xl border-l-4 border-slate-900 pl-6">
                Bandara Abdurachman Saleh menerapkan standar keamanan internasional sesuai regulasi Dirjen Perhubungan Udara dan ICAO untuk menjamin keselamatan seluruh penumpang.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-32">
            
            <div class="security-gradient p-12 rounded-[3rem] text-white relative overflow-hidden">
                <i class="fas fa-person-rays absolute -bottom-10 -right-10 text-[15rem] opacity-10"></i>
                <h3 class="text-2xl font-black uppercase mb-6 italic">Security Check Point 1 (SCP 1)</h3>
                <p class="text-slate-400 mb-8 text-sm leading-relaxed">Dilakukan di pintu masuk area check-in. Penumpang wajib melewati Walk Through Metal Detector (WTMD).</p>
                <ul class="space-y-4 text-xs font-bold uppercase tracking-widest text-slate-300">
                    <li class="flex items-center gap-3"><i class="fas fa-check text-red-500"></i> Pemeriksaan Tiket & Identitas</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check text-red-500"></i> X-Ray Barang Bawaan (Kabin & Bagasi)</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check text-red-500"></i> Pelepasan Benda Logam</li>
                </ul>
            </div>

            <div class="bg-white p-12 rounded-[3rem] shadow-xl border border-slate-100">
                <h3 class="text-2xl font-black uppercase mb-6 italic">Security Check Point 2 (SCP 2)</h3>
                <p class="text-slate-500 mb-8 text-sm leading-relaxed">Pemeriksaan akhir sebelum memasuki ruang tunggu (Boarding Lounge). Standar pemeriksaan lebih ketat.</p>
                <ul class="space-y-4 text-xs font-bold uppercase tracking-widest text-slate-400">
                    <li class="flex items-center gap-3"><i class="fas fa-check text-red-600"></i> Pemeriksaan Cairan, Aerosol, & Gel (LAGs)</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check text-red-600"></i> Pemeriksaan Laptop & Elektronik (Wajib Dikeluarkan)</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check text-red-600"></i> Pemeriksaan Tubuh (Body Search) Jika Diperlukan</li>
                </ul>
            </div>
        </div>

        <div class="mb-32">
            <h4 class="text-center font-black uppercase tracking-[0.3em] text-slate-400 text-[11px] mb-12">Barang Dilarang (Prohibited Items)</h4>
            
            

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12">
                <div class="text-center p-8 bg-white rounded-[2rem] border border-slate-100">
                    <i class="fas fa-fire-extinguisher text-3xl text-red-600 mb-4"></i>
                    <p class="text-[10px] font-black uppercase">Mudah Terbakar</p>
                </div>
                <div class="text-center p-8 bg-white rounded-[2rem] border border-slate-100">
                    <i class="fas fa-knife text-3xl text-red-600 mb-4"></i>
                    <p class="text-[10px] font-black uppercase">Senjata Tajam</p>
                </div>
                <div class="text-center p-8 bg-white rounded-[2rem] border border-slate-100">
                    <i class="fas fa-battery-full text-3xl text-red-600 mb-4"></i>
                    <p class="text-[10px] font-black uppercase">Baterai Lithium (Bagasi)</p>
                </div>
                <div class="text-center p-8 bg-white rounded-[2rem] border border-slate-100">
                    <i class="fas fa-biohazard text-3xl text-red-600 mb-4"></i>
                    <p class="text-[10px] font-black uppercase">Bahan Kimia</p>
                </div>
            </div>
        </div>

        <section class="bg-red-600 rounded-[3rem] p-12 text-white shadow-2xl shadow-red-200">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="text-5xl font-black italic">100ml</div>
                <div class="flex-1">
                    <h5 class="text-xl font-black uppercase mb-2">Aturan Cairan (LAGs)</h5>
                    <p class="text-sm opacity-90 leading-relaxed">Sesuai standar internasional, cairan, aerosol, dan gel yang dibawa ke kabin tidak boleh melebihi 100ml per wadah dan harus dimasukkan ke dalam plastik transparan segel.</p>
                </div>
            </div>
        </section>

    </main>

    <footer class="py-12 border-t border-slate-200 text-center">
        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.6em]">
            © {{ date('Y') }} Bandara Abdurachman Saleh - Security Division
        </p>
    </footer>

</body>
</html>