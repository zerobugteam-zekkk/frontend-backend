<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biografi Mendalam - Prof. dr. Abdulrachman Saleh</title>

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

        .bio-scroll::-webkit-scrollbar { width: 4px; }
        .bio-scroll::-webkit-scrollbar-track { background: transparent; }
        .bio-scroll::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 10px; }
        
        .prose-custom p {
            margin-bottom: 1.5rem;
            text-indent: 1.5rem;
            line-height: 1.8;
            color: #475569;
        }

        .prose-custom h5 {
            color: #0f172a;
            border-left: 4px solid #2563eb;
            padding-left: 0.8rem;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.9rem;
        }
        .no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

    </style>
</head>

<body class="antialiased text-slate-900">

   <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
    <div class="container mx-auto px-6 py-3 flex items-center justify-between">
        <a href="/" class="flex items-center space-x-3">
            <div class="bg-blue-600 p-2 rounded-lg">
                <i class="fas fa-arrow-left text-white text-sm"></i>
            </div>
            <span class="text-sm font-black uppercase tracking-tighter text-slate-900">
                KEMBALI KE <span class="text-blue-600">Arsip Nasional</span>
            </span>
        </a>

        <div class="flex items-center gap-3 bg-slate-100/50 px-4 py-2 rounded-full border border-slate-200">
            <i class="fas fa-clock text-blue-600 text-sm"></i>
            <span id="wib-clock" class="text-xs font-bold text-slate-700 tracking-wider">
                --:--:-- WIB
            </span>
        </div>
    </div>
</nav>

<script>
    function updateClock() {
        const now = new Date();
        
        // Format waktu menjadi HH:MM:SS
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        
        const timeString = `${hours}:${minutes}:${seconds} WIB`;
        
        // Update elemen HTML
        document.getElementById('wib-clock').textContent = timeString;
    }

    // Jalankan fungsi segera dan ulangi setiap 1 detik
    updateClock();
    setInterval(updateClock, 1000);
