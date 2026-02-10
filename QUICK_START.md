# Laravel Cube - Quick Start Guide

## ✅ Package Overview

Location: `c:\Users\Nasir Khan\Herd\laravel-starter-packages\laravel-cube`

**Laravel Cube** is a dual-framework component library that works with both Tailwind CSS (Flowbite) and Bootstrap 5, giving you maximum flexibility in your Laravel applications.

## 📦 Package Structure

```
laravel-cube/
├── composer.json              # Package configuration
├── README.md                  # Complete documentation
├── LICENSE                    # GPL-3.0-or-later
├── config/
│   └── cube.php              # Dual framework configuration
├── src/
│   ├── CubeServiceProvider.php
│   └── View/Components/
│       ├── HasFramework.php  # Framework detection trait
│       ├── Ui/
│       │   ├── Button.php    # Universal button component
│       │   └── Modal.php     # Modal dialog
│       ├── Forms/
│       │   ├── Input.php
│       │   ├── Label.php
│       │   ├── Error.php
│       │   ├── Group.php
│       │   ├── Checkbox.php
│       │   ├── Select.php
│       │   ├── Textarea.php
│       │   └── Toggle.php
│       └── Navigation/
│           ├── NavLink.php
│           └── ResponsiveNavLink.php
├── resources/views/components/
│   ├── ui/
│   │   ├── button/
│   │   │   ├── tailwind.blade.php
│   │   │   └── bootstrap.blade.php
│   │   └── modal/
│   │       ├── tailwind.blade.php
│   │       └── bootstrap.blade.php
│   ├── forms/
│   │   ├── input/
│   │   │   ├── tailwind.blade.php
│   │   │   └── bootstrap.blade.php
│   │   └── ... (other form components)
│   └── navigation/
│       └── ... (navigation components)
├── tests/
└── docs/
```

## 🎯 Components (12 Total)

**UI Components (2):**
- ✅ Button (variants: primary, secondary, danger, success, warning, info, light, dark, link)
- ✅ Modal (Alpine.js for Tailwind, Bootstrap Modal for Bootstrap)

**Form Components (8):**
- ✅ Input (text, email, password, number, url, tel, date, time, datetime-local, color)
- ✅ Label (with required indicator)
- ✅ Error (error message display)
- ✅ Group (label + input + error + help wrapper)
- ✅ Checkbox
- ✅ Select
- ✅ Textarea
- ✅ Toggle (iOS-style for Tailwind, Bootstrap switch for Bootstrap)

**Navigation Components (2):**
- ✅ Nav Link (with active state)
- ✅ Responsive Nav Link (mobile variant)

## 🚀 Quick Installation

### 1. Add to Laravel Starter

Update `composer.json` in your laravel-starter project:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../laravel-starter-packages/laravel-cube"
        }
    ],
    "require": {
        "nasirkhan/laravel-cube": "@dev"
    }
}
```

### 2. Install Package

```bash
cd laravel-starter
composer update nasirkhan/laravel-cube
```

### 3. Configure Framework (Optional)

Add to `.env`:

```env
# Use 'tailwind' (default) or 'bootstrap'
CUBE_FRAMEWORK=tailwind
```

## 💡 Usage Examples

### Framework Selection

```blade
{{-- Use default framework (from config) --}}
<x-cube::button variant="primary">Button</x-cube::button>

{{-- Explicitly use Tailwind --}}
<x-cube::button framework="tailwind" variant="primary">Tailwind Button</x-cube::button>

{{-- Explicitly use Bootstrap --}}
<x-cube::button framework="bootstrap" variant="primary">Bootstrap Button</x-cube::button>
```

### Complete Form Example (Tailwind)

```blade
<form method="POST" action="{{ route('register') }}">
    @csrf
    
    {{-- Name Field --}}
    <x-cube::group name="name" label="Full Name" required>
        <x-cube::input 
            type="text" 
            name="name" 
            :value="old('name')" 
            required 
            autofocus 
        />
    </x-cube::group>

    {{-- Email Field --}}
    <x-cube::group 
        name="email" 
        label="Email Address" 
        required
        help="We'll never share your email with anyone">
        <x-cube::input 
            type="email" 
            name="email" 
            :value="old('email')" 
            required 
        />
    </x-cube::group>

    {{-- Password Field --}}
    <x-cube::group name="password" label="Password" required>
        <x-cube::input 
            type="password" 
            name="password" 
            required 
        />
    </x-cube::group>

    {{-- Remember Me --}}
    <x-cube::checkbox name="remember">
        Remember me for 30 days
    </x-cube::checkbox>

    {{-- Submit Button --}}
    <div class="flex items-center justify-between mt-4">
        <x-cube::button variant="primary" type="submit">
            Register
        </x-cube::button>
    </div>
