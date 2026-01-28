<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.help.meta.title') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800;900&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            scroll-behavior: smooth;
        }

        .map-container iframe {
            width: 100%;
            height: 450px;
            border-radius: 2rem;
            border: none;
            filter: grayscale(0.2) contrast(1.1);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="antialiased text-slate-900 overflow-x-hidden">

    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <div class="bg-blue-600 p-2 rounded-lg text-white">
                    <i class="fas fa-headset text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter">
                    {{ __('messages.help.nav.brand_1') }}
                    <span class="text-blue-600">{{ __('messages.help.nav.brand_2') }}</span>
                </span>
            </a>
        </div>
    </nav>

    <header class="bg-slate-900 py-24 text-center text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-600/20 rounded-full blur-[120px] -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-[100px] translate-x-1/3 translate-y-1/3"></div>

        <div class="relative z-10 px-6" data-aos="zoom-out" data-aos-duration="1000">
            <h6 class="text-blue-500 font-black uppercase tracking-[0.5em] text-[10px] mb-4">
                {{ __('messages.help.hero.kicker') }}
            </h6>

            <h1 class="text-4xl md:text-6xl font-black tracking-tighter uppercase mb-6 leading-none">
                {!! __('messages.help.hero.title_html') !!}
            </h1>

            <p class="text-slate-400 text-sm md:text-base max-w-2xl mx-auto font-medium leading-relaxed">
                {!! __('messages.help.hero.subtitle_html') !!}
            </p>
        </div>
    </header>

    <main class="container mx-auto px-6 -mt-16 relative z-20 pb-24">
        <div class="max-w-6xl mx-auto">

            {{-- CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">

                {{-- Information Center --}}
                <div class="bg-white p-10 rounded-[2.5rem] shadow-xl shadow-blue-900/5 border border-slate-100 text-center group hover:border-blue-500 transition-all hover:-translate-y-2 duration-500"
                     data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-blue-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 group-hover:bg-blue-600 transition-all duration-500">
                        <i class="fas fa-phone-alt text-2xl text-blue-600 group-hover:text-white"></i>
                    </div>
                    <h4 class="font-black uppercase text-[10px] mb-3 tracking-[0.2em] text-slate-400">
                        {{ __('messages.help.cards.info.title') }}
                    </h4>
                    <p class="text-slate-900 font-black text-xl mb-8 tracking-tighter">
                        {{ __('messages.help.contacts.info_phone_display') }}
                    </p>
                    <a href="tel:{{ __('messages.help.contacts.info_phone_raw') }}"
                       class="inline-block w-full bg-slate-50 text-blue-600 text-[10px] font-black px-6 py-4 rounded-xl uppercase tracking-widest hover:bg-blue-600 hover:text-white transition duration-300">
                        {{ __('messages.help.cards.info.cta') }}
                    </a>
                </div>

                {{-- Lost & Found --}}
                <div class="bg-white p-10 rounded-[2.5rem] shadow-xl shadow-blue-900/5 border border-slate-100 text-center group hover:border-blue-500 transition-all hover:-translate-y-2 duration-500"
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-blue-50 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 group-hover:bg-blue-600 transition-all duration-500">
                        <i class="fas fa-box-open text-2xl text-blue-600 group-hover:text-white"></i>
                    </div>
                    <h4 class="font-black uppercase text-[10px] mb-3 tracking-[0.2em] text-slate-400">
                        {{ __('messages.help.cards.lost.title') }}
                    </h4>
                    <p class="text-slate-500 text-[11px] mb-8 leading-relaxed italic">
                        {{ __('messages.help.cards.lost.desc') }}
                    </p>
                    <a href="https://wa.me/{{ __('messages.help.contacts.lost_found_whatsapp') }}"
                       class="inline-block w-full bg-slate-900 text-white text-[10px] font-black px-6 py-4 rounded-xl uppercase tracking-widest hover:bg-blue-600 transition duration-300">
                        {{ __('messages.help.cards.lost.cta') }}
                    </a>
                </div>

                {{-- Emergency --}}
                <div class="bg-blue-600 p-10 rounded-[2.5rem] shadow-2xl shadow-blue-500/20 text-center group hover:-translate-y-2 transition-all duration-500"
                     data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-white/20 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-all duration-500">
                        <i class="fas fa-briefcase-medical text-2xl text-white animate-pulse"></i>
                    </div>
                    <h4 class="font-black uppercase text-[10px] mb-3 tracking-[0.2em] text-blue-100">
                        {{ __('messages.help.cards.emergency.title') }}
                    </h4>
                    <p class="text-white font-black text-xl mb-8 tracking-tighter">
                        {{ __('messages.help.contacts.emergency_phone_display') }}
                    </p>
                    <a href="tel:{{ __('messages.help.contacts.emergency_phone_raw') }}"
                       class="inline-block w-full bg-white text-blue-600 text-[10px] font-black px-6 py-4 rounded-xl uppercase tracking-widest hover:shadow-lg transition duration-300">
                        {{ __('messages.help.cards.emergency.cta') }}
                    </a>
                </div>

            </div>

            {{-- LOCATION --}}
            <div class="bg-white p-4 md:p-8 rounded-[3rem] shadow-2xl shadow-slate-200 border border-slate-50 mb-16" data-aos="fade-up">
                <div class="flex flex-col lg:flex-row gap-12 items-center p-4">
                    <div class="lg:w-1/3">
                        <h3 class="text-3xl font-black uppercase tracking-tighter mb-6 leading-none">
                            {!! __('messages.help.location.title_html') !!}
                        </h3>

                        <p class="text-slate-500 text-sm leading-relaxed mb-8">
                            {{ __('messages.help.location.address') }}
                        </p>

                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-blue-200 transition-colors">
                                <i class="fas fa-map-marker-alt text-blue-600 mr-4"></i>
                                <span class="text-[11px] font-black uppercase tracking-widest text-slate-600">
                                    {{ __('messages.help.location.region') }}
                                </span>
                            </div>

                            <div class="flex items-center p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-blue-200 transition-colors">
                                <i class="fas fa-plane-arrival text-blue-600 mr-4"></i>
                                <span class="text-[11px] font-black uppercase tracking-widest text-slate-600">
                                    {{ __('messages.help.location.iata') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w-2/3 w-full map-container shadow-2xl">
                        <iframe
                            src="{{ __('messages.help.location.map_embed_src') }}"
                            allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            {{-- FAQ + PRIORITY --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                {{-- FAQ --}}
                <div data-aos="fade-right">
                    <h4 class="font-black uppercase tracking-widest text-[10px] text-blue-600 mb-8 flex items-center">
                        <span class="w-10 h-0.5 bg-blue-600 mr-4"></span>
                        {{ __('messages.help.faq.title') }}
                    </h4>

                    <div class="space-y-4">
                        <details class="group bg-white rounded-2xl p-6 border border-slate-100 cursor-pointer transition-all hover:border-blue-600 shadow-sm">
                            <summary class="font-bold text-xs uppercase flex justify-between items-center list-none">
                                {{ __('messages.help.faq.q1') }}
                                <i class="fas fa-plus text-[10px] group-open:rotate-45 transition duration-300"></i>
                            </summary>
                            <p class="text-[11px] text-slate-500 mt-4 leading-relaxed border-t pt-4">
                                {{ __('messages.help.faq.a1') }}
                            </p>
                        </details>

                        <details class="group bg-white rounded-2xl p-6 border border-slate-100 cursor-pointer transition-all hover:border-blue-600 shadow-sm">
                            <summary class="font-bold text-xs uppercase flex justify-between items-center list-none">
                                {{ __('messages.help.faq.q2') }}
                                <i class="fas fa-plus text-[10px] group-open:rotate-45 transition duration-300"></i>
                            </summary>
                            <p class="text-[11px] text-slate-500 mt-4 leading-relaxed border-t pt-4">
                                {{ __('messages.help.faq.a2') }}
                            </p>
                        </details>
                    </div>
                </div>

                {{-- PRIORITY --}}
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-[3rem] p-10 text-white relative overflow-hidden shadow-2xl"
                     data-aos="fade-left">
                    <div class="absolute top-0 right-0 p-8 opacity-10">
                        <i class="fas fa-wheelchair text-9xl"></i>
                    </div>

                    <div class="relative z-10">
                        <h4 class="font-black uppercase text-2xl mb-4 leading-tight">
                            {!! __('messages.help.priority.title_html') !!}
                        </h4>

                        <p class="text-blue-100 text-xs leading-relaxed mb-8 opacity-90">
                            {{ __('messages.help.priority.desc') }}
                        </p>

                        <a href="https://wa.me/{{ __('messages.help.contacts.priority_whatsapp') }}"
                           class="flex items-center justify-between bg-white text-blue-600 font-black text-[10px] px-8 py-4 rounded-xl uppercase tracking-[0.2em] shadow-xl hover:bg-slate-50 transition-all group">
                            {{ __('messages.help.priority.cta') }}
                            <i class="fab fa-whatsapp text-lg group-hover:scale-125 transition-transform"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <footer class="py-12 border-t border-slate-100 mt-10 text-center">
        <p class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-300">
            {{ __('messages.help.footer.copyright') }}
        </p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>

</body>
</html>
