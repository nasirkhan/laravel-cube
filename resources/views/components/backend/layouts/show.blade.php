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
                <div class="w-full">
                    <x-cube::backend-section-show-table :data="$data" :module_name="$module_name" />
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
