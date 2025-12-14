@props([
    'title' => 'No se encontraron registros',
    'message' => 'Lo sentimos, no hay datos disponibles en este momento para mostrar.',
    'icon' => 'search', // Opciones: search, folder, database
])
<div
    {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center p-12 text-center bg-white dark:bg-gray-800 border-2 border-dashed border-gray-100']) }}>

    <div class="w-20 h-20 bg-gray-50 dark:bg-gray-700 rounded-full flex items-center justify-center mb-6 text-gray-300">
        @if ($icon === 'search')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </svg>
        @elseif($icon === 'database')
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <ellipse cx="12" cy="5" rx="9" ry="3" />
                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5" />
                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z" />
            </svg>
        @endif
    </div>

    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-50 mb-2">
        {{ $title }}
    </h3>
    <p class="text-gray-500 max-w-sm leading-relaxed mb-6">
        {{ $message }}
    </p>

    {{-- Slot opcional para un botón de "Crear nuevo" o "Limpiar filtros" --}}
    @if ($slot->isNotEmpty())
        <div>
            {{ $slot }}
        </div>
    @endif
</div>
