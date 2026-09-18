@props(["title" => app_name(), "subTitle" => "", "preTitle" => ""])

<section class="border-b border-gray-200/60 bg-gray-50/80 py-12 dark:border-gray-700/40 dark:bg-gray-900/60">
    <div class="container mx-auto px-5">
        <div class="mx-auto max-w-3xl text-center">
            @if ($preTitle)
                <div class="mb-3 inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-indigo-700 ring-1 ring-indigo-100 dark:bg-indigo-900/30 dark:text-indigo-300 dark:ring-indigo-800">
                    {!! $preTitle !!}
                </div>
            @endif

            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                {!! $title !!}
            </h1>

            @if ($subTitle)
                <p class="mt-3 text-lg font-normal text-gray-500 dark:text-gray-400">
                    {!! $subTitle !!}
                </p>
            @endif

            @if (trim($slot))
                <div class="mt-4 text-gray-600 dark:text-gray-400">
                    {!! $slot !!}
                </div>
            @endif

            @includeIf("frontend.includes.messages")
        </div>
    </div>
</section>
