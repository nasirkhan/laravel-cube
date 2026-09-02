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
                :module_name="$module_name"
                :module_title="$module_title"
                :module_icon="$module_icon"
                :module_action="$module_action"
            />

            <div class="mt-4">
                {{ html()->form("POST", route("backend.$module_name.store"))->acceptsFiles()->open() }}

                @include("$module_path.$module_name.form")

                <div class="flex">
                    <div class="w-1/2">
                        <x-cube::backend-button-create>Create</x-cube::backend-button-create>
                    </div>
                </div>

                {{ html()->form()->close() }}

                <!-- Cancel button outside the form to prevent accidental form submission -->
                <div class="mt-3">
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
