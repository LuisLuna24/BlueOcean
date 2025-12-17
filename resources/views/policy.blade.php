<x-guest-layout>
    @php
        // LISTA DE SERVICIOS TRADUCIDOS
        // Usamos las claves que creamos en los archivos JSON
        $servicesList = [
            __('ps_0'),
            __('ps_1'),
            __('ps_2'),
            __('ps_3'),
            __('ps_4'),
            __('ps_5'),
            __('ps_6'),
            __('ps_7'),
            __('ps_8'),
            __('ps_9'),
            __('ps_10'),
            __('ps_11'),
            __('ps_12'),
            __('ps_13'),
        ];

        // REGLAS OPERATIVAS TRADUCIDAS
        $rules = [
            [
                'title' => __('rule_1_title'),
                'desc' => __('rule_1_desc'),
                'icon' =>
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            ],
            [
                'title' => __('rule_2_title'),
                'desc' => __('rule_2_desc'),
                'icon' =>
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            ],
            [
                'title' => __('rule_3_title'),
                'desc' => __('rule_3_desc'),
                'icon' =>
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>',
            ],
            [
                'title' => __('rule_4_title'),
                'desc' => __('rule_4_desc'),
                'icon' =>
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>',
            ],
        ];
    @endphp

    <section class="py-10 md:py-20 bg-white relative overflow-hidden" x-data x-init="gsap.to('.letter-anim', {
        scrollTrigger: { trigger: '.letter-section', start: 'top 80%' },
        y: 0,
        opacity: 1,
        duration: 0.8,
        stagger: 0.1,
        ease: 'power2.out'
    });">
        <div class="letter-section max-w-4xl mx-auto px-6 lg:px-8 relative z-10">

            <div class="text-center mb-16 letter-anim opacity-0 translate-y-8">
                <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">
                    {{ __('transparency_label') }}
                </span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                    {{ __('open_letter_title') }}
                </h1>
                <p class="mt-4 text-xl text-gray-500">
                    {{ __('open_letter_subtitle') }}
                </p>
            </div>

            <div class="prose prose-lg text-gray-600 mx-auto">
                <p class="letter-anim opacity-0 translate-y-8">
                    {{ __('letter_p1') }}
                </p>

                <div class="my-10 bg-gray-50 rounded-2xl p-8 border border-gray-100 letter-anim opacity-0 translate-y-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                        {{ __('scope_title') }}
                    </h3>
                    <ul class="space-y-3">
                        @foreach ($servicesList as $service)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm md:text-base">{{ $service }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="letter-anim opacity-0 translate-y-8 space-y-6">
                    <p>
                        {{ __('letter_p2') }}
                    </p>
                    <p>
                        {{ __('letter_p3_start') }}
                        <strong class="text-gray-900">{{ __('letter_p3_bold') }}</strong>
                        {{ __('letter_p3_end') }}
                    </p>
                </div>

                <div
                    class="my-12 p-8 bg-blue-900 rounded-3xl text-white text-center letter-anim opacity-0 translate-y-8 shadow-xl relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 -ml-10 -mb-10 w-40 h-40 bg-primary opacity-20 rounded-full blur-2xl">
                    </div>

                    <h3 class="text-2xl font-bold mb-4 relative z-10 text-primary">{{ __('diag_fee_title') }}</h3>
                    <div class="text-5xl font-extrabold text-primary mb-4 relative z-10">$275 <span
                            class="text-xl font-medium text-blue-200">USD</span></div>
                    <p class="text-blue-100 mb-6 relative z-10">
                        {{ __('diag_fee_quote') }}
                    </p>
                    @php $prefix = App::getLocale() === 'en' ? '/en' : ''; @endphp
                    <a href="{{ $prefix }}/contact"
                        class="inline-block bg-white text-blue-900 px-8 py-3 rounded-full font-bold hover:bg-primary hover:text-white transition-colors relative z-10">
                        {{ __('btn_schedule_diag') }}
                    </a>
                </div>

                <div class="letter-anim opacity-0 translate-y-8 space-y-6">
                    <h3 class="text-2xl font-bold text-gray-900">{{ __('pricing_title') }}</h3>
                    <p>
                        {{ __('price_p1_start') }}
                        <strong>{{ __('price_p1_bold') }}</strong>
                        {{ __('price_p1_end') }}
                    </p>
                    <p>
                        {{ __('price_p2_start') }}
                        <strong>{{ __('price_p2_bold') }}</strong>
                    </p>
                    <p class="text-sm bg-yellow-50 p-4 border-l-4 border-yellow-400 text-yellow-800">
                        <strong>{{ __('factors_label') }}</strong> {{ __('factors_text') }}
                    </p>
                    <p>
                        {{ __('contact_text_start') }} <a href="mailto:blueoceanacccountax@gmail.com"
                            class="text-primary font-bold hover:underline">blueoceanacccountax@gmail.com</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-gray-50 border-t border-gray-200" x-data x-init="gsap.to('.policy-anim', {
        scrollTrigger: { trigger: '.policy-section', start: 'top 80%' },
        y: 0,
        opacity: 1,
        duration: 0.8,
        stagger: 0.1,
        ease: 'power2.out'
    });">
        <div class="policy-section max-w-7xl mx-auto px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center mb-16 policy-anim opacity-0 translate-y-8">
                <h2 class="text-3xl md:text-4xl font-extrabold text-secondary mb-4">
                    {{ __('policies_title') }}
                </h2>
                <p class="text-lg text-gray-600">
                    {{ __('policies_desc_start') }} <strong
                        class="text-primary">{{ __('policies_desc_bold') }}</strong>
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-16">
                @foreach ($rules as $rule)
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 policy-anim opacity-0 translate-y-8 hover:shadow-lg transition-shadow duration-300">
                        <div
                            class="w-12 h-12 bg-blue-50 text-secondary rounded-xl flex items-center justify-center mb-6">
                            {!! $rule['icon'] !!}
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $rule['title'] }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $rule['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="grid md:grid-cols-2 gap-8 policy-anim opacity-0 translate-y-8">

                <div class="bg-secondary text-white p-8 rounded-2xl shadow-lg relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            {{ __('recurring_title') }}
                        </h3>
                        <p class="text-blue-100">
                            {{ __('recurring_desc') }}
                        </p>
                    </div>
                </div>

                <div class="bg-gray-100 p-8 rounded-2xl border-l-4 border-gray-400">
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-widest mb-3">
                        {{ __('terms_title') }}
                    </h3>
                    <p class="text-gray-700 italic text-sm leading-relaxed">
                        {{ __('terms_text') }}
                    </p>
                </div>

            </div>
        </div>
    </section>

</x-guest-layout>
