# Icon Component Reference

This page documents the `x-cube::icon` component and provides a preview table for common Flowbite icons.

## Requirements

The icon pack used by this component (`themesberg/flowbite-blade-icons`) is included automatically as a dependency of Laravel Cube.

## Component API

### Syntax

```blade
<x-cube::icon name="adjustments-horizontal" />
<x-cube::icon name="adjustments-horizontal" variant="solid" class="size-5 text-sky-500" />
```

### Available Params

| Param | Type | Required | Default | Description |
| --- | --- | --- | --- | --- |
| `name` | `string` | Yes | - | Flowbite icon name in kebab-case (for example `adjustments-horizontal`, `bell`, `user-circle`). |
| `variant` | `string` | No | `outline` | Icon set variant. Supported: `outline`, `solid`. |
| `class` | `string` | No | `size-6 shrink-0` | Extra CSS classes merged into the icon root element. |

### Other Attributes

Any extra HTML/SVG attributes are forwarded to the icon component, for example:

- `style`
- `id`
- `aria-label`
- `data-*`

## Icon Name And Preview Table

The table below uses the `outline` variant preview source. To use the same icon as `solid`, pass `variant="solid"`.

| Icon Name | Preview |
| --- | --- |
| `adjustments-horizontal` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-adjustments-horizontal.svg" alt="adjustments-horizontal" width="24" height="24"> |
| `adjustments-vertical` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-adjustments-vertical.svg" alt="adjustments-vertical" width="24" height="24"> |
| `angle-down` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-angle-down.svg" alt="angle-down" width="24" height="24"> |
| `angle-left` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-angle-left.svg" alt="angle-left" width="24" height="24"> |
| `angle-right` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-angle-right.svg" alt="angle-right" width="24" height="24"> |
| `angle-up` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-angle-up.svg" alt="angle-up" width="24" height="24"> |
| `archive` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-archive.svg" alt="archive" width="24" height="24"> |
| `arrow-down` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-arrow-down.svg" alt="arrow-down" width="24" height="24"> |
| `arrow-left` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-arrow-left.svg" alt="arrow-left" width="24" height="24"> |
| `arrow-right` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-arrow-right.svg" alt="arrow-right" width="24" height="24"> |
| `arrow-up` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-arrow-up.svg" alt="arrow-up" width="24" height="24"> |
| `bars` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-bars.svg" alt="bars" width="24" height="24"> |
| `bell` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-bell.svg" alt="bell" width="24" height="24"> |
| `bookmark` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-bookmark.svg" alt="bookmark" width="24" height="24"> |
| `calendar-month` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-calendar-month.svg" alt="calendar-month" width="24" height="24"> |
| `chart-pie` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-chart-pie.svg" alt="chart-pie" width="24" height="24"> |
| `check` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-check.svg" alt="check" width="24" height="24"> |
| `check-circle` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-check-circle.svg" alt="check-circle" width="24" height="24"> |
| `close` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-close.svg" alt="close" width="24" height="24"> |
| `cog` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-cog.svg" alt="cog" width="24" height="24"> |
| `download` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-download.svg" alt="download" width="24" height="24"> |
| `edit` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-edit.svg" alt="edit" width="24" height="24"> |
| `envelope` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-envelope.svg" alt="envelope" width="24" height="24"> |
| `eye` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-eye.svg" alt="eye" width="24" height="24"> |
| `filter` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-filter.svg" alt="filter" width="24" height="24"> |
| `globe` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-globe.svg" alt="globe" width="24" height="24"> |
| `heart` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-heart.svg" alt="heart" width="24" height="24"> |
| `home` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-home.svg" alt="home" width="24" height="24"> |
| `info-circle` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-info-circle.svg" alt="info-circle" width="24" height="24"> |
| `lock` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-lock.svg" alt="lock" width="24" height="24"> |
| `map-pin` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-map-pin.svg" alt="map-pin" width="24" height="24"> |
| `message-dots` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-message-dots.svg" alt="message-dots" width="24" height="24"> |
| `paper-plane` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-paper-plane.svg" alt="paper-plane" width="24" height="24"> |
| `phone` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-phone.svg" alt="phone" width="24" height="24"> |
| `plus` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-plus.svg" alt="plus" width="24" height="24"> |
| `search` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-search.svg" alt="search" width="24" height="24"> |
| `shield` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-shield.svg" alt="shield" width="24" height="24"> |
| `star` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-star.svg" alt="star" width="24" height="24"> |
| `trash-bin` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-trash-bin.svg" alt="trash-bin" width="24" height="24"> |
| `upload` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-upload.svg" alt="upload" width="24" height="24"> |
| `user` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-user.svg" alt="user" width="24" height="24"> |
| `user-circle` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-user-circle.svg" alt="user-circle" width="24" height="24"> |
| `users` | <img src="https://raw.githubusercontent.com/themesberg/flowbite-blade-icons/main/resources/svg/o-users.svg" alt="users" width="24" height="24"> |

## Full Catalog

For the complete icon catalog, check:

- Flowbite Icons preview: https://flowbite.com/icons/
- Blade source list: https://github.com/themesberg/flowbite-blade-icons/tree/main/resources/svg
