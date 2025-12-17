@php
    // 1. Detectar idioma actual basado en la URL (si empieza con 'en')
    $path = request()->path();
    $currentLang = str_starts_with($path, 'en') ? 'en' : 'es';

    // 2. IMPORTANTE: Establecer el idioma en la aplicación para este renderizado
    app()->setLocale($currentLang);

    // 3. Definir prefijo para los enlaces (si es 'es' va vacío, si es 'en' lleva '/en')
    $prefix = $currentLang === 'en' ? '/en' : '';

    // 4. Array de rutas limpio usando el helper de traducción __()
    $routes = [
        ['name' => __('Home'), 'url' => $prefix === '' ? '/' : '/en'],
        ['name' => __('Services'), 'url' => $prefix . '/services'],
        ['name' => __('Team'), 'url' => $prefix . '/team'],
        ['name' => __('Values'), 'url' => $prefix . '/values'],
        ['name' => __('Reviews'), 'url' => $prefix . '/reviews'],
        ['name' => __('Tips'), 'url' => $prefix . '/tips'],
        ['name' => __('Policy'), 'url' => $prefix . '/policy'],
    ];
@endphp

<nav x-data="{
    mobileMenuIsOpen: false,
    langMenuOpen: false,
    switchLanguage(targetLang) {
        const currentPath = window.location.pathname;

        // Lógica para cambiar de idioma manteniendo la ruta
        if (targetLang === 'en' && !currentPath.startsWith('/en')) {
            // De Español a Inglés
            const cleanPath = currentPath === '/' ? '' : currentPath;
            window.location.href = '/en' + cleanPath;
        } else if (targetLang === 'es' && currentPath.startsWith('/en')) {
            // De Inglés a Español
            const newPath = currentPath.replace('/en', '') || '/';
            window.location.href = newPath;
        }
    }
}" x-on:click.away="mobileMenuIsOpen = false; langMenuOpen = false"
    class="sticky top-0 z-50 w-full flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-white/90 backdrop-blur-md transition-all duration-300">

    <a href="{{ $currentLang === 'en' ? '/en' : '/' }}" class="flex items-center gap-2 group relative z-50">
        <img src="{{ asset('img/Logo_M.webp') }}" alt="logo"
            class="w-32 sm:w-40 transition-transform duration-300 group-hover:scale-105" />
    </a>

    <div class="hidden items-center gap-6 xl:flex">
        <ul class="flex items-center gap-5">
            @foreach ($routes as $item)
                @php
                    // Lógica de activo
                    $isActive =
                        $item['url'] === '/' || $item['url'] === '/en'
                            ? '/' . $path === $item['url'] || $path === '/' // Caso Home
                            : str_starts_with('/' . $path, $item['url']);
                @endphp
                <li>
                    <a href="{{ $item['url'] }}" @class([
                        'relative text-sm font-medium transition-colors duration-300 group',
                        'text-primary font-bold' => $isActive,
                        'text-neutral-500 hover:text-primary' => !$isActive,
                    ])>
                        {{ $item['name'] }}
                        <span @class([
                            'absolute -bottom-1 left-0 h-[2px] w-full bg-primary origin-left scale-x-0 transition-transform duration-300 ease-out group-hover:scale-x-100',
                            'scale-x-100' => $isActive,
                        ])></span>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="h-6 w-px bg-gray-200"></div>

        <div class="relative">
            <button @click="langMenuOpen = !langMenuOpen"
                class="flex items-center gap-1.5 text-sm font-semibold text-neutral-700 hover:text-primary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="12" cy="12" r="9" />
                    <line x1="3.6" y1="9" x2="20.4" y2="9" />
                    <line x1="3.6" y1="15" x2="20.4" y2="15" />
                    <path d="M11.5 3a17 17 0 0 0 0 18" />
                    <path d="M12.5 3a17 17 0 0 1 0 18" />
                </svg>

                <span>{{ strtoupper($currentLang) }}</span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-3 transition-transform duration-200"
                    :class="langMenuOpen ? 'rotate-180' : ''">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"></path>
                </svg>
            </button>

            <div x-cloak x-show="langMenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                class="absolute right-0 top-full mt-2 w-32 bg-white rounded-xl shadow-xl border border-gray-100 py-2 overflow-hidden z-50">

                <button @click="switchLanguage('es'); langMenuOpen = false"
                    class="w-full text-left px-4 py-2 text-sm hover:bg-gray-50 transition-colors flex items-center justify-between {{ $currentLang === 'es' ? 'text-primary font-bold bg-primary/10' : '' }}">
                    Español @if ($currentLang === 'es')
                        <span class="text-primary">✓</span>
                    @endif
                </button>

                <button @click="switchLanguage('en'); langMenuOpen = false"
                    class="w-full text-left px-4 py-2 text-sm hover:bg-gray-50 transition-colors flex items-center justify-between {{ $currentLang === 'en' ? 'text-primary font-bold bg-primary/10' : '' }}">
                    English @if ($currentLang === 'en')
                        <span class="text-primary">✓</span>
                    @endif
                </button>
            </div>
        </div>

        <a href="{{ $prefix }}/contact"
            class="px-5 py-2.5 text-sm font-semibold text-white bg-primary rounded-full hover:bg-secondary transition-all hover:-translate-y-0.5 shadow-lg shadow-primary/20">
            {{ __('Contact') }}
        </a>

        @if (Auth::check() && Auth::user()->type_user_id == 1)
            <a href="{{ route('admin.dashboard') }}"
                class="px-5 py-2.5 text-sm font-semibold text-white bg-primary rounded-full hover:bg-secondary transition-all hover:-translate-y-0.5 shadow-lg shadow-primary/20">
                {{ __('Dashboard') }}
            </a>
        @endif
    </div>

    <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen"
        class="flex xl:hidden relative z-50 p-2 text-neutral-600 focus:outline-hidden hover:text-primary transition-colors"
        aria-label="Menu">
        <div class="relative w-6 h-6">
            <span
                class="absolute top-1/2 left-0 w-6 h-0.5 bg-current transition-all duration-300 ease-[cubic-bezier(0.5,0,0.1,1)]"
                :class="mobileMenuIsOpen ? 'rotate-45 translate-y-0' : '-translate-y-1.5'"></span>
            <span
                class="absolute top-1/2 left-0 w-6 h-0.5 bg-current transition-all duration-300 ease-[cubic-bezier(0.5,0,0.1,1)]"
                :class="mobileMenuIsOpen ? 'opacity-0 scale-x-0' : 'opacity-100 scale-x-100'"></span>
            <span
                class="absolute top-1/2 left-0 w-6 h-0.5 bg-current transition-all duration-300 ease-[cubic-bezier(0.5,0,0.1,1)]"
                :class="mobileMenuIsOpen ? '-rotate-45 translate-y-0' : 'translate-y-1.5'"></span>
        </div>
    </button>

    <div x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="absolute inset-x-0 top-full p-4 xl:hidden bg-transparent z-40 max-h-[85vh] overflow-y-auto">

        <div
            class="flex flex-col rounded-2xl bg-white/95 backdrop-blur-xl border border-gray-100 shadow-2xl p-6 gap-2 ring-1 ring-black/5">
            @foreach ($routes as $item)
                @php
                    $isActive =
                        $item['url'] === '/' || $item['url'] === '/en'
                            ? '/' . $path === $item['url'] || $path === '/'
                            : str_starts_with('/' . $path, $item['url']);
                @endphp
                <a href="{{ $item['url'] }}" @class([
                    'text-base font-medium px-4 py-2.5 rounded-xl transition-all duration-200 active:scale-95',
                    'bg-primary/10 text-primary shadow-xs' => $isActive,
                    'text-neutral-600 hover:bg-gray-50 hover:text-primary' => !$isActive,
                ])>
                    {{ $item['name'] }}
                </a>
            @endforeach

            <hr class="border-gray-100 my-1" />

            <div class="flex items-center justify-center gap-2 py-2 p-1 bg-gray-50 rounded-full">
                <button @click="switchLanguage('es')"
                    class="flex-1 px-4 py-2 rounded-full text-sm font-medium transition-all duration-200"
                    :class="!window.location.pathname.startsWith('/en') ? 'bg-white text-primary shadow-xs' :
                        'text-neutral-500 hover:text-neutral-700'">
                    Español
                </button>
                <button @click="switchLanguage('en')"
                    class="flex-1 px-4 py-2 rounded-full text-sm font-medium transition-all duration-200"
                    :class="window.location.pathname.startsWith('/en') ? 'bg-white text-primary shadow-xs' :
                        'text-neutral-500 hover:text-neutral-700'">
                    English
                </button>
            </div>

            <a href="{{ $prefix }}/contact"
                class="w-full text-center px-5 py-3.5 mt-2 text-white bg-primary rounded-xl shadow-lg shadow-primary/20 active:scale-95 transition-all duration-200 font-semibold hover:bg-secondary">
                {{ __('Contact') }}
            </a>
        </div>
    </div>
</nav>
