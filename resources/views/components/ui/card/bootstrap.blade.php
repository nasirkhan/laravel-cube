{{-- Cube Component: UI Card (Bootstrap) --}}

<div class="card border-0 shadow-sm">
    @if ($getImage())
        <div class="overflow-hidden">
            <a href="{{ $url }}">
                <img
                    class="card-img-top"
                    src="{{ $getImage() }}"
                    alt="{{ $name }}"
                />
            </a>
        </div>
    @endif

    <div class="card-body">
        @if ($name)
            <h5 class="card-title">
                <a href="{{ $url }}" class="text-decoration-none text-dark">
                    {{ $name }}
                </a>
            </h5>
        @endif

        <div class="card-text">
            {!! $slot !!}
        </div>

        @if ($url)
            <a href="{{ $url }}" class="btn btn-sm btn-outline-primary mt-2">
                View details
                <i class="fas fa-arrow-right ms-1"></i>
            </a>
        @endif
    </div>
</div>

{{-- Usage:
<x-cube::card 
    framework="bootstrap"
    name="Article Title" 
    url="{{ route('articles.show', $article) }}"
    image="path/to/image.jpg"
>
    <p>Article description goes here...</p>
</x-cube::card>
--}}
