<div class="p-3">
    {{-- FILTROS --}}
    <div class="flex flex-col md:flex-row justify-between items-end mb-3">
        <div class="flex flex-col md:w-1/3">
            <label for="" class="text-black dark:text-white">{{ __('filter_validation') }}</label>
            <x-select wire:model.change="status">
                <option value="">{{ __('filter_all') }}</option>
                <option value="0">{{ __('filter_pending') }}</option>
                <option value="1">{{ __('filter_approved') }}</option>
                <option value="2">{{ __('filter_rejected') }}</option>
            </x-select>
        </div>
        <div class="flex flex-col md:flex-row gap-3">
            <x-button wire:click="validateAll">{{ __('validate_all_button') }}</x-button>
            <x-danger-button wire:click="deleteRejected">{{ __('delete_comments_button') }}</x-danger-button>
        </div>
    </div>

    {{-- TABLA --}}
    <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-gray-300 dark:border-gray-700">
        <table class="w-full text-left text-sm text-gray-600 dark:text-gray-300">
            <thead
                class="border-b border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                <tr>
                    <th scope="col" class="p-4">{{ __('th_no') }}</th>
                    <th scope="col" class="p-4">{{ __('th_user') }}</th>
                    <th scope="col" class="p-4">{{ __('th_email') }}</th>
                    <th scope="col" class="p-4">{{ __('th_status') }}</th>
                    <th scope="col" class="p-4">{{ __('th_action') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                @forelse($collection as $key => $item)
                    <tr>
                        <td class="p-4">
                            {{ ($collection->currentPage() - 1) * $collection->perPage() + $loop->iteration }}</td>
                        <td class="p-4">{{ $item->name }}</td>
                        <td class="p-4">{{ $item->email }}</td>
                        <td class="p-4">
                            @switch($item->is_approved)
                                @case(0)
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        {{ __('status_pending') }}
                                    </span>
                                @break

                                @case(1)
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ __('status_validated') }}
                                    </span>
                                @break

                                @case(2)
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        {{ __('status_rejected') }}
                                    </span>
                                @break
                            @endswitch
                        </td>
                        <td class="p-4">
                            <button wire:click="openValidateModal({{ $item->id }})"
                                wire:target="openValidateModal({{ $item->id }})" type="button"
                                class="group flex items-center justify-center rounded-lg p-1.5 text-gray-500 hover:bg-gray-100 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-indigo-400">
                                <div class="relative flex items-center gap-2 font-medium text-sm">

                                    <div wire:loading.class="opacity-0"
                                        wire:target="openValidateModal({{ $item->id }})"
                                        class="flex items-center gap-1 transition-opacity">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span
                                            class="group-hover:underline decoration-indigo-600/30 underline-offset-4">{{ __('btn_validate') }}</span>
                                    </div>

                                    <div wire:loading.flex wire:target="openValidateModal({{ $item->id }})"
                                        class="absolute inset-0 items-center justify-center hidden">
                                        <svg class="animate-spin size-4 text-indigo-600"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="100%">
                                <x-table-empty title="{{ __('empty_title') }}" message="{{ __('empty_msg') }}"
                                    class="border-none shadow-none py-12">
                                    <x-slot:action>
                                        {{-- He dejado el link genérico, ajusta href según necesites --}}
                                        <a href="#"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-orange-700 transition">
                                            {{ __('btn_register_first') }}
                                        </a>
                                    </x-slot:action>
                                </x-table-empty>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $collection->links() }}
        </div>

        {{-- MODAL DE VALIDACIÓN --}}
        <x-dialog-modal wire:model="validateModal">
            <x-slot name="title">
                <div class="flex items-center gap-2 border-b pb-3 border-gray-200 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-indigo-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                    </svg>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">
                        {{ __('modal_title_validate') }}
                    </h2>
                </div>
            </x-slot>

            <x-slot name="content">
                <div class="space-y-4 mt-2">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-label value="{{ __('lbl_user_name') }}"
                                class="mb-1 text-xs uppercase tracking-wider text-gray-500" />
                            <x-input type="text"
                                class="w-full bg-gray-100 text-gray-600 border-gray-200 cursor-text focus:ring-0 focus:border-gray-300 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-700"
                                wire:model="nombre" readonly />
                        </div>
                        <div>
                            <x-label value="{{ __('lbl_email') }}"
                                class="mb-1 text-xs uppercase tracking-wider text-gray-500" />
                            <x-input type="text"
                                class="w-full bg-gray-100 text-gray-600 border-gray-200 cursor-text focus:ring-0 focus:border-gray-300 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-700"
                                wire:model="email" readonly />
                        </div>
                    </div>

                    <div>
                        <x-label value="{{ __('lbl_comment_content') }}"
                            class="mb-1 text-xs uppercase tracking-wider text-gray-500" />
                        <div class="relative">
                            <x-textarea
                                class="w-full h-32 bg-gray-100 text-gray-600 border-gray-200 resize-none cursor-text focus:ring-0 focus:border-gray-300 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-700"
                                wire:model="comment" readonly />
                            <div class="absolute top-2 right-2 text-xs text-gray-400">{{ __('lbl_readonly') }}</div>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex flex-col sm:flex-row justify-between w-full gap-2">
                    <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                        {{ __('btn_cancel') }}
                    </x-secondary-button>

                    <div class="flex gap-2">
                        <x-danger-button wire:click="notValidate" wire:loading.attr="disabled" class="gap-1">
                            {{ __('btn_reject') }}
                        </x-danger-button>

                        <button wire:click="confirmValidation" wire:loading.attr="disabled"
                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 gap-1 dark:focus:ring-offset-gray-800">
                            {{ __('btn_approve') }}
                        </button>
                    </div>
                </div>
            </x-slot>
        </x-dialog-modal>

        <x-dialog-modal wire:model="valideteAllModal">
            <x-slot name="title">
                <div class="flex items-center gap-3 pb-4 border-b border-gray-100 dark:border-gray-800">
                    <div class="p-2 bg-indigo-50 dark:bg-indigo-900/30 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-indigo-600 dark:text-indigo-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                        {{ __('modal_title_validate_all') }}
                    </h2>
                </div>
            </x-slot>

            <x-slot name="content">
                <div class="py-4 text-center">
                    <div class="mb-4 flex justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-help-circle w-12 h-12">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                            <path d="M12 16v.01" />
                            <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                        </svg>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 text-lg leading-relaxed">
                        {{ __('question_aproved_comments_all') }}
                    </p>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-end gap-3 w-full">
                    <x-secondary-button wire:click="$set('valideteAllModal', false)" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-button wire:click="validateAllSubmit">
                        {{ __('validate') }}
                    </x-button>
                </div>
            </x-slot>
        </x-dialog-modal>


        <x-dialog-modal wire:model="delteRejectedModal">
            <x-slot name="title">
                <div class="flex items-center gap-3 pb-4 border-b border-gray-100 dark:border-gray-800">
                    <div class="p-2 bg-red-50 dark:bg-red-900/30 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-red-600 dark:text-red-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                        {{ __('title_delete_rejected') }}
                    </h2>
                </div>
            </x-slot>

            <x-slot name="content">
                <div class="py-2">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                        {{ __('description_delete_rejected') }}
                    </p>

                    <div class="mt-4" x-data="{}"
                        x-on:confirming-delete-rejected.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-input type="password" class="mt-1 block w-3/4 dark:bg-gray-900" placeholder="{{ __('Password') }}"
                            x-ref="password" wire:model="password" wire:keydown.enter="deleteRejected" />

                        <x-input-error for="password" class="mt-2" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('delteRejectedModal', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteRejectedSubmit" wire:loading.attr="disabled">
                    {{ __('delete_reject_button_modal') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </div>
