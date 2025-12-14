<x-guest-layout>

    @php
        // Datos del Backend
        $servicesData = [
            [
                'title' => 'Impuestos Personales (1040)',
                'image' => asset('img/tax-personal.webp'),
                'desc' => 'Preparación y presentación profesional de tus impuestos personales.',
                'tags' => 'taxes personal 1040 reembolso',
                'url' => '/services/personal-tax',
            ],
            [
                'title' => 'Impuestos Corporativos',
                'image' => asset('img/tax-corporate.webp'),
                'desc' => 'Soluciones fiscales para corporaciones (1120/1120-S) y sociedades.',
                'tags' => 'corporate corporativo empresa 1120 negocio',
                'url' => '/services/corporate-tax',
            ],
            [
                'title' => 'Contabilidad Mensual',
                'image' => asset('img/accounting.webp'),
                'desc' => 'Llevamos tus libros al día con reportes financieros precisos.',
                'tags' => 'bookkeeping contabilidad libros reportes',
                'url' => '/services/bookkeeping',
            ],
            [
                'title' => 'Nómina y cumplimientos',
                'image' => asset('img/payroll.webp'),
                'desc' => 'Gestión completa de sueldos y cumplimiento fiscal laboral.',
                'tags' => 'nomina payroll empleados cheques',
                'url' => '/services/payroll',
            ],
            [
                'title' => 'Trámite de ITIN',
                'image' => asset('img/itin.webp'),
                'desc' => 'Como agentes certificadores (CAA), tramitamos tu ITIN sin enviar el pasaporte.',
                'tags' => 'itin irs pasaporte identificacion',
                'url' => '/services/itin',
            ],
            [
                'title' => 'Creación de Empresas',
                'image' => asset('img/startup.webp'),
                'desc' => 'Asesoría legal y registro de tu LLC o Corporación.',
                'tags' => 'llc empresa registro negocio nuevo',
                'url' => '/services/business-formation',
            ],
            [
                'title' => 'Representación ante el IRS',
                'image' => asset('img/irs-rep.webp'),
                'desc' => 'Resolución de cartas, auditorías y deudas tributarias.',
                'tags' => 'auditoria cartas irs deuda',
                'url' => '/services/irs-representation',
            ],
            [
                'title' => 'Notaría en Georgia',
                'image' => asset('img/notary.webp'),
                'desc' => 'Servicios de notarización de documentos oficiales en Georgia.',
                'tags' => 'notaria documentos legal',
                'url' => '/services/notary',
            ],
            [
                'title' => 'Planificación Financiera',
                'image' => asset('img/planning.webp'),
                'desc' => 'Estrategias para optimizar tu crecimiento y reducir impuestos.',
                'tags' => 'finanzas ahorro planificacion futuro',
                'url' => '/services/financial-planning',
            ],
            [
                'title' => 'Auditorías y Revisiones',
                'image' => asset('img/audit.webp'),
                'desc' => 'Soporte completo y preparación de documentos ante auditorías del IRS o estatales.',
                'tags' => 'auditoria audit revision fiscal irs inspeccion',
                'url' => '/services/audits',
            ],
            [
                'title' => 'Impuesto a Ventas y Licencias',
                'image' => asset('img/sales.webp'),
                'desc' => 'Gestión de Sales Tax mensual/trimestral y tramitación de licencias comerciales.',
                'tags' => 'sales tax ventas licencias permisos comercial',
                'url' => '/services/sales-tax',
            ],
        ];
    @endphp

    <section id="services-section" class="py-10 md:py-20 bg-gray-50 relative overflow-hidden" x-data="{
        search: '',
        services: {{ json_encode($servicesData) }},

        get filteredServices() {
            if (this.search === '') return this.services;
            const term = this.search.toLowerCase();
            return this.services.filter(service => {
                return service.title.toLowerCase().includes(term) ||
                    service.tags.toLowerCase().includes(term);
            });
        }
    }"
        x-init="// 1. ANIMACIÓN DEL HEADER (Título y Buscador)
        gsap.fromTo('.anim-header', { y: 50, opacity: 0 }, {
            y: 0,
            opacity: 1,
            duration: 1,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: '.anim-header',
                start: 'top 85%'
            }
        });

        // 2. ANIMACIÓN DE LAS TARJETAS (Stagger inicial)
        // Usamos un pequeño delay para asegurar que Alpine haya renderizado
        setTimeout(() => {
            gsap.fromTo('.service-card-item', { y: 50, opacity: 0, scale: 0.95 }, {
                y: 0,
                opacity: 1,
                scale: 1,
                duration: 0.6,
                stagger: 0.1, // Efecto cascada
                ease: 'back.out(1.2)',
                scrollTrigger: {
                    trigger: '#services-grid',
                    start: 'top 80%'
                }
            });
        }, 100);

        // 3. ANIMACIÓN DEL CTA FINAL
        gsap.fromTo('.anim-cta', { y: 30, opacity: 0 }, {
            y: 0,
            opacity: 1,
            duration: 0.8,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: '.anim-cta',
                start: 'top 90%'
            }
        });">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            <div class="anim-header search-header text-center max-w-3xl mx-auto mb-16 opacity-0">
                <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">
                    Nuestros Servicios
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-secondary mb-8">
                    Encuentra la solución exacta <br />
                    <span class="text-primary">para tus necesidades</span>
                </h2>

                <div class="relative max-w-xl mx-auto group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-primary transition-colors"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input x-model="search" type="text"
                        placeholder="Buscar servicio (ej: Nómina, ITIN, Impuestos)..."
                        class="block w-full pl-14 pr-4 py-4 bg-white border-2 border-gray-100 rounded-full text-gray-900 placeholder-gray-400 focus:outline-hidden focus:border-primary focus:ring-4 focus:ring-orange-100/50 shadow-lg transition-all duration-300" />

                    <button x-show="search.length > 0" @click="search = ''"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-red-500 cursor-pointer transition-colors"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        style="display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="services-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 min-h-[400px]">

                <template x-for="service in filteredServices" :key="service.title">
                    <article
                        class="service-card-item group bg-white rounded-2xl overflow-hidden shadow-xs border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col opacity-0"
                        {{-- Animaciones de filtrado nativas de Alpine --}} x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

                        <div class="relative h-48 overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gray-900/10 group-hover:bg-gray-900/0 transition-colors z-10">
                            </div>
                            <img :src="service.image" :alt="service.title"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
                        </div>

                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors"
                                x-text="service.title"></h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4 flex-1" x-text="service.desc"></p>

                        </div>
                    </article>
                </template>

                <div x-show="filteredServices.length === 0" class="col-span-full text-center py-12"
                    style="display: none;" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4 animate-bounce">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">
                        No encontramos servicios para esa búsqueda
                    </h3>
                    <button @click="search = ''" class="mt-4 text-primary font-bold hover:underline">
                        Ver todos los servicios
                    </button>
                </div>
            </div>

            <div class="anim-cta services-cta text-center mt-16 opacity-0">
                <a href="/contact"
                    class="inline-flex items-center px-8 py-3 bg-primary hover:bg-orange-600 text-white font-bold rounded-full shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl"
                    {{-- Micro-interacción GSAP al pasar el mouse sobre el botón --}} x-data @mouseenter="gsap.to($el, { scale: 1.05, duration: 0.2 })"
                    @mouseleave="gsap.to($el, { scale: 1, duration: 0.2 })"
                    @mousedown="gsap.to($el, { scale: 0.95, duration: 0.1 })"
                    @mouseup="gsap.to($el, { scale: 1.05, duration: 0.1 })">
                    Agenda tu Consulta Ahora
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </a>
            </div>

        </div>
    </section>
</x-guest-layout>
