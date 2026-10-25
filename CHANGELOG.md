# Changelog

All notable changes to `laravel-cube` will be documented in this file.

## [v4.3.1] - 2026-10-25

### Fixed
- `x-cube::modal`: dialog box painted beneath its own backdrop in Tailwind v4 because the bare `transform` class compiled to `transform: none`, collapsing the stacking context. Fixed by adding `relative z-10` to the `role="dialog"` element and removing the no-op `transform` class from both the backdrop and dialog divs. Transition animations (`translate-y-4`, `sm:scale-95`, etc.) are unaffected — those utilities set their own CSS properties in Tailwind v4 and do not require a bare `transform` class.
- `x-cube::modal`: `aria-labelledby` no longer references a non-existent element. The attribute is now omitted when no `title` prop is given; when a `title` prop is supplied, a screen-reader-only `<span>` with the matching `id` is rendered inside the dialog.

## [Unreleased]

### Added
- Flowbite icon component: `icon` with dynamic `name` support and merged classes
- Google Analytics component: `google-analytics` for easy Google Analytics integration
- Footer components: `footer-credit` and `footer-license` for displaying copyright and licensing information
- Initial release of Laravel Cube package
- Dual framework support (Tailwind CSS and Bootstrap 5)
- 15 reusable components (UI, forms, navigation, utilities)
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
- Made `footer-license` component more flexible with optional `author` and `authorUrl` parameters
- Fixed `FooterCredit` and `FooterLicense` components to properly extend `Component` and use `HasFramework` trait
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
