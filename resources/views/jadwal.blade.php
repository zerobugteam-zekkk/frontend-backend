<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.schedule.meta.title') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@500&display=swap');

        :root {
            --brand-blue: #2563eb;
            --dark-bg: #020617;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        /* Status Badges - Refined */
        .status-badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: inline-flex;
            align-items: center;
        }

        .status-on-time {
            color: #059669;
            background: #ecfdf5;
            border: 1px solid #d1fae5;
        }

        .status-delay {
            color: #dc2626;
            background: #fef2f2;
            border: 1px solid #fee2e2;
        }

        .status-boarding {
            color: #2563eb;
            background: #eff6ff;
            border: 1px solid #dbeafe;
            animation: pulse-blue 2s infinite;
        }

        .status-arrived {
            color: #1e40af;
            background: #e0e7ff;
            border: 1px solid #c7d2fe;
        }

        .status-departed {
            color: #64748b;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
        }

        @keyframes pulse-blue {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(0.98);
            }
        }

        .mono-font {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #020617;
        }

        ::-webkit-scrollbar-thumb {
            background: #2563eb;
            border-radius: 10px;
        }

        /* Smooth Glass Transitions */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
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
@include('chatbot')
<body class="antialiased text-slate-900 overflow-x-hidden bg-slate-50">

    <nav class="fixed top-0 w-full z-50 bg-slate-950/80 backdrop-blur-md border-b border-white/5">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">

            {{-- LEFT --}}
            <a href="{{ url('/') }}" class="group flex items-center space-x-4">
                <div
                    class="bg-blue-600 p-2 rounded-lg group-hover:bg-blue-500 transition-all duration-300 shadow-lg shadow-blue-600/20">
                    <i class="fas fa-arrow-left text-white text-xs"></i>
                </div>

                <div class="flex flex-col border-l border-white/10 pl-4">
                    <span class="text-[9px] font-black uppercase tracking-[0.3em] text-blue-400 leading-none">
                        {{ __('messages.schedule.nav.back_kicker') }}
                    </span>

                    <span class="text-sm font-bold tracking-tighter uppercase mt-1 text-white">
                        {{ __('messages.schedule.nav.back_label') }}
                    </span>
                </div>
            </a>

            {{-- RIGHT --}}
            <div class="flex items-center space-x-8">

                {{-- STATUS --}}
                <div class="hidden md:flex flex-col text-right">
                    <span class="text-[9px] font-black uppercase tracking-[0.3em] text-blue-500 mb-0.5">
                        {{ __('messages.schedule.nav.system_status') }}
                    </span>

                    <span class="text-[10px] font-bold text-green-400 flex items-center justify-end">
                        <span class="w-1.5 h-1.5 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        {{ __('messages.schedule.nav.system_status_value') }}
                    </span>
                </div>

                {{-- CLOCK --}}
                <div class="flex flex-col text-right border-l border-white/10 pl-8">
                    <span id="header-time"
                        class="text-xl font-black mono-font text-white leading-none tracking-tighter italic">
                        00:00:00
                    </span>

                    <span id="header-date" class="text-[9px] font-bold uppercase tracking-widest mt-1.5 text-slate-400">
                        {{ __('messages.schedule.nav.date_loading') }}
                    </span>
                </div>

                {{-- LANGUAGE SWITCH --}}
                <div class="flex items-center space-x-2 border-l border-white/10 pl-6">

                    <a href="{{ route('lang.switch', 'id') }}"
                        class="px-2 py-1 rounded-md text-xs font-semibold transition
                    {{ app()->getLocale() === 'id'
                        ? 'bg-blue-600 text-white'
                        : 'bg-white/10 border border-white/20 text-white hover:bg-white/20' }}">

                        ID
                    </a>

                    <a href="{{ route('lang.switch', 'en') }}"
                        class="px-2 py-1 rounded-md text-xs font-semibold transition
                    {{ app()->getLocale() === 'en'
                        ? 'bg-blue-600 text-white'
                        : 'bg-white/10 border border-white/20 text-white hover:bg-white/20' }}">

                        EN
                    </a>

                </div>

            </div>
        </div>
    </nav>

    <header class="relative min-h-[90vh] flex flex-col justify-center bg-slate-950 font-formal overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/Bandara Malang Abdurachman Saleh.jpg') }}"
                class="absolute inset-0 w-full h-full object-cover opacity-40 scale-105" alt="Jadwal Penerbangan">

            <div class="absolute inset-0 opacity-10 mix-blend-overlay">
                <img src="https://www.transparenttextures.com/patterns/carbon-fibre.png"
                    class="w-full h-full object-cover">
            </div>

            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
        </div>

        {{-- LOGO BRANDING POJOK KANAN (Positioned at top-24) --}}
        <div class="absolute top-24 right-6 md:right-8 z-30 flex items-center gap-3 md:gap-5 px-4 py-2.5 md:px-5 md:py-3 rounded-2xl bg-white/5 backdrop-blur-xl border border-white/10 shadow-2xl animate-float"
            data-aos="fade-down" data-aos-duration="1000">

            <div class="flex items-center gap-2.5 group">
                <img src="{{ asset('images/dishupmalang.jpg') }}" alt="Logo Dishub"
                    class="h-8 md:h-11 w-auto object-contain drop-shadow-md transition-transform duration-300 group-hover:scale-110">
                <div class="hidden sm:flex flex-col border-l border-white/20 pl-2.5 py-0.5">
                    <span class="text-white text-[7px] font-bold tracking-widest uppercase opacity-50">Dinas</span>
                    <span
                        class="text-white text-[10px] font-black tracking-tight uppercase leading-none">Perhubungan</span>
                    <span class="text-blue-400 text-[7px] font-medium tracking-widest uppercase mt-0.5">Kab.
                        Malang</span>
                </div>
            </div>

            <div class="h-6 w-[1px] bg-white/20 mx-0.5"></div>

            <div class="flex items-center gap-2.5 group">
                <img src="{{ asset('images/kotamalang.png') }}" alt="Logo Malang"
                    class="h-8 md:h-11 w-auto object-contain drop-shadow-md transition-transform duration-300 group-hover:scale-110">
                <div class="hidden sm:flex flex-col border-l border-white/20 pl-2.5 py-0.5">
                    <span class="text-white text-[7px] font-bold tracking-widest uppercase opacity-50">Pemerintah</span>
                    <span class="text-white text-[10px] font-black tracking-tight uppercase leading-none">Kota
                        Malang</span>
                    <span class="text-yellow-500 text-[7px] font-medium tracking-widest uppercase mt-0.5">Jawa
                        Timur</span>
                </div>
            </div>
        </div>

        {{-- Content Area --}}
        <div class="container mx-auto px-6 relative z-10">
            {{-- pb-32 memberikan space besar di bawah tombol/search bar --}}
            <div class="max-w-4xl pt-32 pb-32">
                {{-- Kicker Badge --}}
                <div class="inline-flex items-center gap-3 mb-8 px-4 py-1.5 border border-blue-400/20 rounded-full bg-blue-500/5 backdrop-blur-md"
                    data-aos="fade-right">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-ping"></span>
                    <h6 class="text-blue-400 font-bold uppercase tracking-[0.4em] text-[10px]">
                        {{ __('messages.schedule.hero.kicker') }}
                    </h6>
                </div>

                {{-- Title --}}
                <div class="mb-10" data-aos="fade-right" data-aos-delay="100">
                    <h1 class="text-6xl md:text-8xl font-black text-white leading-[1.05] uppercase tracking-tighter">
                        {{ __('messages.schedule.hero.title_1') }} <br>
                        <span
                            class="text-transparent border-y-2 border-blue-600 bg-clip-text bg-gradient-to-r from-white via-blue-200 to-blue-500 pt-4 pb-4 inline-block">
                            {{ __('messages.schedule.hero.title_2') }}
                        </span>
                    </h1>
                </div>

                {{-- Subtitle / Description --}}
                <div class="max-w-2xl mb-12" data-aos="fade-up" data-aos-delay="200">
                    <p
                        class="text-slate-400 text-base md:text-xl leading-relaxed border-l-4 border-blue-600 pl-6 text-justify italic opacity-90">
                        {{ __('messages.schedule.hero.subtitle') }}
                    </p>
                </div>

                {{-- Tabs & Search Area --}}
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6 mt-12" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="flex p-1.5 bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl shadow-xl">
                        <button id="btn-dep" onclick="switchTab('departure')"
                            class="flex items-center space-x-3 py-3 px-8 rounded-xl transition-all duration-500 text-slate-400 hover:text-white font-black uppercase text-[10px] tracking-widest whitespace-nowrap">
                            <i class="fas fa-plane-departure text-blue-500"></i>
                            <span>{{ __('messages.schedule.tabs.departure') }}</span>
                        </button>
                        <button id="btn-arr" onclick="switchTab('arrival')"
                            class="flex items-center space-x-3 py-3 px-8 rounded-xl transition-all duration-500 text-slate-400 hover:text-white font-black uppercase text-[10px] tracking-widest whitespace-nowrap">
                            <i class="fas fa-plane-arrival text-blue-500"></i>
                            <span>{{ __('messages.schedule.tabs.arrival') }}</span>
                        </button>
                    </div>

                    <div class="relative w-full md:w-80 group">
                        <i
                            class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-blue-500 transition-colors"></i>
                        <input type="text" id="flightSearch"
                            placeholder="{{ __('messages.schedule.search.placeholder') }}"
                            class="w-full pl-14 pr-6 py-4 rounded-2xl bg-white/5 border border-white/10 text-white placeholder:text-slate-600 outline-none focus:border-blue-600 focus:bg-white/10 transition-all font-semibold shadow-inner">
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Decorative Spacer (Garis halus dan gradient untuk transisi smooth) --}}
        <div class="absolute bottom-0 left-0 w-full">
            <div class="h-24 bg-gradient-to-t from-slate-950 to-transparent"></div>
            <div class="h-px w-full bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
        </div>
    </header>

    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 5s ease-in-out infinite;
        }
    </style>
    <main class="container mx-auto px-6 -mt-16 relative z-30 pb-20">
        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-900/10 border border-slate-100 overflow-hidden"
            data-aos="fade-up">
            <div class="h-2 bg-gradient-to-r from-blue-700 via-blue-400 to-blue-700"></div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/80 text-slate-400 border-b border-slate-100">
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">
                                {{ __('messages.schedule.table.time') }}</th>
                            <th id="column-city" class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">
                                {{ __('messages.schedule.table.destination') }}</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">
                                {{ __('messages.schedule.table.airline') }}</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black text-center">
                                {{ __('messages.schedule.table.flight_no') }}</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black text-center">
                                {{ __('messages.schedule.table.gate') }}</th>
                            <th class="p-8 uppercase text-[10px] tracking-[0.3em] font-black">
                                {{ __('messages.schedule.table.status') }}</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="divide-y divide-slate-50 text-slate-700 font-medium">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8 flex flex-col md:flex-row justify-between items-center bg-slate-900 rounded-[2rem] p-8 text-white gap-6 shadow-xl border border-white/5"
            data-aos="fade-up">
            <div class="flex items-center space-x-6">
                <div
                    class="w-14 h-14 bg-blue-600/20 rounded-2xl flex items-center justify-center border border-blue-600/20">
                    <i class="fas fa-sync-alt animate-spin-slow text-blue-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-400 mb-1">
                        {{ __('messages.schedule.live.kicker') }}
                    </p>
                    <p class="text-sm font-medium opacity-70">
                        {{ __('messages.schedule.live.desc') }}
                    </p>
                </div>
            </div>
            <div class="bg-white/5 px-6 py-3 rounded-full border border-white/5">
                <span class="text-slate-400 text-[10px] font-black uppercase tracking-widest">
                    {{ __('messages.schedule.live.last_updated') }} :
                    <span id="last-update" class="text-white ml-2 mono-font">--:--</span>
                </span>
            </div>
        </div>

        <section class="mt-28 border-t border-slate-200 pt-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                <div class="lg:col-span-1">
                    <h2 class="text-4xl font-black text-slate-900 uppercase tracking-tighter leading-none mb-6">
                        {{ __('messages.schedule.info.title') }}<br>
                        <span class="text-blue-600">{{ __('messages.schedule.info.title_accent') }}</span>
                    </h2>
                    <div class="w-20 h-1.5 bg-blue-600 rounded-full"></div>
                </div>
                <div
                    class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-12 text-slate-500 text-sm leading-relaxed">
                    <div class="space-y-6">
                        <p>{!! __('messages.schedule.info.p1') !!}</p>
                        <p>{!! __('messages.schedule.info.p2') !!}</p>
                    </div>
                    <div class="space-y-8">
                        <p>{!! __('messages.schedule.info.p3') !!}</p>
                        <div class="bg-slate-100 p-8 rounded-[2rem] border border-slate-200 shadow-inner">
                            <ul class="space-y-4 font-bold text-slate-800 uppercase text-[9px] tracking-[0.15em]">
                                <li class="flex items-center"><i
                                        class="fas fa-check-circle text-blue-600 mr-4 text-sm"></i>
                                    {{ __('messages.schedule.info.bullets.1') }}</li>
                                <li class="flex items-center"><i
                                        class="fas fa-check-circle text-blue-600 mr-4 text-sm"></i>
                                    {{ __('messages.schedule.info.bullets.2') }}</li>
                                <li class="flex items-center"><i
                                        class="fas fa-check-circle text-blue-600 mr-4 text-sm"></i>
                                    {{ __('messages.schedule.info.bullets.3') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-12 text-center bg-white border-t border-slate-100">
        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.8em]">
            &copy; {{ date('Y') }} {{ __('messages.schedule.footer.copyright') }}
        </p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // JS Logic tetap sama namun dengan penyesuaian visualisasi status
        const APP_LOCALE = "{{ app()->getLocale() }}";
        const JS_LOCALE = (APP_LOCALE === 'id') ? 'id-ID' : 'en-US';

        const T = @js([
    'destination' => __('messages.schedule.table.destination'),
    'origin' => __('messages.schedule.table.origin'),
    'main_hub' => __('messages.schedule.table.main_hub'),
    'error_load' => __('messages.schedule.js.error_load'),
    'status' => [
        'departed' => __('messages.schedule.status.departed'),
        'last_call' => __('messages.schedule.status.last_call'),
        'boarding' => __('messages.schedule.status.boarding'),
        'on_time' => __('messages.schedule.status.on_time'),
        'arrived' => __('messages.schedule.status.arrived'),
        'landing' => __('messages.schedule.status.landing'),
        'en_route' => __('messages.schedule.status.en_route'),
    ],
]);

        let flightsData = [];
        let activeTab = 'departure';

        // Skeleton, API Load, Clock functions...
        // [Fungsi JavaScript Anda tetap bekerja di sini dengan sempurna]

        function renderSkeleton() {
            const container = document.getElementById('table-body');
            container.innerHTML = Array.from({
                length: 5
            }).map(() => `
                <tr class="animate-pulse">
                    <td class="p-8"><div class="h-8 w-20 bg-slate-100 rounded-lg"></div></td>
                    <td class="p-8"><div class="h-6 w-48 bg-slate-100 rounded mb-2"></div><div class="h-3 w-20 bg-slate-50 rounded"></div></td>
                    <td class="p-8"><div class="h-6 w-32 bg-slate-100 rounded"></div></td>
                    <td class="p-8 text-center"><div class="h-8 w-20 bg-slate-100 rounded-lg mx-auto"></div></td>
                    <td class="p-8 text-center"><div class="h-6 w-8 bg-slate-100 rounded mx-auto"></div></td>
                    <td class="p-8"><div class="h-8 w-24 bg-slate-100 rounded-lg"></div></td>
                </tr>
            `).join('');
        }

        async function loadFlights(force = false) {
            renderSkeleton();
            try {
                const res = await fetch(`/api/flights?airport=MLG&type=${activeTab}`);
                const json = await res.json();
                flightsData = json.data || [];
                renderData();
            } catch (e) {
                document.getElementById('table-body').innerHTML =
                    `<tr><td colspan="6" class="p-20 text-center text-red-500 font-bold">${T.error_load}</td></tr>`;
            }
        }

        function getFlightStatus(timeStr, type) {
            const now = new Date();
            const [h, m] = (timeStr || '00:00').split(':').map(Number);
            const flightTime = new Date();
            flightTime.setHours(h, m, 0, 0);
            const diff = (flightTime - now) / 60000;

            if (type === 'departure') {
                if (diff < -10) return {
                    label: T.status.departed,
                    class: "status-departed"
                };
                if (diff <= 0) return {
                    label: T.status.last_call,
                    class: "status-delay"
                };
                if (diff <= 35) return {
                    label: T.status.boarding,
                    class: "status-boarding"
                };
                return {
                    label: T.status.on_time,
                    class: "status-on-time"
                };
            } else {
                if (diff < -5) return {
                    label: T.status.arrived,
                    class: "status-arrived"
                };
                if (diff <= 15) return {
                    label: T.status.landing,
                    class: "status-boarding"
                };
                return {
                    label: T.status.en_route,
                    class: "status-on-time"
                };
            }
        }

        function renderData() {
            const container = document.getElementById('table-body');
            const search = document.getElementById('flightSearch').value.toLowerCase();

            const data = flightsData.filter(f =>
                (f.airline || '').toLowerCase().includes(search) ||
                (f.flight || '').toLowerCase().includes(search)
            ).sort((a, b) => (a.time || '').localeCompare(b.time || ''));

            container.innerHTML = data.map(f => {
                const status = getFlightStatus(f.time, activeTab);
                return `
                    <tr class="hover:bg-blue-50/40 transition-all group">
                        <td class="p-8 font-black text-2xl mono-font italic text-slate-900">${f.time ?? '--:--'}</td>
                        <td class="p-8">
                            <span class="font-black uppercase text-slate-800 tracking-tight">${f.city ?? 'Unknown'}</span>
                            <span class="block text-[10px] text-blue-600 font-bold mt-1 tracking-widest">${T.main_hub}</span>
                        </td>
                        <td class="p-8 font-bold uppercase text-slate-500 group-hover:text-slate-900 transition-colors">${f.airline ?? '-'}</td>
                        <td class="p-8 text-center">
                            <span class="bg-slate-900 text-white px-4 py-2 rounded-xl text-[10px] font-black tracking-widest">
                                ${f.flight ?? '-'}
                            </span>
                        </td>
                        <td class="p-8 text-center font-black text-slate-900 italic">${f.gate ?? '-'}</td>
                        <td class="p-8">
                            <span class="status-badge ${status.class}">${status.label}</span>
                        </td>
                    </tr>
                `;
            }).join('');

            document.getElementById('last-update').innerText = new Date().toLocaleTimeString(JS_LOCALE, {
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function switchTab(type) {
            activeTab = type;
            document.getElementById('btn-dep').classList.toggle('tab-active', type === 'departure');
            document.getElementById('btn-arr').classList.toggle('tab-active', type === 'arrival');
            document.getElementById('column-city').innerText = (type === 'departure') ? T.destination : T.origin;
            loadFlights(true);
        }

        function updateHeaderClock() {
            const now = new Date();
            document.getElementById('header-time').innerText = now.toLocaleTimeString(JS_LOCALE);
            document.getElementById('header-date').innerText = now.toLocaleDateString(JS_LOCALE, {
                weekday: 'long',
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            }).toUpperCase();
        }

        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({
                duration: 800,
                once: true
            });
            document.getElementById('flightSearch').addEventListener('input', renderData);
            updateHeaderClock();
            loadFlights(true);
            setInterval(updateHeaderClock, 1000);
        });
    </script>
</body>

</html>
