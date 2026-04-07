@once
    @push($stackScripts())
        @include('cube::components.frontend.share-buttons.partials.script')
    @endpush
@endonce

<div
    {{ $attributes->merge(['class' => 'not-prose']) }}
    data-cube-share
    data-cube-share-id="{{ $id }}"
    data-cube-share-url="{{ $resolvedMetadata['url'] ?? '' }}"
    data-cube-share-title="{{ $resolvedMetadata['title'] ?? '' }}"
    data-cube-share-text="{{ $resolvedMetadata['text'] ?? '' }}"
    data-cube-share-description="{{ $resolvedMetadata['description'] ?? '' }}"
    data-cube-share-image="{{ $resolvedMetadata['image'] ?? '' }}"
    data-cube-share-via="{{ $resolvedMetadata['via'] ?? '' }}"
    data-cube-share-hashtags="{{ $resolvedMetadata['hashtags'] ?? '' }}"
    data-cube-share-popup="{{ $popup ? 'true' : 'false' }}"
    data-cube-share-popup-width="{{ $popupWidth() }}"
    data-cube-share-popup-height="{{ $popupHeight() }}"
    data-cube-share-native="{{ config('cube.share.use_native_when_available', true) && $native ? 'true' : 'false' }}"
    data-cube-share-copied-label="{{ $copiedLabel() }}"
>
    @if($showHeading)
        <div class="mb-3 text-sm font-semibold text-slate-900 dark:text-slate-100">{{ $label }}</div>
    @endif

    <div class="flex flex-wrap gap-3" role="list" aria-label="{{ $label }}">
        @foreach($resolvedNetworks as $network)
            @php
                $buttonClasses = match ($size) {
                    'sm' => 'inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 shadow-xs transition hover:-translate-y-0.5 hover:border-slate-300 hover:text-slate-950 hover:shadow-md dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-slate-600',
                    'lg' => 'inline-flex items-center gap-3 rounded-full border border-slate-200 bg-white px-5 py-3 text-base font-semibold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:text-slate-950 hover:shadow-lg dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-slate-600',
                    default => 'inline-flex items-center gap-2.5 rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:text-slate-950 hover:shadow-md dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-slate-600',
                };
                $iconClasses = match ($network) {
                    'facebook' => 'text-[#1877F2]',
                    'linkedin' => 'text-[#0A66C2]',
                    'whatsapp' => 'text-[#25D366]',
                    'telegram' => 'text-[#229ED9]',
                    'reddit' => 'text-[#FF4500]',
                    'email' => 'text-violet-600 dark:text-violet-400',
                    'copy' => 'text-slate-500 dark:text-slate-400',
                    default => 'text-slate-900 dark:text-slate-100',
                };
                $isLink = $network === 'email';
            @endphp

            <div role="listitem">
                @if($isLink)
                    <a href="#" class="{{ $buttonClasses }}" data-cube-share-button data-cube-share-network="{{ $network }}" aria-label="{{ $networkLabel($network) }}">
                        <span class="inline-flex h-5 w-5 items-center justify-center {{ $iconClasses }}" aria-hidden="true"><svg viewBox="0 0 24 24" class="h-5 w-5 fill-current">{!! $icon($network) !!}</svg></span>
                        @if($showLabels)<span data-cube-share-label>{{ $networkLabel($network) }}</span>@endif
                    </a>
                @else
                    <button type="button" class="{{ $buttonClasses }}" data-cube-share-button data-cube-share-network="{{ $network }}" aria-label="{{ $networkLabel($network) }}">
                        <span class="inline-flex h-5 w-5 items-center justify-center {{ $iconClasses }}" aria-hidden="true"><svg viewBox="0 0 24 24" class="h-5 w-5 fill-current">{!! $icon($network) !!}</svg></span>
                        @if($showLabels)<span data-cube-share-label>{{ $networkLabel($network) }}</span>@endif
                    </button>
                @endif
            </div>
        @endforeach
    </div>
</div>
