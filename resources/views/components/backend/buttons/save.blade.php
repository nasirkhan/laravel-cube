@props(["small" => ""])
<button type="submit" class="inline-flex items-center font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 m-1{{ $small == 'true' ? ' px-3 py-1.5 text-xs' : ' px-4 py-2 text-sm' }}">
    {!! icon("fa-solid fa-floppy-disk fa-fw") !!} {{ __("Save") }}
</button>
