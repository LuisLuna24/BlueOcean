@php
    // CORRECCIÓN: Usamos una variable normal ($), no una constante
    $currentYear = date('Y');

    // 1. LÓGICA DE IDIOMA
    $path = request()->path();
    // Corrección para evitar errores si path está vacío o es raíz
    $currentLang = str_starts_with($path, 'en') ? 'en' : 'es';

    // 2. TEXTOS
    $content = [
        'es' => [
            'description' =>
                'Guardianes de la transparencia financiera. Ayudamos a familias y negocios hispanos a crecer con estrategias fiscales inteligentes y educación continua.',
            'navTitle' => 'Menú',
            'contactTitle' => 'Contacto',
            'rights' => 'Todos los derechos reservados.',
            'cta_text' => '¿Listo para ordenar tus finanzas?',
            'phone_label' => 'Teléfono',
            'email_label' => 'Correo Electrónico',
        ],
        'en' => [
            'description' =>
                'Guardians of financial transparency. We help Hispanic families and businesses grow with smart tax strategies and continuous education.',
            'navTitle' => 'Menu',
            'contactTitle' => 'Contact',
            'rights' => 'All rights reserved.',
            'cta_text' => 'Ready to organize your finances?',
            'phone_label' => 'Phone',
            'email_label' => 'Email',
        ],
    ];

    $text = $content[$currentLang];

    // 3. NAVEGACIÓN
    $t_nav = [
        'home' => $currentLang === 'en' ? 'Home' : 'Inicio',
        'services' => $currentLang === 'en' ? 'Services' : 'Servicios',
        'team' => $currentLang === 'en' ? 'Team' : 'Equipo',
        'reviews' => $currentLang === 'en' ? 'Reviews' : 'Reseñas',
        'policy' => $currentLang === 'en' ? 'policy' : 'Políticas',
        'contact' => $currentLang === 'en' ? 'Contact' : 'Contacto',
    ];

    $routes = [
        ['name' => $t_nav['home'], 'url' => $currentLang === 'en' ? '/en' : '/'],
        ['name' => $t_nav['services'], 'url' => $currentLang === 'en' ? '/en/services' : '/services'],
        ['name' => $t_nav['team'], 'url' => $currentLang === 'en' ? '/en/team' : '/team'],
        ['name' => $t_nav['reviews'], 'url' => $currentLang === 'en' ? '/en/reviews' : '/reviews'],
        ['name' => $t_nav['contact'], 'url' => $currentLang === 'en' ? '/en/contact' : '/contact'],
    ];
@endphp

<footer class="bg-white pt-16 pb-8 mt-20 relative overflow-hidden border-t border-gray-100">

    <div
        class="absolute top-0 left-0 w-full h-1.5 bg-linear-to-r from-secondary via-primary to-secondary">
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 mb-12">

            <div class="lg:col-span-5">
                <a href="{{ $currentLang === 'en' ? '/en' : '/' }}" class="block mb-6">
                    {{-- Asegúrate que esta imagen exista en public/img --}}
                    <img src="{{ asset('img/Logo_G.webp') }}" alt="Logo Blue Ocean"
                        class="w-48 md:w-56 h-auto drop-shadow-xs" />
                </a>
                <p class="text-gray-500 leading-relaxed mb-6 max-w-md">
                    {{ $text['description'] }}
                </p>
                <div
                    class="inline-block px-5 py-3 rounded-xl text-sm font-semibold transition-transform hover:-translate-y-1 shadow-lg shadow-blue-900/10 bg-secondary text-white">
                    {{ $text['cta_text'] }}
                </div>
            </div>

            <div class="lg:col-span-3 lg:pl-8">
                <h4
                    class="text-sm font-bold uppercase tracking-wider mb-6 pb-2 inline-block border-b-2 text-secondary border-primary">
                    {{ $text['navTitle'] }}
                </h4>
                <ul class="space-y-3">
                    @foreach ($routes as $route)
                        <li>
                            <a href="{{ $route['url'] }}"
                                class="group flex items-center text-gray-500 hover:text-primary transition-all duration-300">
                                <span
                                    class="w-0 overflow-hidden group-hover:w-3 transition-all duration-300 text-primary mr-0 group-hover:mr-1">
                                    ›
                                </span>
                                {{ $route['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="lg:col-span-4">
                <h4
                    class="text-sm font-bold uppercase tracking-wider mb-6 pb-2 inline-block border-b-2 text-secondary border-primary">
                    {{ $text['contactTitle'] }}
                </h4>
                <ul class="space-y-5">
                    <li class="flex items-start gap-4 group">
                        <div
                            class="p-3 rounded-lg transition-colors duration-300 bg-orange-50 text-primary group-hover:bg-primary group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <span
                                class="block text-xs text-gray-400 uppercase font-bold mb-0.5">{{ $text['phone_label'] }}</span>
                            <a href="tel:+15551234567"
                                class="text-gray-700 hover:text-secondary transition-colors font-bold">
                                +1 (555) 123-4567
                            </a>
                        </div>
                    </li>

                    <li class="flex items-start gap-4 group">
                        <div
                            class="p-3 rounded-lg transition-colors duration-300 bg-blue-50 text-secondary group-hover:bg-secondary group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <span
                                class="block text-xs text-gray-400 uppercase font-bold mb-0.5">{{ $text['email_label'] }}</span>
                            <a href="mailto:info@tuempresa.com"
                                class="text-gray-700 hover:text-secondary transition-colors font-bold break-all">
                                info@tuempresa.com
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div
            class="border-t border-gray-100 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
            <p>
                &copy; {{ $currentYear }} Blue Ocean. {{ $text['rights'] }}
            </p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="{{ $currentLang === 'en' ? '/en/policy' : '/policy' }}"
                    class="hover:text-primary transition-colors">
                    {{ $t_nav['policy'] }}
                </a>
            </div>
        </div>
    </div>
</footer>
