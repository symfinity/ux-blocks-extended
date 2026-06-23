<div align="center">

# Ux Blocks Extended

### Symfinity UX Blocks Extended — nat/act compound catalog with blocks.ext fragments

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-7.4+-343434?style=flat&logo=symfony&logoColor=white)](composer.json)

<br/>
[![PHPUnit](https://github.com/symfinity/symfinity/actions/workflows/phpunit.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/phpunit.yml)
[![Coverage](https://github.com/symfinity/symfinity/actions/workflows/coverage.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/coverage.yml)
[![PHPStan](https://github.com/symfinity/symfinity/actions/workflows/phpstan.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/phpstan.yml)
<br/>
[![Psalm](https://github.com/symfinity/symfinity/actions/workflows/psalm.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/psalm.yml)
[![Infection](https://github.com/symfinity/symfinity/actions/workflows/infection.yml/badge.svg)](https://github.com/symfinity/symfinity/actions/workflows/infection.yml)
[![Code Style](https://img.shields.io/badge/code%20style-CS%20Fixer-5c4dbc?style=flat)](https://github.com/symfinity/symfinity/actions/workflows/php-cs-fixer.yml)
<br/>
[![Release](https://img.shields.io/packagist/v/symfinity/ux-blocks-extended.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-extended)
[![Downloads](https://img.shields.io/packagist/dt/symfinity/ux-blocks-extended.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-extended)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

---

## Documentation

| Topic | Page |
|-------|------|
| Components | [docs/components.md](docs/components.md) |
| Configuration | [docs/configuration.md](docs/configuration.md) |
| Index | [docs/index.md](docs/index.md) |
| Installation | [docs/installation.md](docs/installation.md) |
| Porting | [docs/porting.md](docs/porting.md) |
| Quickstart | [docs/quickstart.md](docs/quickstart.md) |
| Reference | [docs/reference.md](docs/reference.md) |
| Troubleshooting | [docs/troubleshooting.md](docs/troubleshooting.md) |
| Upgrade | [docs/upgrade.md](docs/upgrade.md) |
| Usage | [docs/usage.md](docs/usage.md) |
| Component: Alert Dialog Enhanced | [docs/components/alert-dialog-enhanced.md](docs/components/alert-dialog-enhanced.md) |
| Component: Calendar | [docs/components/calendar.md](docs/components/calendar.md) |
| Component: Carousel Interactive | [docs/components/carousel-interactive.md](docs/components/carousel-interactive.md) |
| Component: Combobox | [docs/components/combobox.md](docs/components/combobox.md) |
| Component: Command Palette | [docs/components/command-palette.md](docs/components/command-palette.md) |
| Component: Context Menu | [docs/components/context-menu.md](docs/components/context-menu.md) |
| Component: Data Table Chrome | [docs/components/data-table-chrome.md](docs/components/data-table-chrome.md) |
| Component: Date Picker | [docs/components/date-picker.md](docs/components/date-picker.md) |
| Component: Drawer | [docs/components/drawer.md](docs/components/drawer.md) |
| Component: Dropdown Menu | [docs/components/dropdown-menu.md](docs/components/dropdown-menu.md) |
| Component: Filter Chips | [docs/components/filter-chips.md](docs/components/filter-chips.md) |
| Component: Hover Card | [docs/components/hover-card.md](docs/components/hover-card.md) |
| Component: Input Otp | [docs/components/input-otp.md](docs/components/input-otp.md) |
| Component: Menubar | [docs/components/menubar.md](docs/components/menubar.md) |
| Component: Navigation Menu | [docs/components/navigation-menu.md](docs/components/navigation-menu.md) |
| Component: Rating | [docs/components/rating.md](docs/components/rating.md) |
| Component: Resizable | [docs/components/resizable.md](docs/components/resizable.md) |
| Component: Sheet | [docs/components/sheet.md](docs/components/sheet.md) |
| Component: Sidebar | [docs/components/sidebar.md](docs/components/sidebar.md) |
| Component: Slider | [docs/components/slider.md](docs/components/slider.md) |
| Component: Stacked Layout Interactive | [docs/components/stacked-layout-interactive.md](docs/components/stacked-layout-interactive.md) |
| Component: Tabs | [docs/components/tabs.md](docs/components/tabs.md) |
| Component: Toast | [docs/components/toast.md](docs/components/toast.md) |
| Component: Toggle Group | [docs/components/toggle-group.md](docs/components/toggle-group.md) |
| Component: Toggle | [docs/components/toggle.md](docs/components/toggle.md) |
| Component: Date Range Picker | [docs/components/date-range-picker.md](docs/components/date-range-picker.md) |
| Component: Tags Input | [docs/components/tags-input.md](docs/components/tags-input.md) |
| Component: Bento Box Panel | [docs/components/bento-box-panel.md](docs/components/bento-box-panel.md) |

## Component inventory (054 three-tier)

**Application tier** — **19** compound `nat`/`act` roles in `config/ux_roles.yaml` (prefix `blocks.ext`, schema **1.4**). Eight layout/form atoms promoted to `symfinity/ux-blocks-core` in **094**; `empty` compound demoted here from core. Container roles (`card`, `alert`, `empty`, `field`) use the **108** composition language: scalar attrs + universal region components from core; per-concept `Card*` / `Alert*` sub-components removed.

| Role | Twig | Interaction | Fragment |
|------|------|-------------|----------|
| `field` … `dashboard-shell` | compounds | `nat` | `blocks.ext.*` |
| `empty` | `Empty` | `nat` | `blocks.ext.empty` |
| `bento-box-panel` | `BentoBoxPanel` | `nat` | `blocks.ext.bento-box-panel` |
| `data-table-chrome` | `DataTableChrome` | `nat` | `blocks.ext.data-table-chrome` |

Deprecated one-cycle aliases: `blocks.{role}` → `blocks.ext.{role}` for compounds on this tier; `blocks.empty` → `blocks.ext.empty` after **094** demote.

## Requirements

- PHP 8.2+
- Symfony 7.4+ (Flex recipe when available)

## Install

```bash
composer require symfinity/ux-blocks-extended
```

## Test

From product monorepo root:

```bash
cd src/symfinity
make test
# or package-scoped:
./sbin/php vendor/bin/phpunit packages/ux-blocks-extended/tests
```

## Maintainer Sass pipeline (120)

Author role CSS in `assets/scss/`; ship compiled CSS under `assets/styles/`. Shared partials copied from `ux-blocks-core` (`_shared/`). From product monorepo root:

```bash
cd src/symfinity
bin/blocks-css-compile --package=ux-blocks-extended
bin/blocks-css-compile --check --package=ux-blocks-extended
bin/ux-blocks-scss-audit --package=ux-blocks-extended --check
```

**MUST NOT** hand-edit compiled `assets/styles/**/*.css` for migrated roles. See [ux-blocks maintainer Sass pipeline](../ux-blocks/README.md#maintainer--sass-author-pipeline-120).


<!-- ux-blocks:registry:start -->
| Role | Twig | Interaction | Fragment | Status |
|------|------|-------------|----------|--------|
| card | Card | nat | `blocks.ext.card` | shipped |
| table | Table | nat | `blocks.ext.table` | shipped |
| alert | Alert | nat | `blocks.ext.alert` | shipped |
| description-list | DescriptionList | nat | `blocks.ext.description-list` | shipped |
| stat | Stat | nat | `blocks.ext.stat` | shipped |
| timeline | Timeline | nat | `blocks.ext.timeline` | shipped |
| accordion | Accordion | nat | `blocks.ext.accordion` | shipped |
| carousel | Carousel | nat | `blocks.ext.carousel` | shipped |
| dialog | Dialog | nat | `blocks.ext.dialog` | shipped |
| popover | Popover | nat | `blocks.ext.popover` | shipped |
| tooltip | Tooltip | nat | `blocks.ext.tooltip` | shipped |
| navbar | Navbar | nat | `blocks.ext.navbar` | shipped |
| steps | Steps | nat | `blocks.ext.steps` | shipped |
| auth-layout | AuthLayout | nat | `blocks.ext.auth-layout` | shipped |
| dashboard-shell | DashboardShell | nat, act | `blocks.ext.dashboard-shell` | shipped |
| app-shell | AppShell | nat | `blocks.ext.app-shell` | shipped |
| page-header | PageHeader | nat | `blocks.ext.page-header` | shipped |
| data-table-chrome | DataTableChrome | nat | `blocks.ext.data-table-chrome` | shipped |
| empty | Empty | nat | `blocks.ext.empty` | shipped |
| bento-box-panel | BentoBoxPanel | nat | `blocks.ext.bento-box-panel` | shipped |
<!-- ux-blocks:registry:end -->
