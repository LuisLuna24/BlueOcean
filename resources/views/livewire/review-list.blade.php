<div
    class="py-10"
    x-data
    x-init="
        // 1. Título
        gsap.fromTo('.anim-title',
            { y: -20, opacity: 0 },
            { y: 0, opacity: 1, duration: 0.8, ease: 'power3.out' }
        );

        // 2. Tarjetas (Sin clearProps)
        const animateCards = () => {
            gsap.fromTo('.review-card',
                { y: 30, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.5,
                    stagger: 0.1,
                    ease: 'power2.out',
                    delay: 0.2,
                    overwrite: 'auto' // Evita conflictos si se llama rápido
                    // IMPORTANTE: Eliminé clearProps para que no desaparezcan
                }
            );
        };

        animateCards();

        // Re-ejecutar al paginar
        Livewire.hook('morph.updated', ({ component }) => {
            if (component.el.contains($el)) {
                // Pequeño reset para que la animación se sienta fresca al cambiar página
                gsap.set('.review-card', { opacity: 0, y: 30 });
                animateCards();
            }
        });
    "
>
    <div class="anim-title text-center mb-12 opacity-0">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
            Lo que dicen nuestros clientes
        </h2>
        <p class="mt-4 text-lg text-slate-600">
            Personas reales, experiencias reales en <span class="text-primary font-bold">Blue Ocean</span>.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($reviews as $review)
            <div class="review-card bg-white rounded-2xl p-8 shadow-lg shadow-slate-200 border border-slate-100 flex flex-col h-full opacity-0">

                <div class="flex items-center gap-4 mb-4">
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode($review->name) }}&background=random&color=fff&size=128"
                        alt="{{ $review->name }}"
                        class="w-12 h-12 rounded-full shadow-xs"
                    >
                    <div>
                        <h4 class="font-bold text-slate-900 leading-tight">{{ $review->name }}</h4>
                        <span class="text-xs text-slate-400 font-medium">
                            {{ $review->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>

                <p class="text-slate-600 leading-relaxed italic grow">
                    "{{ $review->comment }}"
                </p>
            </div>
        @empty
            <div class="col-span-full text-center py-12 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                <p class="text-slate-500 text-lg">Aún no hay reseñas públicas.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $reviews->links() }}
    </div>
</div>
