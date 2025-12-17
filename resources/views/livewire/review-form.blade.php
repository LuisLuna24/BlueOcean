<div class="max-w-xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" id="review-form-card"
    x-data x-init="// Usamos .from() en lugar de .fromTo()
    // Esto hace que empiece invisible (opacity: 0) y vaya a visible (opacity: 1)
    // sin depender de la clase CSS que causa el error.
    gsap.from('#review-form-card', {
        y: 30,
        opacity: 0, // GSAP lo oculta aquí
        duration: 0.8,
        ease: 'power2.out',
        delay: 0.5
    });">
    <div class="p-6 sm:p-8">
        <div class="text-center mb-8">
            <h3 class="text-2xl font-bold text-gray-900 tracking-tight">{{ __('your_opinion_matters') }}</h3>
            <p class="text-gray-500 mt-2 text-sm">{{ __('help_us_improve') }}</p>
        </div>

        @if ($successMessage)
            <div x-data x-init="// Animación de entrada del mensaje de éxito
            gsap.from($el, {
                scale: 0.8,
                opacity: 0,
                duration: 0.8,
                ease: 'elastic.out(1, 0.5)'
            })"
                class="bg-green-50 border border-green-200 rounded-xl p-8 flex flex-col items-center text-center space-y-4">
                <div
                    class="h-16 w-16 bg-green-100 rounded-full flex items-center justify-center text-green-600 shadow-xs">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xl font-bold text-green-800 mb-1">{{ __('thanks_feedback') }}</h4>
                    <p class="text-green-700">{{ __('feedback_received') }}</p>
                </div>

                <button wire:click="$set('successMessage', false)"
                    class="text-sm font-medium text-green-600 hover:text-green-800 underline mt-2">
                    {{ __('send_another') }}
                </button>
            </div>
        @else
            <form class="space-y-6" id="reviewForm">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">{{ __('lbl_name') }}</label>
                    <input wire:model="name" type="text" placeholder="{{ __('ph_name') }}"
                        class="block w-full px-4 py-3 rounded-xl border-gray-300 shadow-xs text-gray-900 placeholder-gray-400 focus:border-primary focus:ring-3 focus:ring-primary/20 transition-all duration-200 sm:text-sm">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">{{ __('lbl_email') }}</label>
                    <input wire:model="email" type="email" placeholder="{{ __('ph_email') }}"
                        class="block w-full px-4 py-3 rounded-xl border-gray-300 shadow-xs text-gray-900 placeholder-gray-400 focus:border-primary focus:ring-3 focus:ring-primary/20 transition-all duration-200 sm:text-sm">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">{{ __('lbl_review') }}</label>
                    <textarea wire:model="comment" rows="4"
                        class="block w-full px-4 py-3 rounded-xl border-gray-300 shadow-xs text-gray-900 placeholder-gray-400 focus:border-primary focus:ring-3 focus:ring-primary/20 transition-all duration-200 sm:text-sm resize-none"></textarea>
                    @error('comment')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                @error('captchaToken')
                    <div class="p-3 bg-red-100 text-red-700 rounded-lg text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <button type="button" onclick="iniciarEnvio()" wire:loading.attr="disabled"
                    class="w-full flex justify-center items-center px-6 py-3.5 border border-transparent text-sm font-bold rounded-xl text-white bg-primary hover:bg-primary/90 shadow-lg transition-all disabled:opacity-70">

                    <span wire:loading.remove>{{ __('btn_submit') }}</span>

                    <div wire:loading class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        {{ __('btn_sending') }}
                    </div>
                </button>

                @push('scripts')
                    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>

                    <script>
                        function iniciarEnvio() {

                            grecaptcha.ready(function() {
                                grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                                        action: 'submit'
                                    })
                                    .then(function(token) {

                                        // 1. Asignamos el token a Livewire
                                        @this.set('captchaToken', token);

                                        // 2. Ejecutamos el guardado
                                        @this.call('save');
                                    })
                                    .catch(function(error) {
                                        alert('Error al conectar con Google. Por favor revisa tu conexión.');
                                    });
                            });
                        }
                    </script>
                @endpush
            </form>
        @endif
    </div>
</div>
