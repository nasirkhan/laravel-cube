@props([
    "data" => "",
    "toolbar" => "",
    "title" => "",
    "subtitle" => "",
    "module_name" => "",
    "module_title" => "",
    "module_icon" => "",
    "module_action" => "",
])

<div class="flex justify-between">
    <div class="self-center">
        @if ($slot != "")
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-0">
                {{ $slot }}
            </h4>
        @else
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-0">
                <i class="{{ $module_icon }}"></i>
                {{ __($module_title) }}
                <small class="text-gray-500 dark:text-gray-400">{{ __($module_action) }}</small>
            </h4>
        @endif

        @if ($subtitle)
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ $subtitle }}
            </div>
        @endif
    </div>
    @if ($toolbar)
        <div class="flex items-center gap-1" role="toolbar" aria-label="Toolbar with buttons">
            {{ $toolbar }}
        </div>
    @else
        <div class="flex items-center gap-1" role="toolbar" aria-label="Toolbar with buttons">
            @if (Str::endsWith(Route::currentRouteName(), "index"))
                <x-cube::backend-button-return-back />

                @if (auth()->user()->can("add_" . $module_name) && Route::has("backend." . $module_name . ".create"))
                    <x-cube::backend-button-create
                        title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}"
                        small="true"
                        route='{{ route("backend.$module_name.create") }}'
                    />
                @endif

                @if (auth()->user()->can("restore_" . $module_name) && Route::has("backend." . $module_name . ".trashed"))
                    <div class="relative">
                        <button
                            id="section-header-dropdown-btn"
                            data-dropdown-toggle="section-header-dropdown"
                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 ml-1"
                            type="button"
                            aria-expanded="false"
                        >
                            <i class="fas fa-cog"></i>
                        </button>
                        <div id="section-header-dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                <li>
                                    <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ route("backend.$module_name.trashed") }}">
                                        <i class="fas fa-eye-slash"></i>
                                        @lang("View trash")
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            @elseif (Str::endsWith(Route::currentRouteName(), "create"))
                <a
                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 ml-1"
                    href="{{ route("backend.$module_name.index") }}"
                    title="{{ __($module_title) }} List"
                >
                    <i class="fas fa-list-ul"></i>
                    &nbsp;List
                </a>
            @elseif (Str::endsWith(Route::currentRouteName(), "edit"))
                <x-backend-button-show
                    class="ml-1"
                    title="{{ __('Show') }} {{ ucwords(Str::singular($module_name)) }}"
                    route='{!! route("backend.$module_name.show", $data) !!}'
                    small="true"
                />
            @elseif (Str::endsWith(Route::currentRouteName(), "show"))
                @if (Route::has("frontend.$module_name.show"))
                    <x-cube::backend-button-public
                        class=""
                        title="{{ __('Public') }}"
                        route='{!! route("frontend.$module_name.show", encode_id($data->id)) !!}'
                        small="true"
                    />
                @endif

                @if (auth()->user()->can("edit_" . $module_name) && Route::has("backend." . $module_name . ".edit"))
                    <x-backend-button-edit
                        class="m-1"
                        title="{{ __('Edit') }} {{ ucwords(Str::singular($module_name)) }}"
                        route='{!! route("backend.$module_name.edit", $data) !!}'
                        small="true"
                    />
                @endif

                <a
                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700"
                    href="{{ route("backend.$module_name.index") }}"
                    title="{{ ucwords($module_name) }} List"
                >
                    <i class="fas fa-list"></i>
                    &nbsp;{{ __("List") }}
                </a>
            @endif
        </div>
    @endif
</div>

<hr class="my-4 border-gray-200 dark:border-gray-700" />
