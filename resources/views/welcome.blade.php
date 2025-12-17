<x-guest-layout>
    @php
        // DEFINICIÓN DE DATOS TRADUCIDOS
        $services = [
            [
                'icon' => '💰',
                'title' => __('service_1_title'),
                'desc' => __('service_1_desc'),
            ],
            [
                'icon' => '📈',
                'title' => __('service_2_title'),
                'desc' => __('service_2_desc'),
            ],
            [
                'icon' => '⚖️',
                'title' => __('service_3_title'),
                'desc' => __('service_3_desc'),
            ],
        ];
    @endphp

    <header class="relative w-full h-[50vh] md:h-[90vh] min-h-[600px] mb-4 overflow-hidden bg-slate-950 shadow-2xl"
        x-data x-init="let tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

        // Secuencia de animación del Hero
        tl.to('.hero-logo', { autoAlpha: 1, y: 0, duration: 1, delay: 0.2 })
            .to('.hero-title', { autoAlpha: 1, y: 0, duration: 0.8 }, '-=0.5')
            .to('.hero-text', { autoAlpha: 1, y: 0, duration: 0.8, stagger: 0.2 }, '-=0.6')
            .to('.hero-btn-group', { autoAlpha: 1, y: 0, duration: 0.6 }, '-=0.4');">
        <div class="absolute inset-0 bg-cover bg-center z-0"
            style="background-image: url('{{ asset('img/home.webp') }}');">
        </div>

        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/60 to-black/80 z-0"></div>

        <div
            class="relative z-10 h-full max-w-7xl mx-auto px-4 md:px-8 flex flex-col justify-center items-center text-center">
            <div class="max-w-4xl w-full flex flex-col items-center">

                <img src="{{ asset('img/Logo_G.webp') }}" alt="Logo Blue Ocean"
                    class="hero-logo invisible translate-y-8 w-2/3 md:w-96 h-auto mb-8 drop-shadow-2xl" />

                <h1
                    class="hero-title invisible translate-y-8 text-white text-4xl md:text-6xl font-extrabold mb-6 leading-tight drop-shadow-lg">
                    {{ __('accounting_tax_services') }}
                </h1>

                <p
                    class="hero-text invisible translate-y-4 text-white text-xl md:text-2xl font-semibold mb-4 drop-shadow-md">
                    {{ __('hero_subtitle') }}
                </p>

                <p
                    class="hero-text invisible translate-y-4 text-gray-300 text-lg md:text-xl italic font-light tracking-wide mb-10 max-w-2xl mx-auto">
                    {{ __('hero_quote') }}
                </p>

                <div class="hero-btn-group invisible translate-y-4 flex flex-wrap justify-center gap-4">
                    {{-- Verifica si necesitas prefijo de idioma para los links aquí también --}}
                    @php
                       $prefix = App::getLocale() === 'en' ? '/en' : '';
                    @endphp
                    <x-a-button href="{{ $prefix }}/services">{{ __('Services') }}</x-a-button>
                    <x-a-button href="{{ $prefix }}/contact" variant="secondary">{{ __('Contact') }}</x-a-button>
                </div>
            </div>
        </div>
    </header>

    <section id="essence-section" class="py-20 bg-gray-50 relative overflow-hidden" x-data x-init="// Animación Header
    gsap.to('.essence-header', {
        scrollTrigger: { trigger: '.essence-header', start: 'top 80%' },
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: 'power2.out'
    });

    // Animación Imagen (desde izquierda)
    gsap.to('.mission-img-anim', {
        scrollTrigger: { trigger: '#mission-container', start: 'top 75%' },
        opacity: 1,
        x: 0,
        duration: 1,
        ease: 'power1.out'
    });

    // Animación Tarjetas (desde derecha, stagger)
    gsap.to('.mission-text-anim', {
        scrollTrigger: { trigger: '#mission-container', start: 'top 75%' },
        opacity: 1,
        x: 0,
        duration: 1,
        stagger: 0.2,
        ease: 'power1.out'
    });">
        <div
            class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-blue-50 rounded-full blur-3xl opacity-50 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-orange-50 rounded-full blur-3xl opacity-50 pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="essence-header text-center max-w-3xl mx-auto mb-16 opacity-0 translate-y-8">
                <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">
                    {{ __('Our Essence') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-secondary">
                    {{ __('guiding_success') }}
                </h2>
            </div>

            <div id="mission-container" class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

                <div
                    class="mission-img-anim w-full h-full min-h-[400px] relative rounded-2xl overflow-hidden shadow-2xl opacity-0 -translate-x-12">
                    <img src="{{ asset('img/firma.webp') }}" alt="Nuestra Firma"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105" />
                    <div class="absolute inset-0 bg-blue-900/10 mix-blend-multiply"></div>
                </div>

                <div class="flex flex-col gap-6 lg:gap-8">
                    <div
                        class="mission-text-anim group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-t-4 border-primary relative opacity-0 translate-x-12">
                        <div
                            class="absolute top-0 right-0 w-24 h-24 bg-linear-to-bl from-orange-50 to-transparent rounded-bl-full opacity-50 group-hover:opacity-100 transition-opacity">
                        </div>

                        <div
                            class="w-14 h-14 rounded-xl bg-orange-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-primary" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M12 7a5 5 0 1 0 5 5" />
                                <path d="M13 3.055a9 9 0 1 0 7.941 7.945" />
                                <path d="M15 6v3h3l3 -3h-3v-3z" />
                                <path d="M15 9l-3 3" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                            {{ __('Our Mission') }}
                        </h3>
                        <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                            "{{ __('mission_desc') }}"
                        </p>
                    </div>

                    <div
                        class="mission-text-anim group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border-t-4 border-secondary relative opacity-0 translate-x-12">
                        <div
                            class="absolute top-0 right-0 w-24 h-24 bg-linear-to-bl from-blue-50 to-transparent rounded-bl-full opacity-50 group-hover:opacity-100 transition-opacity">
                        </div>

                        <div
                            class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-secondary" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path
                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-secondary transition-colors">
                            {{ __('Our Vision') }}
                        </h3>
                        <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                            "{{ __('vision_desc') }}"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services-section" class="py-20 md:py-32 bg-white relative" x-data x-init="gsap.to('.services-header', {
        scrollTrigger: { trigger: '.services-header', start: 'top 85%' },
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: 'power2.out'
    });

    gsap.to('.service-card', {
        scrollTrigger: { trigger: '.grid-services', start: 'top 80%' },
        opacity: 1,
        y: 0,
        duration: 0.8,
        stagger: 0.15,
        ease: 'back.out(1.2)'
    });

    gsap.to('.services-cta', {
        scrollTrigger: { trigger: '.services-cta', start: 'top 90%' },
        opacity: 1,
        y: 0,
        duration: 0.8,
        delay: 0.4,
        ease: 'power2.out'
    });">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="services-header text-center max-w-4xl mx-auto mb-16 opacity-0 translate-y-8">
                <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">
                    {{ __('key_services_title') }}
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-secondary leading-tight">
                    {{ __('key_services_subtitle') }}
                </h2>
            </div>

            <div class="grid-services grid md:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <article
                        class="service-card group block p-8 bg-white border border-gray-100 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 opacity-0 translate-y-12">
                        <div
                            class="w-16 h-16 rounded-xl bg-blue-50 flex items-center justify-center mb-6 transition-colors duration-300 group-hover:bg-primary">
                            <span class="text-3xl transition-transform duration-300 group-hover:scale-110">
                                {{ $service['icon'] }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-secondary transition-colors">
                            {{ $service['title'] }}
                        </h3>
                        <p class="text-gray-500 leading-relaxed text-sm">
                            {{ $service['desc'] }}
                        </p>
                    </article>
                @endforeach
            </div>

            <div class="services-cta text-center mt-16 opacity-0 translate-y-8">
                {{-- Prefijo de idioma para este botón también --}}
                @php $prefix = App::getLocale() === 'en' ? '/en' : ''; @endphp
                <x-a-button href="{{ $prefix }}/services">
                    {{ __('see_all_services') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="ml-2 w-5 h-5">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 6l6 6l-6 6"></path>
                    </svg>
                </x-a-button>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-10 md:py-20 px-4 sm:px-6 lg:px-8 overflow-hidden" x-data x-init="// Registramos el plugin (asegúrate de haberlo importado en tu layout)
    gsap.registerPlugin(ScrollTrigger);

    // Creamos una línea de tiempo que se activa al hacer scroll
    let tl = gsap.timeline({
        scrollTrigger: {
            trigger: $el, // El disparador es esta misma sección
            start: 'top 85%', // Comienza cuando el top de la sección llega al 85% de la pantalla
            toggleActions: 'play none none reverse' // Juega al entrar, revierte al salir hacia arriba
        }
    });

    // 1. Animar Título y Subtítulo
    tl.from('.review-header', {
            y: 50,
            opacity: 0,
            duration: 0.8,
            ease: 'power3.out'
        })
        // 2. Animar el contenedor de Livewire
        .from('.review-content', {
            y: 30,
            opacity: 0,
            duration: 0.8,
            ease: 'power3.out'
        }, '-=0.6') // Se solapa un poco con la anterior
        // 3. Animar el botón (aparece al final)
        .from('.review-btn', {
            scale: 0.8,
            opacity: 0,
            duration: 0.5,
            ease: 'back.out(1.7)'
        }, '-=0.4');">
        <div class="max-w-7xl mx-auto space-y-12">


            <div class="review-content relative z-10">
                <livewire:review-list />
            </div>

            <div class="flex justify-center review-btn">
                {{-- Prefijo de idioma para botón reseñas --}}
                @php $prefix = App::getLocale() === 'en' ? '/en' : ''; @endphp
                <x-a-button href="{{ $prefix }}/reviews" variant="primary" class="max-md:w-full justify-center">
                    {{ __('see_all_reviews') }}
                </x-a-button>
            </div>

        </div>
    </section>
</x-guest-layout>
