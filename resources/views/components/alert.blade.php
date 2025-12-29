<div x-data="{ show: false }" x-on:notify.window="show = true; setTimeout(() => show = false, 2500)" x-show="show"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
    style="display: none;" class="fixed top-6 inset-x-0 flex justify-center z-[100] pointer-events-none">
    <div class="bg-emerald-500 text-white px-5 py-2 rounded-full shadow-lg flex items-center gap-2 pointer-events-auto">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
        </svg>
        <span class="text-sm font-semibold tracking-tight">
            {{ __('message_alert') }}
        </span>
    </div>
</div>
