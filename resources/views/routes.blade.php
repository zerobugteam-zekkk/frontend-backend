<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.routes_page.meta.title') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap');

        body { font-family: 'Inter', sans-serif; background-color: #f4f7fa; overflow-x: hidden; }
        .bg-aviation-blue { background-color: #0054a6; }
        .text-aviation-blue { color: #0054a6; }
        .border-aviation-blue { border-color: #0054a6; }
        .premium-shadow { box-shadow: 0 50px 100px -20px rgba(0, 84, 166, 0.08), 0 30px 60px -30px rgba(0, 0, 0, 0.1); }
        .route-dashed { background-image: linear-gradient(to right, #0054a6 50%, transparent 50%); background-size: 15px 2px; background-repeat: repeat-x; }

        @keyframes planeFly { 0% { left: 0%; opacity: 0; } 10% { opacity: 1; } 90% { opacity: 1; } 100% { left: 100%; opacity: 0; } }
        .animate-plane { animation: planeFly 4s cubic-bezier(0.4, 0, 0.2, 1) infinite; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #0054a6; border-radius: 10px; }

        .pulse-live { animation: pulse-green 2s infinite; }
        @keyframes pulse-green { 0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4); } 70% { box-shadow: 0 0 0 10px rgba(34, 197, 94, 0); } 100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); } }
    </style>
</head>

<body class="antialiased text-slate-900">

    <nav class="bg-white/95 backdrop-blur-xl sticky top-0 z-50 border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="bg-aviation-blue p-2 rounded-xl group-hover:rotate-12 transition-transform">
                    <i class="fas fa-arrow-left text-white text-xs"></i>
                </div>
                <span class="text-xs font-black uppercase tracking-widest text-slate-900">
                    {{ __('messages.routes_page.nav.back') }}
                    <span class="text-aviation-blue">{{ __('messages.routes_page.nav.back_highlight') }}</span>
                </span>
            </a>

            <div class="hidden md:flex items-center space-x-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">
                <i class="fas fa-clock text-aviation-blue"></i>
                <span id="realtime-clock">{{ __('messages.routes_page.nav.loading_time') }}</span>
            </div>
        </div>
    </nav>

    <header class="relative bg-slate-900 py-32 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/10 -skew-x-12 translate-x-20"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-aviation-blue/20 rounded-full blur-[100px]"></div>

        <div class="relative z-10 container mx-auto px-6 text-center" data-aos="fade-down">
            <h6 class="text-blue-400 font-black uppercase tracking-[0.6em] text-[10px] mb-6">
                {{ __('messages.routes_page.hero.badge') }}
            </h6>

            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter uppercase mb-8 leading-[0.8]">
                {{ __('messages.routes_page.hero.title_1') }}
                <span class="text-blue-400 italic">{{ __('messages.routes_page.hero.title_2') }}</span><br>
                {{ __('messages.routes_page.hero.title_3') }}
            </h1>

            <p class="text-slate-400 max-w-[900px] mx-auto text-sm md:text-base font-medium leading-7 md:leading-8 text-center">
                {{ __('messages.routes_page.hero.desc') }}
            </p>
        </div>
    </header>

    <main class="container mx-auto px-6 -mt-16 relative z-20 pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 max-w-7xl mx-auto">

            <div class="lg:col-span-2 space-y-8">

                <div class="bg-white p-8 md:p-16 rounded-[4rem] premium-shadow border border-slate-50" data-aos="fade-up">
                    <div class="flex items-center justify-between mb-12">
                        <h3 class="text-2xl font-black uppercase tracking-tighter flex items-center">
                            <i class="fas fa-route mr-4 text-aviation-blue"></i>
                            {{ __('messages.routes_page.main.title') }}
                        </h3>

                        <div class="flex items-center space-x-2 px-4 py-1.5 bg-green-50 rounded-full pulse-live">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <span class="text-green-600 text-[10px] font-black uppercase tracking-widest">
                                {{ __('messages.routes_page.main.connected_label') }}
                                <span id="sync-status">{{ __('messages.routes_page.main.connected_live') }}</span>
                            </span>
                        </div>
                    </div>

                    {{-- ROUTE 1 --}}
                    <div class="group relative bg-slate-50 p-10 rounded-[3rem] border border-slate-100 hover:border-blue-200 transition-all mb-10" data-aos="fade-up">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-10">
                            <div class="text-center md:text-left">
                                <span class="text-5xl font-black text-slate-900 tracking-tighter">MLG</span>
                                <p class="text-[10px] font-extrabold text-slate-400 uppercase mt-2">
                                    {{ __('messages.routes_page.routes.route1.from') }}
                                </p>
                            </div>

                            <div class="flex-grow flex flex-col items-center w-full md:w-auto">
                                <div class="w-full h-[2px] route-dashed relative overflow-hidden">
                                    <i class="fas fa-plane text-aviation-blue absolute -top-2 animate-plane"></i>
                                </div>
                                <div class="flex items-center space-x-3 mt-6">
                                    <span class="text-[10px] font-black text-aviation-blue uppercase tracking-[0.3em]">
                                        {{ __('messages.routes_page.routes.route1.airlines') }}
                                    </span>
                                </div>
                            </div>

                            <div class="text-center md:text-right">
                                <span class="text-5xl font-black text-slate-900 tracking-tighter">CGK</span>
                                <p class="text-[10px] font-extrabold text-slate-400 uppercase mt-2">
                                    {{ __('messages.routes_page.routes.route1.to') }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-10 pt-8 border-t border-slate-200/60 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <p class="text-slate-500 text-xs leading-relaxed">
                                {{ __('messages.routes_page.routes.route1.desc') }}
                            </p>

                            <div class="bg-white p-4 rounded-2xl border border-slate-100">
                                <span class="text-[9px] font-black text-slate-400 uppercase block mb-2">
                                    {{ __('messages.routes_page.routes.route1.status_title') }}
                                </span>
                                <div class="flex justify-between items-center">
                                    <span id="last-flight-badge" class="text-[11px] font-bold text-slate-700 italic">
                                        {{ __('messages.routes_page.routes.route1.syncing') }}
                                    </span>
                                    <span class="text-[10px] font-black text-green-600 uppercase">
                                        {{ __('messages.routes_page.routes.route1.active_tag') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ROUTE 2 --}}
                    <div class="group relative bg-slate-50 p-10 rounded-[3rem] border border-slate-100 hover:border-blue-200 transition-all mb-10" data-aos="fade-up">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-10">
                            <div class="text-center md:text-left">
                                <span class="text-5xl font-black text-slate-900 tracking-tighter">MLG</span>
                                <p class="text-[10px] font-extrabold text-slate-400 uppercase mt-2">
                                    {{ __('messages.routes_page.routes.route2.from') }}
                                </p>
                            </div>

                            <div class="flex-grow flex flex-col items-center">
                                <div class="w-full h-[2px] route-dashed relative overflow-hidden">
                                    <i class="fas fa-plane text-aviation-blue absolute -top-2 animate-plane" style="animation-delay: -2s;"></i>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase mt-4">
                                    {{ __('messages.routes_page.routes.route2.hub') }}
                                </span>
                            </div>

                            <div class="text-center md:text-right">
                                <span class="text-5xl font-black text-slate-900 tracking-tighter">HLP</span>
                                <p class="text-[10px] font-extrabold text-slate-400 uppercase mt-2">
                                    {{ __('messages.routes_page.routes.route2.to') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- WEATHER --}}
                <div class="bg-aviation-blue p-12 rounded-[4rem] text-white overflow-hidden relative" data-aos="zoom-in">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-x-10 -translate-y-20"></div>

                    <div class="relative z-10 flex flex-col md:flex-row gap-10 items-start">
                        <div class="bg-white/20 p-6 rounded-[2rem]">
                            <i id="weather-icon" class="fas fa-satellite-dish text-4xl text-white"></i>
                        </div>

                        <div>
                            <h4 class="text-2xl font-black uppercase mb-4 tracking-tighter">
                                {{ __('messages.routes_page.weather.title') }}
                            </h4>

                            <p class="text-blue-100 text-sm leading-relaxed mb-6">
                                {!! __('messages.routes_page.weather.desc_html', [
                                    'desc' => '<span id="weather-desc" class="font-bold underline">'.__('messages.routes_page.weather.updating').'</span>',
                                    'vis'  => '<span id="weather-vis" class="font-bold">--</span>',
                                ]) !!}
                            </p>

                            <div class="flex flex-wrap gap-4 text-[9px] font-black uppercase">
                                <span class="bg-white/10 px-4 py-2 rounded-xl">{{ __('messages.routes_page.weather.wind') }} : <span id="weather-wind">--</span> m/s</span>
                                <span class="bg-white/10 px-4 py-2 rounded-xl">{{ __('messages.routes_page.weather.temp') }} : <span id="weather-temp">--</span>°C</span>
                                <span class="bg-white/10 px-4 py-2 rounded-xl">{{ __('messages.routes_page.weather.hum') }} : <span id="weather-hum">--</span>%</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- RIGHT SIDEBAR --}}
            <div class="space-y-8">

                <div class="bg-white p-10 rounded-[3.5rem] premium-shadow border border-slate-50" data-aos="fade-left">
                    <h4 class="text-xs font-black uppercase tracking-[0.3em] text-aviation-blue mb-8 flex items-center">
                        <span class="w-8 h-[2px] bg-aviation-blue mr-3"></span>
                        {{ __('messages.routes_page.sidebar.airlines_title') }}
                    </h4>

                    <ul class="space-y-8">
                        <li class="flex items-center justify-between group">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-plane-up text-aviation-blue text-sm"></i>
                                </div>
                                <span class="font-extrabold text-slate-800">Citilink</span>
                            </div>
                            <span class="px-3 py-1 bg-green-50 text-green-600 text-[9px] font-black rounded-lg">
                                {{ __('messages.routes_page.sidebar.active') }}
                            </span>
                        </li>

                        <li class="flex items-center justify-between group">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-plane-up text-aviation-blue text-sm"></i>
                                </div>
                                <span class="font-extrabold text-slate-800">Batik Air</span>
                            </div>
                            <span class="px-3 py-1 bg-green-50 text-green-600 text-[9px] font-black rounded-lg">
                                {{ __('messages.routes_page.sidebar.active') }}
                            </span>
                        </li>

                        <li class="flex items-center justify-between group">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-plane-up text-aviation-blue text-sm"></i>
                                </div>
                                <span class="font-extrabold text-slate-800">Garuda Indonesia</span>
                            </div>
                            <span class="px-3 py-1 bg-green-50 text-green-600 text-[9px] font-black rounded-lg">
                                {{ __('messages.routes_page.sidebar.active') }}
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="bg-slate-900 p-10 rounded-[3.5rem] text-white" data-aos="fade-left" data-aos-delay="200">
                    <h4 class="text-lg font-black uppercase tracking-tighter mb-6">
                        {{ __('messages.routes_page.live.title') }}
                    </h4>
                    <div id="live-traffic-container" class="space-y-6">
                        <div class="animate-pulse flex flex-col space-y-4">
                            <div class="h-2 bg-slate-700 rounded w-3/4"></div>
                            <div class="h-2 bg-slate-700 rounded w-1/2"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <footer class="py-20 bg-white border-t border-slate-100 text-center">
        <div class="container mx-auto px-6">
            <p class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-300 mb-4 text-center">
                {{ __('messages.routes_page.footer.brand') }}
            </p>
            <p class="text-[9px] text-slate-400 max-w-lg mx-auto leading-relaxed">
                {{ __('messages.routes_page.footer.note') }}
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: false, offset: 50, easing: 'ease-out-cubic' });

        // Locale JS
        const LOCALE = @json(app()->getLocale());                 // "id" / "en"
        const DATE_LOCALE = (LOCALE === 'en') ? 'en-US' : 'id-ID';
        const TZ_LABEL = @json(__('messages.routes_page.clock.tz')); // "WIB" atau bisa "WIB (GMT+7)"
        const WEATHER_LANG = (LOCALE === 'en') ? 'en' : 'id';

        // Config
        const apiKey = '8a8db4b35f665e7cb03b00081f767e4b';
        const city = @json(__('messages.routes_page.weather.city')); // "Malang"

        const schedule = [
            { id: 'ID 7580', airline: 'Batik Air', type: 'Departure', time: '07:30' },
            { id: 'QG 751', airline: 'Citilink', type: 'Arrival', time: '08:15' },
            { id: 'ID 7582', airline: 'Batik Air', type: 'Departure', time: '09:45' },
            { id: 'GA 290', airline: 'Garuda Indonesia', type: 'Arrival', time: '10:45' },
            { id: 'ID 7581', airline: 'Batik Air', type: 'Arrival', time: '12:30' },
            { id: 'QG 752', airline: 'Citilink', type: 'Departure', time: '13:10' },
            { id: 'GA 291', airline: 'Garuda Indonesia', type: 'Departure', time: '15:20' }
        ];

        // 1) Clock
        function updateClock() {
            const now = new Date();
            const options = {
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
                hour: '2-digit', minute: '2-digit', second: '2-digit'
            };
            document.getElementById('realtime-clock').innerText =
                now.toLocaleDateString(DATE_LOCALE, options) + ' ' + TZ_LABEL;
        }

        // 2) Weather
        async function fetchWeather() {
            try {
                const res = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${encodeURIComponent(city)}&appid=${apiKey}&units=metric&lang=${WEATHER_LANG}`);
                const data = await res.json();

                if (data.cod === 200) {
                    document.getElementById('weather-desc').innerText = data.weather[0].description;
                    document.getElementById('weather-temp').innerText = Math.round(data.main.temp);
                    document.getElementById('weather-wind').innerText = data.wind.speed;
                    document.getElementById('weather-hum').innerText = data.main.humidity;
                    document.getElementById('weather-vis').innerText = (data.visibility / 1000).toFixed(1);

                    const iconCode = data.weather[0].icon;
                    const iconMap = {
                        '01': 'fa-sun', '02': 'fa-cloud-sun', '03': 'fa-cloud',
                        '04': 'fa-cloud-meatball', '09': 'fa-cloud-showers-heavy',
                        '10': 'fa-cloud-sun-rain', '11': 'fa-bolt', '13': 'fa-snowflake', '50': 'fa-smog'
                    };
                    const iconClass = iconMap[iconCode.substring(0,2)] || 'fa-cloud';
                    document.getElementById('weather-icon').className = `fas ${iconClass} text-4xl text-white`;
                }
            } catch (e) {
                console.error("Weather sync failed", e);
            }
        }

        // 3) Traffic
        function updateTraffic() {
            const now = new Date();
            const currentMins = now.getHours() * 60 + now.getMinutes();
            const container = document.getElementById('live-traffic-container');

            const pastFlights = schedule.filter(f => {
                const [h, m] = f.time.split(':');
                return (parseInt(h) * 60 + parseInt(m)) <= currentMins;
            });

            const futureFlights = schedule.filter(f => {
                const [h, m] = f.time.split(':');
                return (parseInt(h) * 60 + parseInt(m)) > currentMins;
            });

            const lastOne = pastFlights.length > 0 ? pastFlights[pastFlights.length - 1] : schedule[0];
            const nextOne = futureFlights.length > 0 ? futureFlights[0] : schedule[0];

            const lastLabel = @json(__('messages.routes_page.live.last'));
            const nextLabel = @json(__('messages.routes_page.live.next'));
            const completed = @json(__('messages.routes_page.live.completed'));
            const enRoute = @json(__('messages.routes_page.live.en_route'));

            container.innerHTML = `
                <div class="relative pl-6 border-l-2 border-aviation-blue">
                    <span class="text-[9px] font-black text-blue-400 block uppercase">${lastLabel}</span>
                    <p class="text-xs font-bold">${lastOne.id} - ${lastOne.airline}</p>
                    <p class="text-[10px] text-slate-400">${lastOne.time} ${TZ_LABEL} • ${completed}</p>
                </div>
                <div class="relative pl-6 border-l-2 border-green-500">
                    <span class="text-[9px] font-black text-green-400 block uppercase">${nextLabel}</span>
                    <p class="text-xs font-bold">${nextOne.id} - ${nextOne.airline}</p>
                    <p class="text-[10px] text-slate-400">${nextOne.time} ${TZ_LABEL} • ${enRoute}</p>
                </div>
            `;

            document.getElementById('last-flight-badge').innerText = `${lastOne.id} (${lastOne.airline})`;
        }

        function simulateSync() {
            const status = document.getElementById('sync-status');
            const syncing = @json(__('messages.routes_page.main.syncing'));
            const live = @json(__('messages.routes_page.main.connected_live'));

            setInterval(() => {
                status.innerText = syncing;
                setTimeout(() => { status.innerText = live; }, 1000);
            }, 10000);
        }

        setInterval(updateClock, 1000);
        setInterval(fetchWeather, 600000);
        setInterval(updateTraffic, 60000);

        updateClock();
        fetchWeather();
        updateTraffic();
        simulateSync();
    </script>
</body>
</html>
