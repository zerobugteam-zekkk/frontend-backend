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
            font-weight: 400 !important; /* Memastikan teks deskripsi tidak tebal */
        }

        /* Kecuali untuk tag strong/b jika Anda ingin tetap sedikit kontras, 
           tapi jika ingin benar-benar tipis semua, biarkan font-weight: 400 */
        .hero-desc-container p strong, 
        .hero-desc-container p b {
            font-weight: 600 !important; 
        }

        .main-bg-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#0f172a10 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .cargo-dark-gradient {
            background: linear-gradient(135deg, #020617 0%, #0f172a 100%);
        }

        .service-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.1);
        }
    </style>
</head>

<body class="main-bg-pattern text-slate-900 antialiased overflow-x-hidden">

    {{-- NAVIGATION --}}
    <nav class="fixed top-0 left-0 right-0 z-[100] bg-slate-950/80 backdrop-blur-xl border-b border-white/5">
        <div class="container mx-auto px-6 py-5">
            <a href="{{ url('/') }}" class="flex items-center gap-4 group">
                <div class="bg-blue-600 p-2.5 rounded-xl group-hover:bg-blue-500 transition-all duration-300 shadow-lg shadow-blue-600/20">
                    <i class="fas fa-arrow-left text-white text-sm"></i>
                </div>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-white/90 group-hover:text-white transition-colors">
                    {{ __('messages.cargo.nav.back') }}
                </span>
            </a>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <header class="relative min-h-[90vh] flex flex-col justify-center bg-slate-950 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/Bandara Malang Abdurachman Saleh.jpg') }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-30 scale-105" 
                 alt="Background Cargo">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
        </div>

        {{-- LOGO BRANDING --}}
        <div class="absolute top-32 right-12 z-20 hidden lg:flex items-center gap-5 bg-white/5 backdrop-blur-2xl p-5 rounded-[2.5rem] border border-white/10 shadow-2xl" data-aos="fade-left">
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
                    <span class="text-white text-[8px] font-bold tracking-[0.3em] uppercase opacity-60">Pemerintah</span>
                    <span class="text-white text-[11px] font-black uppercase leading-tight">Kota Malang</span>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 pt-20">
            <div class="max-w-4xl" data-aos="fade-right">

                <h1 class="text-6xl md:text-8xl font-black text-white leading-[0.85] uppercase tracking-tighter mb-12">
                    {{ __('messages.cargo.hero.title') }} <br>
                    <span class="text-transparent border-y border-slate-800 bg-clip-text bg-gradient-to-r from-blue-400 via-white to-slate-400 pt-4 pb-4 inline-block">
                        {{ __('messages.cargo.hero.highlight') }}
                    </span>
                </h1>

                <div class="max-w-2xl hero-desc-container">
                    {{-- Teks deskripsi dibuat tipis (font-light / font-weight: 400) --}}
                    <p class="text-white text-lg md:text-xl leading-relaxed border-l-4 border-blue-600 pl-8 text-justify italic font-light">
                        {!! __('messages.cargo.hero.desc') !!}
                    </p>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-32 relative">

        {{-- SERVICES CARDS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-40 max-w-7xl mx-auto">
            @php
                $services = [
                    ['icon' => 'fa-box', 'color' => 'slate', 'key' => 'general'],
                    ['icon' => 'fa-leaf', 'color' => 'green', 'key' => 'perishables'],
                    ['icon' => 'fa-shield-virus', 'color' => 'red', 'key' => 'special']
                ];
            @endphp

            @foreach($services as $index => $svc)
            <div class="service-card bg-white p-12 rounded-[3.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 group" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                <div class="w-20 h-20 bg-{{ $svc['color'] }}-50 rounded-3xl flex items-center justify-center mb-10 group-hover:bg-{{ $svc['color'] }}-600 transition-all duration-500 shadow-inner">
                    <i class="fas {{ $svc['icon'] }} text-{{ $svc['color'] }}-600 group-hover:text-white text-3xl transition-colors"></i>
                </div>
                <h4 class="text-2xl font-black uppercase mb-6 text-slate-900 tracking-tighter">
                    {{ __('messages.cargo.cards.'.$svc['key'].'.title') }}
                </h4>
                <p class="text-slate-500 leading-relaxed font-medium text-justify text-sm opacity-80">
                    {{ __('messages.cargo.cards.'.$svc['key'].'.desc') }}
                </p>
            </div>
            @endforeach
        </div>

        {{-- OPERATIONAL & CONTACT --}}
        <div class="cargo-dark-gradient rounded-[5rem] p-12 md:p-24 text-white relative overflow-hidden shadow-3xl max-w-7xl mx-auto mb-40" data-aos="zoom-in">
            <i class="fas fa-warehouse absolute -bottom-20 -right-20 text-[25rem] opacity-5 rotate-12"></i>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center relative z-10">
                <div>
                    <h3 class="text-4xl md:text-5xl font-black uppercase italic mb-14 border-l-8 border-blue-500 pl-10 tracking-tighter leading-tight">
                        {{ __('messages.cargo.operational.title_1') }}
                        <span class="text-blue-500 block mt-2">{{ __('messages.cargo.operational.title_2') }}</span>
                    </h3>

                    <div class="space-y-12">
                        <div class="flex items-center gap-8 group">
                            <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center border border-white/10 group-hover:bg-blue-600/20 transition-colors">
                                <i class="fas fa-clock text-blue-400 text-2xl"></i>
                            </div>
                            <div>
                                <p class="font-black uppercase text-[10px] tracking-[0.4em] text-slate-500 mb-2">{{ __('messages.cargo.operational.hours.label') }}</p>
                                <p class="text-2xl font-bold tracking-tight">{{ __('messages.cargo.operational.hours.value') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-8 group">
                            <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center border border-white/10 group-hover:bg-blue-600/20 transition-colors">
                                <i class="fas fa-map-marked-alt text-blue-400 text-2xl"></i>
                            </div>
                            <div>
                                <p class="font-black uppercase text-[10px] tracking-[0.4em] text-slate-500 mb-2">{{ __('messages.cargo.operational.location.label') }}</p>
                                <p class="text-2xl font-bold tracking-tight">{{ __('messages.cargo.operational.location.value') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-3xl p-12 md:p-16 rounded-[4rem] border border-white/10 shadow-2xl">
                    <h4 class="text-center font-black uppercase tracking-[0.4em] text-[11px] mb-12 text-blue-400">
                        {{ __('messages.cargo.hotline.title') }}
                    </h4>
                    <a href="{{ __('messages.cargo.hotline.wa_url') }}"
                       class="flex items-center justify-between bg-white text-slate-950 px-8 py-7 rounded-3xl font-black uppercase text-sm hover:scale-[1.02] transition-all duration-300 shadow-2xl">
                        <div class="flex items-center gap-5">
                            <i class="fab fa-whatsapp text-3xl text-green-500"></i>
                            <span>{{ __('messages.cargo.hotline.wa_label') }}</span>
                        </div>
                        <i class="fas fa-arrow-right text-blue-600"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- PROCEDURE --}}
        <div class="max-w-6xl mx-auto mb-32">
            <div class="text-center mb-20" data-aos="fade-up">
                <h4 class="text-xs font-black uppercase tracking-[0.5em] text-blue-600 mb-4">Flow Process</h4>
                <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tighter text-slate-900">
                    {{ __('messages.cargo.procedure.title') }}
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach([1, 2, 3] as $step)
                <div class="relative group h-full" data-aos="fade-up" data-aos-delay="{{ $step * 150 }}">
                    <div class="p-12 bg-white rounded-[3.5rem] border border-slate-100 shadow-xl shadow-slate-200/40 h-full flex flex-col items-center text-center transition-all group-hover:border-blue-200">
                        <div class="w-16 h-16 bg-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 font-black text-xl shadow-lg shadow-blue-200">
                            0{{ $step }}
                        </div>
                        <p class="text-sm font-bold text-slate-700 leading-relaxed uppercase tracking-tight">
                            {{ __('messages.cargo.procedure.'.$step.'.desc') }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </main>

    <footer class="py-24 border-t border-slate-100 bg-white text-center">
        <div class="container mx-auto px-6">
            <img src="{{ asset('images/dishupmalang.jpg') }}" class="h-10 mx-auto mb-10 opacity-30 grayscale hover:grayscale-0 transition-all" alt="Dishub">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.6em] leading-loose">
                {!! __('messages.cargo.footer.copyright') !!}
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