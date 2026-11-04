@props([
    "data" => "",
    "module_name" => null,
    "module_path" => null,
    "module_title" => "",
    "module_icon" => "",
    "module_action" => "",
    "noForm" => false,
])
<div class="bg-white dark:bg-gray-800 rounded-lg shadow">
    @if ($slot != "")
        <div class="p-6">
            @if (isset($header) && $header != "")
                {{ $header }}
            @endif

            <div class="{{ isset($header) && $header != '' ? 'mt-4' : '' }}">
                @if (!$noForm)
                    <form method="POST" action="{{ route('backend.'.$module_name.'.update', $data) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        {{ $slot }}

                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <x-cube::backend-button-save />
                                <x-cube::backend-button-cancel />
                            </div>

                            <div class="flex items-center gap-2">
                                @if (isset($actions) && $actions != "")
                                    {{ $actions }}
                                @else
                                    @can("delete_" . $module_name)
                                        <a
                                            href="{{ route("backend.$module_name.destroy", $data) }}"
                                            class="inline-flex items-center justify-center cursor-pointer font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 m-1 size-9 p-2"
                                            data-method="DELETE"
                                            data-token="{{ csrf_token() }}"
                                            data-toggle="tooltip"
                                            title="{{ __("Delete") }}"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    @endcan
                                @endif
                            </div>
                        </div>
                    </form>
                @else
                    {{ $slot }}
                @endif
            </div>
        </div>
    @else
        <div class="p-6">
            <x-cube::backend-section-header
                :data="$data"
                :module_name="$module_name"
                :module_title="$module_title"
                :module_icon="$module_icon"
                :module_action="$module_action"
            />

            <div class="mt-4">
                <form method="POST" action="{{ route('backend.'.$module_name.'.update', $data) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include("$module_path.$module_name.form")

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <x-cube::backend-button-save />
                        <x-cube::backend-button-cancel />
                    </div>

                    <div>
                        @can("delete_" . $module_name)
                            <a
                                href="{{ route("backend.$module_name.destroy", $data) }}"
                                class="inline-flex items-center justify-center cursor-pointer font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 m-1 size-9 p-2"
                                data-method="DELETE"
                                data-token="{{ csrf_token() }}"
                                data-toggle="tooltip"
                                title="{{ __("Delete") }}"
                            >
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        @endcan
                    </div>
                </div>

                </form>
            </div>
        </div>
    @endif

    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
        <div class="flex">
            <div class="flex-1">
                @if ($data != "")
                    <small class="text-sm text-gray-500 dark:text-gray-400 float-right text-right">
                        @lang("Updated at")
                        : {{ $data->updated_at->diffForHumans() }},
                        <br class="block sm:hidden" />
                        @lang("Created at")
                        : {{ $data->created_at->isoFormat("LLLL") }}
                    </small>
                @endif
            </div>
        </div>
    </div>
</div>
