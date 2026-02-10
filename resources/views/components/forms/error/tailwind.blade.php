{{-- Cube Component: Form Error (Tailwind) --}}

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

{{-- Usage:
<x-cube::error :messages="$errors->get('email')" />
<x-cube::error :messages="$errors->get('password')" class="mt-2" />
--}}
