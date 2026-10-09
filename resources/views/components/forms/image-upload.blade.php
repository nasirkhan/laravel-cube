@props([
    'multiple' => false,
    'disabled' => false,
    'required' => false,
    'accept' => 'image/*',
    'src' => null,
    'hint' => null,
])

@php
$inputId = $attributes->get('id', $attributes->get('name', 'image-upload-' . str()->random(6)));
$displayHint = $hint ?? 'PNG, JPG, GIF or WEBP';
$multiple = (bool) $multiple;
$disabled = (bool) $disabled;
$srcJson = $src ? json_encode([$src]) : '[]';
@endphp

<div
    x-data="{
        previews: {{ $srcJson }}.map(url => ({ url, isExisting: true })),
        isDragging: false,
        multiple: {{ $multiple ? 'true' : 'false' }},

        get hasImages() { return this.previews.length > 0; },
        get showDropzone() { return this.multiple || !this.hasImages; },

        handleFiles(fileList) {
            const images = Array.from(fileList).filter(f => f.type.startsWith('image/'));
            if (!images.length) return;

            if (!this.multiple) {
                this.previews = [];
                this.$refs.fileInput.value = '';
            }

            const dt = new DataTransfer();
            Array.from(this.$refs.fileInput.files || []).forEach(f => dt.items.add(f));

            images.forEach(file => {
                dt.items.add(file);
                const reader = new FileReader();
                reader.onload = e => this.previews.push({ url: e.target.result, isExisting: false });
                reader.readAsDataURL(file);
            });

            this.$refs.fileInput.files = dt.files;
        },

        removeImage(index) {
            const preview = this.previews[index];
            if (!preview.isExisting) {
                const newIndex = this.previews.slice(0, index).filter(p => !p.isExisting).length;
                const dt = new DataTransfer();
                Array.from(this.$refs.fileInput.files || [])
                    .filter((_, i) => i !== newIndex)
                    .forEach(f => dt.items.add(f));
                this.$refs.fileInput.files = dt.files;
            }
            this.previews.splice(index, 1);
        }
    }"
    @if(!$disabled)
        @dragover.prevent="isDragging = true"
        @dragleave.prevent="isDragging = false"
        @drop.prevent="isDragging = false; handleFiles($event.dataTransfer.files)"
    @endif
    {{ $attributes->only('class') }}
>
    <input
        x-ref="fileInput"
        id="{{ $inputId }}"
        type="file"
        @change="handleFiles($event.target.files)"
        accept="{{ $accept }}"
        {{ $multiple ? 'multiple' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $attributes->except(['class', 'id', 'src', 'hint', 'multiple', 'disabled', 'required', 'accept']) }}
        class="hidden"
    >

    <label
        x-show="showDropzone"
        for="{{ $inputId }}"
        :class="isDragging ? 'border-blue-500 bg-blue-50 dark:bg-blue-900/20' : 'border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600'"
        class="flex flex-col items-center justify-center w-full h-52 border-2 border-dashed rounded-lg transition-colors duration-200 {{ $disabled ? 'opacity-50 cursor-not-allowed pointer-events-none' : 'cursor-pointer' }}"
    >
        <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4 pointer-events-none">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                <span class="font-semibold">Click to upload</span> or drag and drop
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $displayHint }}</p>
        </div>
    </label>

    <template x-if="hasImages">
        <div>
            <div class="{{ $multiple ? 'grid grid-cols-2 sm:grid-cols-3 gap-3 mt-3' : '' }}">
                <template x-for="(preview, index) in previews" :key="index">
                    <div class="relative group">
                        <img
                            :src="preview.url"
                            alt="Preview"
                            class="{{ $multiple
                                ? 'w-full h-28 object-cover rounded-lg border border-gray-200 dark:border-gray-700'
                                : 'w-full max-h-64 object-contain rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800' }}"
                        >
                        @unless($disabled)
                        <button
                            type="button"
                            @click.prevent="removeImage(index)"
                            class="absolute top-1.5 right-1.5 p-1 bg-white dark:bg-gray-900 rounded-full shadow-sm text-red-500 opacity-0 group-hover:opacity-100 focus:opacity-100 hover:bg-red-50 dark:hover:bg-red-900/30 transition-opacity duration-150"
                            aria-label="Remove image"
                        >
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        @endunless
                    </div>
                </template>

                @if($multiple && !$disabled)
                <label
                    for="{{ $inputId }}-add"
                    class="flex flex-col items-center justify-center h-28 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200"
                >
                    <svg class="w-6 h-6 text-gray-400 dark:text-gray-500 mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    <span class="text-xs text-gray-400 dark:text-gray-500">Add more</span>
                    <input
                        id="{{ $inputId }}-add"
                        type="file"
                        accept="{{ $accept }}"
                        @change="handleFiles($event.target.files)"
                        multiple
                        class="hidden"
                    >
                </label>
                @endif
            </div>

            @unless($disabled || $multiple)
            <div class="mt-2 flex items-center gap-2">
                <label for="{{ $inputId }}" class="text-xs font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 cursor-pointer">
                    Change image
                </label>
                <span class="text-gray-300 dark:text-gray-600">·</span>
                <button type="button" @click="removeImage(0)" class="text-xs font-medium text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300">
                    Remove
                </button>
            </div>
            @endunless
        </div>
    </template>
</div>
