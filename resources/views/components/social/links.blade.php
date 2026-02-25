@props([
    'facebook' => null,
    'instagram' => null,
    'twitter' => null,
    'youtube' => null,
    'whatsapp' => null,
    'website' => null,
    'spacing' => 'space-x-6',
])

<div {{ $attributes->merge(['class' => "flex justify-center {$spacing}"]) }}>
    @if ($website)
        <x-cube::social.website :url="$website" />
    @endif

    @if ($instagram)
        <x-cube::social.instagram :url="$instagram" />
    @endif

    @if ($facebook)
        <x-cube::social.facebook :url="$facebook" />
    @endif

    @if ($twitter)
        <x-cube::social.twitter :url="$twitter" />
    @endif

    @if ($youtube)
        <x-cube::social.youtube :url="$youtube" />
    @endif

    @if ($whatsapp)
        <x-cube::social.whatsapp :url="$whatsapp" />
    @endif
</div>
