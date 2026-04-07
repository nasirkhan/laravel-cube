# Laravel Cube

<p align="center"><img src="https://res.cloudinary.com/dslg1fc8y/image/upload/v1774684916/laravel_cube_package_logo_z8xqaa.jpg" alt="Laravel Cube - A versatile collection of reusable UI components for Laravel applications, supporting Tailwind CSS and Bootstrap 5"></p>

A versatile collection of reusable UI components for Laravel applications with **dual framework support** - use Tailwind CSS or Bootstrap 5 seamlessly.

This package is used in [Laravel Starter](https://github.com/nasirkhan/laravel-starter) though it is framework-agnostic and can be dropped into any Laravel app.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nasirkhan/laravel-cube.svg?style=flat-square)](https://packagist.org/packages/nasirkhan/laravel-cube)
[![Total Downloads](https://img.shields.io/packagist/dt/nasirkhan/laravel-cube.svg?style=flat-square)](https://packagist.org/packages/nasirkhan/laravel-cube)
[![StyleCI](https://github.styleci.io/repos/1154776052/shield?branch=main&style=flat-square)](https://github.styleci.io/repos/1154776052)

## Features

- **Dual Framework Support** - Use Tailwind CSS (Flowbite) or Bootstrap 5
- **Framework Switching** - Change frameworks per component or globally
- **Reusable Components** - UI, forms, navigation, and utility components
- **Dark Mode** - Built-in dark mode support for Tailwind-based components
- **Livewire Compatible** - Works well with Livewire 3/4
- **Customizable** - Override styles, extend functionality, publish views
- **Companion Friendly** - Designed to work well with companion packages such as `nasirkhan/laravel-sharekit`

## Why "Cube"?

The cube represents versatility and multidimensionality - just like this package that adapts to your framework choice while keeping a unified Blade component API.

## Companion Packages

Laravel Cube focuses on shared UI foundations.

For page-level social sharing buttons, use the companion package:

- [`nasirkhan/laravel-sharekit`](https://github.com/nasirkhan/laravel-sharekit) - reusable social sharing buttons with metadata auto-detection, popup sharing, copy link support, and page-scoped assets

That keeps Cube focused on core UI primitives while optional frontend behavior can evolve separately.

## Components Included

### UI Components
- **Button** - `<x-cube::button>`
- **Modal** - `<x-cube::modal>`
- **Card** - `<x-cube::card>`
- **Badge** - `<x-cube::badge>`
- **Icon** - `<x-cube::icon>`
- **Footer Credit** - `<x-cube::footer-credit>`
- **Footer License** - `<x-cube::footer-license>`

### Utility Components
- **Google Analytics** - `<x-cube::google-analytics>`

### Form Components
- `<x-cube::input>`
- `<x-cube::label>`
- `<x-cube::error>`
- `<x-cube::group>`
- `<x-cube::checkbox>`
- `<x-cube::select>`
- `<x-cube::textarea>`
- `<x-cube::toggle>`

### Navigation Components
- `<x-cube::nav-link>`
- `<x-cube::responsive-nav-link>`
- `<x-cube::dropdown>`
- `<x-cube::dropdown-link>`

## Requirements

- PHP ^8.3
- Laravel ^11.0 || ^12.0 || ^13.0
- Tailwind CSS or Bootstrap 5
- Livewire ^3.0 || ^4.0 for Livewire-powered applications

## Installation

```bash
composer require nasirkhan/laravel-cube
```

Flowbite Blade Icons is installed automatically as a dependency of Laravel Cube.

The package will automatically register its service provider.

### Configuration

Set your default framework in `.env`:

```env
CUBE_FRAMEWORK=tailwind
```

or

```env
CUBE_FRAMEWORK=bootstrap
```

### Tailwind CSS Setup

If you are using **Tailwind CSS v4**, import the package CSS source file so Tailwind can detect utility classes used inside Cube views.

Add this to your application stylesheet:

```css
@import "../../vendor/nasirkhan/laravel-cube/resources/css/tailwind.css";
```

This step is not required for Bootstrap projects.

### Optional Publishing

Publish the configuration file:

```bash
php artisan vendor:publish --tag=cube-config
```

Publish the views:

```bash
php artisan vendor:publish --tag=cube-views
```

## Usage

### Global Framework Selection

```env
CUBE_FRAMEWORK=tailwind
```

### Per Component Framework Override

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

```blade
<x-cube::button variant="primary">Save</x-cube::button>
<x-cube::button variant="danger" type="submit">Delete</x-cube::button>
<x-cube::button variant="secondary" size="sm">Cancel</x-cube::button>
<x-cube::button variant="primary" :loading="true">Processing...</x-cube::button>
```

#### Icons

```blade
<x-cube::icon name="adjustments-horizontal" />
<x-cube::icon name="adjustments-horizontal" variant="solid" class="size-5 text-sky-500" />
```

See icon documentation in `docs/icons.md`.

#### Form Group

```blade
<x-cube::group name="email" label="Email Address" required>
    <x-cube::input type="email" name="email" :value="old('email')" required />
</x-cube::group>

<x-cube::error :messages="$errors->get('email')" />
```

#### Navigation

```blade
<x-cube::nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    Dashboard
</x-cube::nav-link>
```

#### Google Analytics

```blade
<x-cube::google-analytics />
<x-cube::google-analytics tracking-id="G-XXXXXXXXXX" />
```

## Using Laravel Sharekit Alongside Cube

If your app uses Cube for layout and UI, and needs social sharing only on selected pages, install Sharekit separately:

```bash
composer require nasirkhan/laravel-sharekit
```

Then use it where needed:

```blade
<x-sharekit::buttons
    :url="route('posts.show', $post)"
    :title="$post->name"
    :description="$post->intro"
    :image="$post->featured_image_url"
    theme="tailwind"
    :networks="['x', 'facebook', 'linkedin', 'copy', 'native']"
/>
```

This works especially well when Cube is your shared UI package and Sharekit is an optional content-page feature.

## Customization

### Override Styles

Publish the configuration and modify CSS classes:

```bash
php artisan vendor:publish --tag=cube-config
```

### Extend Components

Publish the views and customize them inside:

`resources/views/vendor/cube/components/`

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email `nasir8891@gmail.com` instead of using the issue tracker.

## Credits

- [Nasir Khan](https://github.com/nasirkhan)
- [All Contributors](../../contributors)

## License

The GNU General Public License v3.0 or later. Please see [LICENSE](LICENSE) for more information.
