{{-- Cube Component: Form Error (Bootstrap) --}}

@if ($messages)
    @php
        $errorAttributes = ['class' => 'invalid-feedback d-block', 'role' => 'alert', 'aria-live' => 'polite'];
        if (isset($id)) {
            $errorAttributes['id'] = $id;
        }
    @endphp
    <div {{ $attributes->merge($errorAttributes) }}>
        @foreach ((array) $messages as $message)
            <div>{{ $message }}</div>
        @endforeach
    </div>
@endif

{{-- Usage:
<x-cube::error framework="bootstrap" :messages="$errors->get('email')" />
<x-cube::error framework="bootstrap" :messages="$errors->get('password')" />
--}}
