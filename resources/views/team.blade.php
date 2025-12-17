<x-guest-layout>
    <section class="relative py-10 md:py-20 bg-white overflow-hidden" id="about-section" x-data x-init="// 1. Imagen (Entra desde la izquierda)
    gsap.to('.about-image-container', {
        scrollTrigger: { trigger: '.about-image-container', start: 'top 80%' },
        x: 0,
        opacity: 1,
        duration: 1.2,
        ease: 'power3.out'
    });

    // 2. Textos (Entran desde abajo en cascada)
    gsap.to('.about-stagger', {
        scrollTrigger: { trigger: '.about-content', start: 'top 75%' },
        y: 0,
        opacity: 1,
        duration: 0.8,
        stagger: 0.15,
        ease: 'power2.out'
    });

    // 3. Iconos/Stats (Entran con rebote al final)
    gsap.to('.stat-item', {
        scrollTrigger: { trigger: '.stat-item', start: 'top 85%' },
        y: 0,
        opacity: 1,
        duration: 0.6,
        stagger: 0.1,
        delay: 0.3,
        ease: 'back.out(1.2)'
    });">
        <div
            class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/3 w-96 h-96 bg-primary/5 rounded-full blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 translate-y-1/3 -translate-x-1/3 w-[500px] h-[500px] bg-secondary/5 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

                <div class="relative about-image-container opacity-0 -translate-x-10">
                    <div
                        class="absolute inset-0 bg-gray-100 rounded-2xl transform rotate-3 scale-105 z-0 border border-gray-200">
                    </div>

                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl aspect-4/5 bg-gray-200 group">
                        <img src="{{ asset('img/yamily-profile.webp') }}" alt="Yamily Zambrano - Asesora Fiscal"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />

                        <div
                            class="absolute bottom-6 left-6 bg-white/90 backdrop-blur-xs px-6 py-3 rounded-lg shadow-lg border-l-4 border-primary">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">
                                {{ __('Experience') }}
                            </p>
                            <p class="text-xl font-bold text-secondary">
                                {{ __('20_years_plus') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="about-content">

                    <div
                        class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary font-semibold text-sm mb-6 about-stagger opacity-0 translate-y-4">
                        {{ __('About Me') }}
                    </div>

                    <h1
                        class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-2 about-stagger opacity-0 translate-y-4">
                        Yamily Zambrano
                    </h1>
                    <h2 class="text-xl text-gray-500 font-medium mb-8 about-stagger opacity-0 translate-y-4">
                        {{ __('yamily_role') }}
                    </h2>

                    <div
                        class="space-y-6 text-lg text-gray-600 leading-relaxed text-justify md:text-left about-stagger opacity-0 translate-y-4">
                        <p>
                            {{ __('bio_p1_start') }}
                            <span class="font-bold text-gray-900">{{ __('bio_p1_bold') }}</span>
                            {{ __('bio_p1_end') }}
                        </p>
                        <p>
                            {{ __('bio_p2_start') }}
                            <span class="font-bold text-gray-900">{{ __('bio_p2_bold') }}</span>
                            {{ __('bio_p2_end') }}
                        </p>
                        <p>
                            {{ __('bio_p3_start') }}
                            <span class="font-bold text-primary">{{ __('bio_p3_bold') }}</span>
                            {{ __('bio_p3_end') }}
                        </p>
                    </div>

                    <div class="mt-10 grid grid-cols-2 md:grid-cols-3 gap-6 pt-8 border-t border-gray-100">

                        <div class="stat-item opacity-0 translate-y-4">
                            <div class="text-secondary mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900">MBA & CPA</h4>
                            <p class="text-sm text-gray-500">{{ __('advanced_education') }}</p>
                        </div>

                        <div class="stat-item opacity-0 translate-y-4">
                            <div class="text-secondary mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900">IRS Accredited</h4>
                            <p class="text-sm text-gray-500">Acceptance Agent GA</p>
                        </div>

                        <div class="stat-item opacity-0 translate-y-4">
                            <div class="text-secondary mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-900">{{ __('national_service') }}</h4>
                            <p class="text-sm text-gray-500">{{ __('virtual_strategy') }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
