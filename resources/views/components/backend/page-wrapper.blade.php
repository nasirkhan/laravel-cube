@props(["breadcrumbs" => "", "toolbar" => "", "footer" => ""])
<div class="page-wrapper">
    {{-- page header --}}
    <div class="page-header print:hidden">
        <div class="container-xl">
            <!-- Errors block -->
            @includeIf("flash::message")
            @includeIf("backend.includes.errors")
            <!-- / Errors block -->

            <div class="flex flex-wrap items-center gap-4 max-w-full">
                <div class="flex-1 min-w-0">
                    <h1 class="page-title">
                        <span class="truncate">
                            {{ $title }}
                        </span>
                    </h1>

                    @if ($breadcrumbs)
                        <div class="mt-2">
                            <ol class="breadcrumb breadcrumb-bullets" aria-label="breadcrumbs">
                                {{ $breadcrumbs }}
                            </ol>
                        </div>
                    @endif
                </div>
                @if ($toolbar)
                    <div class="shrink-0">
                        <div class="flex items-center gap-2">
                            {{ $toolbar }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- page body --}}
    <div class="page-body">
        <div class="container-xl">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="p-6">
                    {{ $slot }}
                </div>
                @if ($footer)
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- footer --}}
    <x-cube::backend-include-footer />
</div>
