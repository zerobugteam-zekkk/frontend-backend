{{-- resources/views/fasilitas.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.facilities.meta.title') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800;900&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            scroll-behavior: smooth;
        }

        /* Responsive Table Design */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table { width: 100%; border-collapse: collapse; min-width: 600px; }
        th, td { padding: 20px; text-align: left; border-bottom: 1px solid #f1f5f9; }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .facility-card:hover {
            border-color: #2563eb;
            transform: translateY(-8px);
            box-shadow: 0 30px 60px -15px rgba(15, 23, 42, 0.1);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>

<body class="antialiased text-slate-900 overflow-x-hidden">

<nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex items-center space-x-3">
            <div class="bg-blue-600 p-2 rounded-lg text-white">
                <i class="fas fa-plane-up text-sm"></i>
            </div>
            <span class="text-sm font-black uppercase tracking-tighter">
                {{ __('messages.facilities.nav.brand') }}
                <span class="text-blue-600">{{ __('messages.facilities.nav.brand_highlight') }}</span>
            </span>
        </a>

        <div class="hidden md:flex space-x-6">
            <a href="{{ url('/fasilitas') }}"
               class="text-[10px] font-black uppercase tracking-widest text-blue-600 border-b-2 border-blue-600 pb-1">
                {{ __('messages.facilities.nav.menu_facilities') }}
            </a>
            <a href="{{ url('/bantuan') }}"
               class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-blue-600 transition-all">
                {{ __('messages.facilities.nav.menu_help') }}
            </a>
        </div>
    </div>
</nav>

<header class="bg-slate-900 py-24 md:py-32 text-center text-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-64 h-64 bg-blue-600/20 rounded-full blur-[120px] -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-[100px] translate-x-1/3 translate-y-1/3"></div>

    <div class="relative z-10 px-6" data-aos="fade-up" data-aos-duration="1000">
        <h6 class="text-blue-500 font-black uppercase tracking-[0.5em] text-[10px] mb-4">
            {{ __('messages.facilities.hero.badge') }}
        </h6>

        <h1 class="text-4xl md:text-7xl font-black tracking-tighter uppercase mb-6 leading-none">
            {{ __('messages.facilities.hero.title_1') }}
            <br>
            <span class="text-blue-600">{{ __('messages.facilities.hero.title_2') }}</span>
        </h1>

        <p class="text-slate-400 text-sm md:text-lg max-w-3xl mx-auto font-medium leading-relaxed">
            {{ __('messages.facilities.hero.desc') }}
        </p>
    </div>
</header>

<main class="container mx-auto px-6 -mt-16 relative z-20 pb-24">
    <div class="max-w-6xl mx-auto">

        {{-- PARKING --}}
        <div class="bg-white rounded-[3rem] shadow-2xl shadow-blue-900/5 border border-slate-100 overflow-hidden mb-20" data-aos="fade-up">
            <div class="p-10 md:p-16 border-b border-slate-50">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-50 p-4 rounded-2xl">
                            <i class="fas fa-parking text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black uppercase tracking-tighter">
                                {{ __('messages.facilities.parking.title') }}
                            </h3>
                            <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">
                                {{ __('messages.facilities.parking.subtitle') }}
                            </p>
                        </div>
                    </div>
                    <span class="bg-slate-900 text-white text-[9px] font-black px-4 py-2 rounded-full uppercase tracking-widest self-start md:self-center">
                        {{ __('messages.facilities.parking.badge') }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="space-y-4">
                        <h5 class="font-black text-[11px] uppercase tracking-widest text-blue-600">
                            {{ __('messages.facilities.parking.sec1_title') }}
                        </h5>
                        <p class="text-[13px] text-slate-500 leading-relaxed text-justify italic">
                            {{ __('messages.facilities.parking.sec1_desc') }}
                        </p>
                    </div>

                    <div class="space-y-4">
                        <h5 class="font-black text-[11px] uppercase tracking-widest text-blue-600">
                            {{ __('messages.facilities.parking.sec2_title') }}
                        </h5>
                        <p class="text-[13px] text-slate-500 leading-relaxed text-justify italic">
                            {{ __('messages.facilities.parking.sec2_desc') }}
                        </p>
                    </div>

                    <div class="space-y-4">
                        <h5 class="font-black text-[11px] uppercase tracking-widest text-blue-600">
                            {{ __('messages.facilities.parking.sec3_title') }}
                        </h5>
                        <p class="text-[13px] text-slate-500 leading-relaxed text-justify italic">
                            {{ __('messages.facilities.parking.sec3_desc') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 p-10 md:p-16">
                <div class="flex items-center gap-3 mb-8">
                    <i class="fas fa-receipt text-blue-600"></i>
                    <h4 class="font-black uppercase text-[11px] tracking-[0.2em] text-slate-900">
                        {{ __('messages.facilities.parking.table_title') }}
                    </h4>
                </div>

                <div class="table-responsive">
                    <table>
                        <thead class="bg-slate-100/50">
                        <tr class="text-[10px] font-black uppercase tracking-widest text-slate-900">
                            <th>{{ __('messages.facilities.parking.th_vehicle') }}</th>
                            <th>{{ __('messages.facilities.parking.th_first_hour') }}</th>
                            <th>{{ __('messages.facilities.parking.th_next_hour') }}</th>
                            <th>{{ __('messages.facilities.parking.th_overnight') }}</th>
                        </tr>
                        </thead>

                        <tbody class="text-slate-600 text-[13px]">
                        <tr class="hover:bg-white transition-all">
                            <td class="py-6 font-black text-slate-900 uppercase">
                                {{ __('messages.facilities.parking.row_motor') }}
                            </td>
                            <td>{{ __('messages.facilities.parking.price_motor') }}</td>
                            <td>{{ __('messages.facilities.parking.price_motor_next') }}</td>
                            <td class="font-bold text-blue-600">{{ __('messages.facilities.parking.price_motor_overnight') }}</td>
                        </tr>

                        <tr class="hover:bg-white transition-all">
                            <td class="py-6 font-black text-slate-900 uppercase">
                                {{ __('messages.facilities.parking.row_car') }}
                            </td>
                            <td>{{ __('messages.facilities.parking.price_mobil') }}</td>
                            <td>{{ __('messages.facilities.parking.price_mobil_next') }}</td>
                            <td class="font-bold text-blue-600">{{ __('messages.facilities.parking.price_mobil_overnight') }}</td>
                        </tr>

                        <tr class="hover:bg-white transition-all">
                            <td class="py-6 font-black text-slate-900 uppercase">
                                {{ __('messages.facilities.parking.row_bus') }}
                            </td>
                            <td>{{ __('messages.facilities.parking.price_bus') }}</td>
                            <td>{{ __('messages.facilities.parking.price_bus_next') }}</td>
                            <td class="font-bold text-blue-600">{{ __('messages.facilities.parking.price_bus_overnight') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <p class="text-[10px] text-slate-400 italic font-medium">
                        {{ __('messages.facilities.parking.note') }}
                    </p>
                    <div class="flex gap-4">
                        <i class="fab fa-cc-visa text-slate-300 text-xl"></i>
                        <i class="fab fa-cc-mastercard text-slate-300 text-xl"></i>
                        <i class="fas fa-wallet text-slate-300 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- TERMINALS --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-20">
            <div class="bg-white p-12 rounded-[3rem] shadow-xl shadow-blue-900/5 border border-slate-100 facility-card transition-all duration-500" data-aos="fade-up">
                <div class="flex items-center gap-4 mb-10">
                    <div class="bg-slate-900 w-16 h-16 rounded-3xl flex items-center justify-center text-white">
                        <i class="fas fa-plane-departure"></i>
                    </div>
                    <h3 class="text-3xl font-black uppercase tracking-tighter">
                        {!! nl2br(e(__('messages.facilities.terminal.dep_title'))) !!}
                    </h3>
                </div>

                <p class="text-sm text-slate-500 leading-relaxed text-justify mb-8">
                    {!! __('messages.facilities.terminal.dep_desc') !!}
                </p>

                <ul class="space-y-4">
                    <li class="flex items-start gap-4 p-4 bg-blue-50/50 rounded-2xl border border-blue-100/50">
                        <i class="fas fa-shield-check text-blue-600 mt-1"></i>
                        <p class="text-[12px] font-medium text-slate-700">
                            {!! __('messages.facilities.terminal.dep_li1') !!}
                        </p>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-blue-50/50 rounded-2xl border border-blue-100/50">
                        <i class="fas fa-couch text-blue-600 mt-1"></i>
                        <p class="text-[12px] font-medium text-slate-700">
                            {!! __('messages.facilities.terminal.dep_li2') !!}
                        </p>
                    </li>
                </ul>
            </div>

            <div class="bg-white p-12 rounded-[3rem] shadow-xl shadow-blue-900/5 border border-slate-100 facility-card transition-all duration-500" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center gap-4 mb-10">
                    <div class="bg-blue-600 w-16 h-16 rounded-3xl flex items-center justify-center text-white">
                        <i class="fas fa-plane-arrival"></i>
                    </div>
                    <h3 class="text-3xl font-black uppercase tracking-tighter">
                        {!! nl2br(e(__('messages.facilities.terminal.arr_title'))) !!}
                    </h3>
                </div>

                <p class="text-sm text-slate-500 leading-relaxed text-justify mb-8">
                    {!! __('messages.facilities.terminal.arr_desc') !!}
                </p>

                <ul class="space-y-4">
                    <li class="flex items-start gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <i class="fas fa-suitcase-rolling text-blue-600 mt-1"></i>
                        <p class="text-[12px] font-medium text-slate-700">
                            {!! __('messages.facilities.terminal.arr_li1') !!}
                        </p>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <i class="fas fa-taxi text-blue-600 mt-1"></i>
                        <p class="text-[12px] font-medium text-slate-700">
                            {!! __('messages.facilities.terminal.arr_li2') !!}
                        </p>
                    </li>
                </ul>
            </div>
        </div>

        {{-- INCLUSIVE + COMMITMENT --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <div data-aos="fade-right">
                <h4 class="font-black uppercase tracking-widest text-[11px] text-blue-600 mb-8 flex items-center">
                    <span class="w-12 h-1 bg-blue-600 mr-4 rounded-full"></span>
                    {{ __('messages.facilities.inclusive.title') }}
                </h4>

                <div class="space-y-5">
                    <details class="group bg-white rounded-2xl p-6 border border-slate-100 cursor-pointer transition-all hover:border-blue-600 shadow-sm">
                        <summary class="font-bold text-sm uppercase flex justify-between items-center list-none">
                            {{ __('messages.facilities.inclusive.nursery_title') }}
                            <i class="fas fa-chevron-down text-[10px] group-open:rotate-180 transition duration-300"></i>
                        </summary>
                        <p class="text-[12px] text-slate-500 mt-4 leading-relaxed border-t pt-4">
                            {{ __('messages.facilities.inclusive.nursery_desc') }}
                        </p>
                    </details>

                    <details class="group bg-white rounded-2xl p-6 border border-slate-100 cursor-pointer transition-all hover:border-blue-600 shadow-sm">
                        <summary class="font-bold text-sm uppercase flex justify-between items-center list-none">
                            {{ __('messages.facilities.inclusive.health_title') }}
                            <i class="fas fa-chevron-down text-[10px] group-open:rotate-180 transition duration-300"></i>
                        </summary>
                        <p class="text-[12px] text-slate-500 mt-4 leading-relaxed border-t pt-4">
                            {{ __('messages.facilities.inclusive.health_desc') }}
                        </p>
                    </details>

                    <details class="group bg-white rounded-2xl p-6 border border-slate-100 cursor-pointer transition-all hover:border-blue-600 shadow-sm">
                        <summary class="font-bold text-sm uppercase flex justify-between items-center list-none">
                            {{ __('messages.facilities.inclusive.connect_title') }}
                            <i class="fas fa-chevron-down text-[10px] group-open:rotate-180 transition duration-300"></i>
                        </summary>
                        <p class="text-[12px] text-slate-500 mt-4 leading-relaxed border-t pt-4">
                            {{ __('messages.facilities.inclusive.connect_desc') }}
                        </p>
                    </details>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-[3rem] p-12 text-white relative overflow-hidden shadow-2xl" data-aos="fade-left">
                <div class="absolute top-0 right-0 p-10 opacity-10">
                    <i class="fas fa-universal-access text-[12rem]"></i>
                </div>

                <div class="relative z-10">
                    <h4 class="font-black uppercase text-3xl mb-6 leading-tight">
                        {{ __('messages.facilities.commitment.title_1') }} <br>
                        {{ __('messages.facilities.commitment.title_2') }}
                    </h4>

                    <p class="text-blue-100 text-sm leading-relaxed mb-10 opacity-90 text-justify">
                        {{ __('messages.facilities.commitment.desc') }}
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-10">
                        <div class="bg-white/10 p-4 rounded-2xl border border-white/20">
                            <h5 class="text-[10px] font-black uppercase mb-1">
                                {{ __('messages.facilities.commitment.stat1_label') }}
                            </h5>
                            <p class="text-xl font-black">
                                {{ __('messages.facilities.commitment.stat2_label') }}
                            </p>
                        </div>
                        <div class="bg-white/10 p-4 rounded-2xl border border-white/20">
                            <h5 class="text-[10px] font-black uppercase mb-1">
                                {{ __('messages.facilities.commitment.stat3_label') }}
                            </h5>
                            <p class="text-xl font-black">
                                {{ __('messages.facilities.commitment.stat4_label') }}
                            </p>
                        </div>
                    </div>

                    <a href="{{ url('/bantuan') }}"
                       class="flex items-center justify-between bg-white text-blue-600 font-black text-[11px] px-10 py-5 rounded-2xl uppercase tracking-[0.2em] shadow-xl hover:bg-slate-50 transition-all group">
                        {{ __('messages.facilities.commitment.cta') }}
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-3 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="py-16 border-t border-slate-100 mt-10 text-center bg-white">
    <p class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-400 mb-4">
        {{ __('messages.facilities.footer.tagline') }}
    </p>
    <p class="text-[10px] font-bold text-slate-300 uppercase tracking-[0.3em]">
        {{ __('messages.facilities.footer.copyright') }}
    </p>
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        easing: 'ease-out-back',
        once: true
    });
</script>

</body>
</html>
