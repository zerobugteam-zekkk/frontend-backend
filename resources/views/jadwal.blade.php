<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Penerbangan - Abdurachman Saleh Hub</title>
    
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

        .status-on-time { color: #059669; background: #ecfdf5; padding: 4px 12px; rounded-full; border: 1px solid #d1fae5; }
        .status-delay { color: #dc2626; background: #fef2f2; padding: 4px 12px; rounded-full; border: 1px solid #fee2e2; }
        .status-boarding { color: #d97706; background: #fffbeb; padding: 4px 12px; rounded-full; border: 1px solid #fef3c7; }
        .status-arrived { color: #2563eb; background: #eff6ff; padding: 4px 12px; rounded-full; border: 1px solid #dbeafe; }
        
        .glass-header {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
        }

        .tab-active { 
            background-color: #ed1c24; 
            color: white; 
            box-shadow: 0 10px 15px -3px rgba(237, 28, 36, 0.3);
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="antialiased text-slate-900">

    <nav class="glass-header text-white sticky top-0 z-50 border-b border-white/10">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="group flex items-center space-x-4 transition-all">
                <div class="bg-red-600 p-2 rounded-lg group-hover:bg-red-700 transition-colors">
                    <i class="fas fa-arrow-left text-sm"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-red-500">Kembali</span>
                    <span class="text-sm font-bold tracking-tighter uppercase">Portal Utama</span>
                </div>
            </a>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12">
        
        <div class="flex flex-col lg:flex-row justify-between items-end mb-12 gap-8">
            <div class="space-y-2">
                <h6 class="text-red-600 font-black uppercase tracking-[0.4em] text-[11px]">Flight Information Board</h6>
                <h1 class="text-5xl md:text-6xl font-black text-slate-900 tracking-tighter uppercase leading-none">
                    Jadwal <span class="text-red-600">Penerbangan</span>
                </h1>
                <p class="text-slate-500 font-medium text-lg">Bandara Internasional Abdurachman Saleh (MLG)</p>
            </div>
            
            <div class="relative w-full lg:w-96 group">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-red-600 transition-colors">
                    <i class="fas fa-search text-sm"></i>
                </span>
                <input type="text" id="flightSearch" placeholder="Cari Maskapai atau Kota Tujuan..." 
                    class="w-full pl-12 pr-6 py-4 rounded-2xl border-2 border-slate-200 focus:border-red-600 outline-none transition-all shadow-sm font-semibold text-slate-700">
            </div>
        </div>

        <div class="flex space-x-4 mb-10 overflow-x-auto pb-4">
            <button id="btn-dep" class="flex items-center space-x-3 py-4 px-8 rounded-2xl transition-all duration-300 tab-active font-black uppercase text-xs tracking-widest whitespace-nowrap" onclick="switchTab('departure')">
                <i class="fas fa-plane-departure"></i>
                <span>Keberangkatan</span>
            </button>
            <button id="btn-arr" class="flex items-center space-x-3 py-4 px-8 rounded-2xl transition-all duration-300 bg-white border border-slate-200 text-slate-500 hover:border-red-600 font-black uppercase text-xs tracking-widest whitespace-nowrap" onclick="switchTab('arrival')">
                <i class="fas fa-plane-arrival"></i>
                <span>Kedatangan</span>
            </button>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/60 border border-slate-100 overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-600 via-slate-900 to-red-600"></div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 text-slate-400 border-b border-slate-100">
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">Waktu</th>
                            <th id="column-city" class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">Tujuan</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">Maskapai</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black text-center">No. Flight</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black text-center">Gate</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">Status</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="divide-y divide-slate-50 text-slate-700">
                        </tbody>
                </table>
            </div>
        </div>

        <div class="mt-12 flex flex-col md:flex-row justify-between items-center bg-slate-900 rounded-3xl p-8 text-white gap-6">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-info-circle text-red-500"></i>
                </div>
                <div class="text-left">
                    <p class="text-xs font-bold uppercase tracking-widest opacity-60">Informasi Penting</p>
                    <p class="text-sm font-medium">Penumpang diharapkan tiba di bandara 2 jam sebelum keberangkatan.</p>
                </div>
            </div>
            <div class="text-slate-400 text-xs font-bold uppercase tracking-widest">
                <i class="fas fa-sync-alt animate-spin-slow mr-3 text-red-500"></i>
                Terakhir Diperbarui: <span id="last-update">--:--</span>
            </div>
        </div>
    </main>

    <script>
        const flights = {
            departure: [
                { time: "10:30", city: "Jakarta (CGK)", airline: "Garuda Indonesia", flight: "GA-291", gate: "G2", status: "ON TIME", class: "status-on-time" },
                { time: "11:15", city: "Surabaya (SUB)", airline: "Citilink", flight: "QG-144", gate: "G1", status: "DELAY (11:45)", class: "status-delay" },
                { time: "14:00", city: "Denpasar (DPS)", airline: "Batik Air", flight: "ID-652", gate: "G3", status: "BOARDING", class: "status-boarding" },
                { time: "15:45", city: "Jakarta (HLP)", airline: "Lion Air", flight: "JT-881", gate: "G2", status: "ON TIME", class: "status-on-time" }
            ],
            arrival: [
                { time: "08:20", city: "Jakarta (CGK)", airline: "Garuda Indonesia", flight: "GA-290", gate: "A1", status: "ARRIVED", class: "status-arrived" },
                { time: "12:10", city: "Balikpapan (BPN)", airline: "Lion Air", flight: "JT-322", gate: "A2", status: "ON TIME", class: "status-on-time" }
            ]
        };

        let activeTab = 'departure';

        function switchTab(type) {
            activeTab = type;
            const btnDep = document.getElementById('btn-dep');
            const btnArr = document.getElementById('btn-arr');
            
            if(type === 'departure') {
                btnDep.className = 'flex items-center space-x-3 py-4 px-8 rounded-2xl transition-all duration-300 tab-active font-black uppercase text-xs tracking-widest whitespace-nowrap';
                btnArr.className = 'flex items-center space-x-3 py-4 px-8 rounded-2xl transition-all duration-300 bg-white border border-slate-200 text-slate-500 hover:border-red-600 font-black uppercase text-xs tracking-widest whitespace-nowrap';
            } else {
                btnArr.className = 'flex items-center space-x-3 py-4 px-8 rounded-2xl transition-all duration-300 tab-active font-black uppercase text-xs tracking-widest whitespace-nowrap';
                btnDep.className = 'flex items-center space-x-3 py-4 px-8 rounded-2xl transition-all duration-300 bg-white border border-slate-200 text-slate-500 hover:border-red-600 font-black uppercase text-xs tracking-widest whitespace-nowrap';
            }
            
            document.getElementById('column-city').innerText = type === 'departure' ? 'Tujuan' : 'Asal';
            renderData();
        }

        function renderData(search = '') {
            const container = document.getElementById('table-body');
            const data = flights[activeTab].filter(f => 
                f.city.toLowerCase().includes(search.toLowerCase()) || 
                f.airline.toLowerCase().includes(search.toLowerCase()) ||
                f.flight.toLowerCase().includes(search.toLowerCase())
            );

            container.innerHTML = data.map(f => `
                <tr class="hover:bg-slate-50 transition-colors group border-b border-slate-50">
                    <td class="p-8 font-black text-xl tracking-tighter text-slate-900">${f.time}</td>
                    <td class="p-8">
                        <div class="flex flex-col">
                            <span class="font-black text-slate-900 text-lg uppercase">${f.city}</span>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Main Terminal</span>
                        </div>
                    </td>
                    <td class="p-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center text-xs text-slate-400">
                                <i class="fas fa-plane"></i>
                            </div>
                            <span class="font-bold text-slate-700">${f.airline}</span>
                        </div>
                    </td>
                    <td class="p-8 text-center">
                        <span class="font-black px-4 py-2 bg-slate-900 text-white rounded-lg text-xs tracking-widest">${f.flight}</span>
                    </td>
                    <td class="p-8 text-center">
                        <span class="text-slate-900 font-black text-lg">${f.gate}</span>
                    </td>
                    <td class="p-8">
                        <span class="${f.class} text-[10px] font-black uppercase tracking-widest inline-flex items-center rounded-lg">
                            <span class="w-1.5 h-1.5 bg-current rounded-full mr-2"></span>${f.status}
                        </span>
                    </td>
                </tr>
            `).join('');
            
            if(data.length === 0) {
                container.innerHTML = `<tr><td colspan="6" class="p-32 text-center">
                    <i class="fas fa-plane-slash text-4xl text-slate-200 mb-4 block"></i>
                    <span class="text-slate-400 font-bold uppercase tracking-widest">Data Tidak Ditemukan</span>
                </td></tr>`;
            }

            const now = new Date();
            document.getElementById('last-update').innerText = now.getHours().toString().padStart(2, '0') + ":" + now.getMinutes().toString().padStart(2, '0');
        }

        document.getElementById('flightSearch').addEventListener('input', (e) => renderData(e.target.value));
        renderData();
    </script>
</body>
</html>