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
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap');

        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }

        .main-bg-pattern{
            background-color:#f8fafc;
            background-image:
                radial-gradient(#2563eb08 1px, transparent 1px),
                radial-gradient(#2563eb08 1px, #f8fafc 1px);
            background-size:40px 40px;
            background-position:0 0, 20px 20px;
        }

        @keyframes float { 0%{transform:translateY(0px);} 50%{transform:translateY(-15px);} 100%{transform:translateY(0px);} }
        .animate-float{ animation: float 4s ease-in-out infinite; }

        .blob-bg{
            position:absolute; width:300px; height:300px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.08) 0%, transparent 70%);
            border-radius:50%; filter: blur(60px); z-index:-1;
        }
        @media (min-width: 768px){ .blob-bg{ width:600px; height:600px; } }
    </style>
</head>

<body class="main-bg-pattern text-slate-900 antialiased overflow-x-hidden">

    <div class="blob-bg -top-20 -left-20"></div>
    <div class="blob-bg top-1/2 -right-20"></div>

    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="container mx-auto px-4 md:px-6 py-4 flex items-center justify-start space-x-8">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="bg-blue-600 p-2 rounded-lg group-hover:bg-slate-900 transition-all duration-300 shadow-lg shadow-blue-600/20">
                    <i class="fas fa-boxes-packing text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900 group-hover:text-blue-600 transition-colors">
                    {{ __('messages.checkin.nav.back') }}
                </span>
            </a>
        </div>
    </nav>

    <main class="container mx-auto px-4 md:px-6 py-12 md:py-20 relative">

        {{-- HERO --}}
        <div class="max-w-4xl mb-16 md:mb-24" data-aos="fade-right">
            <h6 class="text-blue-600 font-black uppercase tracking-[0.4em] text-[10px] md:text-[11px] mb-4 md:mb-6 underline underline-offset-8 decoration-2">
                {{ __('messages.checkin.hero.badge') }}
            </h6>

            <h1 class="text-5xl md:text-8xl font-black text-slate-900 leading-[0.9] md:leading-[0.85] uppercase tracking-tighter mb-8">
                {!! nl2br(e(__('messages.checkin.hero.title'))) !!}
                <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-blue-400 py-2 inline-block">
                    {{ __('messages.checkin.hero.highlight') }}
                </span>
            </h1>

            <p class="text-slate-500 text-base md:text-xl font-medium leading-relaxed max-w-2xl border-l-4 border-blue-600 pl-4 md:pl-6">
                {{ __('messages.checkin.hero.desc') }}
            </p>
        </div>

        {{-- STEPS --}}
        <div class="space-y-8 md:space-y-12 mb-20 md:mb-32">

            {{-- STEP 01 --}}
            <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start bg-white p-6 md:p-16 rounded-[2rem] md:rounded-[3rem] shadow-xl shadow-blue-900/5 border border-slate-100 transition-all hover:shadow-blue-900/10 group"
                 data-aos="fade-up">
                <div class="md:w-1/3">
                    <div class="text-5xl md:text-7xl font-black text-blue-600/10 mb-2 md:mb-4 group-hover:text-blue-600/20 transition-colors">
                        {{ __('messages.checkin.steps.1.number') }}
                    </div>
                    <h3 class="text-2xl md:text-3xl font-black uppercase tracking-tighter text-slate-900">
                        {{ __('messages.checkin.steps.1.title') }}
                    </h3>
                </div>

                <div class="md:w-2/3 space-y-4 text-slate-600 leading-relaxed font-medium text-sm md:text-base">
                    <p>{!! __('messages.checkin.steps.1.desc') !!}</p>
                    <ul class="list-none space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-clock text-blue-600 mt-1 mr-3 text-xs"></i>
                            <span>{{ __('messages.checkin.steps.1.li1') }}</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-exclamation-circle text-blue-600 mt-1 mr-3 text-xs"></i>
                            <span>{{ __('messages.checkin.steps.1.li2') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- STEP 02 --}}
            <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start bg-white p-6 md:p-16 rounded-[2rem] md:rounded-[3rem] shadow-xl shadow-blue-900/5 border border-slate-100 transition-all hover:shadow-blue-900/10 group"
                 data-aos="fade-up">
                <div class="md:w-1/3">
                    <div class="text-5xl md:text-7xl font-black text-blue-600/10 mb-2 md:mb-4 group-hover:text-blue-600/20 transition-colors">
                        {{ __('messages.checkin.steps.2.number') }}
                    </div>
                    <h3 class="text-2xl md:text-3xl font-black uppercase tracking-tighter text-slate-900">
                        {{ __('messages.checkin.steps.2.title') }}
                    </h3>
                </div>

                <div class="md:w-2/3 space-y-4 text-slate-600 leading-relaxed font-medium text-sm md:text-base">
                    <p>{{ __('messages.checkin.steps.2.desc') }}</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4 mt-6">
                        <div class="p-4 bg-blue-50/50 rounded-2xl border border-blue-100">
                            <span class="block text-blue-600 font-bold uppercase text-[9px] mb-1">
                                {{ __('messages.checkin.steps.2.card1_label') }}
                            </span>
                            <p class="text-[11px] md:text-xs uppercase font-black">
                                {{ __('messages.checkin.steps.2.card1_value') }}
                            </p>
                        </div>

                        <div class="p-4 bg-blue-50/50 rounded-2xl border border-blue-100">
                            <span class="block text-blue-600 font-bold uppercase text-[9px] mb-1">
                                {{ __('messages.checkin.steps.2.card2_label') }}
                            </span>
                            <p class="text-[11px] md:text-xs uppercase font-black">
                                {{ __('messages.checkin.steps.2.card2_value') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 03 --}}
            <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start bg-white p-6 md:p-16 rounded-[2rem] md:rounded-[3rem] shadow-xl shadow-blue-900/5 border border-slate-100 transition-all hover:shadow-blue-900/10 group"
                 data-aos="fade-up">
                <div class="md:w-1/3">
                    <div class="text-5xl md:text-7xl font-black text-blue-600/10 mb-2 md:mb-4 group-hover:text-blue-600/20 transition-colors">
                        {{ __('messages.checkin.steps.3.number') }}
                    </div>
                    <h3 class="text-2xl md:text-3xl font-black uppercase tracking-tighter text-slate-900">
                        {{ __('messages.checkin.steps.3.title') }}
                    </h3>
                </div>

                <div class="md:w-2/3 space-y-4 text-slate-600 leading-relaxed font-medium text-sm md:text-base">
                    <p>{{ __('messages.checkin.steps.3.desc') }}</p>

                    <div class="bg-blue-600 p-5 md:p-6 rounded-2xl text-white shadow-lg animate-float">
                        <h4 class="font-black text-[10px] md:text-xs uppercase mb-2">
                            <i class="fas fa-battery-full mr-2"></i>
                            {{ __('messages.checkin.steps.3.rule_title') }}
                        </h4>
                        <p class="text-[11px] md:text-xs leading-relaxed opacity-90">
                            {!! __('messages.checkin.steps.3.rule_desc') !!}
                        </p>
                    </div>
                </div>
            </div>

        </div>

        {{-- WEB CHECK-IN --}}
        <section class="bg-slate-900 rounded-[2.5rem] md:rounded-[5rem] p-8 md:p-20 text-white overflow-hidden relative" data-aos="zoom-in">
            <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-600/10 skew-x-12 translate-x-32"></div>

            <div class="relative z-10 text-center md:text-left">
                <div class="max-w-xl mb-10 md:mb-12">
                    <h2 class="text-3xl md:text-4xl font-black uppercase tracking-tighter italic mb-4">
                        {{ __('messages.checkin.web.title') }}
                    </h2>
                    <p class="text-slate-400 text-sm md:text-base leading-relaxed">
                        {{ __('messages.checkin.web.desc') }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ __('messages.checkin.web.airlines.lion_url') }}"
                       target="_blank" rel="noopener noreferrer"
                       class="bg-blue-600 hover:bg-white hover:text-blue-600 text-white px-8 py-4 rounded-full font-black uppercase text-[10px] tracking-widest transition-all">
                        {{ __('messages.checkin.web.airlines.lion_label') }}
                        <i class="fas fa-external-link-alt ml-2 text-[8px]"></i>
                    </a>

                    <a href="{{ __('messages.checkin.web.airlines.garuda_url') }}"
                       target="_blank" rel="noopener noreferrer"
                       class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-8 py-4 rounded-full font-black uppercase text-[10px] tracking-widest transition-all">
                        {{ __('messages.checkin.web.airlines.garuda_label') }}
                        <i class="fas fa-external-link-alt ml-2 text-[8px]"></i>
                    </a>
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <div class="mt-20 md:mt-32 max-w-3xl mx-auto">
            <h4 class="text-center font-black uppercase tracking-[0.3em] text-slate-400 text-[10px] mb-12" data-aos="fade-up">
                {{ __('messages.checkin.faq.title') }}
            </h4>

            <div class="space-y-6 px-2">
                <div class="border-b border-slate-200 pb-6 group" data-aos="fade-up">
                    <p class="font-black text-slate-900 uppercase text-xs md:text-sm mb-2 italic group-hover:text-blue-600 transition-colors">
                        {{ __('messages.checkin.faq.q1') }}
                    </p>
                    <p class="text-[13px] md:text-sm text-slate-500 font-medium">
                        {{ __('messages.checkin.faq.a1') }}
                    </p>
                </div>

                <div class="border-b border-slate-200 pb-6 group" data-aos="fade-up">
                    <p class="font-black text-slate-900 uppercase text-xs md:text-sm mb-2 italic group-hover:text-blue-600 transition-colors">
                        {{ __('messages.checkin.faq.q2') }}
                    </p>
                    <p class="text-[13px] md:text-sm text-slate-500 font-medium">
                        {{ __('messages.checkin.faq.a2') }}
                    </p>
                </div>
            </div>
        </div>

    </main>

    <footer class="py-12 border-t border-slate-200 text-center">
        <p class="text-[8px] md:text-[9px] font-black text-slate-400 uppercase tracking-[0.6em] px-4">
            {{ __('messages.checkin.footer.copyright') }}
        </p>
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
