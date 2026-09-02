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

<select
    data-tom-select
    {{ $multiple ? 'multiple' : '' }}
    {{ $required ? 'required' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500']) }}
>
    {{ $slot }}
</select>
