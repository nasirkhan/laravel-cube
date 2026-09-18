@props([
    "data" => "",
    "module_name",
    "module_path",
    "module_title" => "",
    "module_icon" => "",
    "module_action" => "",
])
<div class="bg-white dark:bg-gray-800 rounded-lg shadow">
    @if ($slot != "")
        <div class="p-6">
            {{ $slot }}
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

                <div class="flex mt-4 gap-4">
                    <div class="w-1/3">
                        <x-cube::backend-button-save />
                    </div>

                    <div class="flex-1">
                        <div class="text-right">
                            @can("delete_" . $module_name)
                                <a
                                    href="{{ route("backend.$module_name.destroy", $data) }}"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300"
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
                </div>

                </form>

                {{-- Cancel button outside the form to prevent accidental form submission --}}
                <div class="mt-4">
                    <div class="text-right">
                        <x-cube::backend-button-cancel />
                    </div>
                </div>
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
