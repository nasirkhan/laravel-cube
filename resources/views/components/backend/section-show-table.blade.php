@props([
    "data" => "",
    "module_name",
])
<p>
    @lang("All values of :module_name (Id: :id)", ["module_name" => ucwords(Str::singular($module_name)), "id" => $data->id])
</p>
<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700">
        <?php
        $all_columns = method_exists($data, 'getTableColumns') ? $data->getTableColumns() : [];
        ?>

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-3">
                    <strong>
                        @lang("Name")
                    </strong>
                </th>
                <th scope="col" class="px-4 py-3">
                    <strong>
                        @lang("Value")
                    </strong>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_columns as $column)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-4 py-3">
                        <strong>
                            {{ __(label_case($column->name)) }}
                        </strong>
                    </td>
                    <td class="px-4 py-3">
                        {!! show_column_value($data, $column) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Lightbox2 Library --}}
@if(\Illuminate\Support\Facades\View::exists('components.library.lightbox'))
    <x-library.lightbox />
@endif
