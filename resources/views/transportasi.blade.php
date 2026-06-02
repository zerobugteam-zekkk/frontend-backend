<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.transport.meta.title') }}</title>

    {{-- test debug --}}
    {{-- {{ app()->getLocale() }} --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            background-image: radial-gradient(#2563eb08 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .glass-header {
            background: rgba(15, 23, 42, 0.98);
            backdrop-filter: blur(12px);
        }

        .premium-card {
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            border: 1px solid rgba(37, 99, 235, 0.1);
        }

        .premium-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 40px 80px -15px rgba(30, 58, 138, 0.15);
            border-color: rgba(37, 99, 235, 0.3);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(10px);
            }
        }

        .animate-bounce-slow {
            animation: bounce-slow 2s infinite;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #1e40af;
            border-radius: 10px;
        }

        #backToTop.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }
    </style>
</head>

<body class="antialiased text-slate-900 overflow-x-hidden">

    <nav class="glass-header text-white sticky top-0 z-50 border-b border-white/10">
        <div class="container mx-auto px-6 py-5 flex items-center justify-between">
            <a href="/" class="group flex items-center space-x-4">
                <div class="bg-blue-600 p-2 rounded-lg">
                    <i class="fas fa-arrow-left text-white text-sm"></i>
                </div>
                <div class="flex flex-col border-l border-white/20 pl-4">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-400">
                        {{ __('messages.transport.nav.portal') }}</span>
                    <span class="text-lg font-black tracking-tighter uppercase">
                        {{ __('messages.brand.abdurachman') }} <span
                            class="text-blue-500">{{ __('messages.brand.saleh') }}</span></span>
                </div>
            </a>
            {{-- RIGHT SIDE --}}
            <div class="flex items-center gap-3">
                {{-- STATUS --}}
                <div class="hidden lg:flex items-center space-x-8 text-[11px] font-bold uppercase tracking-widest">
                    <span class="text-blue-500 flex items-center"><span class="relative flex h-2 w-2 mr-3"><span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span><span
                                class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span></span>
                        {{ __('messages.transport.nav.status_label') }}:
                        {{ __('messages.transport.nav.status_value') }}</span>
                </div>
                {{-- LANGUAGE SWITCH --}}
                <div class="flex items-center space-x-2">
                    <a href="{{ route('lang.switch', 'id') }}"
                        class="px-2 py-1 rounded-md text-xs font-semibold transition {{ app()->getLocale() === 'id' ? 'bg-blue-600 text-white' : 'bg-slate-100 border border-slate-300 text-slate-700 hover:bg-slate-200' }}">
                        ID
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="px-2 py-1 rounded-md text-xs font-semibold transition {{ app()->getLocale() === 'en' ? 'bg-blue-600 text-white' : 'bg-slate-100 border border-slate-300 text-slate-700 hover:bg-slate-200' }}">
                        EN
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <header
        class="relative min-h-[100vh] flex flex-col justify-center bg-slate-950 font-formal overflow-hidden pb-24 md:pb-32">

        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/Bandara Malang Abdurachman Saleh.jpg') }}"
                class="absolute inset-0 w-full h-full object-cover opacity-40" alt="Transportasi Malang">

            <div class="absolute inset-0 opacity-20">
                <img src="https://www.transparenttextures.com/patterns/carbon-fibre.png"
                    class="w-full h-full object-cover">
            </div>

            <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-600/20 rounded-full blur-[120px]"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-900/10 rounded-full blur-[120px]"></div>

            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
        </div>

        <div class="absolute top-6 right-6 md:top-10 md:right-10 z-30 flex items-center gap-4 md:gap-6 px-5 py-3 md:px-6 md:py-4 rounded-2xl bg-white/5 backdrop-blur-xl border border-white/10 shadow-2xl animate-float"
            data-aos="fade-down" data-aos-duration="1000">

            <div class="flex items-center gap-3 group">
                <img src="{{ asset('images/dishupmalang.jpg') }}" alt="Logo Dishub"
                    class="h-10 md:h-12 w-auto object-contain drop-shadow-md transition-transform duration-300 group-hover:scale-110">
                <div class="hidden sm:flex flex-col border-l border-white/20 pl-3 py-0.5">
                    <span class="text-white text-[7px] font-bold tracking-widest uppercase opacity-50">Dinas</span>
                    <span
                        class="text-white text-[10px] font-black tracking-tight uppercase leading-none">Perhubungan</span>
                    <span class="text-blue-400 text-[7px] font-medium tracking-widest uppercase mt-0.5">Kab.
                        Malang</span>
                </div>
            </div>

            <div class="h-8 w-[1px] bg-white/20 mx-1"></div>

            <div class="flex items-center gap-3 group">
                <img src="{{ asset('images/kotamalang.png') }}" alt="Logo Malang"
                    class="h-10 md:h-12 w-auto object-contain drop-shadow-md transition-transform duration-300 group-hover:scale-110">
                <div class="hidden sm:flex flex-col border-l border-white/20 pl-3 py-0.5">
                    <span class="text-white text-[7px] font-bold tracking-widest uppercase opacity-50">Pemerintah</span>
                    <span class="text-white text-[10px] font-black tracking-tight uppercase leading-none">Kota
                        Malang</span>
                    <span class="text-yellow-500 text-[7px] font-medium tracking-widest uppercase mt-0.5">Jawa
                        Timur</span>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl pt-32 md:pt-20">

                <div class="inline-flex items-center gap-3 mb-8 px-4 py-1.5 border border-blue-400/20 rounded-full bg-blue-500/5 backdrop-blur-md"
                    data-aos="fade-right" data-aos-duration="1000">
                    <span class="relative flex h-1.5 w-1.5">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-blue-500"></span>
                    </span>
                    <h6 class="text-blue-400 font-bold uppercase tracking-[0.4em] text-[10px]">
                        {{ __('messages.transport.hero.guide_badge') }}
                    </h6>
                </div>

                <div class="mb-8" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">
                    <h1 class="text-5xl md:text-8xl font-black text-white leading-[1.1] uppercase tracking-tighter">
                        {{ __('messages.transport.hero.title_1') }} <br>
                        <span
                            class="text-transparent border-y-2 border-blue-600 bg-clip-text bg-gradient-to-r from-white via-blue-200 to-blue-600 pt-4 pb-6 inline-block">
                            {{ __('messages.transport.hero.title_2') }}
                        </span>
                    </h1>
                </div>

                <div class="max-w-xl mb-12" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                    <p
                        class="text-slate-300 text-base md:text-xl font-normal leading-relaxed opacity-90 border-l-4 border-blue-600 pl-6 text-justify">
                        {{ __('messages.transport.hero.desc') }}
                    </p>
                </div>

                <div class="flex flex-wrap gap-5" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                    <a href="#layanan"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 md:px-10 md:py-5 rounded-lg font-bold uppercase text-[10px] md:text-[11px] tracking-widest transition-all shadow-lg hover:-translate-y-2">
                        {{ __('messages.transport.hero.cta_explore') }}
                    </a>
                    <a href="#prosedur"
                        class="bg-white/5 hover:bg-white/10 backdrop-blur-md text-white border border-white/20 px-8 py-4 md:px-10 md:py-5 rounded-lg font-bold uppercase text-[10px] md:text-[11px] tracking-widest transition-all shadow-md hover:-translate-y-2">
                        {{ __('messages.transport.hero.cta_security') }}
                    </a>
                </div>
            </div>
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

    @include('chatbot')
    
    <main id="layanan" class="container mx-auto px-6 -mt-24 relative z-20 pb-32">
        <div class="flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 w-full max-w-5xl">

                <div class="bg-white rounded-[1.5rem] border border-slate-100 shadow-2xl shadow-slate-200/60 overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-3 hover:shadow-blue-500/10 group"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="p-10 bg-slate-50/50 border-b border-slate-100 flex justify-center items-center">
                        <div
                            class="w-20 h-20 bg-slate-900 rounded-2xl flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform duration-500 animate-float">
                            <i class="fas fa-taxi text-white text-3xl"></i>
                        </div>
                    </div>

                    <div class="p-10 flex-grow flex flex-col items-center text-center">
                        <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tight mb-4">
                            {{ __('messages.transport.cards.taxi_title') }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium italic">
                            "{{ __('messages.transport.cards.taxi_desc') }}"
                        </p>

                        <ul class="space-y-4 text-left w-full mb-8 border-t border-slate-50 pt-8">
                            <li class="flex items-center space-x-4">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                                    <i class="fas fa-tags text-blue-600 text-sm"></i>
                                </div>
                                <span
                                    class="text-[13px] text-slate-700 font-bold uppercase tracking-wider">{{ __('messages.transport.cards.taxi_li_1') }}</span>
                            </li>
                            <li class="flex items-center space-x-4">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                                    <i class="fas fa-user-shield text-blue-600 text-sm"></i>
                                </div>
                                <span
                                    class="text-[13px] text-slate-700 font-bold uppercase tracking-wider">{{ __('messages.transport.cards.taxi_li_2') }}</span>
                            </li>
                        </ul>

                        <div class="mt-auto w-full">
                            <button
                                class="w-full py-5 bg-slate-900 text-white rounded-xl font-black text-[11px] uppercase tracking-[0.2em] hover:bg-blue-600 transition-all duration-300 shadow-lg shadow-slate-900/20">
                                {{ __('messages.transport.cards.taxi_btn') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[1.5rem] border border-slate-100 shadow-2xl shadow-slate-200/60 overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-3 hover:shadow-blue-500/10 group"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="p-10 bg-blue-50/30 border-b border-blue-50 flex justify-center items-center">
                        <div class="w-20 h-20 bg-blue-600 rounded-2xl flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform duration-500 animate-float"
                            style="animation-delay: 1s">
                            <i class="fas fa-mobile-alt text-white text-3xl"></i>
                        </div>
                    </div>

                    <div class="p-10 flex-grow flex flex-col items-center text-center">
                        <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tight mb-4">
                            {{ __('messages.transport.cards.online_title') }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium italic">
                            {{ __('messages.transport.cards.online_desc') }}
                        </p>

                        <ul class="space-y-4 text-left w-full mb-8 border-t border-slate-50 pt-8">
                            <li class="flex items-center space-x-4">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                                    <i class="fas fa-walking text-blue-600 text-sm"></i>
                                </div>
                                <span
                                    class="text-[13px] text-slate-700 font-bold uppercase tracking-wider">{{ __('messages.transport.cards.online_li_1') }}</span>
                            </li>
                            <li class="flex items-center space-x-4">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                                    <i class="fas fa-map-pin text-blue-600 text-sm"></i>
                                </div>
                                <span
                                    class="text-[13px] text-slate-700 font-bold uppercase tracking-wider">{{ __('messages.transport.cards.online_li_3') }}</span>
                            </li>
                        </ul>

                        <div class="mt-auto w-full">
                            <a href="#"
                                class="block w-full py-5 border-2 border-blue-600 text-blue-600 text-center rounded-xl font-black text-[11px] uppercase tracking-[0.2em] hover:bg-blue-600 hover:text-white transition-all duration-300">
                                {{ __('messages.transport.cards.online_btn') }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <section id="prosedur"
        class="mb-24 py-16 px-8 md:px-20 bg-white rounded-[3rem] border border-slate-100 shadow-sm"
        data-aos="fade-up">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter mb-10 text-center">
                {{ __('messages.transport.procedure.title_1') }} <span class="text-blue-600">
                    {{ __('messages.transport.procedure.title_2') }}</span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div data-aos="fade-right" data-aos-delay="200">
                    <h4 class="text-blue-600 font-black uppercase text-xs tracking-widest mb-4">
                        {{ __('messages.transport.procedure.sec1_title') }}
                    </h4>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 text-justify">
                        {{ __('messages.transport.procedure.sec1_desc') }}
                    </p>
                </div>
                <div data-aos="fade-left" data-aos-delay="200">
                    <h4 class="text-blue-600 font-black uppercase text-xs tracking-widest mb-4">
                        {{ __('messages.transport.procedure.sec2_title') }}
                    </h4>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 text-justify">
                        {{ __('messages.transport.procedure.sec2_desc') }}
                    </p>
                </div>
            </div>
            <div class="bg-blue-50 border border-blue-100 p-8 rounded-[2rem] mt-10">
                <div class="flex items-start">
                    <i class="fas fa-shield-alt text-blue-600 text-2xl mr-6 mt-1"></i>
                    <div>
                        <h5 class="text-blue-900 font-black text-xs uppercase tracking-widest mb-2">
                            {{ __('messages.transport.procedure.alert_title') }}
                        </h5>
                        <p class="text-blue-800/80 text-xs font-medium leading-relaxed">
                            {{ __('messages.transport.procedure.alert_desc') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-950 rounded-[3.5rem] overflow-hidden shadow-3xl relative mb-24" data-aos="zoom-in-up">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/5 skew-x-12 translate-x-32"></div>
        <div class="flex flex-col lg:flex-row relative z-10">
            <div class="p-12 lg:p-24 lg:w-2/3">
                <div
                    class="inline-flex items-center space-x-4 text-blue-500 font-black uppercase tracking-[0.5em] text-[10px] mb-8">
                    <div class="w-12 h-[2px] bg-blue-600"></div>
                    <span>
                        {{ __('messages.transport.parking.badge') }}
                    </span>
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter mb-10 leading-[0.9]">
                    {{ __('messages.transport.parking.title_1') }} <br>
                    <span class="text-blue-600">
                        {{ __('messages.transport.parking.title_2') }}
                    </span>
                </h2>
                <p class="text-slate-400 text-lg font-medium mb-12 max-w-2xl leading-relaxed">
                    {{ __('messages.transport.parking.desc') }}
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="bg-white/5 border border-white/10 p-10 rounded-[2rem] backdrop-blur-md"
                        data-aos="flip-left" data-aos-delay="300">
                        <p class="text-blue-500 font-black uppercase text-[10px] tracking-widest mb-4">
                            {{ __('messages.transport.parking.motor') }}</p>
                        <p class="text-4xl font-black text-white">IDR 20.000 <span
                                class="text-xs text-slate-500 uppercase tracking-[0.2em] ml-2">
                                {{ __('messages.transport.parking.per_day') }}</span></p>
                    </div>
                    <div class="bg-white/5 border border-white/10 p-10 rounded-[2rem] backdrop-blur-md"
                        data-aos="flip-left" data-aos-delay="500">
                        <p class="text-blue-500 font-black uppercase text-[10px] tracking-widest mb-4">
                            {{ __('messages.transport.parking.car') }}</p>
                        <p class="text-4xl font-black text-white">IDR 50.000 <span
                                class="text-xs text-slate-500 uppercase tracking-[0.2em] ml-2">
                                {{ __('messages.transport.parking.per_day') }}</span></p>
                    </div>
                </div>
            </div>
            <div
                class="bg-blue-600/10 lg:w-1/3 flex flex-col justify-center items-center p-16 text-center border-l border-white/5">
                <div
                    class="w-24 h-24 bg-blue-600 rounded-[2.5rem] flex items-center justify-center mb-8 rotate-12 animate-float">
                    <i class="fas fa-shield text-white text-4xl"></i>
                </div>
                <h4 class="text-white font-black uppercase tracking-tighter text-2xl mb-4">
                    {{ __('messages.transport.parking.side_title') }}
                </h4>
                <p class="text-slate-400 text-xs leading-relaxed font-medium">
                    {{ __('messages.transport.parking.side_desc') }}
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-4xl mx-auto mb-24" data-aos="fade-up">
        <h3 class="text-3xl font-black text-slate-900 uppercase tracking-tighter mb-12 text-center">
            {{ __('messages.transport.faq.title') }}</h3>
        <div class="grid gap-6">
            <div
                class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 transition-all hover:border-blue-200">
                <h5 class="font-black text-slate-900 text-sm mb-4 uppercase tracking-tight">
                    {{ __('messages.transport.faq.q1') }}</h5>
                <p class="text-slate-500 text-sm leading-relaxed">
                    {{ __('messages.transport.faq.a1') }}</p>
            </div>
            <div
                class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 transition-all hover:border-blue-200">
                <h5 class="font-black text-slate-900 text-sm mb-4 uppercase tracking-tight">
                    {{ __('messages.transport.faq.q2') }}</h5>
                <p class="text-slate-500 text-sm leading-relaxed">
                    {{ __('messages.transport.faq.a2') }}
                </p>
            </div>
        </div>
    </section>

    </main>

    <footer class="bg-white border-t border-slate-100 py-24 text-center">
        <div class="container mx-auto px-6">
            <div
                class="w-20 h-20 bg-slate-950 rounded-[2rem] flex items-center justify-center mx-auto mb-12 animate-float shadow-2xl shadow-blue-500/20">
                <i class="fas fa-plane text-blue-500 text-2xl"></i>
            </div>
            <h4 class="text-slate-900 font-black uppercase tracking-widest text-lg mb-4">
                {{ __('messages.transport.footer.title') }}</h4>
            <p class="text-[11px] font-bold uppercase tracking-[0.5em] text-slate-400 mb-12">
                {{ __('messages.transport.footer.subtitle') }}</p>
            {{-- <div class="flex justify-center space-x-8 mb-16">
                <a href="#" class="text-slate-400 hover:text-blue-600 transition-colors"><i class="fab fa-instagram text-xl"></i></a>
                <a href="#" class="text-slate-400 hover:text-blue-600 transition-colors"><i class="fab fa-twitter text-xl"></i></a>
                <a href="#" class="text-slate-400 hover:text-blue-600 transition-colors"><i class="fab fa-facebook text-xl"></i></a>
            </div> --}}
            <div class="max-w-2xl mx-auto">
                <p class="text-[10px] text-slate-400 leading-relaxed uppercase tracking-[0.2em]">
                    {{ __('messages.transport.footer.copyright') }}
                </p>
            </div>
        </div>
    </footer>

    <button id="backToTop"
        class="fixed bottom-8 right-8 z-50 bg-blue-600 text-white w-14 h-14 rounded-2xl shadow-2xl flex items-center justify-center opacity-0 -translate-y-10 transition-all duration-500 pointer-events-none hover:bg-blue-700 hover:scale-110 active:scale-95">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            offset: 80,
            easing: 'ease-out-quint'
        });

        const backToTopBtn = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                backToTopBtn.classList.add('visible');
                backToTopBtn.classList.remove('-translate-y-10');
            } else {
                backToTopBtn.classList.remove('visible');
                backToTopBtn.classList.add('-translate-y-10');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>