</script>
<header class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-[#0a192f]">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1627932688000-0e1d0e1b0d2d?q=80&w=2070&auto=format&fit=crop" 
                 class="w-full h-full object-cover opacity-40 scale-105" 
                 alt="Bandara Abdulrachman Saleh Background - Jet Fighters on Runway">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a192f]/80 via-[#0a192f]/60 to-[#0a192f]"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 text-center" data-aos="fade-up">
            <div class="inline-flex items-center gap-3 mb-6 px-4 py-1.5 border border-blue-400/20 rounded-full bg-blue-500/5 backdrop-blur-md">
                <span class="relative flex h-1.5 w-1.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-blue-500"></span>
                </span>
                <h6 class="text-blue-400 font-bold uppercase tracking-[0.4em] text-[10px]">
                    Monumen Sejarah Dirgantara
                </h6>
            </div>

            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tight leading-tight mb-2">
                MANUSKRIP <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 via-blue-400 to-blue-600">HISTORIS</span>
            </h1>
            
            <div class="w-16 h-1 bg-blue-600 mx-auto my-6 rounded-full"></div>

            <h2 class="text-xl md:text-3xl font-light text-slate-200 tracking-wide mb-4">
                Prof. dr. Abdulrachman Saleh
            </h2>

            <p class="max-w-3xl mx-auto text-slate-400 text-sm md:text-base font-medium leading-relaxed italic opacity-90 px-4">
                "Manifestasi Intelektualisme Kedokteran, Pionir Gelombang Radio, 
                dan Pengabdian Tertinggi di Cakrawala Dirgantara."
            </p>

            <div class="flex flex-wrap justify-center gap-4 md:gap-8 mt-10 text-blue-400/60 font-bold text-[9px] uppercase tracking-[0.15em]">
                <span class="flex items-center gap-2 px-3 py-1 bg-white/5 rounded-md"><i class="fas fa-landmark text-[10px]"></i> Lanud ABD Saleh</span>
                <span class="flex items-center gap-2 px-3 py-1 bg-white/5 rounded-md"><i class="fas fa-microscope text-[10px]"></i> Bapak Fisiologi</span>
                <span class="flex items-center gap-2 px-3 py-1 bg-white/5 rounded-md"><i class="fas fa-broadcast-tower text-[10px]"></i> Pendiri RRI</span>
            </div>
        </div>
    </header>
    <main class="container mx-auto px-6 -mt-12 relative z-20 pb-24">
        <div class="max-w-6xl mx-auto">

            <section class="bg-white rounded-[3rem] premium-shadow overflow-hidden mb-20 border border-slate-100" data-aos="zoom-in-up">
                <div class="flex flex-col md:flex-row">
                    
                    <div class="md:w-2/5 bg-slate-900 p-8 md:p-12 flex flex-col justify-between">
                        <div>
                            <div class="relative group mb-8">
                                <img src="{{ asset('images/Abdulrachman-Saleh.jpg') }}" 
                                     alt="Abdulrachman Saleh"
                                     class="w-full h-[450px] object-cover rounded-2xl shadow-2xl sepia-filter group-hover:filter-none transition-all duration-700">
                                <div class="absolute bottom-4 left-4 right-4 bg-blue-600/90 backdrop-blur-md p-4 rounded-xl text-white">
                                    <p class="text-[10px] font-black uppercase tracking-widest mb-1 opacity-80">Motto Hidup</p>
                                    <p class="text-sm font-bold italic">"The Right Man in the Right Place"</p>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="bg-slate-800/50 p-4 rounded-xl border border-slate-700">
                                    <p class="text-blue-400 text-[10px] font-black uppercase tracking-widest">Pangkat Terakhir</p>
                                    <p class="text-white font-bold text-sm">Marsekal Muda TNI (Anumerta)</p>
                                </div>
                                <div class="bg-slate-800/50 p-4 rounded-xl border border-slate-700">
                                    <p class="text-blue-400 text-[10px] font-black uppercase tracking-widest">Penghargaan</p>
                                    <p class="text-white font-bold text-sm">Pahlawan Nasional (1974)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-3/5 p-8 md:p-16">
                        <div class="inline-block px-4 py-1 bg-blue-100 text-blue-700 text-[10px] font-black uppercase tracking-widest rounded-full mb-6">
                            Arsip Biografi Resmi
                        </div>

                        <h2 class="text-3xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter mb-2">
                            Abdulrachman Saleh
                        </h2>
                        <p class="text-blue-600 font-bold mb-8 italic text-sm">
                            Laboratorium, Udara, dan Gelombang Radio: Perjuangan Tanpa Batas.
                        </p>

                       <div class="bg-slate-50 rounded-[2rem] border border-slate-200/60 p-6 md:p-8 relative">
    <div class="bio-scroll overflow-y-auto max-h-[500px] pr-4 text-justify prose-custom">
        
        <h5>I. Intelektualitas di Masa Kolonial</h5>
        <p>
            Lahir di Jakarta pada 1 Juli 1909, Abdulrachman Saleh berasal dari keluarga terpelajar. Ayahnya, Mohammad Saleh, adalah dokter pribumi terkemuka yang dikenal memiliki disiplin tinggi dalam dunia medis kolonial. Sejak menempuh pendidikan di STOVIA (Sekolah Dokter Bumiputera) hingga Geneeskundige Hoogeschool (GHS), ia dikenal dengan julukan <strong>"Karbol"</strong> karena kecerdasannya yang melampaui rata-rata. Nama ini kini diabadikan sebagai sebutan bagi Taruna Akademi Angkatan Udara (AAU).
        </p>
        <p>
            Di lingkungan kampus, ia dikenal tidak hanya unggul secara akademis, tetapi juga aktif dalam diskusi intelektual mengenai masa depan bangsa. Ia percaya bahwa kemerdekaan sejati hanya dapat dicapai melalui penguasaan ilmu pengetahuan dan teknologi, bukan sekadar perjuangan fisik semata.
        </p>

        <h5>II. Bapak Fisiologi & Kedokteran Penerbangan</h5>
        <p>
            Setelah lulus sebagai dokter, ia menjadi pionir dalam ilmu Fisiologi. Beliau adalah orang Indonesia pertama yang menjabat sebagai Guru Besar Fisiologi. Melalui risetnya, ia meletakkan dasar Kedokteran Penerbangan (Aeromedicine) di tanah air, mempelajari bagaimana kondisi fisik manusia bereaksi saat berada di ketinggian ekstrem—sebuah ilmu yang krusial bagi dunia militer udara.
        </p>
        <p>
            Penelitiannya banyak difokuskan pada pengaruh tekanan udara, kekurangan oksigen, dan kelelahan pilot. Temuan-temuannya menjadi rujukan awal bagi sistem seleksi dan pelatihan penerbang Indonesia pada masa awal pembentukan angkatan udara nasional.
        </p>

        <h5>III. Perintis RRI & Perang Informasi</h5>
        <p>
            Kontribusinya tidak hanya di laboratorium. Berdasarkan catatan sejarah penyiaran, beliau adalah salah satu tokoh kunci berdirinya <strong>Radio Republik Indonesia (RRI)</strong> pada 11 September 1945. Beliau memimpin pertemuan para tokoh radio di Jakarta dan memastikan suara kemerdekaan tetap menggema di tengah blokade informasi penjajah.
        </p>
        <p>
            Pada masa itu, radio menjadi satu-satunya alat komunikasi yang mampu menembus batas wilayah dan propaganda kolonial. Melalui siaran radio, ia membantu menyebarkan legitimasi Republik Indonesia ke dunia internasional.
        </p>

        <h5>IV. Pangkalan Udara & Hubungan dengan Malang</h5>
        <p>
            Berdasarkan data sejarah yang dirujuk oleh Dishub Malang dan Pemerintah Daerah, nama beliau diabadikan menjadi nama <strong>Pangkalan Udara Abdulrachman Saleh</strong> di Malang. Pangkalan ini memiliki sejarah panjang sebagai salah satu basis pertahanan udara terpenting di Jawa Timur, mencerminkan dedikasi beliau dalam membangun kekuatan dirgantara di wilayah tersebut.
        </p>
        <p>
            Malang dipilih karena letaknya yang strategis, memiliki kondisi geografis ideal untuk pelatihan penerbang, serta relatif aman dari serangan langsung pada masa revolusi fisik.
        </p>

        <h5>V. Tragedi Dakota VT-CLA & Hari Bakti</h5>
        <p>
            Pada 29 Juli 1947, dalam misi kemanusiaan membawa obat-obatan sumbangan Palang Merah Malaya, pesawat Dakota VT-CLA yang ditumpanginya bersama Adisutjipto ditembak jatuh oleh dua pesawat Kittyhawk Belanda di langit Yogyakarta. Tragedi ini menjadi luka besar bagi bangsa.
        </p>
        <p>
            Pesawat tersebut sebenarnya telah memiliki tanda palang merah internasional, namun tetap diserang tanpa peringatan. Insiden ini memperlihatkan kerasnya konflik diplomatik antara Indonesia dan Belanda pada masa awal kemerdekaan.
        </p>
        <p>
            Tanggal tersebut kemudian ditetapkan sebagai <strong>Hari Bakti TNI AU</strong> untuk mengenang pengabdian tulus sang dokter-penerbang ini.
        </p>

        <h5>VI. Warisan Abadi</h5>
        <p>
            Abdulrachman Saleh adalah bukti nyata seorang teknokrat yang nasionalis. Beliau membuktikan bahwa senjata untuk merdeka tidak hanya bambu runcing, melainkan juga ilmu kedokteran yang mumpuni, teknologi radio yang canggih, dan keberanian di udara.
        </p>
        <p>
            Ia dikenang sebagai simbol intelektual pejuang: ilmuwan, komunikator, sekaligus prajurit. Warisannya hidup dalam dunia akademik, militer, dan penyiaran nasional hingga hari ini.
        </p>
    </div>
</div>


                        <div class="mt-8 flex items-center justify-between">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-blue-600 border-2 border-white flex items-center justify-center text-white text-[10px] font-bold">AS</div>
                                <div class="w-8 h-8 rounded-full bg-slate-800 border-2 border-white flex items-center justify-center text-white text-[10px] font-bold">TN</div>
                            </div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">
                                Sumber: Wikipedia & Arsip Daerah Malang
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- TIMELINE SLIDER -->
<div class="relative overflow-hidden mt-16" data-aos="fade-up">

    <!-- Buttons -->
    <button id="prevBtn" class="absolute left-2 top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg w-10 h-10 rounded-full flex items-center justify-center">
        <i class="fas fa-chevron-left"></i>
    </button>

    <button id="nextBtn" class="absolute right-2 top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg w-10 h-10 rounded-full flex items-center justify-center">
        <i class="fas fa-chevron-right"></i>
    </button>

    <!-- Slider Track -->
    <div id="timelineSlider" class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar cursor-grab px-2">

      <div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
    <h3 class="text-blue-600 font-black text-3xl mb-2">1909</h3>
    <p class="text-slate-900 font-bold text-sm mb-4">Fajar Sang Karbol</p>
    <p class="text-slate-500 text-xs leading-relaxed text-justify">
        Lahir di Jakarta, 1 Juli 1909. Sebagai putra dari dr. Mohammad Saleh, ia tumbuh di lingkungan yang mengutamakan sains. Kecerdasannya yang fenomenal di STOVIA membuatnya dijuluki "Karbol", simbol ketajaman intelektual yang kelak menjadi standar kebanggaan bagi seluruh Taruna Akademi Angkatan Udara.
    </p>
</div>

<div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
    <h3 class="text-blue-600 font-black text-3xl mb-2">1937</h3>
    <p class="text-slate-900 font-bold text-sm mb-4">Guru Besar & Kedokteran Udara</p>
    <p class="text-slate-500 text-xs leading-relaxed text-justify">
        Mendalami ilmu Fisiologi dan menjadi orang Indonesia pertama yang menjabat sebagai Guru Besar Fisiologi di GHS. Ia mulai meneliti dampak ketinggian terhadap tubuh manusia, meletakkan fondasi pertama "Aeromedicine" (Kedokteran Penerbangan) yang sangat langka di Asia pada masa itu.
    </p>
</div>

<div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
    <h3 class="text-blue-600 font-black text-3xl mb-2">1945</h3>
    <p class="text-slate-900 font-bold text-sm mb-4">Pendirian RRI</p>
    <p class="text-slate-500 text-xs leading-relaxed text-justify">
        Memimpin konsolidasi teknisi radio pasca-proklamasi. Dengan peralatan rakitan, ia memastikan suara kemerdekaan menembus blokade informasi Belanda melalui "Voice of Free Indonesia", yang menjadi embrio lahirnya Radio Republik Indonesia (RRI).
    </p>
</div>

<div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
    <h3 class="text-blue-600 font-black text-3xl mb-2">1946</h3>
    <p class="text-slate-900 font-bold text-sm mb-4">Sayap Dirgantara RI</p>
    <p class="text-slate-500 text-xs leading-relaxed text-justify">
        Bergabung dengan TRI-Udara (AURI). Bersama Adisutjipto, ia mengubah pesawat rongsokan peninggalan Jepang seperti Cureng dan Nishikoreng menjadi armada tempur pertama Indonesia, sekaligus melatih generasi pertama penerbang pribumi di tengah keterbatasan.
    </p>
</div>

<div class="min-w-[300px] md:min-w-[500px] bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
    <h3 class="text-blue-600 font-black text-3xl mb-2">1947</h3>
    <p class="text-slate-900 font-bold text-sm mb-4">Tragedi Dakota VT-CLA</p>
    <p class="text-slate-500 text-xs leading-relaxed text-justify">
        Misi kemanusiaan membawa obat-obatan dari Malaya berakhir tragis pada 29 Juli. Pesawat Dakota VT-CLA yang dikemudikannya ditembak jatuh oleh P-40 Kittyhawk Belanda di Ngoto. Peristiwa ini diperingati sebagai Hari Bakti TNI AU, simbol pengorbanan tertinggi bagi kedaulatan negara.
    </p>
</div>

<div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
    <h3 class="text-blue-600 font-black text-3xl mb-2">1952</h3>
    <p class="text-slate-900 font-bold text-sm mb-4">Abadi di Bumi Malang</p>
    <p class="text-slate-500 text-xs leading-relaxed text-justify">
        Pangkalan Udara Bugis di Malang secara resmi berganti nama menjadi Pangkalan Udara Abdulrachman Saleh. Berdasarkan catatan sejarah perhubungan, pangkalan ini dipersiapkan menjadi salah satu pangkalan udara militer paling strategis di Jawa Timur.
    </p>
</div>

<div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
    <h3 class="text-blue-600 font-black text-3xl mb-2">1974</h3>
    <p class="text-slate-900 font-bold text-sm mb-4">Penganugerahan Pahlawan Nasional</p>
    <p class="text-slate-500 text-xs leading-relaxed text-justify">
        Melalui SK Presiden No. 071/TK/1974, Abdulrachman Saleh secara resmi diangkat sebagai Pahlawan Nasional. Pengakuan ini menegaskan dedikasi multidisiplin beliau sebagai dokter, teknokrat radio, sekaligus penerbang pejuang.
    </p>
</div>

<div class="min-w-[300px] md:min-w-[400px] bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
    <h3 class="text-blue-600 font-black text-3xl mb-2">1994-2011</h3>
    <p class="text-slate-900 font-bold text-sm mb-4">Transformasi Enklave Sipil</p>
    <p class="text-slate-500 text-xs leading-relaxed text-justify">
        Lanud Abdulrachman Saleh mulai membuka diri untuk penerbangan sipil secara terbatas. Sesuai data Dishub Malang, pada tahun 2011, operasional bandara ini semakin berkembang pesat sebagai gerbang utama wisata dan ekonomi Malang Raya, menghubungkan kota ini dengan Jakarta dan Bali.
    </p>
</div>

<div class="min-w-[300px] md:min-w-[400px] bg-blue-600 p-8 rounded-[2rem] shadow-xl text-white">
    <h3 class="text-white font-black text-3xl mb-2">2026</h3>
    <p class="text-blue-100 font-bold text-sm mb-4">Warisan Tanpa Batas</p>
    <p class="text-blue-50 text-xs leading-relaxed text-justify">
        Kini, nama Abdulrachman Saleh bukan sekadar nama bandara. Semangatnya hidup dalam setiap Taruna AAU (Karbol) dan inovasi teknologi medis-militer Indonesia. Bandara ini terus bertransformasi menjadi pusat mobilitas modern di Jawa Timur, menjaga pesan abadi: "Ilmu pengetahuan adalah sayap kemerdekaan."
    </p>
</div>
    </div>
</div>


            <div class="mt-32 text-center" data-aos="zoom-in">
                <div class="w-16 h-1.5 bg-blue-600 mx-auto mb-10 rounded-full"></div>
                <p class="text-2xl md:text-4xl font-black uppercase tracking-tighter italic text-slate-900 max-w-4xl mx-auto leading-tight">
                    "Ilmu pengetahuan adalah sayap untuk terbang menuju kemerdekaan yang hakiki."
                </p>
                <p class="mt-6 text-slate-400 font-bold tracking-[0.3em] uppercase text-xs">— Prof. dr. Abdulrachman Saleh —</p>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-slate-100 py-16">
        <div class="container mx-auto px-6 text-center">
            <div class="flex justify-center gap-8 mb-8 text-slate-300">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
            </div>
            <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em]">
                &copy; 2026 Otoritas Bandara Abdulrachman Saleh - Digital Historical Archive
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
    </script>
    <script>
const slider = document.getElementById('timelineSlider');
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');

nextBtn.onclick = () => {
    slider.scrollBy({ left: 400, behavior: 'smooth' });
};

prevBtn.onclick = () => {
    slider.scrollBy({ left: -400, behavior: 'smooth' });
};

// Auto slide
setInterval(() => {
    slider.scrollBy({ left: 400, behavior: 'smooth' });
}, 4000);

// Drag to scroll
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
});

slider.addEventListener('mouseleave', () => isDown = false);
slider.addEventListener('mouseup', () => isDown = false);

slider.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 1.5;
    slider.scrollLeft = scrollLeft - walk;
});
</script>

</body>
</html>