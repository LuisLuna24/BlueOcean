<x-guest-layout>

    @php
        $servicesData = [
            [
                'title' => __('s_personal_title'),
                'image' => asset('img/tax-personal.webp'),
                'desc' => __('s_personal_desc'),
                'tags' => __('s_personal_tags'), // Tags traducidos para que la búsqueda funcione en el idioma actual
                'url' => '/services/personal-tax',
            ],
            [
                'title' => __('s_corporate_title'),
                'image' => asset('img/tax-corporate.webp'),
                'desc' => __('s_corporate_desc'),
                'tags' => __('s_corporate_tags'),
                'url' => '/services/corporate-tax',
            ],
            [
                'title' => __('s_bookkeeping_title'),
                'image' => asset('img/accounting.webp'),
                'desc' => __('s_bookkeeping_desc'),
                'tags' => __('s_bookkeeping_tags'),
                'url' => '/services/bookkeeping',
            ],
            [
                'title' => __('s_payroll_title'),
                'image' => asset('img/payroll.webp'),
                'desc' => __('s_payroll_desc'),
                'tags' => __('s_payroll_tags'),
                'url' => '/services/payroll',
            ],
            [
                'title' => __('s_itin_title'),
                'image' => asset('img/itin.webp'),
                'desc' => __('s_itin_desc'),
                'tags' => __('s_itin_tags'),
                'url' => '/services/itin',
            ],
            [
                'title' => __('s_formation_title'),
                'image' => asset('img/startup.webp'),
                'desc' => __('s_formation_desc'),
                'tags' => __('s_formation_tags'),
                'url' => '/services/business-formation',
            ],
            [
                'title' => __('s_irs_title'),
                'image' => asset('img/irs-rep.webp'),
                'desc' => __('s_irs_desc'),
                'tags' => __('s_irs_tags'),
                'url' => '/services/irs-representation',
            ],
            [
                'title' => __('s_notary_title'),
                'image' => asset('img/notary.webp'),
                'desc' => __('s_notary_desc'),
                'tags' => __('s_notary_tags'),
                'url' => '/services/notary',
            ],
            [
                'title' => __('s_planning_title'),
                'image' => asset('img/planning.webp'),
                'desc' => __('s_planning_desc'),
                'tags' => __('s_planning_tags'),
                'url' => '/services/financial-planning',
            ],
            [
                'title' => __('s_audit_title'),
                'image' => asset('img/audit.webp'),
                'desc' => __('s_audit_desc'),
                'tags' => __('s_audit_tags'),
                'url' => '/services/audits',
            ],
            [
                'title' => __('s_sales_title'),
                'image' => asset('img/sales.webp'),
                'desc' => __('s_sales_desc'),
                'tags' => __('s_sales_tags'),
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
                    {{ __('our_services_label') }}
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-secondary mb-8">
                    {{ __('find_solution_title') }} <br />
                    <span class="text-primary">{{ __('find_solution_subtitle') }}</span>
                </h2>

                <div class="relative max-w-xl mx-auto group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-primary transition-colors"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input x-model="search" type="text" placeholder="{{ __('search_placeholder') }}"
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
                    {{--
       CORRECCIÓN: Eliminé "opacity-0" de la lista de clases abajo.
       GSAP se encargará de ocultarlos y mostrarlos en la carga inicial gracias al fromTo.
    --}}
                    <article
                        class="service-card-item group bg-white rounded-2xl overflow-hidden shadow-xs border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col"
                        x-transition:enter="transition ease-out duration-300"
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
                        {{ __('no_results_title') }}
                    </h3>
                    <button @click="search = ''" class="mt-4 text-primary font-bold hover:underline">
                        {{ __('view_all_btn') }}
                    </button>
                </div>
            </div>

            <div class="anim-cta services-cta text-center mt-16 opacity-0">
                @php $prefix = App::getLocale() === 'en' ? '/en' : ''; @endphp
                <a href="{{ $prefix }}/contact"
                    class="inline-flex items-center px-8 py-3 bg-primary hover:bg-orange-600 text-white font-bold rounded-full shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl"
                    {{-- Micro-interacción GSAP al pasar el mouse sobre el botón --}} x-data @mouseenter="gsap.to($el, { scale: 1.05, duration: 0.2 })"
                    @mouseleave="gsap.to($el, { scale: 1, duration: 0.2 })"
                    @mousedown="gsap.to($el, { scale: 0.95, duration: 0.1 })"
                    @mouseup="gsap.to($el, { scale: 1.05, duration: 0.1 })">
                    {{ __('schedule_btn') }}
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
