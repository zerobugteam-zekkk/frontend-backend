<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Penerbangan - Abdurachman Saleh Hub</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@500&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            background-image: radial-gradient(#2563eb05 1px, transparent 1px);
            background-size: 30px 30px;
        }

        /* Status Badges */
        .status-on-time { color: #059669; background: #ecfdf5; padding: 6px 12px; border-radius: 8px; border: 1px solid #d1fae5; }
        .status-delay { color: #dc2626; background: #fef2f2; padding: 6px 12px; border-radius: 8px; border: 1px solid #fee2e2; }
        .status-boarding { color: #2563eb; background: #eff6ff; padding: 6px 12px; border-radius: 8px; border: 1px solid #dbeafe; animation: blink 2s infinite; }
        .status-arrived { color: #1e40af; background: #e0e7ff; padding: 6px 12px; border-radius: 8px; border: 1px solid #c7d2fe; }
        .status-departed { color: #64748b; background: #f1f5f9; padding: 6px 12px; border-radius: 8px; border: 1px solid #e2e8f0; }

        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0.6; }
            100% { opacity: 1; }
        }

        .glass-header {
            background: rgba(30, 58, 138, 0.98);
            backdrop-filter: blur(10px);
        }

        .tab-active {
            background-color: #2563eb;
            color: white;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        }

        .mono-font { font-family: 'JetBrains Mono', monospace; }

        .animate-spin-slow {
            animation: spin 3s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #2563eb; border-radius: 10px; }
    </style>
</head>
<body class="antialiased text-slate-900 overflow-x-hidden">

    <nav class="glass-header text-white sticky top-0 z-50 border-b border-white/10">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center">
                <a href="/" class="group flex items-center space-x-4 transition-all">
                    <div class="bg-white/10 p-2 rounded-lg group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-arrow-left text-sm"></i>
                    </div>
                    <div class="flex flex-col border-l border-white/20 pl-4">
                        <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-400 leading-none">Kembali</span>
                        <span class="text-sm font-bold tracking-tighter uppercase mt-1">Beranda</span>
                    </div>
                </a>
            </div>

            <div class="flex items-center space-x-6 text-right">
                <div class="hidden md:flex flex-col justify-center border-r border-white/20 pr-6">
                    <span class="text-[10px] font-black uppercase tracking-[0.4em] text-blue-400 leading-none mb-1">Status Sistem</span>
                    <span class="text-[10px] font-bold text-white/60">Live Operational</span>
                </div>
                <div class="flex flex-col justify-center">
                    <span id="header-time" class="text-2xl font-black mono-font text-blue-400 leading-none tracking-tighter">00:00:00</span>
                    <span id="header-date" class="text-[9px] font-bold uppercase tracking-widest mt-1 opacity-60 text-white">MEMUAT TANGGAL...</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12 md:py-20">

        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-16 gap-8" data-aos="fade-down">
            <div class="space-y-4">
                <h6 class="text-blue-600 font-black uppercase tracking-[0.4em] text-[11px] border-b-2 border-blue-600 w-fit pb-1">Flight Information Display</h6>
                <h1 class="text-5xl md:text-7xl font-black text-slate-900 tracking-tighter uppercase leading-none">
                    Jadwal <br><span class="text-blue-600">Penerbangan</span>
                </h1>
                <p class="text-slate-500 font-medium text-lg italic no-italic">Bandara Abdurachman Saleh (MLG)</p>
            </div>

            <div class="relative w-full lg:w-96 group">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-blue-600 transition-colors">
                    <i class="fas fa-search text-sm"></i>
                </span>
                <input type="text" id="flightSearch" placeholder="Cari maskapai atau nomor..."
                    class="w-full pl-12 pr-6 py-4 rounded-2xl border-2 border-slate-200 focus:border-blue-600 outline-none transition-all shadow-sm font-semibold text-slate-700">
            </div>
        </div>

        <div class="flex space-x-4 mb-10 overflow-x-auto pb-4" data-aos="fade-right">
            <button id="btn-dep" class="flex items-center space-x-3 py-4 px-10 rounded-2xl transition-all duration-300 tab-active font-black uppercase text-xs tracking-widest whitespace-nowrap" onclick="switchTab('departure')">
                <i class="fas fa-plane-departure"></i>
                <span>Keberangkatan</span>
            </button>
            <button id="btn-arr" class="flex items-center space-x-3 py-4 px-10 rounded-2xl transition-all duration-300 bg-white border border-slate-200 text-slate-500 hover:border-blue-600 font-black uppercase text-xs tracking-widest whitespace-nowrap" onclick="switchTab('arrival')">
                <i class="fas fa-plane-arrival"></i>
                <span>Kedatangan</span>
            </button>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-900/5 border border-slate-100 overflow-hidden relative" data-aos="fade-up">
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-blue-700 via-blue-400 to-blue-700"></div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 text-slate-400 border-b border-slate-100">
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">Waktu</th>
                            <th id="column-city" class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">Tujuan</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">Maskapai</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black text-center">No. Penerbangan</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black text-center">Gate</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">Status</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="divide-y divide-slate-50 text-slate-700 font-medium">
                        </tbody>
                </table>
            </div>
        </div>

        <div class="mt-12 flex flex-col md:flex-row justify-between items-center bg-blue-950 rounded-[2rem] p-8 text-white gap-6 shadow-xl" data-aos="zoom-in">
            <div class="flex items-center space-x-5">
                <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center border border-white/10">
                    <i class="fas fa-sync-alt animate-spin-slow text-blue-400 text-xl"></i>
                </div>
                <div class="text-left">
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-400 mb-1">Live Update Active</p>
                    <p class="text-sm font-medium leading-relaxed opacity-90">Status diperbarui otomatis setiap menit berdasarkan sistem navigasi.</p>
                </div>
            </div>
            <div class="flex items-center bg-white/5 px-6 py-3 rounded-full border border-white/5">
                <span class="text-slate-400 text-[10px] font-black uppercase tracking-widest flex items-center">
                    Last Update: <span id="last-update" class="text-white ml-2">--:--</span>
                </span>
            </div>
        </div>

        <section class="mt-28 border-t border-slate-200 pt-16 pb-12" data-aos="fade-up">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tighter mb-10">Pusat Informasi Operasional <span class="text-blue-600 italic">Abdurachman Saleh</span></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 text-slate-500 text-sm leading-relaxed">
            <div class="space-y-6">
                <p>
                    Layanan <strong>Flight Information Display System (FIDS)</strong> ini menyajikan data pergerakan pesawat udara secara *real-time* di Terminal Kedatangan dan Keberangkatan Bandara Abdurachman Saleh Malang. Seluruh informasi jadwal diperbarui secara otomatis melalui integrasi sistem navigasi udara.
                </p>
                <p>
                    Sesuai prosedur operasional, status <strong>BOARDING</strong> diaktifkan 30 menit sebelum waktu keberangkatan (STD). Bagi seluruh calon penumpang diwajibkan telah menyelesaikan proses pelaporan diri (*check-in*) selambat-lambatnya 45 menit sebelum jadwal keberangkatan yang tertera pada tiket.
                </p>
            </div>
            <div class="space-y-6">
                <p>
                    Mengingat karakteristik bandara sebagai kawasan *joint-user*, perubahan jadwal dapat terjadi sewaktu-waktu karena alasan operasional, teknis, maupun aktivitas kedaulatan negara. Penumpang diimbau untuk selalu menyimak pengumuman melalui *Public Address System* di ruang tunggu terminal.
                </p>
                <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100">
                    <ul class="space-y-3 font-bold text-slate-800 uppercase text-[10px] tracking-widest">
                        <li class="flex items-center"><i class="fas fa-info-circle text-blue-600 mr-3"></i> Pembaruan Data Terpusat (60 Detik)</li>
                        <li class="flex items-center"><i class="fas fa-plane text-blue-600 mr-3"></i> Sinkronisasi Seluruh Maskapai Nasional</li>
                        <li class="flex items-center"><i class="fas fa-shield-alt text-blue-600 mr-3"></i> Berdasarkan Standar Keselamatan Penerbangan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
    </main>

    <footer class="py-12 text-center border-t border-slate-100 bg-white">
        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.6em]">
            © 2026 Abdurachman Saleh Air Terminal - MLG Information System
        </p>
    </footer>

    {{-- JavaScript Functions --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
/* =============================
   CONFIG
============================= */
let flightsData = [];
let activeTab = 'departure';

let lastApiFetch = 0;
const API_INTERVAL = 10 * 60 * 1000; // 10 menit

/* =============================
   SKELETON LOADING
============================= */
function renderSkeleton(rows = 5) {
    const container = document.getElementById('table-body');
    container.innerHTML = Array.from({ length: rows }).map(() => `
        <tr class="animate-pulse">
            <td class="p-8"><div class="h-8 w-20 bg-slate-200 rounded"></div></td>
            <td class="p-8">
                <div class="h-5 w-48 bg-slate-200 rounded mb-2"></div>
                <div class="h-3 w-24 bg-slate-100 rounded"></div>
            </td>
            <td class="p-8"><div class="h-5 w-32 bg-slate-200 rounded"></div></td>
            <td class="p-8 text-center"><div class="h-6 w-20 bg-slate-200 rounded mx-auto"></div></td>
            <td class="p-8 text-center"><div class="h-6 w-10 bg-slate-200 rounded mx-auto"></div></td>
            <td class="p-8"><div class="h-6 w-24 bg-slate-200 rounded"></div></td>
        </tr>
    `).join('');
}

/* =============================
   LOAD DATA (API CERDAS)
============================= */
async function loadFlights(force = false) {
    const now = Date.now();

    // ❌ Jangan hit API kalau belum waktunya
    if (!force && flightsData.length && (now - lastApiFetch < API_INTERVAL)) {
        renderData();
        return;
    }

    renderSkeleton();

    try {
        const res = await fetch(`/api/flights?airport=MLG&type=${activeTab}`);
        const json = await res.json();

        flightsData = json.data || [];
        lastApiFetch = now;

        renderData();
    } catch (e) {
        console.error("Gagal ambil data flight", e);
        document.getElementById('table-body').innerHTML = `
            <tr>
                <td colspan="6" class="p-10 text-center text-red-600 font-bold">
                    Gagal memuat data penerbangan
                </td>
            </tr>
        `;
    }
}

/* =============================
   CLOCK HEADER
============================= */
function updateHeaderClock() {
    const now = new Date();
    document.getElementById('header-time').innerText =
        now.toLocaleTimeString('id-ID');
    document.getElementById('header-date').innerText =
        now.toLocaleDateString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        }).toUpperCase();
}

/* =============================
   STATUS SIMULATION (REAL-TIME PALSU)
============================= */
function getFlightStatus(timeStr, type) {
    const now = new Date();
    const [h, m] = timeStr.split(':').map(Number);
    const flightTime = new Date();
    flightTime.setHours(h, m, 0);

    const diff = (flightTime - now) / 60000;

    if (type === 'departure') {
        if (diff < -10) return { label: "DEPARTED", class: "status-departed" };
        if (diff <= 0) return { label: "FINAL CALL", class: "status-delay" };
        if (diff <= 35) return { label: "BOARDING", class: "status-boarding" };
        return { label: "ON TIME", class: "status-on-time" };
    } else {
        if (diff < -5) return { label: "ARRIVED", class: "status-arrived" };
        if (diff <= 15) return { label: "LANDING", class: "status-boarding" };
        return { label: "EN ROUTE", class: "status-on-time" };
    }
}

/* =============================
   RENDER TABLE
============================= */
function renderData() {
    const container = document.getElementById('table-body');
    const search = document.getElementById('flightSearch').value.toLowerCase();

    const data = flightsData.filter(f =>
        f.airline.toLowerCase().includes(search) ||
        f.flight.toLowerCase().includes(search)
    );

    container.innerHTML = data.map(f => {
        const status = getFlightStatus(f.time, activeTab);
        return `
            <tr class="hover:bg-blue-50/50 transition-all">
                <td class="p-8 font-black text-2xl mono-font">${f.time}</td>
                <td class="p-8">
                    <span class="font-black uppercase">${f.city}</span>
                    <span class="block text-[10px] text-blue-600">Main Hub MLG</span>
                </td>
                <td class="p-8 font-bold uppercase">${f.airline}</td>
                <td class="p-8 text-center">
                    <span class="bg-slate-900 text-white px-4 py-2 rounded-lg text-xs">
                        ${f.flight}
                    </span>
                </td>
                <td class="p-8 text-center font-black">${f.gate}</td>
                <td class="p-8">
                    <span class="${status.class} text-[10px] font-black uppercase">
                        ${status.label}
                    </span>
                </td>
            </tr>
        `;
    }).join('');

    document.getElementById('last-update').innerText =
        new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
}

/* =============================
   TAB SWITCH
============================= */
function switchTab(type) {
    activeTab = type;

    document.getElementById('column-city').innerText =
        type === 'departure' ? 'Tujuan' : 'Asal';

    loadFlights(true); // paksa API saat ganti tab
}

/* =============================
   INIT
============================= */
document.getElementById('flightSearch').addEventListener('input', renderData);

AOS.init({ duration: 800, once: true });

updateHeaderClock();
loadFlights(true);

/* =============================
   INTERVALS
============================= */
setInterval(updateHeaderClock, 1000);

// update status tiap menit (TANPA API)
setInterval(() => renderData(), 60000);

// cek API tiap menit, tapi hit hanya kalau cache expired
setInterval(() => loadFlights(false), 60000);
</script>

</body>
</html>
