@once
    @push($stackScripts())
        @include('cube::components.frontend.share-buttons.partials.script')
    @endpush
@endonce

<div
    {{ $attributes }}
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
        <div class="fw-semibold mb-3">{{ $label }}</div>
    @endif

    <div class="d-flex flex-wrap gap-2" role="list" aria-label="{{ $label }}">
        @foreach($resolvedNetworks as $network)
            @php
                $sizeClass = match ($size) {
                    'sm' => 'btn-sm',
                    'lg' => 'btn-lg',
                    default => '',
                };
                $variant = match ($network) {
                    'facebook' => 'btn-primary',
                    'linkedin' => 'btn-info',
                    'whatsapp' => 'btn-success',
                    'telegram' => 'btn-info',
                    'reddit' => 'btn-warning',
                    'email' => 'btn-secondary',
                    'copy' => 'btn-outline-secondary',
                    default => 'btn-dark',
                };
                $classes = trim("btn $variant d-inline-flex align-items-center gap-2 rounded-pill $sizeClass");
                $isLink = $network === 'email';
            @endphp

            <div role="listitem">
                @if($isLink)
                    <a href="#" class="{{ $classes }}" data-cube-share-button data-cube-share-network="{{ $network }}" aria-label="{{ $networkLabel($network) }}">
                        <span class="d-inline-flex align-items-center justify-content-center" aria-hidden="true"><svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">{!! $icon($network) !!}</svg></span>
                        @if($showLabels)<span data-cube-share-label>{{ $networkLabel($network) }}</span>@endif
                    </a>
                @else
                    <button type="button" class="{{ $classes }}" data-cube-share-button data-cube-share-network="{{ $network }}" aria-label="{{ $networkLabel($network) }}">
                        <span class="d-inline-flex align-items-center justify-content-center" aria-hidden="true"><svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">{!! $icon($network) !!}</svg></span>
                        @if($showLabels)<span data-cube-share-label>{{ $networkLabel($network) }}</span>@endif
                    </button>
                @endif
            </div>
        @endforeach
    </div>
</div>
