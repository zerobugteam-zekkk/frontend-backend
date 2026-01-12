<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Parkir - Abdurachman Saleh Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .premium-shadow { box-shadow: 0 50px 100px -20px rgba(15, 23, 42, 0.12), 0 30px 60px -30px rgba(0, 0, 0, 0.15); }
    </style>
</head>
<body class="antialiased text-slate-900">

    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <div class="bg-red-600 p-2 rounded-lg">
                    <i class="fas fa-parking text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900">
                    Parking <span class="text-red-600">Services</span>
                </span>
            </a>
        </div>
    </nav>

    <header class="relative bg-slate-900 py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <img src="https://www.transparenttextures.com/patterns/asfalt-dark.png" class="w-full h-full">
        </div>
        <div class="relative z-10 container mx-auto px-6 text-center">
            <h6 class="text-red-600 font-black uppercase tracking-[0.5em] text-[10px] mb-4">Parking Information</h6>
            <h1 class="text-5xl md:text-6xl font-black text-white tracking-tighter uppercase mb-6">
                Fasilitas <span class="text-red-600">Parkir</span>
            </h1>
            <p class="text-slate-400 max-w-xl mx-auto text-sm font-medium">Area parkir luas dengan sistem keamanan 24 jam untuk kendaraan roda 2 dan roda 4.</p>
        </div>
    </header>

    <main class="container mx-auto px-6 -mt-10 relative z-20 pb-24">
        <div class="max-w-6xl mx-auto">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white rounded-[3rem] p-10 premium-shadow border border-slate-100 group hover:border-red-500 transition-all">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="bg-slate-900 text-white p-4 rounded-3xl group-hover:bg-red-600 transition-colors">
                            <i class="fas fa-car text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-black uppercase tracking-tighter text-xl text-slate-900">Kendaraan Roda 4</h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Mobil / SUV / Van</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b border-slate-50 pb-3">
                            <span class="text-sm font-bold text-slate-600">1 Jam Pertama</span>
                            <span class="text-lg font-black text-slate-900">Rp 10.000</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-slate-50 pb-3">
                            <span class="text-sm font-bold text-slate-600">Jam Berikutnya</span>
                            <span class="text-lg font-black text-slate-900">Rp 5.000</span>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <span class="text-sm font-bold text-slate-600">Inap (Per Malam)</span>
                            <span class="text-lg font-black text-red-600">Rp 60.000</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[3rem] p-10 premium-shadow border border-slate-100 group hover:border-red-500 transition-all">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="bg-slate-900 text-white p-4 rounded-3xl group-hover:bg-red-600 transition-colors">
                            <i class="fas fa-motorcycle text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-black uppercase tracking-tighter text-xl text-slate-900">Kendaraan Roda 2</h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Motor Bebek / Sport / Matic</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b border-slate-50 pb-3">
                            <span class="text-sm font-bold text-slate-600">Flat (Sekali Parkir)</span>
                            <span class="text-lg font-black text-slate-900">Rp 5.000</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-slate-50 pb-3">
                            <span class="text-sm font-bold text-slate-600">Inap (Per Malam)</span>
                            <span class="text-lg font-black text-red-600">Rp 25.000</span>
                        </div>
                        <p class="text-[10px] text-slate-400 italic">*Tarif dapat berubah sewaktu-waktu sesuai kebijakan pengelola.</p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-900 rounded-[3.5rem] p-12 text-white overflow-hidden relative">
                <div class="absolute top-0 right-0 w-64 h-64 bg-red-600/10 rounded-full translate-x-20 -translate-y-20 blur-3xl"></div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative z-10">
                    <div class="text-center md:text-left">
                        <h4 class="text-red-600 font-black uppercase tracking-widest text-xs mb-4">Kapasitas</h4>
                        <div class="text-4xl font-black mb-2">500+</div>
                        <p class="text-slate-400 text-xs font-medium">Slot kendaraan tersedia di area terbuka dan tertutup.</p>
                    </div>
                    <div class="text-center md:text-left">
                        <h4 class="text-red-600 font-black uppercase tracking-widest text-xs mb-4">Keamanan</h4>
                        <div class="text-4xl font-black mb-2">24/7</div>
                        <p class="text-slate-400 text-xs font-medium">Pemantauan CCTV dan petugas keamanan berpatroli.</p>
                    </div>
                    <div class="text-center md:text-left">
                        <h4 class="text-red-600 font-black uppercase tracking-widest text-xs mb-4">Metode Bayar</h4>
                        <div class="flex justify-center md:justify-start gap-4 text-2xl mt-4 text-slate-300">
                            <i class="fab fa-cc-visa"></i>
                            <i class="fas fa-money-check-alt"></i>
                            <i class="fas fa-wallet"></i>
                        </div>
                        <p class="text-slate-400 text-[10px] mt-4 uppercase font-bold tracking-widest">Cashless Preferred</p>
                    </div>
                </div>
            </div>

            <div class="mt-20">
                <h3 class="text-2xl font-black uppercase tracking-tighter text-center mb-12">Prosedur <span class="text-red-600 italic">Parkir Inap</span></h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-8 rounded-[2.5rem] text-center border border-slate-100">
                        <div class="text-red-600 font-black text-3xl mb-4">01</div>
                        <h5 class="font-bold uppercase text-xs mb-2">Lapor Petugas</h5>
                        <p class="text-slate-500 text-[11px] leading-relaxed">Informasikan kepada petugas loket bahwa Anda akan melakukan parkir inap.</p>
                    </div>
                    <div class="bg-white p-8 rounded-[2.5rem] text-center border border-slate-100">
                        <div class="text-red-600 font-black text-3xl mb-4">02</div>
                        <h5 class="font-bold uppercase text-xs mb-2">Catat Identitas</h5>
                        <p class="text-slate-500 text-[11px] leading-relaxed">Petugas akan mencatat STNK dan identitas pengemudi demi keamanan kendaraan.</p>
                    </div>
                    <div class="bg-white p-8 rounded-[2.5rem] text-center border border-slate-100">
                        <div class="text-red-600 font-black text-3xl mb-4">03</div>
                        <h5 class="font-bold uppercase text-xs mb-2">Cek Kondisi</h5>
                        <p class="text-slate-500 text-[11px] leading-relaxed">Pastikan kaca tertutup rapat dan tidak meninggalkan barang berharga di dalam kendaraan.</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="py-12 text-center text-[10px] font-bold uppercase tracking-[0.4em] text-slate-400">
        © 2026 Parking Management — Abd. Saleh Malang Hub
    </footer>

</body>
</html>