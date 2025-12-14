<x-guest-layout>
    @php
        $contactData = [
            'title' => 'Estamos listos para ayudarte',
            'subtitle' => 'Elige tu método de contacto preferido o visita nuestra oficina.',
            'location_title' => 'Nuestra Ubicación',
            'location_address' =>
                'Dentro de CUBEWORK, 1600 Indian Brook Way Ste 100 Office R01, Norcross, GA 30093, Estados Unidos',
            'contact_methods' => [
                [
                    'name' => 'WhatsApp',
                    'value' => '+1 (786) 325-3125',
                    'link' => 'https://wa.me/7863253125',
                    'icon' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" /><path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" /></svg>',
                    'colorClass' => 'text-green-600 bg-green-50 hover:bg-green-100',
                ],
                [
                    'name' => 'Correo Electrónico',
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
                    'name' => 'eFax (Fax Electrónico)',
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
                    Contáctanos
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
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-primary mr-2 mt-1 shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
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

                        <a href="https://www.google.com/maps/search/?api=1&query=${{ urlencode($contactData['location_address']) }}"
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
                                    Ver en Google Maps
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-guest-layout>
