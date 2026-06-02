{{-- resources/views/jam_operasional.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.hours.meta.title') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }

        /* FORCE WHITE COLOR & REMOVE BOLD FOR HERO DESCRIPTION */
        .hero-desc-container p,
        .hero-desc-container p * {
            color: #ffffff !important;
            --tw-text-opacity: 1 !important;
            font-weight: 400 !important;
        }

        .main-bg-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#2563eb10 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .blue-gradient-card {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        }

        .hover-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(30, 58, 138, 0.15);
        }
    </style>
</head>
@include('chatbot')
<body class="main-bg-pattern text-slate-900 antialiased overflow-x-hidden">

    {{-- NAVIGATION --}}
    <nav class="fixed top-0 left-0 right-0 z-[100] bg-slate-950/80 backdrop-blur-xl border-b border-white/5">

        <div class="container mx-auto px-6 py-5 flex items-center justify-between">

            {{-- LEFT SIDE --}}
            <a href="{{ url('/') }}" class="flex items-center gap-4 group">

                {{-- Back Button --}}
                <div
                    class="bg-blue-600 p-2.5 rounded-xl group-hover:bg-blue-500 transition-all duration-300 shadow-lg shadow-blue-600/20">

                    <i class="fas fa-arrow-left text-white text-sm"></i>
                </div>

                <span
                    class="text-xs font-bold uppercase tracking-[0.2em] text-white/90 group-hover:text-white transition-colors">

                    {{ __('messages.checkin.nav.back') }}
                </span>
            </a>

            {{-- RIGHT SIDE --}}
            <div class="flex items-center space-x-2">

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
    </nav>


    {{-- HERO SECTION --}}
    <header class="relative min-h-[85vh] flex flex-col justify-center bg-slate-950 overflow-hidden">
        <div class="absolute inset-0 z-0">
            {{-- Ganti image source sesuai aset Anda --}}
            <img src="{{ asset('images/Bandara Malang Abdurachman Saleh.jpg') }}"
                class="absolute inset-0 w-full h-full object-cover opacity-30 scale-105" alt="Background Hours">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
        </div>

        {{-- LOGO BRANDING --}}
        <div class="absolute top-32 right-12 z-20 hidden lg:flex items-center gap-5 bg-white/5 backdrop-blur-2xl p-5 rounded-[2.5rem] border border-white/10 shadow-2xl"
            data-aos="fade-left">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/dishupmalang.jpg') }}" class="h-10 w-auto object-contain" alt="Dishub">
                <div class="flex flex-col border-l border-white/20 pl-4">
                    <span class="text-white text-[8px] font-bold tracking-[0.3em] uppercase opacity-60">Dinas</span>
                    <span class="text-white text-[11px] font-black uppercase leading-tight">Perhubungan</span>
                </div>
            </div>
            <div class="h-10 w-[1px] bg-white/20"></div>
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/kotamalang.png') }}" class="h-10 w-auto object-contain" alt="Malang">
                <div class="flex flex-col border-l border-white/20 pl-4">
                    <span
                        class="text-white text-[8px] font-bold tracking-[0.3em] uppercase opacity-60">Pemerintah</span>
                    <span class="text-white text-[11px] font-black uppercase leading-tight">Kota Malang</span>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 pt-20">
            <div class="max-w-4xl" data-aos="fade-right">

                <h1 class="text-6xl md:text-8xl font-black text-white leading-[0.85] uppercase tracking-tighter mb-12">
                    {{ __('messages.hours.hero.title_1') }} <br>
                    <span
                        class="text-transparent border-y border-slate-800 bg-clip-text bg-gradient-to-r from-blue-400 via-white to-blue-200 pt-4 pb-4 inline-block">
                        {{ __('messages.hours.hero.title_2') }}
                    </span>
                </h1>

                <div class="max-w-2xl hero-desc-container">
                    <p
                        class="text-white text-lg md:text-xl leading-relaxed border-l-4 border-blue-600 pl-8 text-justify italic font-light">
                        {!! __('messages.hours.hero.desc') !!}
                    </p>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-32 relative">

        {{-- MAIN OPERATIONAL CARDS --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-40 max-w-7xl mx-auto">
            {{-- OPENING CARD --}}
            <div class="blue-gradient-card p-12 md:p-16 rounded-[4rem] text-white relative overflow-hidden shadow-2xl hover-card group"
                data-aos="fade-up">
                <i
                    class="fas fa-door-open absolute -bottom-10 -right-10 text-[20rem] opacity-5 transition-transform duration-700 group-hover:scale-110"></i>
                <div class="relative z-10">
                    <h3 class="text-4xl font-black uppercase mb-10 italic tracking-tighter">
                        {{ __('messages.hours.opening.title') }}
                    </h3>
                    <p class="text-blue-100 mb-12 text-lg leading-relaxed font-light opacity-90">
                        {{ __('messages.hours.opening.desc') }}
                    </p>
                    <div class="bg-white/5 backdrop-blur-md border border-white/10 p-10 rounded-[2.5rem] inline-block">
                        <p class="text-[10px] uppercase tracking-[0.3em] text-blue-300 font-bold mb-4">
                            {{ __('messages.hours.opening.label') }}
                        </p>
                        <div class="flex items-baseline gap-4">
                            <span
                                class="text-7xl font-black tracking-tighter">{{ __('messages.hours.opening.time') }}</span>
                            <span class="text-2xl font-bold text-blue-400">{{ __('messages.hours.opening.tz') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CLOSING CARD --}}
            <div class="bg-white p-12 md:p-16 rounded-[4rem] shadow-xl border border-slate-100 relative overflow-hidden hover-card group"
                data-aos="fade-up" data-aos-delay="200">
                <div class="relative z-10">
                    <h3 class="text-4xl font-black uppercase mb-10 italic tracking-tighter text-slate-900">
                        {{ __('messages.hours.closing.title') }}
                    </h3>
                    <p class="text-slate-500 mb-12 text-lg leading-relaxed font-medium">
                        {{ __('messages.hours.closing.desc') }}
                    </p>
                    <div class="bg-slate-50 p-10 rounded-[2.5rem] border border-slate-100">
                        <p class="text-[10px] uppercase tracking-[0.3em] text-slate-400 font-bold mb-4">
                            {{ __('messages.hours.closing.label') }}
                        </p>
                        <span class="text-5xl md:text-6xl font-black text-blue-700 uppercase italic tracking-tighter">
                            {{ __('messages.hours.closing.status') }}
                        </span>
                        <p class="mt-6 text-sm text-slate-400 font-semibold leading-relaxed max-w-sm">
                            <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                            {{ __('messages.hours.closing.note') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- INFO GRID --}}
        <div class="mb-40">
            <div class="text-center mb-24" data-aos="zoom-in">
                <h4 class="font-black uppercase tracking-[0.5em] text-blue-600 text-xs mb-4">
                    {{ __('messages.hours.info.kicker') }}</h4>
                <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-7xl mx-auto">
                {{-- Card Check-in --}}
                <div class="p-12 bg-white rounded-[3.5rem] border border-slate-100 shadow-xl shadow-slate-200/40 hover-card group"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-20 h-20 bg-blue-50 rounded-3xl flex items-center justify-center mb-8 group-hover:bg-blue-600 transition-all duration-500">
                        <i
                            class="fas fa-check-double text-3xl text-blue-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h5 class="text-sm font-black uppercase text-slate-900 mb-4 tracking-wider">
                        {{ __('messages.hours.cards.checkin.title') }}</h5>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium">
                        {{ __('messages.hours.cards.checkin.desc') }}</p>
                </div>

                {{-- Card Security --}}
                <div class="p-12 bg-white rounded-[3.5rem] border border-slate-100 shadow-xl shadow-slate-200/40 hover-card group"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="w-20 h-20 bg-blue-50 rounded-3xl flex items-center justify-center mb-8 group-hover:bg-blue-600 transition-all duration-500">
                        <i
                            class="fas fa-shield-alt text-3xl text-blue-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h5 class="text-sm font-black uppercase text-slate-900 mb-4 tracking-wider">
                        {{ __('messages.hours.cards.security.title') }}</h5>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium">
                        {{ __('messages.hours.cards.security.desc') }}</p>
                </div>

                {{-- Card Info --}}
                <div class="p-12 bg-white rounded-[3.5rem] border border-slate-100 shadow-xl shadow-slate-200/40 hover-card group"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-20 h-20 bg-blue-50 rounded-3xl flex items-center justify-center mb-8 group-hover:bg-blue-600 transition-all duration-500">
                        <i class="fas fa-headset text-3xl text-blue-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h5 class="text-sm font-black uppercase text-slate-900 mb-4 tracking-wider">
                        {{ __('messages.hours.cards.info.title') }}</h5>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium">
                        {{ __('messages.hours.cards.info.desc') }}</p>
                </div>
            </div>
        </div>

        {{-- NOTICE SECTION --}}
        <section
            class="max-w-7xl mx-auto bg-blue-700 rounded-[5rem] p-12 md:p-24 text-white shadow-3xl relative overflow-hidden"
            data-aos="zoom-in">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
            <div class="flex flex-col lg:flex-row items-center gap-20 relative z-10">
                <div class="shrink-0 text-center lg:text-left">
                    <div class="text-8xl font-black italic text-white leading-none mb-4 tracking-tighter">
                        {{ __('messages.hours.notice.big') }}
                    </div>
                    <div class="h-2 w-full bg-blue-400 rounded-full"></div>
                </div>
                <div class="flex-1 text-center lg:text-left">
                    <h5 class="text-3xl md:text-4xl font-black uppercase mb-6 tracking-tighter">
                        {{ __('messages.hours.notice.title') }}
                    </h5>
                    <p class="text-blue-50 opacity-90 leading-relaxed text-lg font-light italic">
                        {!! __('messages.hours.notice.desc') !!}
                    </p>
                </div>
            </div>
        </section>

    </main>

    <footer class="py-24 border-t border-slate-100 bg-white text-center">
        <div class="container mx-auto px-6">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.8em] leading-loose">
                {!! __('messages.hours.footer.copyright') !!}
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 120,
            easing: 'ease-out-quint'
        });
    </script>
</body>

</html>
