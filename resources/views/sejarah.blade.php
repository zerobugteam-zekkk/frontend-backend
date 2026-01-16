<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - Abdurachman Saleh Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap');
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #f8fafc;
            background-image: radial-gradient(#2563eb0a 1px, transparent 1px);
            background-size: 30px 30px;
            overflow-x: hidden;
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
        
        /* Custom Scrollbar minimalis */
        .bio-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .bio-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        .bio-scroll::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 10px;
        }
    </style>
</head>
<body class="antialiased text-slate-900">

    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <div class="bg-blue-600 p-2 rounded-lg">
                    <i class="fas fa-arrow-left text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900">Kembali <span class="text-blue-600">Ke Portal Utama</span></span>
            </a>
        </div>
    </nav>

    <header class="relative bg-slate-900 py-24 md:py-32 overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10">
            <img src="https://www.transparenttextures.com/patterns/carbon-fibre.png" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 container mx-auto px-6" data-aos="fade-up" data-aos-duration="1000">
            <h6 class="text-blue-500 font-black uppercase tracking-[0.5em] text-[10px] mb-4">The Legacy of Karbol</h6>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter uppercase leading-none">
                Jejak <span class="text-blue-600">Dirgantara</span>
            </h1>
            <p class="text-slate-400 mt-6 max-w-2xl mx-auto text-sm md:text-lg font-medium">
                Menghormati Sang Pionir: Kisah Prof. Dr. Abdurachman Saleh dan Transformasi Pangkalan Udara Malang.
            </p>
        </div>
    </header>

    <main class="container mx-auto px-6 -mt-12 relative z-20 pb-24">
        <div class="max-w-5xl mx-auto">
            
            <section class="bg-white rounded-[3rem] premium-shadow overflow-hidden mb-20 border border-slate-100" data-aos="zoom-in-up" data-aos-duration="1200">
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
                    <div class="md:w-3/5 p-10 md:p-14 flex flex-col">
                        <div class="inline-block px-4 py-1 bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full mb-6 w-fit">Pahlawan Nasional</div>
                        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tighter mb-2">Prof. Dr. Abdurachman Saleh</h2>
                        <p class="text-blue-600 font-bold mb-4 italic text-sm">"The Karbol" — Intelektual Multitalenta di Balik Sayap Indonesia.</p>
                        
                        <div class="bio-scroll overflow-y-auto pr-6 max-h-[220px] text-slate-500 text-sm leading-loose text-justify">
                            <p class="mb-4">
                                <strong>Prof. Dr. Abdurachman Saleh</strong> adalah sosok langka dalam sejarah perjuangan Indonesia. Beliau bukan sekadar penerbang militer, melainkan seorang intelektual yang menjembatani dunia sains dan kedaulatan dirgantara. Sebagai seorang dokter lulusan STOVIA/GHS, beliau diakui sebagai <strong>pionir kedokteran kedirgantaraan</strong> di Indonesia, yang meletakkan dasar-dasar fisiologi penerbangan bagi para kadet awal RI.
                            </p>
                            <p class="mb-4">
                                Selain kontribusinya di udara dan laboratorium, beliau juga dikenal sebagai tokoh kunci dalam pendirian Radio Republik Indonesia (RRI), menyebarkan semangat kemerdekaan melalui gelombang radio. Di lingkungan TNI AU, kecerdasan dan ketangkasannya membuatnya dijuluki <strong>"Karbol"</strong> (istilah untuk kuncung yang cerdas), sebuah nama yang kini diabadikan sebagai sebutan bagi para Kadet Akademi Angkatan Udara.
                            </p>
                            <p>
                                Pengabdiannya berakhir secara heroik pada 29 Juli 1947, ketika pesawat Dakota VT-CLA yang ia tumpangi dalam misi kemanusiaan ditembak jatuh oleh pesawat Belanda di Yogyakarta. Untuk menghormati dedikasi luar biasa dan jasa-jasanya, nama beliau resmi diabadikan sebagai pengganti nama <strong>Lanud Bugis pada tahun 1952</strong> melalui ketetapan Kepala Staf Angkatan Udara.
                            </p>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mt-8 pt-6 border-t border-slate-100">
                            <div class="border-l-2 border-blue-600 pl-4">
                                <p class="text-[10px] uppercase font-black text-slate-400 leading-none mb-1">Status</p>
                                <p class="text-xs font-bold">Gugur (Misi VT-CLA)</p>
                            </div>
                            <div class="border-l-2 border-blue-600 pl-4">
                                <p class="text-[10px] uppercase font-black text-slate-400 leading-none mb-1">Kepangkatan</p>
                                <p class="text-xs font-bold">Komodor Udara</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="space-y-12">
                <div class="flex flex-col md:flex-row gap-8 items-start group" data-aos="fade-right">
                    <div class="md:w-1/4">
                        <h3 class="text-5xl font-black text-slate-200 group-hover:text-blue-600 transition-colors">1937</h3>
                    </div>
                    <div class="md:w-3/4 bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm flex-grow">
                        <h4 class="text-xl font-black uppercase text-slate-900 mb-2">Pangkalan Strategis Lembah Bromo</h4>
                        <p class="text-slate-500 text-sm leading-relaxed text-justify">
                            Dibangun antara 1937-1940 oleh Belanda sebagai Bugis Airfield. Lokasi ini dipilih secara saksama di wilayah Pakis karena dikelilingi benteng alam berupa Gunung <strong>Semeru, Arjuno, Kawi, dan Panderman</strong>. Faktor geografis dan fenomena kabut tebal menjadikannya pangkalan "siluman" yang sulit dideteksi oleh armada udara musuh pada zamannya.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-8 items-start group" data-aos="fade-left">
                    <div class="md:w-1/4">
                        <h3 class="text-5xl font-black text-slate-200 group-hover:text-blue-600 transition-colors">1994</h3>
                    </div>
                    <div class="md:w-3/4 bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm flex-grow">
                        <h4 class="text-xl font-black uppercase text-slate-900 mb-2">Transisi Menuju Penerbangan Sipil</h4>
                        <p class="text-slate-500 text-sm leading-relaxed text-justify">
                            Pangkalan ini berevolusi menjadi bandara dual-function. Pada 1 April 1994, Merpati Nusantara Airlines membuka layanan komersial pertama, menghubungkan kekuatan militer dengan kebutuhan mobilitas masyarakat sipil di Malang Raya.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-8 items-start group" data-aos="fade-right">
                    <div class="md:w-1/4">
                        <h3 class="text-5xl font-black text-slate-200 group-hover:text-blue-600 transition-colors">2011</h3>
                    </div>
                    <div class="md:w-3/4 bg-blue-900 p-8 rounded-[2rem] shadow-xl flex-grow">
                        <h4 class="text-xl font-black uppercase text-white mb-2">Modernisasi & Pengelolaan Pemprov</h4>
                        <p class="text-blue-100 text-sm leading-relaxed text-justify">
                            Pembangunan terminal baru di tahun 2011 mempertegas statusnya sebagai bandara <strong>Civil Enclave</strong>. Hingga hari ini, Abdulrachman Saleh memegang predikat unik sebagai satu-satunya bandara regional yang pengelolaannya berada di bawah wewenang <strong>Pemerintah Provinsi Jawa Timur</strong>.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-24 text-center" data-aos="fade-up">
                <div class="w-16 h-1.5 bg-blue-600 mx-auto mb-8 rounded-full"></div>
                <p class="text-2xl font-black uppercase tracking-tighter italic text-slate-900">"Swa Bhuwana Paksa" — Sayap Tanah Air</p>
                <p class="text-slate-400 text-[10px] mt-4 uppercase tracking-[0.3em] font-bold">Mengenang Sejarah, Membangun Masa Depan</p>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-slate-100 py-12">
        <div class="container mx-auto px-6 text-center text-slate-400 text-[10px] font-bold uppercase tracking-widest">
            © 2026 Abdurachman Saleh Hub Archive
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false,
            mirror: true,
            anchorPlacement: 'top-bottom',
        });
    </script>
</body>
</html>