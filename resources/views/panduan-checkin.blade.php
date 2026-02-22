{{-- resources/views/panduan-checkin.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.checkin.meta.title') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }

        .main-bg-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#2563eb10 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .hero-desc-container p,
        .hero-desc-container p * {
            color: #ffffff !important;
            --tw-text-opacity: 1 !important;
            font-weight: 300 !important;
        }

        .hover-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(30, 58, 138, 0.15);
        }

        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
        .animate-float { animation: float 4s ease-in-out infinite; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #2563eb; border-radius: 10px; }
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
                    {{ __('messages.checkin.nav.back') }}
                </span>
            </a>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <header class="relative min-h-[85vh] flex flex-col justify-center bg-slate-950 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/Bandara Malang Abdurachman Saleh.jpg') }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-30 scale-105" 
                 alt="Background Check-in">
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
                

                <h1 class="text-5xl md:text-8xl font-black text-white leading-[0.85] uppercase tracking-tighter mb-12">
                    {!! nl2br(e(__('messages.checkin.hero.title'))) !!} <br>
                    <span class="text-transparent border-y border-slate-800 bg-clip-text bg-gradient-to-r from-blue-400 via-white to-blue-200 pt-4 pb-4 inline-block">
                        {{ __('messages.checkin.hero.highlight') }}
                    </span>
                </h1>

                <div class="max-w-2xl hero-desc-container">
                    <p class="text-white text-lg md:text-xl leading-relaxed border-l-4 border-blue-600 pl-8 text-justify italic font-light">
                        {{ __('messages.checkin.hero.desc') }}
                    </p>
                </div>
            </div>
        </div>
    </header>

    {{-- CONTENT STEPS --}}
    <main class="container mx-auto px-6 py-32 relative">
        <div class="grid grid-cols-1 gap-16 max-w-6xl mx-auto mb-40">

            @foreach([1, 2, 3] as $step)
            <div class="group relative bg-white rounded-[4rem] p-10 md:p-20 border border-slate-100 shadow-xl shadow-slate-200/40 hover-card overflow-hidden" 
                 data-aos="fade-up" data-aos-delay="{{ $step * 100 }}">
                
                <div class="absolute -right-12 -top-12 text-[20rem] font-black text-slate-50 opacity-50 group-hover:opacity-80 transition-all leading-none z-0">
                    {{ $step }}
                </div>

                <div class="flex flex-col lg:flex-row gap-16 relative z-10">
                    <div class="lg:w-1/3">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-[2rem] bg-blue-600 text-white text-3xl font-black mb-10 shadow-2xl shadow-blue-600/30 group-hover:rotate-6 transition-transform">
                            0{{ $step }}
                        </div>
                        <h3 class="text-4xl font-black uppercase tracking-tighter text-slate-900 leading-[0.9] italic">
                            {{ __("messages.checkin.steps.$step.title") }}
                        </h3>
                    </div>

                    <div class="lg:w-2/3">
                        <div class="text-slate-500 text-xl leading-relaxed font-medium mb-12">
                            {!! __("messages.checkin.steps.$step.desc") !!}
                        </div>

                        @if($step == 2)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach([1, 2] as $card)
                            <div class="p-10 bg-slate-50 rounded-[2.5rem] border border-slate-100 group-hover:border-blue-200 transition-all duration-500">
                                <span class="block text-blue-600 font-black uppercase text-[10px] tracking-[0.3em] mb-4">
                                    {{ __("messages.checkin.steps.2.card{$card}_label") }}
                                </span>
                                <p class="text-slate-900 font-black uppercase text-xl tracking-tighter leading-tight">
                                    {{ __("messages.checkin.steps.2.card{$card}_value") }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        @if($step == 3)
                        <div class="p-10 bg-blue-600 rounded-[3rem] text-white shadow-2xl shadow-blue-600/30 animate-float">
                            <h4 class="font-black text-sm uppercase tracking-[0.2em] mb-6 flex items-center">
                                <span class="w-10 h-10 rounded-2xl bg-white/20 flex items-center justify-center mr-4">
                                    <i class="fas fa-exclamation-triangle text-xs"></i>
                                </span>
                                {{ __('messages.checkin.steps.3.rule_title') }}
                            </h4>
                            <div class="text-lg leading-relaxed text-blue-50 font-light italic">
                                {!! __('messages.checkin.steps.3.rule_desc') !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- WEB CHECK-IN SECTION --}}
        <section class="max-w-7xl mx-auto bg-slate-950 rounded-[5rem] p-12 md:p-24 text-white overflow-hidden shadow-3xl relative mb-40" data-aos="zoom-in">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/5 -skew-x-12 translate-x-32 blur-3xl"></div>
            
            <div class="relative z-10 flex flex-col xl:flex-row items-center justify-between gap-16">
                <div class="max-w-2xl text-center xl:text-left">
                    <h2 class="text-5xl md:text-6xl font-black uppercase tracking-tighter mb-8 italic leading-none">
                        {{ __('messages.checkin.web.title') }}
                    </h2>
                    <p class="text-slate-400 text-xl leading-relaxed font-light">
                        {{ __('messages.checkin.web.desc') }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-6 w-full xl:w-auto">
                    <a href="{{ __('messages.checkin.web.airlines.lion_url') }}" target="_blank"
                       class="group bg-blue-600 hover:bg-white text-white hover:text-blue-600 px-12 py-6 rounded-2xl font-black uppercase text-xs tracking-[0.2em] transition-all duration-500 text-center shadow-2xl shadow-blue-600/20">
                        {{ __('messages.checkin.web.airlines.lion_label') }}
                        <i class="fas fa-external-link-alt ml-3 opacity-50 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </a>
                    <a href="{{ __('messages.checkin.web.airlines.garuda_url') }}" target="_blank"
                       class="group bg-white/5 hover:bg-white/10 border border-white/10 px-12 py-6 rounded-2xl font-black uppercase text-xs tracking-[0.2em] transition-all duration-500 text-center">
                        {{ __('messages.checkin.web.airlines.garuda_label') }}
                        <i class="fas fa-external-link-alt ml-3 opacity-50 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <div class="max-w-5xl mx-auto mb-20">
            <div class="text-center mb-24">
                <h4 class="font-black uppercase tracking-[0.5em] text-blue-600 text-xs mb-6">Common Inquiries</h4>
                <h2 class="text-5xl font-black uppercase tracking-tighter text-slate-900 italic">
                    {{ __('messages.checkin.faq.title') }}
                </h2>
                <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full mt-8"></div>
            </div>

            <div class="grid grid-cols-1 gap-6">
                @foreach(['q1' => 'a1', 'q2' => 'a2'] as $q => $a)
                <div class="bg-white border border-slate-100 p-10 md:p-14 rounded-[3.5rem] hover-card shadow-xl shadow-slate-200/30" data-aos="fade-up">
                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center font-black text-sm">Q</div>
                        <div>
                            <p class="font-black text-slate-900 uppercase text-lg mb-6 tracking-tighter leading-tight">
                                {{ __("messages.checkin.faq.$q") }}
                            </p>
                            <p class="text-slate-500 font-medium text-lg leading-relaxed border-l-2 border-slate-100 pl-6">
                                {{ __("messages.checkin.faq.$a") }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="py-24 border-t border-slate-100 bg-white text-center">
        <div class="container mx-auto px-6">
            <img src="{{ asset('images/dishupmalang.jpg') }}" class="h-12 mx-auto mb-12 opacity-30 grayscale" alt="Dishub">
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.8em] leading-loose">
                {{ __('messages.checkin.footer.copyright') }}
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