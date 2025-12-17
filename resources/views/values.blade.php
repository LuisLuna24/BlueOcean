<x-guest-layout>
    @php
        $values = [
            [
                'title' => __('Integrity'),
                'desc' => __('integrity_desc'),
                'icon' =>
                    '<svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" /></svg>',
            ],
            [
                'title' => __('Excellence'),
                'desc' => __('excellence_desc'),
                'icon' =>
                    '<svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>',
            ],
            [
                'title' => __('Courage'),
                'desc' => __('courage_desc'),
                'icon' =>
                    '<svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" /></svg>',
            ],
            [
                'title' => __('Together'),
                'desc' => __('together_desc'),
                'icon' =>
                    '<svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>',
            ],
        ];
    @endphp

    <section class="py-10 md:py-20 bg-gray-50" id="values-section" x-data x-init="// 1. Animación del Header
    gsap.to('.values-header', {
        scrollTrigger: { trigger: '.values-header', start: 'top 85%' },
        y: 0,
        opacity: 1,
        duration: 1,
        ease: 'power3.out'
    });

    // 2. Animación de las Cards (Stagger)
    gsap.to('.value-card', {
        scrollTrigger: { trigger: '.value-card', start: 'top 80%' },
        y: 0,
        opacity: 1,
        duration: 0.8,
        stagger: 0.15,
        ease: 'power2.out'
    });

    // 3. Animación del Banner inferior
    gsap.to('.people-banner', {
        scrollTrigger: { trigger: '.people-banner', start: 'top 90%' },
        scale: 1,
        opacity: 1,
        duration: 1,
        ease: 'elastic.out(1, 0.75)'
    });">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center max-w-3xl mx-auto mb-20 values-header opacity-0 translate-y-8">
                <span class="text-primary font-bold tracking-wider uppercase text-sm">
                    {{ __('Our Philosophy') }}
                </span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-2 mb-6">
                    {{ __('Our Values') }}
                </h2>
                <div class="relative">
                    <p class="text-xl text-gray-600 italic leading-relaxed">
                        {{ __('values_intro') }}
                    </p>
                    <p class="mt-4 text-gray-500">
                        {{ __('values_origin') }}
                        <span class="text-gray-900 font-medium">
                            {{ __('values_common') }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-24">
                @foreach ($values as $val)
                    <div
                        class="value-card group relative bg-white p-8 rounded-2xl shadow-xs border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 opacity-0 translate-y-8">

                        <div
                            class="w-14 h-14 rounded-full bg-secondary/10 text-secondary flex items-center justify-center mb-6 group-hover:bg-secondary group-hover:text-white transition-colors duration-300">
                            <div class="w-7 h-7">
                                {{-- Renderizamos el SVG sin escapar --}}
                                {!! $val['icon'] !!}
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                            {{ $val['title'] }}
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $val['desc'] }}
                        </p>

                        <div
                            class="absolute bottom-0 left-0 w-0 h-1 bg-primary transition-all duration-500 group-hover:w-full rounded-b-2xl">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="people-banner relative rounded-3xl overflow-hidden bg-secondary opacity-0 scale-95">
                <div class="absolute inset-0 opacity-20">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=2000"
                        alt="Team working" class="w-full h-full object-cover grayscale mix-blend-multiply" />
                </div>

                <div class="relative z-10 p-10 md:p-16 text-center">
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">
                        {{ __('people_banner_title') }}
                    </h3>
                    <p class="text-lg text-gray-200 max-w-2xl mx-auto">
                        {{ __('people_banner_desc') }}
                    </p>
                </div>
            </div>

        </div>
    </section>
</x-guest-layout>
