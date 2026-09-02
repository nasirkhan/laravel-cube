@props([
    "data" => "",
    "module_name",
    "module_path",
    "module_title" => "",
    "module_icon" => "",
    "module_action" => "Trash",
])
<div class="bg-white dark:bg-gray-800 rounded-lg shadow">
    @if ($slot != "")
        <div class="p-6">
            {{ $slot }}
        </div>
    @else
        <div class="p-6">
            <x-cube::backend-section-header>
                <i class="{{ $module_icon }}"></i>
                {{ __($module_title) }}
                <small class="text-gray-500 dark:text-gray-400">{{ __($module_action) }}</small>

                <x-slot name="toolbar">
                    <x-cube::backend-button-return-back :small="true" />
                    <a
                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 ml-1"
                        href="{{ route("backend.$module_name.index") }}"
                        title="{{ __(ucwords($module_name)) }} @lang("List")"
                    >
                        <i class="fas fa-list"></i>
                        &nbsp;@lang("List")
                    </a>
                </x-slot>
            </x-cube::backend-section-header>

            <div class="mt-4">
                <div class="w-full">
                    @if (count($data) > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700" id="datatable">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-3">#</th>
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Updated At</th>
                                        <th class="px-4 py-3">Created By</th>
                                        <th class="px-4 py-3 text-right">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $row)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-4 py-3">
                                                {{ $row->id }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <strong>
                                                    {{ $row->name }}
                                                </strong>
                                            </td>
                                            <td class="px-4 py-3">
                                                {{ $row->updated_at->isoFormat("llll") }}
                                            </td>
                                            <td class="px-4 py-3">
                                                {{ $row->created_by }}
                                            </td>
                                            <td class="px-4 py-3 text-right">
                                                <a
                                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900"
                                                    data-method="PATCH"
                                                    data-token="{{ csrf_token() }}"
                                                    data-toggle="tooltip"
                                                    href="{{ route("backend.$module_name.restore", $row) }}"
                                                    title="{{ __("labels.backend.restore") }}"
                                                >
                                                    <i class="fa-solid fa-rotate-left"></i>
                                                    &nbsp;{{ __("labels.backend.restore") }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center">
                            <p>
                                @lang("No record found in trash!")
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
        @if (! empty($data))
            <div class="flex flex-wrap gap-4">
                <div class="w-full sm:flex-1">
                    <div class="float-left">
                        <small class="text-sm">
                            @lang("Total")
                            {{ $data->total() }} {{ ucwords($module_name) }}
                        </small>
                    </div>
                </div>
                <div class="w-full sm:flex-1">
                    <div class="float-right">
                        {!! $data->render() !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
