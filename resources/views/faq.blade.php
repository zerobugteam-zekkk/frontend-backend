<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Bandara Abdurachman Saleh Malang (MLG)</title>
    <meta name="description" content="Pertanyaan yang sering diajukan seputar Bandara Abdurachman Saleh Malang (MLG) — jadwal penerbangan, check-in, bagasi, fasilitas, transportasi, dan layanan bandara.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://abdurachmansaleh-airport.my.id/faq">

    {{-- FAQ Schema untuk GEO --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @foreach($faqs as $faq)
        {
          "@type": "Question",
          "name": {{ json_encode($faq->question) }},
          "acceptedAnswer": {
            "@type": "Answer",
            "text": {{ json_encode($locale === 'en' && $faq->answer_en ? $faq->answer_en : $faq->answer) }}
          }
        }{{ !$loop->last ? ',' : '' }}
        @endforeach
      ]
    }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-50 text-slate-900 font-sans antialiased">

    {{-- NAVBAR --}}
    <nav class="bg-white border-b border-blue-100 sticky top-0 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center space-x-3">
                <div class="bg-blue-600 p-2 rounded-lg">
                    <i class="fas fa-plane-departure text-white text-sm"></i>
                </div>
                <span class="text-sm font-black uppercase tracking-tighter text-slate-900">
                    Abdurachman <span class="text-blue-600">Saleh</span>
                </span>
            </a>
            <div class="flex items-center gap-2">
                <a href="{{ route('lang.switch', 'id') }}"
                    class="px-3 py-1 rounded-md text-xs font-semibold transition
                    {{ app()->getLocale() === 'id' ? 'bg-blue-600 text-white' : 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-100' }}">ID</a>
                <a href="{{ route('lang.switch', 'en') }}"
                    class="px-3 py-1 rounded-md text-xs font-semibold transition
                    {{ app()->getLocale() === 'en' ? 'bg-blue-600 text-white' : 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-100' }}">EN</a>
            </div>
        </div>
    </nav>

    {{-- HEADER --}}
    <div class="bg-blue-600 text-white py-16 px-6 text-center">
        <h1 class="text-3xl md:text-5xl font-black uppercase tracking-tighter mb-4">
            {{ $locale === 'id' ? 'Pertanyaan Umum' : 'Frequently Asked Questions' }}
        </h1>
        <p class="text-blue-100 text-sm md:text-base max-w-2xl mx-auto">
            {{ $locale === 'id'
                ? 'Temukan jawaban atas pertanyaan seputar Bandara Abdurachman Saleh Malang (MLG)'
                : 'Find answers to common questions about Abdurachman Saleh Airport Malang (MLG)' }}
        </p>
        <div class="mt-8 max-w-lg mx-auto relative">
            <input type="text" id="faq-search"
                placeholder="{{ $locale === 'id' ? 'Cari pertanyaan...' : 'Search questions...' }}"
                class="w-full px-6 py-4 rounded-xl text-slate-900 text-sm font-medium outline-none shadow-lg">
            <i class="fas fa-search absolute right-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
        </div>
    </div>

    {{-- FAQ LIST --}}
    <div class="max-w-4xl mx-auto px-6 py-16 space-y-3">

        @forelse($faqs as $faq)
        <div class="faq-item bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <button onclick="toggleFaq(this)"
                class="w-full text-left px-6 py-5 flex items-center justify-between gap-4 hover:bg-slate-50 transition">
                <span class="font-semibold text-sm text-slate-800 faq-question">
                    {{ $faq->question }}
                </span>
                <i class="fas fa-chevron-down text-blue-600 text-xs shrink-0 transition-transform duration-300"></i>
            </button>
            <div class="faq-answer hidden px-6 pb-5">
                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ $locale === 'en' && $faq->answer_en ? $faq->answer_en : $faq->answer }}
                </p>
            </div>
        </div>
        @empty
        <p class="text-center text-slate-400">Belum ada FAQ tersedia.</p>
        @endforelse

        <div id="no-results" class="hidden text-center py-16">
            <i class="fas fa-search text-4xl text-slate-300 mb-4 block"></i>
            <p class="text-slate-500 font-medium">Pertanyaan tidak ditemukan</p>
        </div>
    </div>

    {{-- FOOTER --}}
    <div class="border-t border-slate-200 py-8 text-center">
        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">
            © 2026 Bandara Abdurachman Saleh – Malang
        </p>
        <a href="/" class="text-xs text-blue-600 font-semibold mt-2 inline-block hover:underline">
            ← {{ $locale === 'id' ? 'Kembali ke Beranda' : 'Back to Home' }}
        </a>
    </div>

    <script>
        function toggleFaq(btn) {
            const answer = btn.nextElementSibling;
            const icon = btn.querySelector('i');
            const isOpen = !answer.classList.contains('hidden');

            document.querySelectorAll('.faq-answer').forEach(el => {
                el.classList.add('hidden');
                el.previousElementSibling.querySelector('i').style.transform = '';
            });

            if (!isOpen) {
                answer.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            }
        }

        document.getElementById('faq-search').addEventListener('input', function () {
            const keyword = this.value.toLowerCase();
            let anyVisible = false;

            document.querySelectorAll('.faq-item').forEach(item => {
                const question = item.querySelector('.faq-question').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer p').textContent.toLowerCase();
                const match = question.includes(keyword) || answer.includes(keyword);
                item.style.display = match ? 'block' : 'none';
                if (match) anyVisible = true;
            });

            document.getElementById('no-results').classList.toggle(
                'hidden', anyVisible || keyword === ''
            );
        });
    </script>

</body>
</html>
