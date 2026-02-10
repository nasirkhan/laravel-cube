# Contributing to Laravel Cube

Thank you for considering contributing to Laravel Cube! This document provides guidelines for contributing to this package.

## Code of Conduct

Be respectful and inclusive. We aim to create a welcoming environment for all contributors.

## How to Contribute

### Reporting Bugs

If you discover a bug, please create an issue on GitHub with:

1. **Clear title** - Describe the issue briefly
2. **Description** - Detailed explanation of the bug
3. **Steps to reproduce** - How to recreate the issue
4. **Expected behavior** - What should happen
5. **Actual behavior** - What actually happens
6. **Environment** - PHP version, Laravel version, framework (Tailwind/Bootstrap)
7. **Screenshots** - If applicable

### Suggesting Features

Feature suggestions are welcome! Please:

1. Check if the feature already exists or is planned
2. Create a GitHub issue with the `enhancement` label
3. Describe the feature and its use case
4. Explain why it would benefit the package

### Submitting Pull Requests

1. **Fork the repository**
2. **Create a feature branch** - `git checkout -b feature/my-feature`
3. **Make your changes** - Follow coding standards
4. **Write/update tests** - Ensure tests pass
5. **Update documentation** - If needed
6. **Commit your changes** - Use clear commit messages
7. **Push to your fork** - `git push origin feature/my-feature`
8. **Create a Pull Request** - Describe your changes

## Coding Standards

### PHP Code Style

This package follows PSR-12 coding standards and uses Laravel Pint for formatting.

**Run Pint before committing:**
```bash
./vendor/bin/pint
```

### Component Guidelines

1. **Dual Framework Support** - All components must support both Tailwind and Bootstrap
2. **Framework Detection** - Use the `HasFramework` trait
3. **View Structure** - Create `{component}.tailwind.blade.php` and `{component}.bootstrap.blade.php`
4. **Configuration** - Add CSS classes to `config/cube.php`
5. **Documentation** - Include usage examples in view comments

### Component Class Structure

```php
<?php

namespace Nasirkhan\LaravelCube\View\Components\YourCategory;

use Illuminate\View\Component;
use Illuminate\View\View;
use Nasirkhan\LaravelCube\View\Components\HasFramework;

class YourComponent extends Component
{
    use HasFramework;

    public function __construct(
        public string $property,
        ?string $framework = null
    ) {
        $this->initializeFramework($framework);
    }

    public function render(): View
    {
        return view($this->getFrameworkView('your-category.your-component'));
    }
}
```

### Blade View Guidelines

**Tailwind View (`tailwind.blade.php`):**
```blade
{{-- Cube Component: Your Component (Tailwind) --}}

<div {{ $attributes->merge(['class' => 'tailwind-classes']) }}>
    {{ $slot }}
</div>

{{-- Usage:
<x-cube::your-component>Content</x-cube::your-component>
--}}
```

**Bootstrap View (`bootstrap.blade.php`):**
```blade
{{-- Cube Component: Your Component (Bootstrap) --}}

<div {{ $attributes->merge(['class' => 'bootstrap-classes']) }}>
    {{ $slot }}
</div>

{{-- Usage:
<x-cube::your-component framework="bootstrap">Content</x-cube::your-component>
--}}
```

## Testing

### Running Tests

```bash
# Run all tests
composer test

# Run with coverage
composer test-coverage
```

### Writing Tests

1. **Unit Tests** - Test individual component logic
2. **Feature Tests** - Test component rendering
3. **Framework Tests** - Test both Tailwind and Bootstrap variants

Example test:

```php
public function test_button_renders_with_tailwind()
{
    $component = new Button(framework: 'tailwind');
    
    $this->assertTrue($component->isTailwind());
    $this->assertFalse($component->isBootstrap());
}
```

## Documentation

### README Updates

Update `README.md` for:
- New components
- API changes
- Configuration options
- Breaking changes

### Inline Documentation

Include usage examples in component views:

```blade
{{-- Usage:
<x-cube::component prop="value">
    Content
</x-cube::component>
--}}
```

### CHANGELOG

Follow [Keep a Changelog](https://keepachangelog.com/) format:

```markdown
## [Version] - YYYY-MM-DD

### Added
- New feature description

### Changed
- Changed feature description

### Fixed
- Bug fix description
```

## Git Commit Messages

Use clear, descriptive commit messages:

- **feat:** Add new feature
- **fix:** Bug fix
- **docs:** Documentation changes
- **style:** Code formatting (Pint)
- **refactor:** Code restructuring
- **test:** Add/update tests
- **chore:** Maintenance tasks

Examples:
```
feat: add textarea component with dual framework support
fix: button loading state not displaying correctly
docs: update README with modal examples
```

## Release Process

1. Update `CHANGELOG.md` with release notes
2. Update version in `composer.json`
3. Create a git tag: `git tag v1.0.0`
4. Push tag: `git push origin v1.0.0`
5. Create GitHub release with changelog

## Questions?

- **GitHub Issues** - For bugs and features
- **GitHub Discussions** - For questions and ideas
- **Email** - nasir8891@gmail.com for security issues

## License

By contributing, you agree that your contributions will be licensed under the GPL-3.0-or-later License.

---

Thank you for contributing to Laravel Cube! 🎉
