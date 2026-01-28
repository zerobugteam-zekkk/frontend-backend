<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.security_page.meta.title') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap');

        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }

        .main-bg-pattern {
            background-color: #f8fafc;
            background-image:
                radial-gradient(#2563eb08 1px, transparent 1px),
                radial-gradient(#2563eb08 1px, #f8fafc 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }

        .security-gradient { background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%); }

        @keyframes float-subtle {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .animate-hover-float:hover { animation: float-subtle 2s ease-in-out infinite; }

        .custom-scrollbar::-webkit-scrollbar { width: 8px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #2563eb; border-radius: 10px; }
    </style>
</head>

<body class="main-bg-pattern text-slate-900 antialiased overflow-x-hidden custom-scrollbar">

    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex items-center justify-start space-x-6">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="bg-blue-600 p-2 rounded-lg group-hover:bg-slate-900 transition-all duration-300">
                    <i class="fas fa-shield-halved text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900 group-hover:text-blue-600 transition-colors">
                    {{ __('messages.security_page.nav.back_home') }}
                </span>
            </a>
            <div class="h-6 w-[1px] bg-slate-200 hidden md:block"></div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12 md:py-20 relative">

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <style>
            .font-formal { font-family: 'Inter', sans-serif; }
            .no-italic { font-style: normal !important; }
            .text-gradient-blue {
                background: linear-gradient(to right, #1e40af, #3b82f6);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        </style>

        <div class="max-w-4xl mb-24 font-formal no-italic" data-aos="fade-right">
            <h6 class="text-blue-700 font-extrabold uppercase tracking-[0.4em] text-[11px] mb-6 border-b-2 border-blue-600 w-fit pb-2 no-italic">
                {{ __('messages.security_page.hero.badge') }}
            </h6>

            <h1 class="text-6xl md:text-8xl font-black text-slate-900 leading-[0.85] uppercase tracking-tighter mb-10 no-italic">
                {{ __('messages.security_page.hero.title_1') }} <br>
                <span class="text-gradient-blue no-italic">{{ __('messages.security_page.hero.title_2') }}</span>
            </h1>

            <div class="relative">
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-blue-700"></div>

                <p class="text-slate-500 text-lg md:text-xl font-medium leading-relaxed max-w-3xl pl-8 no-italic">
                    {!! __('messages.security_page.hero.desc_html') !!}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-32">

            {{-- SCP 1 --}}
            <div class="security-gradient p-8 md:p-12 rounded-[3rem] text-white relative overflow-hidden shadow-2xl shadow-blue-900/20"
                 data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-person-rays absolute -bottom-10 -right-10 text-[15rem] opacity-10"></i>

                <div class="relative z-10">
                    <h3 class="text-2xl md:text-3xl font-black uppercase mb-6 italic">
                        {{ __('messages.security_page.scp1.title') }}
                    </h3>

                    <p class="text-blue-100 mb-8 text-sm md:text-base leading-relaxed font-medium">
                        {{ __('messages.security_page.scp1.desc') }}
                    </p>

                    <ul class="space-y-4 text-xs md:text-sm font-bold uppercase tracking-widest text-blue-200">
                        <li class="flex items-center gap-3 bg-white/10 p-3 rounded-xl">
                            <i class="fas fa-id-card text-blue-400"></i>
                            {{ __('messages.security_page.scp1.points.1') }}
                        </li>
                        <li class="flex items-center gap-3 bg-white/10 p-3 rounded-xl">
                            <i class="fas fa-conveyor-belt text-blue-400"></i>
                            {{ __('messages.security_page.scp1.points.2') }}
                        </li>
                        <li class="flex items-center gap-3 bg-white/10 p-3 rounded-xl">
                            <i class="fas fa-user-check text-blue-400"></i>
                            {{ __('messages.security_page.scp1.points.3') }}
                        </li>
                    </ul>
                </div>
            </div>

            {{-- SCP 2 --}}
            <div class="bg-white p-8 md:p-12 rounded-[3rem] shadow-xl border border-slate-100 relative overflow-hidden"
                 data-aos="fade-up" data-aos-delay="300">
                <div class="relative z-10">
                    <h3 class="text-2xl md:text-3xl font-black uppercase mb-6 italic text-slate-900">
                        {{ __('messages.security_page.scp2.title') }}
                    </h3>

                    <p class="text-slate-500 mb-8 text-sm md:text-base leading-relaxed font-medium">
                        {{ __('messages.security_page.scp2.desc') }}
                    </p>

                    <ul class="space-y-4 text-xs md:text-sm font-bold uppercase tracking-widest text-slate-400">
                        <li class="flex items-center gap-3 border border-slate-100 p-3 rounded-xl">
                            <i class="fas fa-vial text-blue-600"></i>
                            {{ __('messages.security_page.scp2.points.1') }}
                        </li>
                        <li class="flex items-center gap-3 border border-slate-100 p-3 rounded-xl">
                            <i class="fas fa-laptop text-blue-600"></i>
                            {{ __('messages.security_page.scp2.points.2') }}
                        </li>
                        <li class="flex items-center gap-3 border border-slate-100 p-3 rounded-xl">
                            <i class="fas fa-hands-holding text-blue-600"></i>
                            {{ __('messages.security_page.scp2.points.3') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- PROHIBITED ITEMS --}}
        <div class="mb-32">
            <div class="text-center mb-16" data-aos="zoom-in">
                <h4 class="font-black uppercase tracking-[0.3em] text-slate-400 text-[11px] mb-4">
                    {{ __('messages.security_page.prohibited.title') }}
                </h4>
                <p class="max-w-2xl mx-auto text-slate-500 text-sm">
                    {{ __('messages.security_page.prohibited.desc') }}
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-8 bg-white rounded-[2rem] border border-slate-100 shadow-lg shadow-slate-200/50 animate-hover-float transition-all hover:border-blue-200 group" data-aos="flip-left">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-fire-extinguisher text-3xl text-blue-600 group-hover:text-white"></i>
                    </div>
                    <p class="text-[10px] font-black uppercase text-slate-900">{{ __('messages.security_page.prohibited.items.1') }}</p>
                </div>

                <div class="text-center p-8 bg-white rounded-[2rem] border border-slate-100 shadow-lg shadow-slate-200/50 animate-hover-float transition-all hover:border-blue-200 group" data-aos="flip-left" data-aos-delay="100">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-knife text-3xl text-blue-600 group-hover:text-white"></i>
                    </div>
                    <p class="text-[10px] font-black uppercase text-slate-900">{{ __('messages.security_page.prohibited.items.2') }}</p>
                </div>

                <div class="text-center p-8 bg-white rounded-[2rem] border border-slate-100 shadow-lg shadow-slate-200/50 animate-hover-float transition-all hover:border-blue-200 group" data-aos="flip-left" data-aos-delay="200">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-battery-full text-3xl text-blue-600 group-hover:text-white"></i>
                    </div>
                    <p class="text-[10px] font-black uppercase text-slate-900">{{ __('messages.security_page.prohibited.items.3') }}</p>
                </div>

                <div class="text-center p-8 bg-white rounded-[2rem] border border-slate-100 shadow-lg shadow-slate-200/50 animate-hover-float transition-all hover:border-blue-200 group" data-aos="flip-left" data-aos-delay="300">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 transition-colors">
                        <i class="fas fa-biohazard text-3xl text-blue-600 group-hover:text-white"></i>
                    </div>
                    <p class="text-[10px] font-black uppercase text-slate-900">{{ __('messages.security_page.prohibited.items.4') }}</p>
                </div>
            </div>
        </div>

        {{-- LAGs --}}
        <section class="bg-blue-700 rounded-[3rem] p-10 md:p-16 text-white shadow-2xl shadow-blue-200 relative overflow-hidden" data-aos="zoom-in">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
            <div class="flex flex-col lg:flex-row items-center gap-12 relative z-10">
                <div class="text-7xl font-black italic border-b-4 border-blue-400 pb-2">100ml</div>
                <div class="flex-1">
                    <h5 class="text-2xl font-black uppercase mb-4 tracking-tight">
                        {{ __('messages.security_page.lags.title') }}
                    </h5>
                    <p class="text-blue-50 opacity-90 leading-relaxed text-sm md:text-base font-medium">
                        {!! __('messages.security_page.lags.desc_html') !!}
                    </p>
                </div>
            </div>
        </section>

    </main>

    <footer class="py-16 border-t border-slate-200 text-center bg-white">
        <div class="container mx-auto px-6">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.6em]">
                {!! __('messages.security_page.footer.copy_html') !!}
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            mirror: true,
            offset: 120,
            easing: 'ease-in-out'
        });
    </script>
</body>
</html>
