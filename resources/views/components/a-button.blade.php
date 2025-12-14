@props([
    'href',
    'variant' => 'primary'
])

@php
    // Estilos Base (Copiados exactamente de tu Astro)
    $baseStyles = "inline-flex items-center justify-center px-8 py-3 text-base font-bold rounded-xl transition-all duration-300 focus:outline-hidden focus:ring-2 focus:ring-offset-2 cursor-pointer";

    // Variantes
    $variants = [
        'primary' => "bg-primary text-white hover:bg-primary/90 shadow-lg shadow-primary/30 hover:shadow-primary/50 hover:-translate-y-1 active:scale-95 focus:ring-primary",

        'secondary' => "bg-secondary text-white hover:bg-secondary/90 shadow-lg shadow-secondary/30 hover:shadow-secondary/50 hover:-translate-y-1 active:scale-95 focus:ring-secondary",

        // Opción Outline (por si la quieres usar en el futuro, descomenta abajo y comenta la de arriba)
        /*
        'secondary' => "bg-white text-primary border-2 border-primary/20 hover:bg-primary/5 shadow-lg shadow-primary/10 hover:-translate-y-1 active:scale-95 focus:ring-primary",
        */
    ];

    // Seleccionamos los estilos de la variante (o primary por defecto)
    $variantStyles = $variants[$variant] ?? $variants['primary'];

    // Unimos todo
    $classes = $baseStyles . ' ' . $variantStyles;
@endphp

{{--
    $attributes->merge() hace dos cosas mágicas aquí:
    1. Agrega cualquier clase extra que pases al usar el componente (ej. class="mt-4").
    2. Pasa cualquier otro atributo HTML (ej. target="_blank", id="btn-hero") automáticamente.
--}}
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
