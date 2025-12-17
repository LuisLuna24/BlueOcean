<x-guest-layout>
    @php
        $tipsData = [
            [
                'title' => __('tip_1_title'),
                'desc' => __('tip_1_desc'),
                'icon' =>
                    '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>',
                'color' => 'bg-blue-50 text-blue-600',
            ],
            [
                'title' => __('tip_2_title'),
                'desc' => __('tip_2_desc'),
                'icon' =>
                    '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
                'color' => 'bg-orange-50 text-orange-600',
            ],
            [
                'title' => __('tip_3_title'),
                'desc' => __('tip_3_desc'),
                'icon' =>
                    '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21v-7"/><path d="M19 21v-7"/><path d="M9 9a3 3 0 0 0 0 6h3m-3-3h3"/><path d="M12 17v1m0-10V7"/></svg>',
                'color' => 'bg-green-50 text-green-600',
            ],
        ];
    @endphp

    <section id="tips-section" class="py-10 md:py-20 bg-white relative overflow-hidden" x-data x-init="// 1. Animación del Header
    gsap.to('.tips-header', {
        scrollTrigger: { trigger: '.tips-header', start: 'top 85%' },
        y: 0,
        opacity: 1,
        duration: 1,
        ease: 'power3.out'
    });

    // 2. Animación de las Tarjetas (Stagger con rebote)
    gsap.to('.tip-card', {
        scrollTrigger: { trigger: '.tip-card', start: 'top 80%' },
        y: 0,
        opacity: 1,
        duration: 0.8,
        stagger: 0.2,
        ease: 'back.out(1.2)'
    });">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-40">
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-blue-50 blur-3xl"></div>
            <div class="absolute top-1/2 right-0 w-64 h-64 rounded-full bg-orange-50 blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            <div class="tips-header text-center max-w-3xl mx-auto mb-16 opacity-0 translate-y-8">
                <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">
                    {{ __('why_vital') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">
                    {{ __('value_accounting') }}
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ __('accounting_desc') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($tipsData as $tip)
                    <div
                        class="tip-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 opacity-0 translate-y-12 flex flex-col items-center text-center group">

                        <div
                            class="w-16 h-16 rounded-full flex items-center justify-center mb-6 transition-transform duration-500 group-hover:scale-110 {{ $tip['color'] }}">
                            {{-- Renderizamos el SVG sin escapar --}}
                            {!! $tip['icon'] !!}
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-primary transition-colors">
                            {{ $tip['title'] }}
                        </h3>

                        <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                            {{ $tip['desc'] }}
                        </p>

                        <div
                            class="mt-6 w-12 h-1 bg-gray-200 rounded-full group-hover:w-24 group-hover:bg-primary transition-all duration-300">
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
</x-guest-layout>
