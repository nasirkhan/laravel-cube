@if($name !== '')
    <x-dynamic-component
        :component="$iconComponentAlias()"
        {{ $attributes->class([$defaultClasses()]) }}
    />
@endif
