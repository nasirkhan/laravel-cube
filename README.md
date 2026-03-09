# Laravel Cube

A versatile collection of reusable UI components for Laravel applications with **dual framework support** - use Tailwind CSS or Bootstrap 5 seamlessly.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nasirkhan/laravel-cube.svg?style=flat-square)](https://packagist.org/packages/nasirkhan/laravel-cube)
[![Total Downloads](https://img.shields.io/packagist/dt/nasirkhan/laravel-cube.svg?style=flat-square)](https://packagist.org/packages/nasirkhan/laravel-cube)

## Features

- **🎨 Dual Framework Support** - Use Tailwind CSS (Flowbite) or Bootstrap 5
- **🔄 Framework Switching** - Change frameworks per component or globally
- **18+ Reusable Components** - UI, forms, navigation, and utility components
- **🌙 Dark Mode** - Built-in dark mode support (Tailwind)
- **⚡ Alpine.js Integration** - Enhanced interactivity (Tailwind components)
- **📱 Livewire Compatible** - Works seamlessly with Livewire 3/4
- **♿ Accessible** - ARIA attributes, keyboard navigation, focus management
- **🎛️ Customizable** - Override styles, extend functionality, publish views
- **✅ Type Safe** - Proper validation of component properties
- **📚 Well Documented** - Comprehensive documentation with examples

## Why "Cube"?

The cube represents versatility and multidimensionality - just like this package that adapts to your framework choice (Tailwind or Bootstrap) while maintaining a unified component API.

## Components Included

### UI Components (7)
- **Button** - `<x-cube::button>` - Versatile button with variants, sizes, loading states
- **Modal** - `<x-cube::modal>` - Modal dialog with focus management
- **Card** - `<x-cube::card>` - Card component with image, title, and content
- **Badge** - `<x-cube::badge>` - Badge for labels and tags
- **Icon** - `<x-cube::icon>` - Dynamic Flowbite icon component (`name` + merged classes)
- **Footer Credit** - `<x-cube::footer-credit>` - Display copyright text
- **Footer License** - `<x-cube::footer-license>` - Display licensing information (supports Creative Commons)

### Utility Components (1)
- **Google Analytics** - `<x-cube::google-analytics>` - Google Analytics tracking integration

### Form Components (8)
- `<x-cube::input>` - Text input with validation support
- `<x-cube::label>` - Label with required indicator
- `<x-cube::error>` - Error display component
- `<x-cube::group>` - Complete form field wrapper
- `<x-cube::checkbox>` - Styled checkbox
- `<x-cube::select>` - Select dropdown
- `<x-cube::textarea>` - Textarea field
- `<x-cube::toggle>` - iOS/Bootstrap toggle switch

### Navigation Components (2)
- `<x-cube::nav-link>` - Navigation link with active state
- `<x-cube::responsive-nav-link>` - Mobile navigation link

## Requirements

- PHP ^8.2
- Laravel ^11.0 || ^12.0
- Livewire ^3.0 || ^4.0
- Tailwind CSS **OR** Bootstrap 5
- Alpine.js (included with Livewire, for Tailwind components)

## Installation

Install the package via composer:

```bash
composer require nasirkhan/laravel-cube
```

Flowbite Blade Icons is installed automatically as a dependency of Laravel Cube.

The package will automatically register its service provider.

### Configuration

Set your default framework in `.env`:

```env
CUBE_FRAMEWORK=tailwind  # or 'bootstrap'
```

### Tailwind CSS Setup

If you are using **Tailwind CSS v4**, you must import the package's CSS file so Tailwind can detect the utility classes used inside Cube components. Without this step, classes like `bg-gray-800` (used by the primary button) will be purged from your compiled CSS, causing components to render incorrectly (e.g. invisible button text in light mode).

Add a single `@import` to your application's CSS file (e.g. `resources/css/app.css`):

```css
@import "../../vendor/nasirkhan/laravel-cube/resources/css/tailwind.css";
```

> **Why is this needed?** Tailwind v4 auto-detects classes from your source files, but it excludes `vendor/` (which is typically in `.gitignore`). The imported file declares `@source` directives pointing at the Cube package's views and config, so all Cube utility classes are always included in your build.

This step is **not required** when using Bootstrap.

### Publish Assets (Optional)

Publish the configuration file:

```bash
php artisan vendor:publish --tag=cube-config
```

Publish the views (for customization):

```bash
php artisan vendor:publish --tag=cube-views
```

## Usage

### Framework Selection

**Global (via config):**
```env
# .env
CUBE_FRAMEWORK=tailwind
```

**Per Component:**
```blade
<x-cube::button framework="bootstrap" variant="primary">
    Bootstrap Button
</x-cube::button>

<x-cube::button framework="tailwind" variant="primary">
    Tailwind Button
</x-cube::button>
```

### Basic Examples

#### Buttons

**Tailwind (Default):**
```blade
<x-cube::button variant="primary">Save</x-cube::button>
<x-cube::button variant="danger" type="submit">Delete</x-cube::button>
<x-cube::button variant="secondary" size="sm">Cancel</x-cube::button>
<x-cube::button variant="primary" :loading="true">Processing...</x-cube::button>
```

#### Icons (Flowbite)

```blade
<x-cube::icon name="adjustments-horizontal" />
<x-cube::icon name="adjustments-horizontal" variant="solid" class="size-5 text-sky-500" />
```

See full icon docs (params and preview table): `docs/icons.md`

**Bootstrap:**
```blade
<x-cube::button framework="bootstrap" variant="primary">Save</x-cube::button>
<x-cube::button framework="bootstrap" variant="danger" type="submit">Delete</x-cube::button>
<x-cube::button framework="bootstrap" variant="success" size="lg">Submit</x-cube::button>
```

#### Form Components

**Tailwind Form:**
```blade
<x-cube::group name="email" label="Email Address" required help="We'll never share your email">
    <x-cube::input type="email" name="email" :value="old('email')" required />
</x-cube::group>

<x-cube::error :messages="$errors->get('email')" />
```

**Bootstrap Form:**
```blade
<x-cube::group framework="bootstrap" name="email" label="Email Address" required>
    <x-cube::input framework="bootstrap" type="email" name="email" :value="old('email')" required />
</x-cube::group>

<x-cube::error framework="bootstrap" :messages="$errors->get('email')" />
```

#### Checkbox & Toggle

**Tailwind:**
```blade
<x-cube::checkbox name="remember">Remember me</x-cube::checkbox>
<x-cube::toggle name="notifications">Enable notifications</x-cube::toggle>
```

**Bootstrap:**
```blade
<x-cube::checkbox framework="bootstrap" name="remember">Remember me</x-cube::checkbox>
<x-cube::toggle framework="bootstrap" name="notifications">Enable notifications</x-cube::toggle>
```

#### Navigation

**Tailwind:**
```blade
<x-cube::nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    Dashboard
</x-cube::nav-link>
```

**Bootstrap:**
```blade
<x-cube::nav-link framework="bootstrap" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    Dashboard
</x-cube::nav-link>
```

#### Modal

**Tailwind (Alpine.js):**
```blade
<x-cube::modal name="confirm-delete" maxWidth="md">
    <div class="p-6">
        <h2 class="text-lg font-medium">Delete Account</h2>
        <p class="mt-1 text-sm text-gray-600">Are you sure?</p>
        <div class="mt-6 flex justify-end space-x-3">
            <x-cube::button variant="secondary" x-on:click="$dispatch('close-modal')">
                Cancel
            </x-cube::button>
            <x-cube::button variant="danger">Delete</x-cube::button>
        </div>
    </div>
</x-cube::modal>

{{-- Trigger modal --}}
<x-cube::button x-on:click="$dispatch('open-modal', 'confirm-delete')">
    Open Modal
</x-cube::button>
```

**Bootstrap:**
```blade
<x-cube::modal framework="bootstrap" name="confirmDelete" maxWidth="lg">
    <div class="modal-header">
        <h5 class="modal-title">Delete Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete your account?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Delete</button>
    </div>
</x-cube::modal>

{{-- Trigger modal --}}
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmDelete">
    Open Modal
</button>
```

#### Footer Components

**Footer Credit (Tailwind):**
```blade
<x-cube::footer-credit text="&copy; 2024 My Company. All rights reserved." />
```

**Footer Credit (Bootstrap):**
```blade
<x-cube::footer-credit framework="bootstrap" text="&copy; 2024 My Company. All rights reserved." />
```

**Footer License - Default (Tailwind):**
```blade
<x-cube::footer-license 
    author="My Company" 
    author-url="https://example.com" 
/>
```

**Footer License - Creative Commons (Tailwind):**
```blade
<x-cube::footer-license 
    license="cc-by-sa"
    author="My Company" 
    author-url="https://example.com" 
/>
```

**Footer License (Bootstrap):**
```blade
<x-cube::footer-license 
    framework="bootstrap"
    license="cc-by-sa"
    author="My Company" 
    author-url="https://example.com" 
/>
```

#### Google Analytics

Add Google Analytics tracking to your application. The component automatically retrieves the tracking ID from your settings if available.

**Basic Usage:**
```blade
{{-- Uses setting('google_analytics') by default --}}
<x-cube::google-analytics />
```

**With Custom Tracking ID:**
```blade
<x-cube::google-analytics tracking-id="G-XXXXXXXXXX" />
```

Add this component in your layout's `<head>` section or before the closing `</body>` tag.

## Component Variants

### Button Variants

**Available for both frameworks:**
- `primary` - Primary action
- `secondary` - Secondary action
- `danger` - Destructive action
- `success` - Success action
- `warning` - Warning action
- `info` - Informational action
- `light` - Light variant
- `dark` - Dark variant
- `link` - Link style

### Button Sizes
- `sm` - Small
- `md` - Medium (default)
- `lg` - Large

## Customization

### Override Styles

Publish the configuration and modify CSS classes:

```bash
php artisan vendor:publish --tag=cube-config
```

Edit `config/cube.php`:

```php
'tailwind' => [
    'buttons' => [
        'primary' => 'bg-purple-600 hover:bg-purple-700...',
    ],
],
```

### Extend Components

Publish views and customize:

```bash
php artisan vendor:publish --tag=cube-views
```

Views will be in `resources/views/vendor/cube/components/`

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email nasir8891@gmail.com instead of using the issue tracker.

## Credits

- [Nasir Khan](https://github.com/nasirkhan)
- [All Contributors](../../contributors)

## License

The GNU General Public License v3.0 or later. Please see [License File](LICENSE) for more information.
