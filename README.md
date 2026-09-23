# Laravel Cube

<p align="center"><img src="https://res.cloudinary.com/dslg1fc8y/image/upload/v1774684916/laravel_cube_package_logo_z8xqaa.jpg" alt="Laravel Cube - Anonymous Blade component library for Laravel applications with Tailwind CSS and Flowbite"></p>

An anonymous Blade component library for Laravel applications — Tailwind CSS (Flowbite) UI, forms, navigation, and backend scaffolding.

This package is used in [Laravel Starter](https://github.com/nasirkhan/laravel-starter) though it is framework-agnostic and can be dropped into any Laravel app.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nasirkhan/laravel-cube.svg?style=flat-square)](https://packagist.org/packages/nasirkhan/laravel-cube)
[![Total Downloads](https://img.shields.io/packagist/dt/nasirkhan/laravel-cube.svg?style=flat-square)](https://packagist.org/packages/nasirkhan/laravel-cube)
[![StyleCI](https://github.styleci.io/repos/1154776052/shield?branch=main&style=flat-square)](https://github.styleci.io/repos/1154776052)

## Features

- **Anonymous Blade Components** - No PHP backing classes; lightweight and easy to publish and override
- **Tailwind CSS (Flowbite)** - Components styled with Tailwind v4 and Flowbite, with full dark mode support
- **Reusable Components** - UI, forms, navigation, backend, and social components
- **Flash Notifications** - Built-in `flash()` helper for session-based messages
- **SEO Head Defaults** - Automatic `laravel/head` integration for meta tags and Open Graph
- **Dark Mode** - Built-in dark mode support across all components
- **Livewire Compatible** - Works well with Livewire 3/4, including a base `LwTable` component
- **Customizable** - Override styles, extend functionality, publish views
- **Companion Friendly** - Designed to work well with companion packages such as `nasirkhan/laravel-sharekit`

## Why "Cube"?

The cube represents structure and composability — just like this package that gives you a set of solid, self-contained Blade components you can snap together to build any UI.

## Companion Packages

Laravel Cube focuses on shared UI foundations.

For page-level social sharing buttons, use the companion package:

- [`nasirkhan/laravel-sharekit`](https://github.com/nasirkhan/laravel-sharekit) - reusable social sharing buttons with metadata auto-detection, popup sharing, copy link support, and page-scoped assets

That keeps Cube focused on core UI primitives while optional frontend behavior can evolve separately.

## Components Included

### Utility Components
- **Error Boundary** - `<x-cube::error-boundary>`
- **Google Analytics** - `<x-cube::google-analytics>`
- **Application Logo** - `<x-cube::application-logo>`

### UI Components
- **Alert** - `<x-cube::alert>`
- **Button** - `<x-cube::button>`
- **Button Link** - `<x-cube::button-link>`
- **Link** - `<x-cube::link>`
- **Modal** - `<x-cube::modal>`
- **Card** - `<x-cube::card>`
- **Badge** - `<x-cube::badge>`
- **Icon** - `<x-cube::icon>`
- **Footer Credit** - `<x-cube::footer-credit>`
- **Footer License** - `<x-cube::footer-license>`

### Frontend Components
- `<x-cube::header-block>`
- `<x-cube::auth-header>`
- `<x-cube::auth-session-status>`
- `<x-cube::flash-message>`
- `<x-cube::validation-errors>`
- `<x-cube::share-buttons>`

### Form Components
- `<x-cube::input>`
- `<x-cube::label>`
- `<x-cube::error>`
- `<x-cube::group>`
- `<x-cube::checkbox>`
- `<x-cube::select>`
- `<x-cube::textarea>`
- `<x-cube::toggle>`
- `<x-cube::file-input>`
- `<x-cube::tom-select>`

### Navigation Components
- `<x-cube::nav-link>`
- `<x-cube::responsive-nav-link>`
- `<x-cube::dropdown>`
- `<x-cube::dropdown-link>`

### Social Icon Components
- `<x-cube::social.links>` - composite row of social links
- `<x-cube::social.facebook>`
- `<x-cube::social.instagram>`
- `<x-cube::social.twitter>`
- `<x-cube::social.youtube>`
- `<x-cube::social.whatsapp>`
- `<x-cube::social.website>`

### Livewire Components
- `<x-cube::lw-table>` / `<lw-table>` - sortable, searchable paginated table wrapper
- `<x-cube::lw-table-th>` / `<lw-table-th>` - sortable column header

### Backend Components

These components are designed for admin panel use and support multiple alias formats (`cube::backend-*`, `backend-*`, `backend.*`).

**Layouts**
- `<x-cube::backend.layouts.create>`
- `<x-cube::backend.layouts.edit>`
- `<x-cube::backend.layouts.show>`
- `<x-cube::backend.layouts.trash>`

**Buttons**
- `<x-cube::backend.buttons.create>`
- `<x-cube::backend.buttons.save>`
- `<x-cube::backend.buttons.edit>`
- `<x-cube::backend.buttons.show>`
- `<x-cube::backend.buttons.list>`
- `<x-cube::backend.buttons.cancel>`
- `<x-cube::backend.buttons.return-back>`
- `<x-cube::backend.buttons.public>`
- `<x-cube::backend.buttons.public-view>`

**Structure**
- `<x-cube::backend.breadcrumbs>`
- `<x-cube::backend.breadcrumb-item>`
- `<x-cube::backend.section-header>`
- `<x-cube::backend.section-footer>`
- `<x-cube::backend.section-show-table>`
- `<x-cube::backend.page-wrapper>`
- `<x-cube::backend.dynamic-menu>`
- `<x-cube::backend.dynamic-menu-item>`
- `<x-cube::backend.sidebar-nav-item>`
- `<x-cube::backend.fallback-sidebar-menu>`

**Includes**
- `<x-cube::backend.includes.header>`
- `<x-cube::backend.includes.footer>`
- `<x-cube::backend.includes.sidebar>`
- `<x-cube::backend.includes.menu-user>`
- `<x-cube::backend.includes.menu-language>`
- `<x-cube::backend.includes.dashboard-demo>`

## Requirements

- PHP ^8.3 || ^8.4
- Laravel ^11.0 || ^12.0 || ^13.0
- `laravel/head` ^0.2
- Tailwind CSS v4
- Livewire ^3.0 || ^4.0 (optional, for Livewire-powered components)

## Installation

```bash
composer require nasirkhan/laravel-cube
```

Flowbite Blade Icons is installed automatically as a dependency of Laravel Cube.

The package will automatically register its service provider.

### Tailwind CSS Setup

If you are using **Tailwind CSS v4**, import the package CSS source file so Tailwind can detect utility classes used inside Cube views.

Add this to your application stylesheet:

```css
@import "../../vendor/nasirkhan/laravel-cube/resources/css/tailwind.css";
```

Alternatively, publish the CSS file and import from your own assets directory:

```bash
php artisan vendor:publish --tag=cube-css
```

Then import:

```css
@import "./vendor/cube/tailwind.css";
```

### Optional Publishing

Publish the configuration file:

```bash
php artisan vendor:publish --tag=cube-config
```

Publish the views:

```bash
php artisan vendor:publish --tag=cube-views
```

Publish the Tailwind CSS source file:

```bash
php artisan vendor:publish --tag=cube-css
```

## Usage

### Basic Examples

#### Buttons

```blade
<x-cube::button variant="primary">Save</x-cube::button>
<x-cube::button variant="danger" type="submit">Delete</x-cube::button>
<x-cube::button variant="secondary" size="sm">Cancel</x-cube::button>
<x-cube::button variant="primary" :loading="true">Processing...</x-cube::button>
```

#### Button Links

```blade
<x-cube::button-link href="{{ route('posts.index') }}" variant="primary">All Posts</x-cube::button-link>
<x-cube::button-link href="{{ route('posts.create') }}" variant="secondary">New Post</x-cube::button-link>
```

#### Alerts

```blade
<x-cube::alert type="success">Your changes have been saved.</x-cube::alert>
<x-cube::alert type="error">Something went wrong.</x-cube::alert>
<x-cube::alert type="warning" :dismissible="false">Read-only mode is active.</x-cube::alert>
<x-cube::alert type="info">Your session will expire soon.</x-cube::alert>
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

#### File Input

```blade
<x-cube::group name="avatar" label="Profile Picture">
    <x-cube::file-input name="avatar" accept="image/*" />
</x-cube::group>

<x-cube::file-input name="documents" multiple accept=".pdf,.doc" />
```

#### Tom Select

```blade
<x-cube::tom-select name="tags" multiple>
    <option value="1">Laravel</option>
    <option value="2">PHP</option>
</x-cube::tom-select>
```

#### Flash Notifications

Use the `flash()` helper to send session-based notifications:

```php
flash('Record created.')->success();
flash('Something went wrong.')->error();
flash('Please review the form.')->warning();
flash('Your session will expire.')->info();
```

Display notifications in your layout using the flash message component:

```blade
<x-cube::flash-message />
```

#### Social Links

```blade
<x-cube::social.links
    facebook="https://facebook.com/yourpage"
    twitter="https://twitter.com/yourhandle"
    instagram="https://instagram.com/yourhandle"
    youtube="https://youtube.com/yourchannel"
    website="https://yoursite.com"
/>
```

#### Share Buttons

```blade
<x-cube::share-buttons
    :url="route('posts.show', $post)"
    :title="$post->name"
    :description="$post->intro"
    :image="$post->featured_image_url"
    :networks="['x', 'facebook', 'linkedin', 'copy', 'native']"
/>
```

#### Livewire Table

Extend `LwTable` to build sortable, searchable data tables:

```php
use Nasirkhan\LaravelCube\Livewire\LwTable;

class PostTable extends LwTable
{
    protected function baseQuery(): Builder
    {
        return Post::query()
            ->when($this->search, fn ($q) => $q->where('name', 'like', "%{$this->search}%"));
    }

    public function render()
    {
        return view('livewire.post-table', ['rows' => $this->rows()]);
    }
}
```

```blade
<x-cube::lw-table :rows="$rows" :search="$search">
    <x-slot:head>
        <x-cube::lw-table-th column="name" :sortCol="$sortCol" :sortDir="$sortDir">Name</x-cube::lw-table-th>
    </x-slot:head>
    <x-slot:body>
        @foreach ($rows as $row)
            <tr>
                <td>{{ $row->name }}</td>
            </tr>
        @endforeach
    </x-slot:body>
</x-cube::lw-table>
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

### SEO Head Defaults

Laravel Cube automatically integrates with `laravel/head` and registers site-wide defaults during the first view render. If your application uses `nasirkhan/module-manager`, the following settings are picked up automatically:

| Setting key           | Maps to                          |
|-----------------------|----------------------------------|
| `meta_description`    | `<meta name="description">`      |
| `meta_site_name`      | Open Graph `og:site_name`        |
| `meta_twitter_site`   | Twitter card `twitter:site`      |
| `meta_twitter_creator`| Twitter card `twitter:creator`   |
| `meta_keyword`        | `<meta name="keywords">`         |
| `meta_image`          | `og:image` (1200×630)            |
| `meta_fb_app_id`      | `fb:app_id`                      |

The integration degrades gracefully when `setting()` is not available.

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
