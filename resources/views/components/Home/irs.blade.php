<section x-data="{ show: false }" x-intersect.once.threshold.20="show = true"
        class="py-16 relative overflow-hidden">

        {{-- LÓGICA DINÁMICA DE ENLACES EXTERNOS --}}
        @php
            $isEs = App::getLocale() === 'es';

            // URLs del IRS cambian según el idioma
            $urlIrsRefund = $isEs
                ? 'https://sa.www4.irs.gov/wmr/es/'
                : 'https://sa.www4.irs.gov/irfof/lang/en/irfofgetstatus.jsp';

            $urlIrsAccount = $isEs
                ? 'https://www.irs.gov/es/payments/online-account-for-individuals'
                : 'https://www.irs.gov/payments/online-account-for-individuals';

            // GTC parece usar la misma URL base
            $urlGtcPay = 'https://gtc.dor.ga.gov/_/#1';
            $urlGtcRefund = 'https://gtc.dor.ga.gov/_/#3';
        @endphp

        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 opacity-30 pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-blue-100 blur-3xl mix-blend-multiply">
            </div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-green-100 blur-3xl mix-blend-multiply">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div x-show="show" x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-primary tracking-tight sm:text-4xl mb-3">
                    {{ __('official_links_title') }}
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-slate-600">
                    {{ __('official_links_desc') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- 1. IRS REEMBOLSO --}}
                <a href="{{ $urlIrsRefund }}" target="_blank" rel="noopener noreferrer" x-show="show"
                    x-transition:enter="transition ease-out duration-700 delay-100"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="group relative bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-blue-700 rounded-t-2xl">
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-12 w-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('link_irs_refund') }}</h3>
                        <p class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-1 rounded-full">
                            {{ __('tag_federal') }}
                        </p>
                    </div>
                </a>

                {{-- 2. IRS CUENTA --}}
                <a href="{{ $urlIrsAccount }}" target="_blank" rel="noopener noreferrer" x-show="show"
                    x-transition:enter="transition ease-out duration-700 delay-200"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="group relative bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-700 to-indigo-800 rounded-t-2xl">
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-12 w-12 bg-indigo-50 text-indigo-700 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('link_irs_account') }}</h3>
                        <p class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-1 rounded-full">
                            {{ __('tag_personal_mgmt') }}
                        </p>
                    </div>
                </a>

                {{-- 3. GTC PAGO RÁPIDO --}}
                <a href="{{ $urlGtcPay }}" target="_blank" rel="noopener noreferrer" x-show="show"
                    x-transition:enter="transition ease-out duration-700 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="group relative bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-500 to-emerald-700 rounded-t-2xl">
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-12 w-12 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('link_gtc_pay') }}</h3>
                        <p class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-1 rounded-full">
                            {{ __('tag_ga_state') }}
                        </p>
                    </div>
                </a>

                {{-- 4. GTC REEMBOLSO --}}
                <a href="{{ $urlGtcRefund }}" target="_blank" rel="noopener noreferrer" x-show="show"
                    x-transition:enter="transition ease-out duration-700 delay-500"
                    x-transition:enter-start="opacity-0 translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="group relative bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-600 to-teal-800 rounded-t-2xl">
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div
                            class="h-12 w-12 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('link_gtc_refund') }}</h3>
                        <p class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-1 rounded-full">
                            {{ __('tag_ga_state') }}
                        </p>
                    </div>
                </a>

            </div>
        </div>
    </section>
