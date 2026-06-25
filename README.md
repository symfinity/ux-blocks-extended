<div align="center">

# UX Blocks Extended

### Compound UX Twig components with registry-aligned markup and role CSS

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-7.4+-343434?style=flat&logo=symfony&logoColor=white)](composer.json)
<br/>
[![CI](https://github.com/symfinity/ux-blocks-extended/actions/workflows/ci.yml/badge.svg)](https://github.com/symfinity/ux-blocks-extended/actions/workflows/ci.yml)
<br/>
[![Release](https://img.shields.io/packagist/v/symfinity/ux-blocks-extended.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-extended)
[![Downloads](https://img.shields.io/packagist/dt/symfinity/ux-blocks-extended.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/symfinity/ux-blocks-extended)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

> [!NOTE]
> **Read-only mirror.**
> See [CONTRIBUTING.md](CONTRIBUTING.md) for how to propose changes.

## Features
- **20 compound roles** — cards, alerts, layout shells, navigation, and data chrome
- **Native-first (`nat`)** — styled with ui-kernel tokens; optional `act` on dashboard shell
- **Composition language** — scalar attrs plus universal region components from core
- **Registry-aligned** — `blocks.ext.*` fragment ids in `config/ux_roles.yaml`
- **Symfony UX Twig components** — `<twig:Card>`, `<twig:Alert>`, `<twig:AppShell>`, and siblings
- **Package role CSS** — tier-owned styles under `assets/styles/roles/`
- **Flex recipe** — bundle and AssetMapper paths wired on install

## Interaction profile
| Token | In this package |
|-------|-----------------|
| `nat` | Default for compounds — native HTML + ui-kernel / package CSS |
| `act` | Optional on `DashboardShell` via ui-action protocol |
| `stl` | **Not included** — interactive overlays ship in `symfinity/ux-blocks-interactive` |
| `live` | **Not included** — LiveComponents ship in `symfinity/ux-blocks-live` |

## Component inventory

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

**Highlights:** app shell and page header for product chrome; bento box panel for category landing; data-table chrome for list/detail layouts.
Handbook: [docs/components.md](docs/components.md).

## Prerequisites
Add the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint to your project's `composer.json` (see [recipes README](https://github.com/symfinity/recipes/blob/main/README.md)) — recipes are not in Symfony's official recipe repository yet.

## Installation
Requires core (and form for field compounds). See [UX Blocks install profiles](https://github.com/symfinity/ux-blocks#install-profiles) for tier choices.
```bash
composer require symfinity/ux-blocks-extended
```

See [Installation](docs/installation.md).

## Quick Start
```twig
<twig:PageHeader title="Settings" description="Manage your account." />
<twig:Card>
  <twig:Header>Notifications</twig:Header>
  <twig:Actions>
    <twig:Button variant="default">Save</twig:Button>
  </twig:Actions>
</twig:Card>
```

See [Quick start](docs/quickstart.md) for the full walkthrough.

## Documentation
- **[Quick start](docs/quickstart.md)** — minimal setup path
- **[Installation](docs/installation.md)** — Flex, dependencies, verify
- **[Configuration](docs/configuration.md)** — bundle and app options
- **[Components](docs/components.md)** — role index and examples
- **[Usage](docs/usage.md)** — day-to-day patterns
- **[Upgrade](docs/upgrade.md)** — version migrations

## Requirements
- PHP 8.2 or higher
- Symfony 7.4 or 8.x
- `symfinity/ux-blocks-core` ^0.1 and `symfinity/ux-blocks-form` ^0.1

## Support
- [GitHub Issues](https://github.com/symfinity/ux-blocks-extended/issues)
- [Security](.github/SECURITY.md)
- [Contributing](CONTRIBUTING.md)

## License
[MIT](LICENSE)
