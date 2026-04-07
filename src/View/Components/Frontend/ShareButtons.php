<?php

namespace Nasirkhan\LaravelCube\View\Components\Frontend;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class ShareButtons extends Component
{
    use HasFramework;

    public array $resolvedMetadata;

    public array $resolvedNetworks;

    public string $label;

    public string $id;

    public function __construct(
        public ?string $url = null,
        public ?string $title = null,
        public ?string $text = null,
        public ?string $description = null,
        public ?string $image = null,
        public ?string $via = null,
        public string|array|null $hashtags = null,
        public string|array|null $networks = null,
        public bool|string $showLabels = true,
        public bool|string $showHeading = false,
        public bool|string $popup = true,
        public bool|string $native = true,
        public string $size = 'md',
        public ?string $labelText = null,
        ?string $framework = null,
    ) {
        $this->initializeFramework($framework);

        $this->showLabels = filter_var($showLabels, FILTER_VALIDATE_BOOLEAN);
        $this->showHeading = filter_var($showHeading, FILTER_VALIDATE_BOOLEAN);
        $this->popup = filter_var($popup, FILTER_VALIDATE_BOOLEAN);
        $this->native = filter_var($native, FILTER_VALIDATE_BOOLEAN);
        $this->size = in_array($size, ['sm', 'md', 'lg'], true) ? $size : 'md';
        $this->label = $labelText ?: config('cube.share.labels.share', 'Share');
        $this->id = 'cube-share-'.Str::lower(Str::random(8));

        $this->resolvedMetadata = [
            'url'         => $this->url ?: request()?->fullUrl() ?: url()->current(),
            'title'       => $this->title ?: config('app.name'),
            'text'        => $this->text ?: $this->title ?: config('app.name'),
            'description' => $this->description,
            'image'       => $this->image,
            'via'         => $this->via,
            'hashtags'    => $this->normalizeHashtags($this->hashtags),
        ];

        $configuredNetworks = config('cube.share.networks', []);
        $networks = $this->normalizeArray($this->networks ?: $configuredNetworks);

        $this->resolvedNetworks = collect($networks)
            ->map(fn (string $network) => Str::lower(trim($network)))
            ->filter()
            ->unique()
            ->when(!$this->native, fn ($collection) => $collection->reject('native'))
            ->values()
            ->all();
    }

    public function render(): View
    {
        return $this->renderSafely($this->getFrameworkView('frontend.share-buttons'));
    }

    public function networkLabel(string $network): string
    {
        return (string) config("cube.share.labels.{$network}", Str::headline($network));
    }

    public function popupWidth(): int
    {
        return (int) config('cube.share.popup.width', 620);
    }

    public function popupHeight(): int
    {
        return (int) config('cube.share.popup.height', 700);
    }

    public function stackStyles(): string
    {
        return (string) config('cube.share.stack_names.styles', 'after-styles');
    }

    public function stackScripts(): string
    {
        return (string) config('cube.share.stack_names.scripts', 'after-scripts');
    }

    public function copiedLabel(): string
    {
        return (string) config('cube.share.labels.copied', 'Copied');
    }

