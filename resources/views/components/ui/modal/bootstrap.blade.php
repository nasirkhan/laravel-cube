{{-- Cube Component: UI Modal (Bootstrap) --}}
{{-- Bootstrap modal component --}}

@php
$maxWidthClass = [
    'sm' => 'modal-sm',
    'md' => '',
    'lg' => 'modal-lg',
    'xl' => 'modal-xl',
    '2xl' => 'modal-xl',
][$maxWidth] ?? '';
@endphp

<div
    class="modal fade"
    id="{{ $name }}"
    tabindex="-1"
    aria-labelledby="{{ $name }}Label"
    aria-hidden="true"
    data-bs-backdrop="static"
    data-bs-keyboard="true"
>
    <div class="modal-dialog {{ $maxWidthClass }} modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>

{{-- Usage:
<x-cube::modal framework="bootstrap" name="confirmDelete">
    <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteLabel">Delete Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete your account?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Delete</button>
    </div>
</x-cube::modal>

// Trigger from JavaScript:
var myModal = new bootstrap.Modal(document.getElementById('confirmDelete'));
myModal.show();
--}}
