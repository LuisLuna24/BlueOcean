<x-guest-layout>
    @php
        // DEFINICIÓN DE DATOS (Equivalente al frontmatter de Astro)
        $services = [
            [
                'icon' => '💰',
                'title' => 'Preparación de Impuestos Individuales (1040)',
                'desc' =>
                    'Planificación estratégica para individuos y familias, maximizando deducciones y asegurando el cumplimiento de las declaraciones de impuestos (IRS).',
            ],
            [
                'icon' => '📈',
                'title' => 'Contabilidad Mensual y Reportes',
                'desc' =>
                    'Servicios completos de contabilidad, nómina y gestión financiera mensual para pequeñas y medianas empresas (PyMEs) que buscan un crecimiento organizado.',
            ],
            [
                'icon' => '⚖️',
                'title' => 'ITIN (CAA — Agente Certificador del IRS)',
                'desc' =>
                    'Asistencia profesional y certificación como Agente Aceptante Certificador para solicitudes ITIN (Formulario W-7), asegurando el cumplimiento fiscal para residentes y no residentes.',
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
                    Accounting & Tax Services
                </h1>

                <p
                    class="hero-text invisible translate-y-4 text-white text-xl md:text-2xl font-semibold mb-4 drop-shadow-md">
                    Firma de contabilidad y asesoría tributaria.
                </p>

                <p
                    class="hero-text invisible translate-y-4 text-gray-300 text-lg md:text-xl italic font-light tracking-wide mb-10 max-w-2xl mx-auto">
                    “TU ÉXITO ES PARTE DE NUESTRA MOTIVACIÓN”
                </p>

                <div class="hero-btn-group invisible translate-y-4 flex flex-wrap justify-center gap-4">
                    <x-a-button href="/services">Servicios</x-a-button>
                    <x-a-button href="/contact" variant="secondary">Contacto</x-a-button>
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
        ease: 'power3.out'
    });

    // Animación Tarjetas (desde derecha, stagger)
    gsap.to('.mission-text-anim', {
        scrollTrigger: { trigger: '#mission-container', start: 'top 75%' },
        opacity: 1,
        x: 0,
        duration: 1,
        stagger: 0.2,
        ease: 'power3.out'
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
                    Nuestra Esencia
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-secondary">
                    Guiando tu camino al éxito financiero
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
                            Nuestra Misión
                        </h3>
                        <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                            "Ayudar a las personas y pequeños negocios a llevar una correcta planificación económica
                            y tributaria para evitar problemas, ofreciendo soluciones de calidad y creando
                            estrategias para el bienestar y riquezas de la familia de habla hispana."
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
                            Nuestra Visión
                        </h3>
                        <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                            "Nuestra visión de liderar el camino de asesorías virtuales en contabilidad y
                            preparación de impuestos personales y corporativos con calidad y confianza es clara.
                            Estamos tomando medidas, estamos invirtiendo en tecnología y lo estamos logrando."
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
                    Nuestros Servicios Clave
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-secondary leading-tight">
                    Soluciones a la medida de tu negocio y familia
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
                <x-a-button href="/services">
                    Ver Todos los Servicios
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
</x-guest-layout>
