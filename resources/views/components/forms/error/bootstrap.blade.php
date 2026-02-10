{{-- Cube Component: Form Error (Bootstrap) --}}

@if ($messages)
    <div {{ $attributes->merge(['class' => 'invalid-feedback d-block']) }}>
        @foreach ((array) $messages as $message)
            <div>{{ $message }}</div>
        @endforeach
    </div>
@endif

{{-- Usage:
<x-cube::error framework="bootstrap" :messages="$errors->get('email')" />
<x-cube::error framework="bootstrap" :messages="$errors->get('password')" />
--}}