    public function icon(string $network): string
    {
        return match ($network) {
            'facebook' => '<path fill="currentColor" d="M13 3h3V0h-3c-3.3 0-6 2.7-6 6v3H4v4h3v11h4V13h4l1-4h-5V6c0-1.7 1.3-3 3-3Z"/>',
            'linkedin' => '<path fill="currentColor" d="M4 3a2 2 0 1 1 0 4a2 2 0 0 1 0-4Zm-2 6h4v13H2V9Zm7 0h3.8v1.8h.1c.5-1 1.9-2.1 3.9-2.1c4.2 0 5 2.7 5 6.3V22h-4v-5.9c0-1.4 0-3.2-2-3.2s-2.3 1.5-2.3 3.1V22h-4V9Z"/>',
            'whatsapp' => '<path fill="currentColor" d="M20.5 3.5A11.9 11.9 0 0 0 12 0C5.4 0 0 5.4 0 12c0 2.1.5 4.1 1.6 5.9L0 24l6.3-1.6A12 12 0 0 0 12 24c6.6 0 12-5.4 12-12c0-3.2-1.2-6.2-3.5-8.5ZM12 21.8c-1.8 0-3.6-.5-5.1-1.5l-.4-.2l-3.8 1l1-3.7l-.2-.4A9.7 9.7 0 0 1 2.3 12c0-5.3 4.4-9.7 9.7-9.7c2.6 0 5 1 6.8 2.8A9.6 9.6 0 0 1 21.7 12c0 5.4-4.3 9.8-9.7 9.8Zm5.3-7.2c-.3-.1-1.6-.8-1.8-.9c-.2-.1-.4-.1-.6.1l-.8.9c-.1.2-.3.2-.5.1c-.3-.1-1.1-.4-2-1.3c-.8-.7-1.3-1.6-1.4-1.9c-.1-.2 0-.4.1-.5l.4-.4c.1-.1.2-.2.3-.4c.1-.1.1-.3 0-.4c-.1-.1-.6-1.5-.8-2c-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.4.1-.6.3c-.2.2-.8.8-.8 1.9s.8 2.3.9 2.4c.1.2 1.6 2.5 4 3.5c2.4 1 2.4.7 2.8.7c.4-.1 1.6-.7 1.8-1.3c.2-.7.2-1.2.1-1.3c-.1-.1-.3-.2-.6-.3Z"/>',
            'telegram' => '<path fill="currentColor" d="m22.7 2.7-3.3 17.7c-.3 1.3-1.1 1.6-2.1 1l-5.8-4.3-2.8 2.7c-.3.3-.5.5-1.1.5l.4-5.9L18.8 5c.5-.4-.1-.6-.7-.2L4.7 13.2l-5.7-1.8c-1.2-.4-1.2-1.2.3-1.8L21 1.4c1-.4 2 .2 1.7 1.3Z"/>',
            'reddit'   => '<path fill="currentColor" d="M24 11.6c0-1.7-1.4-3.1-3.1-3.1c-.8 0-1.6.3-2.1.8c-2-1.4-4.6-2.3-7.4-2.4l1.5-4.8l4.1 1a2.5 2.5 0 1 0 .4-1.5l-4.8-1.2c-.4-.1-.9.1-1 .6l-1.7 5.5c-2.9.1-5.4 1-7.4 2.4A3 3 0 0 0 .4 8.5A3 3 0 0 0 0 11.6c0 1.2.7 2.3 1.6 2.8c0 .2-.1.4-.1.6c0 4.4 5 8 11.2 8s11.2-3.6 11.2-8c0-.2 0-.4-.1-.6c1-.5 1.7-1.6 1.7-2.8Zm-16 1.9A1.6 1.6 0 1 1 8 10.3a1.6 1.6 0 0 1 0 3.2Zm8.8 4.4c-1.1 1.1-3.2 1.6-5.6 1.6c-2.4 0-4.5-.5-5.6-1.6c-.3-.3-.3-.7 0-1c.3-.3.7-.3 1 0c.7.7 2.3 1.2 4.6 1.2c2.2 0 3.9-.5 4.6-1.2c.3-.3.7-.3 1 0c.3.3.3.7 0 1Zm-.1-4.4a1.6 1.6 0 1 1 0-3.2a1.6 1.6 0 0 1 0 3.2Z"/>',
            'email'    => '<path fill="currentColor" d="M2 4h20a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Zm0 2v.4l10 6.2l10-6.2V6H2Zm20 12V9l-9.5 5.9a1 1 0 0 1-1 0L2 9v9h20Z"/>',
            'copy'     => '<path fill="currentColor" d="M8 2h10a2 2 0 0 1 2 2v2h-2V4H8v10H6V4a2 2 0 0 1 2-2Zm-2 6h10a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2Zm0 2v10h10V10H6Z"/>',
            'native'   => '<path fill="currentColor" d="M18 16a3 3 0 0 0-2.4 1.2L8.9 13a3.6 3.6 0 0 0 0-2l6.6-4.1A3 3 0 1 0 14 4a3.6 3.6 0 0 0 .1.7L7.5 8.8a3 3 0 1 0 0 6.4l6.6 4.1A3 3 0 1 0 18 16Z"/>',
            default    => '<path fill="currentColor" d="M18.2 2H5.8A3.8 3.8 0 0 0 2 5.8v12.4A3.8 3.8 0 0 0 5.8 22h12.4a3.8 3.8 0 0 0 3.8-3.8V5.8A3.8 3.8 0 0 0 18.2 2ZM8.7 18.3H5.8V9.7h2.9v8.6Zm-1.4-9.8a1.7 1.7 0 1 1 0-3.5a1.7 1.7 0 0 1 0 3.5Zm11 9.8h-2.9v-4.2c0-1 0-2.4-1.4-2.4c-1.4 0-1.6 1.1-1.6 2.3v4.3H9.4V9.7h2.8v1.2h.1c.4-.7 1.4-1.4 2.9-1.4c3.1 0 3.6 2 3.6 4.7v4.1Z"/>',
        };
    }

    protected function normalizeArray(string|array|null $value): array
    {
        if (is_array($value)) {
            return $value;
        }

        return array_filter(array_map('trim', explode(',', (string) $value)));
    }

    protected function normalizeHashtags(string|array|null $hashtags): ?string
    {
        $normalized = collect($this->normalizeArray($hashtags))
            ->map(static fn (string $tag) => ltrim(trim($tag), '#'))
            ->filter()
            ->implode(',');

        return $normalized !== '' ? $normalized : null;
    }
}
