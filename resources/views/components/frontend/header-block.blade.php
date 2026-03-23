@props(["title" => app_name(), "subTitle" => "", "preTitle" => ""])

<section class="bg-gray-100 py-20 text-gray-600 dark:bg-slate-900 dark:text-slate-400">
    <div class="container mx-auto flex flex-col items-center justify-center px-5">
        <div class="w-full text-center lg:w-2/3">
            {!! $preTitle !!}

            <h1 class="mb-4 text-3xl font-medium text-gray-800 sm:text-4xl dark:text-gray-200">
                {!! $title !!}
            </h1>

            <h2 class="mb-4 text-2xl font-medium text-gray-800 sm:text-2xl dark:text-gray-200">
                {!! $subTitle !!}
            </h2>

            {!! $slot !!}

            @includeIf("frontend.includes.messages")
        </div>
    </div>
</section>
