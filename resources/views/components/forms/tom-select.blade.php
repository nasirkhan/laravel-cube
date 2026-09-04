{{-- Cube Component: TomSelect
     Renders a <select> element that is auto-initialized by TomSelect via [data-tom-select].
     The global app-backend.js scans for this attribute and instantiates TomSelect.

     Usage:
       <x-cube::tom-select name="roles[]" :multiple="true" :required="true">
           <option value="">{{ __('Select roles…') }}</option>
           @foreach ($roles as $role)
               <option value="{{ $role->id }}" @selected(in_array($role->id, $selectedRoles ?? []))>
                   {{ ucwords($role->name) }}
               </option>
           @endforeach
       </x-cube::tom-select>
--}}

@php
    $tsId = $attributes->get('id') ?: str_replace('[]', '', $attributes->get('name', ''));
@endphp
<select
    @if($tsId) id="{{ $tsId }}" @endif
    data-tom-select
    {{ $multiple ? 'multiple' : '' }}
    {{ $required ? 'required' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->except('id') }}
>
    {{ $slot }}
</select>
