# symfinity/ux-blocks-extended

Chameleon UX Blocks Extended — **stl** micro-UX catalog with `blocks.ext.*` fragment prefix.

**Family:** [PRODUCT-ux-blocks-family](../../../classified/explore/PRODUCT-ux-blocks-family.md)

**Planning:** symfinity **025** `DONE` 2026-06-03 · **Registry:** [extended-role-registry](../../../specs/symfinity/symfinity/3-ux-component-catalog/contracts/extended-role-registry.md)

## Install

```bash
composer require symfinity/ux-blocks-extended
```

Requires Symfony **7.4+**, `symfinity/ux-blocks-core`, `symfony/ux-twig-component` ^2, `symfony/stimulus-bundle` ^2. Does **not** require `symfony/ux-toolkit` or `symfinity/ui-kernel`.

Optional command palette backend:

```bash
composer require symfinity/ux-runtime  # suggest only — not bundled
```

Register the bundle:

```php
// config/bundles.php
Symfinity\UxBlocksExtended\SymfinityUxBlocksExtendedBundle::class => ['all' => true],
```

## Interaction profile

This package owns **stl** (Stimulus) roles only. Every listed role ships a package Stimulus controller for open state, keyboard navigation, and ARIA updates. Core **nat** primitives from `ux-blocks-core` may be composed inside extended components.

Command palette UI lives here; command registry JSON is optional via **`suggest symfinity/ux-runtime`**.

## Component inventory

| Role | Twig | Category | Interaction | Fragment | Status | REF |
|------|------|----------|-------------|----------|--------|-----|
| `tabs` | `Tabs` | Navigation | stl | `blocks.ext.tabs` | shipped | shadcn |
| `dropdown-menu` | `DropdownMenu` | Overlays | stl | `blocks.ext.dropdown-menu` | shipped | shadcn |
| `alert-dialog-enhanced` | `AlertDialog` | Overlays | stl | `blocks.ext.alert-dialog-enhanced` | shipped | shadcn |
| `drawer` | `Drawer` | Overlays | stl | `blocks.ext.drawer` | shipped | shadcn |
| `sheet` | `Sheet` | Overlays | stl | `blocks.ext.sheet` | shipped | shadcn |
| `context-menu` | `ContextMenu` | Overlays | stl | `blocks.ext.context-menu` | shipped | shadcn |
| `hover-card` | `HoverCard` | Overlays | stl | `blocks.ext.hover-card` | shipped | shadcn |
| `menubar` | `Menubar` | Navigation | stl | `blocks.ext.menubar` | shipped | shadcn |
| `navigation-menu` | `NavigationMenu` | Navigation | stl | `blocks.ext.navigation-menu` | shipped | shadcn |
| `sidebar` | `Sidebar` | App shell | stl | `blocks.ext.sidebar` | shipped | shadcn blocks |
| `stacked-layout-interactive` | `StackedLayoutInteractive` | App shell | stl | `blocks.ext.stacked-layout-interactive` | shipped | Catalyst |
| `combobox` | `Combobox` | Forms | stl | `blocks.ext.combobox` | shipped | shadcn |
| `slider` | `Slider` | Forms | stl | `blocks.ext.slider` | shipped | shadcn |
| `toggle` | `Toggle` | Forms | stl | `blocks.ext.toggle` | shipped | shadcn |
| `toggle-group` | `ToggleGroup` | Forms | stl | `blocks.ext.toggle-group` | shipped | shadcn |
| `calendar` | `Calendar` | Forms | stl | `blocks.ext.calendar` | shipped | shadcn |
| `date-picker` | `DatePicker` | Forms | stl | `blocks.ext.date-picker` | shipped | shadcn |
| `input-otp` | `InputOtp` | Forms | stl | `blocks.ext.input-otp` | shipped | shadcn |
| `rating` | `Rating` | Forms | stl | `blocks.ext.rating` | shipped | DaisyUI |
| `filter-chips` | `FilterChips` | Forms | stl | `blocks.ext.filter-chips` | shipped | DaisyUI |
| `data-table-chrome` | `DataTableChrome` | Data | stl, act | `blocks.ext.data-table-chrome` | shipped | shadcn |
| `carousel-interactive` | `CarouselInteractive` | Data | stl | `blocks.ext.carousel-interactive` | shipped | shadcn |
| `resizable` | `Resizable` | Layout | stl | `blocks.ext.resizable` | shipped | shadcn |
| `toast` | `Toast` | Feedback | stl | `blocks.ext.toast` | shipped | shadcn |
| `command-palette` | `CommandPalette` | Commands | stl, runtime | `blocks.ext.command-palette` | shipped | shadcn |

## Catalog (dev/test)

`GET /ux-blocks-extended/catalog` — MVP roles. Demo hub: `ux-blocks-demo` routes under `/extended/*`.

## Docs

- [porting.md](docs/porting.md) — REF checkout and port transform for extended roles
- [docs/components/](docs/components/) — per-role stubs (implement phase)

## Test

From product monorepo root:

```bash
cd src/symfinity
make test
# or package-scoped:
./sbin/php vendor/bin/phpunit packages/ux-blocks-extended/tests
```

## Extension

Add a row to [extended-role-registry](../../../specs/symfinity/symfinity/3-ux-component-catalog/contracts/extended-role-registry.md) and mirror it in `config/ux_roles.yaml` before shipping a new component.

## Primal lab reference (WoWi)

Source: [`var/primal/td-cc-wowi`](../../../../var/primal/td-cc-wowi) (reference only).

| WoWi pattern | Notes for ux-blocks-extended |
|--------------|------------------------------|
| Glossary/FAQ `answerDialog` modal | `alert-dialog-enhanced`, `sheet`, `drawer` + `ux-runtime` Turbo fetch |
| Q&A accordion + filter slider (Slick) | `tabs` + carousel patterns; FAQ filter → tabs or command palette |
| `history.pushState` on FAQ item open | Host + Turbo; not a blocks CSS concern |
| Event calendar nav slider | Extended carousel/tab roles + JSON feed in host app |
