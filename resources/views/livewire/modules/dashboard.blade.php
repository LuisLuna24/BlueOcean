<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

    <div
        class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm ring-1 ring-gray-900/5 transition-all hover:shadow-md dark:ring-white/10">
        <div class="flex items-center gap-4 mb-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-50 dark:bg-orange-900/20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-orange-600 dark:text-orange-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Por Revisar</p>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $pendingCount }}</h3>
            </div>
        </div>

        <a href="{{ route('admin.reviews.index', ['status' => 0]) }}"
            class="w-full flex items-center justify-center gap-2 rounded-lg bg-orange-50 px-4 py-2 text-sm font-semibold text-orange-700 transition-colors hover:bg-orange-100 dark:bg-orange-900/30 dark:text-orange-300 dark:hover:bg-orange-900/50">
            <span>Ver pendientes</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-3.5 w-3.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>

    <div
        class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm ring-1 ring-gray-900/5 transition-all hover:shadow-md dark:ring-white/10">
        <div class="flex items-center gap-4 mb-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 dark:bg-emerald-900/20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-emerald-600 dark:text-emerald-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Aprobadas</p>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $approvedCount }}</h3>
            </div>
        </div>

        <a href="{{ route('admin.reviews.index', ['status' => 1]) }}"
            class="w-full flex items-center justify-center gap-2 rounded-lg bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-700 transition-colors hover:bg-emerald-100 dark:bg-emerald-900/30 dark:text-emerald-300 dark:hover:bg-emerald-900/50">
            <span>Ver aprobadas</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-3.5 w-3.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>

    <div
        class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm ring-1 ring-gray-900/5 transition-all hover:shadow-md dark:ring-white/10">
        <div class="flex items-center gap-4 mb-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-rose-50 dark:bg-rose-900/20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-rose-600 dark:text-rose-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Rechazadas</p>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $rejectedCount }}</h3>
            </div>
        </div>

        <a href="{{ route('admin.reviews.index', ['status' => 2]) }}"
            class="w-full flex items-center justify-center gap-2 rounded-lg bg-rose-50 px-4 py-2 text-sm font-semibold text-rose-700 transition-colors hover:bg-rose-100 dark:bg-rose-900/30 dark:text-rose-300 dark:hover:bg-rose-900/50">
            <span>Ver rechazadas</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-3.5 w-3.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>
</div>
