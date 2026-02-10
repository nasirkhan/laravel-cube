# Changelog

All notable changes to `laravel-cube` will be documented in this file.

## [Unreleased]

### Added
- Initial release of Laravel Cube package
- Dual framework support (Tailwind CSS and Bootstrap 5)
- 12 reusable components (UI, forms, navigation)
- HasFramework trait for framework detection
- Configuration system for customizing CSS classes
- Support for both Tailwind (Flowbite) and Bootstrap styling
- Dark mode support for Tailwind components
- Alpine.js integration for interactive components
- Comprehensive documentation and examples
- Component variants: primary, secondary, danger, success, warning, info, light, dark, link
- Button sizes: sm, md, lg
- Loading states for buttons
- Form validation support with error display
- Modal component with focus management
- Navigation components with active state detection
- Form group wrapper component
- Toggle switch component (iOS-style for Tailwind, Bootstrap switch for Bootstrap)
- Published views and configuration
- Service provider with auto-discovery
- PSR-4 autoloading

### Changed
- Renamed from `laravel-components` to `laravel-cube` for better branding
- Updated namespace from `Nasirkhan\LaravelComponents` to `Nasirkhan\LaravelCube`
- Changed component prefix from `x-frontend::` to `x-cube::`
- Restructured to support dual frameworks instead of Tailwind-only

## [1.0.0] - 2026-02-11

### Added
- Initial package structure
- Dual framework architecture
- 12 components with Tailwind and Bootstrap variants
- Configuration file with separate framework definitions
- Service provider with component registration
- Comprehensive documentation

---

## Version Notes

### Semantic Versioning
This project follows [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

**Format:** MAJOR.MINOR.PATCH

- **MAJOR** - Incompatible API changes
- **MINOR** - Add functionality (backwards-compatible)
- **PATCH** - Bug fixes (backwards-compatible)

### Release Types
- **[Unreleased]** - Upcoming changes not yet released
- **[X.Y.Z]** - Released versions with date

### Change Categories
- **Added** - New features
- **Changed** - Changes to existing functionality
- **Deprecated** - Soon-to-be removed features
- **Removed** - Removed features
- **Fixed** - Bug fixes
- **Security** - Security updates
