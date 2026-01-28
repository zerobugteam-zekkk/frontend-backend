<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.history_page.meta.title') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            background-image: radial-gradient(#2563eb0a 1px, transparent 1px);
            background-size: 30px 30px;
            overflow-x: hidden;
        }
        .premium-shadow {
            box-shadow: 0 50px 100px -20px rgba(15, 23, 42, 0.12), 0 30px 60px -30px rgba(0, 0, 0, 0.15);
        }
        .sepia-filter {
            filter: grayscale(100%) contrast(1.1) brightness(0.9);
            transition: all 0.5s ease;
        }
        .sepia-filter:hover {
            filter: grayscale(0%) contrast(1) brightness(1);
        }
        .bio-scroll::-webkit-scrollbar { width: 4px; }
        .bio-scroll::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 10px; }
        .bio-scroll::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 10px; }
    </style>
</head>

<body class="antialiased text-slate-900">

    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <div class="bg-blue-600 p-2 rounded-lg">
                    <i class="fas fa-arrow-left text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900">
                    {{ __('messages.history_page.nav.back') }}
                    <span class="text-blue-600">{{ __('messages.history_page.nav.back_highlight') }}</span>
                </span>
            </a>
        </div>
    </nav>

    <header class="relative bg-slate-900 py-24 md:py-32 overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10">
            <img src="https://www.transparenttextures.com/patterns/carbon-fibre.png" class="w-full h-full object-cover" alt="">
        </div>

        <div class="relative z-10 container mx-auto px-6" data-aos="fade-up" data-aos-duration="1000">
            <h6 class="text-blue-500 font-black uppercase tracking-[0.5em] text-[10px] mb-4">
                {{ __('messages.history_page.hero.badge') }}
            </h6>

            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter uppercase leading-none">
                {{ __('messages.history_page.hero.title_1') }}
                <span class="text-blue-600">{{ __('messages.history_page.hero.title_2') }}</span>
            </h1>

            <p class="text-slate-400 mt-6 max-w-2xl mx-auto text-sm md:text-lg font-medium">
                {{ __('messages.history_page.hero.desc') }}
            </p>
        </div>
    </header>

    <main class="container mx-auto px-6 -mt-12 relative z-20 pb-24">
        <div class="max-w-5xl mx-auto">

            <section class="bg-white rounded-[3rem] premium-shadow overflow-hidden mb-20 border border-slate-100" data-aos="zoom-in-up" data-aos-duration="1200">
                <div class="flex flex-col md:flex-row">

                    <div class="md:w-2/5 bg-slate-200 relative overflow-hidden group">
                        <img src="{{ asset('images/Abdulrachman-Saleh.jpg') }}"
                             alt="{{ __('messages.history_page.profile.photo_alt') }}"
                             class="w-full h-full object-cover sepia-filter group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-slate-900/80 to-transparent p-6 text-white">
                            <p class="text-[10px] font-black uppercase tracking-[0.3em] opacity-80">
                                {{ __('messages.history_page.profile.photo_label') }}
                            </p>
                            <p class="text-sm font-bold italic">
                                {{ __('messages.history_page.profile.photo_caption') }}
                            </p>
                        </div>
                    </div>

                    <div class="md:w-3/5 p-10 md:p-14 flex flex-col">
                        <div class="inline-block px-4 py-1 bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full mb-6 w-fit">
                            {{ __('messages.history_page.profile.badge') }}
                        </div>

                        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tighter mb-2">
                            {{ __('messages.history_page.profile.name') }}
                        </h2>

                        <p class="text-blue-600 font-bold mb-4 italic text-sm">
                            {!! __('messages.history_page.profile.tagline_html') !!}
                        </p>

                        <div class="bio-scroll overflow-y-auto pr-6 max-h-[220px] text-slate-500 text-sm leading-loose text-justify">
                            <p class="mb-4">{!! __('messages.history_page.profile.bio_p1_html') !!}</p>
                            <p class="mb-4">{!! __('messages.history_page.profile.bio_p2_html') !!}</p>
                            <p>{!! __('messages.history_page.profile.bio_p3_html') !!}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-8 pt-6 border-t border-slate-100">
                            <div class="border-l-2 border-blue-600 pl-4">
                                <p class="text-[10px] uppercase font-black text-slate-400 leading-none mb-1">
                                    {{ __('messages.history_page.profile.status_label') }}
                                </p>
                                <p class="text-xs font-bold">
                                    {{ __('messages.history_page.profile.status_value') }}
                                </p>
                            </div>
                            <div class="border-l-2 border-blue-600 pl-4">
                                <p class="text-[10px] uppercase font-black text-slate-400 leading-none mb-1">
                                    {{ __('messages.history_page.profile.rank_label') }}
                                </p>
                                <p class="text-xs font-bold">
                                    {{ __('messages.history_page.profile.rank_value') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <div class="space-y-12">

                <div class="flex flex-col md:flex-row gap-8 items-start group" data-aos="fade-right">
                    <div class="md:w-1/4">
                        <h3 class="text-5xl font-black text-slate-200 group-hover:text-blue-600 transition-colors">
                            {{ __('messages.history_page.timeline.y1937.year') }}
                        </h3>
                    </div>
                    <div class="md:w-3/4 bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm flex-grow">
                        <h4 class="text-xl font-black uppercase text-slate-900 mb-2">
                            {{ __('messages.history_page.timeline.y1937.title') }}
                        </h4>
                        <p class="text-slate-500 text-sm leading-relaxed text-justify">
                            {!! __('messages.history_page.timeline.y1937.desc_html') !!}
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-8 items-start group" data-aos="fade-left">
                    <div class="md:w-1/4">
                        <h3 class="text-5xl font-black text-slate-200 group-hover:text-blue-600 transition-colors">
                            {{ __('messages.history_page.timeline.y1994.year') }}
                        </h3>
                    </div>
                    <div class="md:w-3/4 bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm flex-grow">
                        <h4 class="text-xl font-black uppercase text-slate-900 mb-2">
                            {{ __('messages.history_page.timeline.y1994.title') }}
                        </h4>
                        <p class="text-slate-500 text-sm leading-relaxed text-justify">
                            {{ __('messages.history_page.timeline.y1994.desc') }}
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-8 items-start group" data-aos="fade-right">
                    <div class="md:w-1/4">
                        <h3 class="text-5xl font-black text-slate-200 group-hover:text-blue-600 transition-colors">
                            {{ __('messages.history_page.timeline.y2011.year') }}
                        </h3>
                    </div>
                    <div class="md:w-3/4 bg-blue-900 p-8 rounded-[2rem] shadow-xl flex-grow">
                        <h4 class="text-xl font-black uppercase text-white mb-2">
                            {{ __('messages.history_page.timeline.y2011.title') }}
                        </h4>
                        <p class="text-blue-100 text-sm leading-relaxed text-justify">
                            {!! __('messages.history_page.timeline.y2011.desc_html') !!}
                        </p>
                    </div>
                </div>

            </div>

            <div class="mt-24 text-center" data-aos="fade-up">
                <div class="w-16 h-1.5 bg-blue-600 mx-auto mb-8 rounded-full"></div>
                <p class="text-2xl font-black uppercase tracking-tighter italic text-slate-900">
                    {!! __('messages.history_page.closing.quote_html') !!}
                </p>
                <p class="text-slate-400 text-[10px] mt-4 uppercase tracking-[0.3em] font-bold">
                    {{ __('messages.history_page.closing.sub') }}
                </p>
            </div>

        </div>
    </main>

    <footer class="bg-white border-t border-slate-100 py-12">
        <div class="container mx-auto px-6 text-center text-slate-400 text-[10px] font-bold uppercase tracking-widest">
            {{ __('messages.history_page.footer.copyright') }}
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false,
            mirror: true,
            anchorPlacement: 'top-bottom',
        });
    </script>
</body>
</html>
