{{-- resources/views/layanan-cargo.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.cargo.meta.title') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&family=Inter:wght@400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }

        .main-bg-pattern {
            background-color: #f8fafc;
            background-image:
                radial-gradient(#2563eb08 1px, transparent 1px),
                radial-gradient(#2563eb08 1px, #f8fafc 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }

        .font-formal { font-family: 'Inter', sans-serif; }
        .no-italic { font-style: normal !important; }

        .text-gradient-slate {
            background: linear-gradient(to right, #0f172a, #334155);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .cargo-dark-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        .custom-scrollbar::-webkit-scrollbar { width: 8px; }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #0f172a;
            border-radius: 10px;
        }
    </style>
</head>

<body class="main-bg-pattern text-slate-900 antialiased overflow-x-hidden custom-scrollbar">

    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex items-center justify-start space-x-6">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="bg-slate-900 p-2 rounded-lg group-hover:bg-blue-600 transition-all duration-300">
                    <i class="fas fa-boxes-packing text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900 group-hover:text-blue-600 transition-colors">
                    {{ __('messages.cargo.nav.back') }}
                </span>
            </a>
            <div class="h-6 w-[1px] bg-slate-200 hidden md:block"></div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12 md:py-20 relative">

        {{-- HERO --}}
        <div class="max-w-4xl mb-24 font-formal no-italic" data-aos="fade-right">
            <h6 class="text-blue-700 font-extrabold uppercase tracking-[0.4em] text-[11px] mb-6 border-b-2 border-blue-600 w-fit pb-2 no-italic">
                {{ __('messages.cargo.hero.badge') }}
            </h6>

            <h1 class="text-6xl md:text-8xl font-black text-slate-900 leading-[0.85] uppercase tracking-tighter mb-10 no-italic">
                {{ __('messages.cargo.hero.title') }} <br>
                <span class="text-gradient-slate no-italic">
                    {{ __('messages.cargo.hero.highlight') }}
                </span>
            </h1>

            <div class="relative">
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-slate-900"></div>
                <p class="text-slate-500 text-lg md:text-xl font-medium leading-relaxed max-w-3xl pl-8 no-italic text-justify">
                    {!! __('messages.cargo.hero.desc') !!}
                </p>
            </div>
        </div>

        {{-- SERVICES --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-32">

            <div class="bg-white p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-slate-100 group transition-all hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-slate-900 transition-colors">
                    <i class="fas fa-box text-slate-900 group-hover:text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-black uppercase mb-4 text-slate-900">
                    {{ __('messages.cargo.cards.general.title') }}
                </h4>
                <p class="text-sm text-slate-500 leading-relaxed font-medium text-justify">
                    {{ __('messages.cargo.cards.general.desc') }}
                </p>
            </div>

            <div class="bg-white p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-slate-100 group transition-all hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-green-600 transition-colors">
                    <i class="fas fa-leaf text-green-600 group-hover:text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-black uppercase mb-4 text-slate-900">
                    {{ __('messages.cargo.cards.perishables.title') }}
                </h4>
                <p class="text-sm text-slate-500 leading-relaxed font-medium text-justify">
                    {{ __('messages.cargo.cards.perishables.desc') }}
                </p>
            </div>

            <div class="bg-white p-10 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-slate-100 group transition-all hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-red-600 transition-colors">
                    <i class="fas fa-shield-virus text-red-600 group-hover:text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-black uppercase mb-4 text-slate-900">
                    {{ __('messages.cargo.cards.special.title') }}
                </h4>
                <p class="text-sm text-slate-500 leading-relaxed font-medium text-justify">
                    {!! __('messages.cargo.cards.special.desc') !!}
                </p>
            </div>
        </div>

        {{-- OPERATIONAL --}}
        <div class="cargo-dark-gradient rounded-[3.5rem] p-10 md:p-20 text-white relative overflow-hidden shadow-2xl shadow-slate-900/20 mb-32" data-aos="zoom-in">
            <i class="fas fa-warehouse absolute -bottom-10 -right-10 text-[18rem] opacity-5"></i>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center relative z-10">
                <div>
                    <h3 class="text-3xl font-black uppercase italic mb-8 border-l-4 border-blue-500 pl-6">
                        {{ __('messages.cargo.operational.title_1') }}
                        <span class="text-blue-400">{{ __('messages.cargo.operational.title_2') }}</span>
                    </h3>

                    <div class="space-y-8">

                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-blue-400"></i>
                            </div>
                            <div>
                                <p class="font-black uppercase text-xs tracking-widest text-slate-400 mb-1">
                                    {{ __('messages.cargo.operational.hours.label') }}
                                </p>
                                <p class="text-xl font-bold">
                                    {{ __('messages.cargo.operational.hours.value') }}
                                </p>
                                <p class="text-xs text-slate-500 mt-1">
                                    {{ __('messages.cargo.operational.hours.note') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marked-alt text-blue-400"></i>
                            </div>
                            <div>
                                <p class="font-black uppercase text-xs tracking-widest text-slate-400 mb-1">
                                    {{ __('messages.cargo.operational.location.label') }}
                                </p>
                                <p class="text-xl font-bold">
                                    {{ __('messages.cargo.operational.location.value') }}
                                </p>
                                <p class="text-xs text-slate-500 mt-1">
                                    {{ __('messages.cargo.operational.location.note') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-2xl p-10 rounded-[2.5rem] border border-white/10 shadow-inner">
                    <h4 class="text-center font-black uppercase tracking-[0.2em] text-[10px] mb-8 text-blue-400">
                        {{ __('messages.cargo.hotline.title') }}
                    </h4>

                    <div class="space-y-4">
                        <a href="{{ __('messages.cargo.hotline.wa_url') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex items-center justify-between bg-white text-slate-900 p-5 rounded-2xl font-black uppercase text-xs hover:bg-blue-600 hover:text-white transition-all group">
                            <div class="flex items-center gap-3">
                                <i class="fab fa-whatsapp text-xl text-green-500 group-hover:text-white"></i>
                                <span>{{ __('messages.cargo.hotline.wa_label') }}</span>
                            </div>
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <div class="p-4 rounded-2xl border border-white/5 text-center">
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">
                                {{ __('messages.cargo.hotline.phone_label') }}
                            </p>
                            <p class="text-sm font-bold">
                                {{ __('messages.cargo.hotline.phone_value') }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- PROCEDURE --}}
        <div class="max-w-4xl mx-auto mb-20" data-aos="fade-up">
            <h4 class="text-2xl font-black uppercase tracking-tighter mb-8 text-center">
                {{ __('messages.cargo.procedure.title') }}
            </h4>

            <div class="space-y-4">
                <div class="flex gap-6 p-6 bg-white rounded-2xl border border-slate-100 items-center">
                    <span class="text-4xl font-black text-slate-100">
                        {{ __('messages.cargo.procedure.1.number') }}
                    </span>
                    <p class="text-sm font-medium text-slate-600">
                        {{ __('messages.cargo.procedure.1.desc') }}
                    </p>
                </div>

                <div class="flex gap-6 p-6 bg-white rounded-2xl border border-slate-100 items-center">
                    <span class="text-4xl font-black text-slate-100">
                        {{ __('messages.cargo.procedure.2.number') }}
                    </span>
                    <p class="text-sm font-medium text-slate-600">
                        {{ __('messages.cargo.procedure.2.desc') }}
                    </p>
                </div>

                <div class="flex gap-6 p-6 bg-white rounded-2xl border border-slate-100 items-center">
                    <span class="text-4xl font-black text-slate-100">
                        {{ __('messages.cargo.procedure.3.number') }}
                    </span>
                    <p class="text-sm font-medium text-slate-600">
                        {{ __('messages.cargo.procedure.3.desc') }}
                    </p>
                </div>
            </div>
        </div>

    </main>

    <footer class="py-16 border-t border-slate-200 text-center bg-white">
        <div class="container mx-auto px-6">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.6em]">
                {!! __('messages.cargo.footer.copyright') !!}
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            mirror: true,
            easing: 'ease-in-out'
        });
    </script>
</body>
</html>
