@props(['messages' => [], 'id' => null])
@php
$messages = is_string($messages) ? [$messages] : (array) $messages;
$messages = array_filter($messages);
@endphp

@if ($messages)
    @php
        $errorAttributes = ['class' => 'mt-2 text-sm text-red-600 dark:text-red-500', 'role' => 'alert', 'aria-live' => 'polite'];
        if ($id) {
            $errorAttributes['id'] = $id;
        }
    @endphp
    <ul {{ $attributes->merge($errorAttributes) }}>
        @foreach ($messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
