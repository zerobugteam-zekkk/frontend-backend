<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Kargo - Abdurachman Saleh Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .main-bg-pattern {
            background-color: #f8fafc;
            background-image: 
                radial-gradient(#0f172a05 1px, transparent 1px),
                radial-gradient(#0f172a05 1px, #f8fafc 1px);
            background-size: 40px 40px;
        }
        .cargo-gradient { background: linear-gradient(135deg, #1e293b 0%, #334155 100%); }
    </style>
</head>

<body class="main-bg-pattern font-sans text-slate-900 antialiased overflow-x-hidden">
    
    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="bg-slate-900 p-2 rounded-lg group-hover:bg-red-600 transition-colors">
                    <i class="fas fa-boxes-packing text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter">Back to Hub</span>
            </a>
            <div class="flex items-center space-x-6">
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-20 relative">
        
        <div class="max-w-4xl mb-24">
            <h6 class="text-slate-400 font-black uppercase tracking-[0.4em] text-[11px] mb-6">Logistics & Supply Chain</h6>
            <h1 class="text-6xl md:text-8xl font-black text-slate-900 leading-[0.85] uppercase tracking-tighter mb-8">
                Air Freight <br>
                <span class="text-red-600 italic underline decoration-slate-900 decoration-8 underline-offset-[12px]">Services</span>
            </h1>
            <p class="text-slate-500 text-lg md:text-xl font-medium leading-relaxed max-w-2xl border-l-4 border-slate-900 pl-6">
                Solusi pengiriman barang cepat dan aman melalui udara. Menghubungkan potensi bisnis Malang dengan jaringan logistik nasional dan global.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-32">
            <div class="bg-white p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-slate-100 group">
                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-slate-900 transition-colors">
                    <i class="fas fa-box text-slate-900 group-hover:text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-black uppercase mb-4">General Cargo</h4>
                <p class="text-sm text-slate-500 leading-relaxed font-medium">Pengiriman barang umum seperti garmen, peralatan rumah tangga, dan suku cadang dengan penanganan standar keamanan tinggi.</p>
            </div>

            <div class="bg-white p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-slate-100 group">
                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-red-600 transition-colors">
                    <i class="fas fa-leaf text-slate-900 group-hover:text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-black uppercase mb-4">Perishables</h4>
                <p class="text-sm text-slate-500 leading-relaxed font-medium">Fasilitas khusus untuk produk pertanian dan perkebunan khas Malang (buah, sayur, bunga) agar tetap segar hingga tujuan.</p>
            </div>

            <div class="bg-white p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-slate-100 group">
                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-yellow-500 transition-colors">
                    <i class="fas fa-biohazard text-slate-900 group-hover:text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-black uppercase mb-4">Special Cargo</h4>
                <p class="text-sm text-slate-500 leading-relaxed font-medium">Penanganan khusus untuk barang sensitif, bernilai tinggi, atau kategori Dangerous Goods sesuai regulasi IATA.</p>
            </div>
        </div>

        <div class="cargo-gradient rounded-[4rem] p-12 md:p-20 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-white opacity-[0.02] -skew-x-12 translate-x-20"></div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h3 class="text-3xl font-black uppercase italic mb-6">Informasi <span class="text-red-500">Operasional</span></h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <i class="fas fa-clock mt-1 text-red-500"></i>
                            <div>
                                <p class="font-black uppercase text-xs">Jam Operasional Terminal</p>
                                <p class="text-slate-400 text-sm">Setiap Hari: 05.00 - 17.00 WIB</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <i class="fas fa-location-dot mt-1 text-red-500"></i>
                            <div>
                                <p class="font-black uppercase text-xs">Lokasi Area Kargo</p>
                                <p class="text-slate-400 text-sm">Sisi Barat Bandara (Akses via Jl. Komodor Udara)</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-xl p-8 rounded-[2.5rem] border border-white/10">
                    <h4 class="text-center font-black uppercase tracking-widest text-[10px] mb-8">Hubungi Admin Kargo</h4>
                    <div class="space-y-4">
                        <a href="https://wa.me/628123456789" class="flex items-center justify-between bg-white text-slate-900 p-4 rounded-2xl font-black uppercase text-xs hover:bg-red-600 hover:text-white transition-all">
                            <span>WhatsApp Hotline</span>
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                        <div class="text-center">
                            <p class="text-[9px] text-slate-400 uppercase tracking-widest">Silakan hubungi untuk tarif dan jadwal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="py-12 text-center">
        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.6em]">
            © {{ date('Y') }} Terminal Kargo - Bandara Abdurachman Saleh Malang
        </p>
    </footer>

</body>
</html>