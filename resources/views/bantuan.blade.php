<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan & Kontak - Abdurachman Saleh Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .map-container iframe { width: 100%; height: 450px; border-radius: 2rem; border: none; shadow: 0 25px 50px -12px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="antialiased text-slate-900">

    {{-- Navigasi Simpel --}}
    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <div class="bg-red-600 p-2 rounded-lg text-white"><i class="fas fa-headset text-sm"></i></div>
                <span class="text-sm font-black uppercase tracking-tighter">Help <span class="text-red-600">Center</span></span>
            </a>
        </div>
    </nav>

    {{-- Hero Bantuan --}}
    <header class="bg-slate-900 py-16 text-center text-white relative overflow-hidden">
        <div class="relative z-10">
            <h6 class="text-red-600 font-black uppercase tracking-[0.5em] text-[10px] mb-3">Customer Service</h6>
            <h1 class="text-4xl md:text-5xl font-black tracking-tighter uppercase mb-4">Ada yang bisa kami <span class="text-red-600">Bantu?</span></h1>
            <p class="text-slate-400 text-sm max-w-lg mx-auto">Kami siap melayani pertanyaan mengenai penerbangan, fasilitas, dan bantuan medis 24 jam.</p>
        </div>
    </header>

    <main class="container mx-auto px-6 -mt-8 pb-20">
        <div class="max-w-6xl mx-auto">
            
           {{-- Container Utama dengan Margin Negative yang disesuaikan --}}
<main class="container mx-auto px-6 -mt-20 relative z-20 pb-24">
    <div class="max-w-6xl mx-auto">
            
           {{-- Section Contact Cards --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 pt-10">
    
    {{-- 1. Call Center --}}
    <div class="bg-white p-10 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 text-center group hover:border-red-500 transition-all hover:-translate-y-2 duration-300">
        <div class="bg-slate-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-red-50 transition-colors">
            <i class="fas fa-phone-alt text-2xl text-red-600"></i>
        </div>
        <h4 class="font-black uppercase text-xs mb-2 tracking-widest text-slate-400">Information Center</h4>
        <p class="text-slate-900 font-black text-lg mb-4 tracking-tighter">(0341) 791580</p>
        <a href="tel:0341791580" class="inline-block bg-slate-100 text-slate-900 text-[9px] font-black px-8 py-3 rounded-full uppercase tracking-widest hover:bg-red-600 hover:text-white transition shadow-sm">
            Hubungi Sekarang
        </a>
    </div>

    {{-- 2. Lost & Found --}}
    <div class="bg-white p-10 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 text-center group hover:border-red-500 transition-all hover:-translate-y-2 duration-300">
        <div class="bg-slate-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-red-50 transition-colors">
            <i class="fas fa-box-open text-2xl text-red-600"></i>
        </div>
        <h4 class="font-black uppercase text-xs mb-2 tracking-widest text-slate-400">Lost & Found</h4>
        <p class="text-slate-500 text-[11px] mb-6 leading-relaxed italic">Kehilangan barang di area terminal atau kabin pesawat?</p>
        <a href="https://wa.me/628123456789?text=Halo%20Lost%20%26%20Found%20Bandara%20Abd%20Saleh..." 
           class="inline-block bg-slate-900 text-white text-[9px] font-black px-8 py-3 rounded-full uppercase tracking-widest hover:bg-red-600 transition shadow-lg shadow-slate-200">
           Buat Laporan
        </a>
    </div>

    {{-- 3. Emergency --}}
    <div class="bg-white p-10 rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-red-100 text-center group hover:bg-red-600 transition-all hover:-translate-y-2 duration-300">
        <div class="bg-red-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-white transition-colors">
            <i class="fas fa-briefcase-medical text-2xl text-red-600 animate-pulse"></i>
        </div>
        <h4 class="font-black uppercase text-xs mb-2 tracking-widest text-slate-400 group-hover:text-white/80">Emergency Call</h4>
        <p class="text-red-600 font-black text-lg mb-4 tracking-tighter group-hover:text-white">(0341) 791580</p>
        <a href="tel:112" class="inline-block bg-red-600 text-white text-[9px] font-black px-8 py-3 rounded-full uppercase tracking-widest group-hover:bg-white group-hover:text-red-600 transition shadow-lg shadow-red-200">
            Panggil Darurat
        </a>
    </div>

        </div>
        
        {{-- Map Section tetap di bawahnya --}}
        ...
    </div>
</main>

            {{-- Google Maps Section --}}
            <div class="bg-white p-6 rounded-[2.5rem] shadow-2xl shadow-slate-200 border border-slate-50 mb-16">
                <div class="flex flex-col md:flex-row gap-10 items-center p-6">
                    <div class="md:w-1/3">
                        <h3 class="text-2xl font-black uppercase tracking-tighter mb-4">Lokasi <span class="text-red-600 italic">Kami</span></h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6">
                            Jl. Komodor Udara Abdul Rahman Saleh, Pakis, Kec. Pakis, Kabupaten Malang, Jawa Timur 65154
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-center text-xs font-bold text-slate-400 uppercase tracking-widest">
                                <i class="fas fa-map-marker-alt text-red-600 mr-3"></i> Kabupaten Malang
                            </div>
                            <div class="flex items-center text-xs font-bold text-slate-400 uppercase tracking-widest">
                                <i class="fas fa-plane-arrival text-red-600 mr-3"></i> Kode IATA: MLG
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/3 w-full map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.583563914902!2d112.70997327588358!3d-7.938507879061036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6295283d6bc73%3A0xf0027a77c64c3e30!2sBandar%20Udara%20Abdul%20Rachman%20Saleh!5e0!3m2!1sid!2sid!4v1705050000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            {{-- FAQ Section Singkat --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <h4 class="font-black uppercase tracking-widest text-xs text-red-600 mb-6 underline decoration-4 underline-offset-8">Pertanyaan Umum</h4>
                    <div class="space-y-4">
                        <details class="group bg-white rounded-2xl p-4 border border-slate-100 cursor-pointer transition-all hover:border-red-600">
                            <summary class="font-bold text-xs uppercase flex justify-between items-center list-none">
                                Berapa jam sebelum terbang harus di Bandara?
                                <i class="fas fa-chevron-down text-[10px] group-open:rotate-180 transition"></i>
                            </summary>
                            <p class="text-[11px] text-slate-500 mt-3 leading-relaxed">Untuk penerbangan domestik, disarankan tiba 2 jam sebelum keberangkatan. Untuk internasional, disarankan 3 jam sebelumnya.</p>
                        </details>
                        <details class="group bg-white rounded-2xl p-4 border border-slate-100 cursor-pointer transition-all hover:border-red-600">
                            <summary class="font-bold text-xs uppercase flex justify-between items-center list-none">
                                Apakah ada fasilitas Wi-Fi gratis?
                                <i class="fas fa-chevron-down text-[10px] group-open:rotate-180 transition"></i>
                            </summary>
                            <p class="text-[11px] text-slate-500 mt-3 leading-relaxed">Ya, pilih SSID "Airport_Free_WiFi" di seluruh area terminal penumpang.</p>
                        </details>
                    </div>
                </div>
                <div class="bg-red-600 rounded-[2rem] p-8 text-white self-center">
                    <h4 class="font-black uppercase text-xl mb-2">Butuh Bantuan Khusus?</h4>
                    <p class="text-red-100 text-xs leading-relaxed mb-6">Kami menyediakan kursi roda dan pendampingan untuk lansia, ibu hamil, atau penyandang disabilitas.</p>
                    <a href="https://wa.me/6281229523471" class="inline-block bg-white text-red-600 font-bold text-[10px] px-8 py-3 rounded-full uppercase tracking-[0.2em] shadow-lg">Chat WhatsApp</a>
                </div>
            </div>

        </div>
    </main>

    <footer class="py-12 border-t border-slate-100 mt-10 text-center">
        <p class="text-[10px] font-bold uppercase tracking-[0.5em] text-slate-300">© 2026 Abdurachman Saleh International Hub — Malang</p>
    </footer>

</body>
</html>