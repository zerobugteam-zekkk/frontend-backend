<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - Abdurachman Saleh Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap');
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #f8fafc;
            background-image: radial-gradient(#ed1c2405 1px, transparent 1px);
            background-size: 30px 30px;
        }
        .timeline-line {
            background: linear-gradient(to bottom, #ef4444 0%, #0f172a 100%);
        }
        .premium-shadow {
            box-shadow: 0 50px 100px -20px rgba(15, 23, 42, 0.12), 0 30px 60px -30px rgba(0, 0, 0, 0.15);
        }
        .sepia-filter {
            filter: grayscale(100%) contrast(1.1) brightness(0.9);
            transition: all 0.5s ease;
        }
        .sepia-filter:hover {
            filter: grayscale(0%) contrast(1) brightness(1);
        }
    </style>
</head>
<body class="antialiased text-slate-900">

    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <div class="bg-red-600 p-2 rounded-lg">
                    <i class="fas fa-history text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900">Kembali <span class="text-red-600">Ke Portal Utama</span></span>
            </a>
        </div>
    </nav>

    <header class="relative bg-slate-900 py-24 md:py-32 overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10">
            <img src="https://www.transparenttextures.com/patterns/carbon-fibre.png" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 container mx-auto px-6">
            <h6 class="text-red-600 font-black uppercase tracking-[0.5em] text-[10px] mb-4">The Legacy of Karbol</h6>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter uppercase leading-none">
                Jejak <span class="text-red-600">Dirgantara</span>
            </h1>
            <p class="text-slate-400 mt-6 max-w-2xl mx-auto text-sm md:text-lg font-medium">
                Menelusuri sejarah dari Pangkalan Udara Bugis hingga menjadi pintu langit utama Malang Raya.
            </p>
        </div>
    </header>

    <main class="container mx-auto px-6 -mt-12 relative z-20 pb-24">
        <div class="max-w-5xl mx-auto">
            
            <section class="bg-white rounded-[3rem] premium-shadow overflow-hidden mb-20 border border-slate-100">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-2/5 bg-slate-200 relative overflow-hidden group">
                        <img src="{{ asset('images/Abdulrachman-Saleh.jpg') }}"
                             alt="Abdurachman Saleh" 
                             class="w-full h-full object-cover sepia-filter group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-slate-900/80 to-transparent p-6 text-white">
                            <p class="text-[10px] font-black uppercase tracking-[0.3em] opacity-80">Portrait Resmi</p>
                            <p class="text-sm font-bold italic">Komodor Udara Abdurachman Saleh</p>
                        </div>
                    </div>
                    <div class="md:w-3/5 p-10 md:p-16">
                        <div class="inline-block px-4 py-1 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full mb-6">Pahlawan Nasional</div>
                        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tighter mb-4">Prof. Dr. Abdurachman Saleh</h2>
                        <p class="text-red-600 font-bold mb-6 italic">"The Karbol" — Teknokrat, Dokter, dan Penerbang.</p>
                        <p class="text-slate-500 text-sm leading-loose mb-8">
                            Dikenal dengan julukan <strong>Karbol</strong> (Si Kuncung yang Cerdas), beliau adalah tokoh multidimensi. Selain sebagai penerbang handal TNI AU, beliau adalah pionir kedokteran kedirgantaraan dan pendiri Radio Republik Indonesia (RRI). Nama beliau diabadikan sebagai pengganti nama Pangkalan Udara Bugis pada tahun 1952.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="border-l-2 border-red-600 pl-4">
                                <p class="text-[10px] uppercase font-black text-slate-400">Gugur</p>
                                <p class="text-xs font-bold">29 Juli 1947 (Dakota VT-CLA)</p>
                            </div>
                            <div class="border-l-2 border-red-600 pl-4">
                                <p class="text-[10px] uppercase font-black text-slate-400">Jabatan</p>
                                <p class="text-xs font-bold">Komandan Lanud Bugis Pertama</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="space-y-12">
                <div class="flex flex-col md:flex-row gap-8 items-start group">
                    <div class="md:w-1/4">
                        <h3 class="text-5xl font-black text-slate-200 group-hover:text-red-600 transition-colors">1937</h3>
                    </div>
                    <div class="md:w-3/4 bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm flex-grow">
                        <h4 class="text-xl font-black uppercase text-slate-900 mb-2">Pangkalan Udara Bugis</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Dibangun oleh pemerintah kolonial Belanda. Dipilih karena letaknya yang strategis secara taktis, terlindungi oleh jajaran pegunungan yang menjadikannya pangkalan udara tersembunyi yang ideal.</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-8 items-start group">
                    <div class="md:w-1/4">
                        <h3 class="text-5xl font-black text-slate-200 group-hover:text-red-600 transition-colors">1952</h3>
                    </div>
                    <div class="md:w-3/4 bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm flex-grow">
                        <h4 class="text-xl font-black uppercase text-slate-900 mb-2">Perubahan Nama Resmi</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Berdasarkan ketetapan staf Angkatan Udara, pangkalan udara ini resmi berganti nama dari Lanud Bugis menjadi Lanud Abdurachman Saleh untuk menghormati jasa beliau dalam merintis kekuatan udara Indonesia.</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-8 items-start group">
                    <div class="md:w-1/4">
                        <h3 class="text-5xl font-black text-slate-200 group-hover:text-red-600 transition-colors">1994</h3>
                    </div>
                    <div class="md:w-3/4 bg-slate-900 p-8 rounded-[2rem] shadow-xl flex-grow">
                        <h4 class="text-xl font-black uppercase text-white mb-2">Operasional Komersial</h4>
                        <p class="text-slate-400 text-sm leading-relaxed">Pada 1 April 1994, bandara ini mulai membuka gerbangnya bagi penerbangan sipil. Menjadikannya bandara <em>Enclave Sipil</em>, di mana aktivitas militer dan komersial berbagi landasan pacu yang sama.</p>
                    </div>
                </div>
            </div>

            <div class="mt-24 text-center">
                <div class="w-16 h-1.5 bg-red-600 mx-auto mb-8 rounded-full"></div>
                <p class="text-2xl font-black uppercase tracking-tighter italic text-slate-900">"Wira Amur" — Dirgantara Selamanya</p>
                <p class="text-slate-400 text-xs mt-4 uppercase tracking-[0.3em] font-bold">Menghormati Masa Lalu, Melayani Masa Depan</p>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-slate-100 py-12">
        <div class="container mx-auto px-6 text-center text-slate-400 text-[10px] font-bold uppercase tracking-widest">
            © 2026 Abdurachman Saleh Hub Archive
        </div>
    </footer>

</body>
</html>