{{-- Cube Component: Form Error (Tailwind/Flowbite) --}}

@if ($messages)
    @php
        $errorAttributes = ['class' => 'mt-2 text-sm text-red-600 dark:text-red-500', 'role' => 'alert', 'aria-live' => 'polite'];
        if (isset($id)) {
            $errorAttributes['id'] = $id;
        }
    @endphp
    <ul {{ $attributes->merge($errorAttributes) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

{{-- Usage:
<x-cube::error :messages="$errors->get('email')" />
<x-cube::error :messages="$errors->get('password')" />
--}}
