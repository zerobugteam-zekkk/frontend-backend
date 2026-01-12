<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rute Penerbangan - Abdurachman Saleh Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap');
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #f8fafc;
        }
        .premium-shadow {
            box-shadow: 0 50px 100px -20px rgba(15, 23, 42, 0.12), 0 30px 60px -30px rgba(0, 0, 0, 0.15);
        }
        .route-dashed {
            background-image: linear-gradient(to right, #ef4444 50%, transparent 50%);
            background-size: 15px 2px;
            background-repeat: repeat-x;
        }
    </style>
</head>
<body class="antialiased text-slate-900">

    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <div class="bg-red-600 p-2 rounded-lg">
                    <i class="fas fa-plane-departure text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900">
                    Kembali <span class="text-red-600">Ke Portal Utama</span>
                </span>
            </a>
        </div>
    </nav>

    <header class="relative bg-slate-900 py-24 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-red-600/10 skew-x-12 translate-x-32"></div>
        
        <div class="relative z-10 container mx-auto px-6 text-center">
            <h6 class="text-red-600 font-black uppercase tracking-[0.5em] text-[10px] mb-4">Network & Connectivity</h6>
            <h1 class="text-5xl md:text-6xl font-black text-white tracking-tighter uppercase mb-6">
                Rute <span class="text-red-600 italic">Penerbangan</span>
            </h1>
            <div class="w-20 h-1.5 bg-red-600 mx-auto rounded-full"></div>
        </div>
    </header>

    <main class="container mx-auto px-6 -mt-12 relative z-20 pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-8 md:p-12 rounded-[3.5rem] premium-shadow border border-slate-100">
                    <h3 class="text-2xl font-black uppercase tracking-tighter mb-10 flex items-center">
                        <i class="fas fa-map-marked-alt mr-4 text-red-600"></i> Konektivitas Domestik
                    </h3>

                    <div class="group relative bg-slate-50 p-8 rounded-[2.5rem] border border-slate-100 hover:border-red-200 transition-all mb-8">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                            <div class="text-center md:text-left">
                                <span class="text-4xl font-black text-slate-900 tracking-tighter">MLG</span>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Malang (ABD. Saleh)</p>
                            </div>
                            
                            <div class="flex-grow flex flex-col items-center">
                                <div class="w-full h-0.5 route-dashed relative">
                                    <i class="fas fa-plane text-red-600 absolute -top-2.5 left-1/2 -translate-x-1/2 group-hover:left-[90%] transition-all duration-1000"></i>
                                </div>
                                <span class="text-[9px] font-black text-red-600 uppercase mt-4 tracking-[0.3em]">Direct Flight</span>
                            </div>

                            <div class="text-center md:text-right">
                                <span class="text-4xl font-black text-slate-900 tracking-tighter">CGK/HLP</span>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Jakarta (Soekarno/Halim)</p>
                            </div>
                        </div>
                    </div>

                    <div class="group relative bg-slate-50 p-8 rounded-[2.5rem] border border-slate-100 opacity-60 transition-all">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                            <div class="text-center md:text-left">
                                <span class="text-4xl font-black text-slate-900 tracking-tighter">MLG</span>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Malang (ABD. Saleh)</p>
                            </div>
                            
                            <div class="flex-grow flex flex-col items-center">
                                <div class="w-full h-0.5 border-b-2 border-slate-200 relative">
                                    <i class="fas fa-plane text-slate-300 absolute -top-2.5 left-1/2 -translate-x-1/2"></i>
                                </div>
                                <span class="text-[9px] font-black text-slate-400 uppercase mt-4 tracking-[0.3em]">Charter/Seasonal</span>
                            </div>

                            <div class="text-center md:text-right">
                                <span class="text-4xl font-black text-slate-900 tracking-tighter">DPS</span>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Bali (Ngurah Rai)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900 p-10 rounded-[3rem] text-white overflow-hidden relative">
                    <div class="absolute bottom-0 right-0 w-32 h-32 bg-red-600/10 rounded-full translate-x-10 translate-y-10"></div>
                    <h4 class="text-xl font-bold uppercase mb-4 tracking-tighter">Catatan Operasional</h4>
                    <p class="text-slate-400 text-sm leading-loose">Seluruh jadwal penerbangan dari dan menuju Bandara Abdurachman Saleh dipengaruhi oleh visibilitas operasional dan kondisi aktivitas vulkanik. Jika terjadi cuaca buruk, penerbangan dialihkan (Divert) ke Bandara Internasional Juanda (SUB).</p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-10 rounded-[3rem] premium-shadow border border-slate-100">
                    <h4 class="text-sm font-black uppercase tracking-[0.2em] text-slate-400 mb-8 border-b pb-4">Maskapai Aktif</h4>
                    <ul class="space-y-6">
                        <li class="flex items-center justify-between group">
                            <span class="font-bold text-slate-800">Batik Air</span>
                            <div class="bg-red-600/10 text-red-600 px-3 py-1 rounded-full text-[10px] font-black">ACTIVE</div>
                        </li>
                        <li class="flex items-center justify-between group">
                            <span class="font-bold text-slate-800">Citilink</span>
                            <div class="bg-red-600/10 text-red-600 px-3 py-1 rounded-full text-[10px] font-black">ACTIVE</div>
                        </li>
                        <li class="flex items-center justify-between group">
                            <span class="font-bold text-slate-800">Garuda Indonesia</span>
                            <div class="bg-red-600/10 text-red-600 px-3 py-1 rounded-full text-[10px] font-black">ACTIVE</div>
                        </li>
                    </ul>
                </div>

                <div class="bg-red-600 p-10 rounded-[3rem] text-white shadow-xl shadow-red-600/20">
                    <i class="fas fa-lightbulb text-3xl mb-6"></i>
                    <h4 class="text-lg font-black uppercase tracking-tighter mb-2">Tips Perjalanan</h4>
                    <p class="text-xs font-medium leading-relaxed opacity-90 italic">
                        "Lakukan check-in online minimal 4 jam sebelum keberangkatan untuk menghindari antrean di terminal."
                    </p>
                </div>
            </div>

        </div>
    </main>

    <footer class="py-12 text-center text-[10px] font-bold uppercase tracking-[0.4em] text-slate-400">
        © 2026 Flight Network Services — Abd. Saleh Malang
    </footer>

</body>
</html>