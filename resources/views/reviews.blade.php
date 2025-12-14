<x-guest-layout>
    <section class="bg-slate-50 py-10 md:py-20 px-4 sm:px-6 lg:px-8">

        <div class="max-w-7xl mx-auto space-y-20">

            <livewire:review-list />

            <div class="relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-slate-200"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-4 bg-slate-50 text-sm text-slate-400 font-medium">¿Fuiste cliente?</span>
                </div>
            </div>

            <livewire:review-form />

        </div>
    </section>
</x-guest-layout>
