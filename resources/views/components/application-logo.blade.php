@props(['square' => false])

<img src="{{ asset($square ? 'img/logo-square.jpg' : 'img/logo-with-text.jpg') }}" {{ $attributes->merge(['alt' => config('app.name')]) }} />