</form>
```

### Complete Form Example (Bootstrap)

```blade
<form method="POST" action="{{ route('register') }}">
    @csrf
    
    {{-- Name Field --}}
    <x-cube::group framework="bootstrap" name="name" label="Full Name" required>
        <x-cube::input 
            framework="bootstrap"
            type="text" 
            name="name" 
            :value="old('name')" 
            required 
            autofocus 
        />
    </x-cube::group>

    {{-- Email Field --}}
    <x-cube::group 
        framework="bootstrap"
        name="email" 
        label="Email Address" 
        required
        help="We'll never share your email with anyone">
        <x-cube::input 
            framework="bootstrap"
            type="email" 
            name="email" 
            :value="old('email')" 
            required 
        />
    </x-cube::group>

    {{-- Password Field --}}
    <x-cube::group framework="bootstrap" name="password" label="Password" required>
        <x-cube::input 
            framework="bootstrap"
            type="password" 
            name="password" 
            required 
        />
    </x-cube::group>

    {{-- Remember Me --}}
    <x-cube::checkbox framework="bootstrap" name="remember">
        Remember me for 30 days
    </x-cube::checkbox>

    {{-- Submit Button --}}
    <div class="d-flex justify-content-between mt-4">
        <x-cube::button framework="bootstrap" variant="primary" type="submit">
            Register
        </x-cube::button>
    </div>
</form>
```

### Button Variants

```blade
{{-- Tailwind Buttons --}}
<x-cube::button variant="primary">Primary</x-cube::button>
<x-cube::button variant="secondary">Secondary</x-cube::button>
<x-cube::button variant="danger">Danger</x-cube::button>
<x-cube::button variant="success">Success</x-cube::button>
<x-cube::button variant="warning">Warning</x-cube::button>

{{-- Button Sizes --}}
<x-cube::button size="sm">Small</x-cube::button>
<x-cube::button size="md">Medium</x-cube::button>
<x-cube::button size="lg">Large</x-cube::button>

{{-- Loading State --}}
<x-cube::button :loading="true">Processing...</x-cube::button>

{{-- Bootstrap Buttons --}}
<x-cube::button framework="bootstrap" variant="primary">Primary</x-cube::button>
<x-cube::button framework="bootstrap" variant="success" size="lg">Large Success</x-cube::button>
```

### Navigation Example

```blade
{{-- Tailwind Navigation --}}
<nav>
    <x-cube::nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        Dashboard
    </x-cube::nav-link>
    <x-cube::nav-link href="{{ route('profile') }}" :active="request()->routeIs('profile')">
        Profile
    </x-cube::nav-link>
</nav>

{{-- Bootstrap Navigation --}}
<nav class="nav">
    <x-cube::nav-link framework="bootstrap" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        Dashboard
    </x-cube::nav-link>
    <x-cube::nav-link framework="bootstrap" href="{{ route('profile') }}" :active="request()->routeIs('profile')">
        Profile
    </x-cube::nav-link>
</nav>
```

## 🎨 Customization

### Publish Configuration

```bash
php artisan vendor:publish --tag=cube-config
```

Edit `config/cube.php` to customize CSS classes for both frameworks.

### Publish Views

```bash
php artisan vendor:publish --tag=cube-views
```

Views will be published to `resources/views/vendor/cube/`.

## 🔧 Configuration Options

### Default Framework

```php
// config/cube.php
'default_framework' => env('CUBE_FRAMEWORK', 'tailwind'),
```

### Custom Button Classes

```php
// config/cube.php
'tailwind' => [
    'buttons' => [
        'primary' => 'your-custom-classes...',
    ],
],
'bootstrap' => [
    'buttons' => [
        'primary' => 'btn btn-primary your-custom-classes...',
    ],
],
```

## 📚 Component Properties

### Button
- `type` - button|submit|reset (default: 'button')
- `variant` - primary|secondary|danger|success|warning|info|light|dark|link
- `size` - sm|md|lg
- `disabled` - boolean
- `loading` - boolean
- `framework` - tailwind|bootstrap (optional)

### Input
- `type` - text|email|password|number|url|tel|date|time|datetime-local|color
- `disabled` - boolean
- `required` - boolean
- `placeholder` - string
- `framework` - tailwind|bootstrap (optional)

### Group
- `name` - string (field name)
- `label` - string
- `required` - boolean
- `help` - string (help text)
- `framework` - tailwind|bootstrap (optional)

## 📖 Further Reading

- See [README.md](README.md) for complete documentation
- Component examples in each view file
- Configuration details in `config/cube.php`

## 🎯 Next Steps

1. ✅ Package structure created
2. ✅ All components implemented
3. ✅ Dual framework support added
4. ⏳ Install in laravel-starter
5. ⏳ Test components in application
6. ⏳ Update existing views to use cube components

---

**Need Help?** Check the inline documentation in each component view file for usage examples!
