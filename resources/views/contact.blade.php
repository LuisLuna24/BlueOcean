<x-guest-layout>
    @php
        $contactData = [
            'title' => __('contact_hero_title'),
            'subtitle' => __('contact_hero_subtitle'),
            'location_title' => __('location_title'),
            'location_address' => __('location_address'),
            'contact_methods' => [
                [
                    'name' => 'WhatsApp', // Nombres propios no suelen traducirse
                    'value' => '+1 (786) 325-3125',
                    'link' => 'https://wa.me/7863253125',
                    'icon' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" /><path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" /></svg>',
                    'colorClass' => 'text-green-600 bg-green-50 hover:bg-green-100',
                ],
                [
                    'name' => __('method_email'),
                    'value' => 'info@blueoceanaccountax.com',
                    'link' => 'mailto:info@blueoceanaccountax.com',
                    'icon' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>',
                    'colorClass' => 'text-primary bg-orange-50 hover:bg-orange-100',
                ],
                [
                    'name' => 'Facebook',
                    'value' => '@BlueOcean_AccountingTax',
                    'link' => 'https://facebook.com/BlueOcean_AccountingTax',
                    'icon' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>',
                    'colorClass' => 'text-blue-600 bg-blue-50 hover:bg-blue-100',
                ],
                [
                    'name' => 'Instagram',
                    'value' => '@blueocean_accountingtax',
                    'link' => 'https://www.instagram.com/blueocean_accountingtax/',
                    'icon' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M16.5 7.5v.01" /></svg>',
                    'colorClass' => 'text-pink-600 bg-pink-50 hover:bg-pink-100',
                ],
                [
                    'name' => __('method_efax'),
                    'value' => '+1 (866) 214-7959',
                    'link' => 'tel:+18662147959',
                    'icon' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>',
                    'colorClass' => 'text-secondary bg-blue-50 hover:bg-blue-100',
                ],
            ],
        ];
    @endphp

    <section class="relative py-10 md:py-20 bg-gray-50 overflow-hidden" id="contact-section" x-data
        x-init="// 1. Header (Aparece subiendo)
        gsap.to('.contact-header', {
            scrollTrigger: { trigger: '.contact-header', start: 'top 85%' },
            y: 0,
            opacity: 1,
            duration: 1,
            ease: 'power3.out'
        });

        // 2. Lista de Contactos (Entra desde la izquierda en cascada)
        gsap.to('.contact-card', {
            scrollTrigger: { trigger: '.contact-card', start: 'top 80%' },
            x: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.15,
            ease: 'power2.out'
        });

        // 3. Mapa (Entra desde la derecha)
        gsap.to('.map-container', {
            scrollTrigger: { trigger: '.map-container', start: 'top 80%' },
            x: 0,
            opacity: 1,
            duration: 1,
            delay: 0.3,
            ease: 'power3.out'
        });">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary opacity-5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-secondary opacity-5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center max-w-3xl mx-auto mb-16 contact-header opacity-0 translate-y-8">
                <h2 class="text-sm font-bold tracking-widest text-primary uppercase mb-3">
                    {{ __('contact_label') }}
                </h2>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                    {{ $contactData['title'] }}
                </h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    {{ $contactData['subtitle'] }}
                </p>
            </div>

            <div class="grid lg:grid-cols-12 gap-8 lg:gap-12">

                <div class="lg:col-span-5 space-y-6">
                    @foreach ($contactData['contact_methods'] as $method)
                        <a href="{{ $method['link'] }}" target="_blank" rel="noopener noreferrer"
                            class="contact-card group flex items-center p-5 bg-white rounded-2xl shadow-xs border border-gray-100 hover:shadow-xl hover:border-primary hover:-translate-y-1 transition-all duration-300 opacity-0 -translate-x-8">
                            <div
                                class="shrink-0 w-14 h-14 flex items-center justify-center rounded-xl transition-colors duration-300 {{ $method['colorClass'] }} group-hover:bg-primary group-hover:text-white">
                                <div class="w-6 h-6 [&>svg]:w-full [&>svg]:h-full">
                                    {!! $method['icon'] !!}
                                </div>
                            </div>

                            <div class="ml-5 flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-500 group-hover:text-primary transition-colors">
                                    {{ $method['name'] }}
                                </p>
                                <p class="text-lg font-bold text-gray-900 truncate">
                                    {{ $method['value'] }}
                                </p>
                            </div>

                            <div
                                class="opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="lg:col-span-7 map-container opacity-0 translate-x-8">
                    <div
                        class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 h-full flex flex-col">

                        <div class="p-8 border-b border-gray-100 bg-white relative z-20">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                {{ $contactData['location_title'] }}
                            </h3>
                            <div class="flex items-start text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary mr-2 mt-1 shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="text-lg leading-relaxed">
                                    {{ $contactData['location_address'] }}
                                </p>
                            </div>
                        </div>

                        {{-- URL de Google Maps estándar --}}
                        <a href="https://maps.app.goo.gl/RtbQDbMfbfJqkH8R8"
                            target="_blank" rel="noopener noreferrer"
                            class="relative flex-1 min-h-[300px] w-full group overflow-hidden bg-gray-200 block">
                            <img src="{{ asset('img/mapa.webp') }}" alt="Mapa de ubicación"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 grayscale group-hover:grayscale-0" />

                            <div
                                class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300 flex items-center justify-center">
                                <span
                                    class="inline-flex items-center px-6 py-3 rounded-full bg-white text-secondary font-bold shadow-lg transform transition-all duration-300 group-hover:scale-110 group-hover:bg-secondary group-hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 00-.553-.894L15 7m0 13V7">
                                        </path>
                                    </svg>
                                    {{ __('view_google_maps') }}
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section x-data="{ show: false }" x-intersect.once.threshold.20="show = true" class="py-16 relative overflow-hidden">

        {{-- LÓGICA DINÁMICA DE ENLACES EXTERNOS --}}
        @php
            $isEs = App::getLocale() === 'es';

            // URLs del IRS cambian según el idioma
            $urlIrsRefund = $isEs
                ? 'https://sa.www4.irs.gov/wmr/es/'
                : 'https://sa.www4.irs.gov/irfof/lang/en/irfofgetstatus.jsp';

            $urlIrsAccount = $isEs
                ? 'https://www.irs.gov/es/payments/online-account-for-individuals'
                : 'https://www.irs.gov/payments/online-account-for-individuals';

            // GTC parece usar la misma URL base
            $urlGtcPay = 'https://gtc.dor.ga.gov/_/#1';
            $urlGtcRefund = 'https://gtc.dor.ga.gov/_/#3';
        @endphp

        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 opacity-30 pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-blue-100 blur-3xl mix-blend-multiply">
            </div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-green-100 blur-3xl mix-blend-multiply">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div x-show="show" x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-primary tracking-tight sm:text-4xl mb-3">
                    {{ __('official_links_title') }}
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-slate-600">
                    {{ __('official_links_desc') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- 1. IRS REEMBOLSO --}}
                <a href="{{ $urlIrsRefund }}" target="_blank" rel="noopener noreferrer" x-show="show"
                    x-transition:enter="transition ease-out duration-700 delay-100"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="group relative bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-blue-700 rounded-t-2xl">
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-12 w-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('link_irs_refund') }}</h3>
                        <p class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-1 rounded-full">
                            {{ __('tag_federal') }}
                        </p>
                    </div>
                </a>

                {{-- 2. IRS CUENTA --}}
                <a href="{{ $urlIrsAccount }}" target="_blank" rel="noopener noreferrer" x-show="show"
                    x-transition:enter="transition ease-out duration-700 delay-200"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="group relative bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-700 to-indigo-800 rounded-t-2xl">
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-12 w-12 bg-indigo-50 text-indigo-700 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('link_irs_account') }}</h3>
                        <p class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-1 rounded-full">
                            {{ __('tag_personal_mgmt') }}
                        </p>
                    </div>
                </a>

                {{-- 3. GTC PAGO RÁPIDO --}}
                <a href="{{ $urlGtcPay }}" target="_blank" rel="noopener noreferrer" x-show="show"
                    x-transition:enter="transition ease-out duration-700 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="group relative bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-500 to-emerald-700 rounded-t-2xl">
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-12 w-12 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('link_gtc_pay') }}</h3>
                        <p class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-1 rounded-full">
                            {{ __('tag_ga_state') }}
                        </p>
                    </div>
                </a>

                {{-- 4. GTC REEMBOLSO --}}
                <a href="{{ $urlGtcRefund }}" target="_blank" rel="noopener noreferrer" x-show="show"
                    x-transition:enter="transition ease-out duration-700 delay-500"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="group relative bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-600 to-teal-800 rounded-t-2xl">
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-12 w-12 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('link_gtc_refund') }}</h3>
                        <p class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-1 rounded-full">
                            {{ __('tag_ga_state') }}
                        </p>
                    </div>
                </a>

            </div>
        </div>
    </section>
</x-guest-layout>
