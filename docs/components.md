# Components

## Interaction profile

| Token | Meaning in extended |
|-------|---------------------|
| `nat` | Native HTML + ui-kernel / package CSS — default for every role |
| `act` | Declarative ui-action on `DashboardShell` only |
| `stl` | Not in this package — see `symfinity/ux-blocks-interactive` |
| `live` | Not in this package — see `symfinity/ux-blocks-live` |

Fragment prefix for this package: **`blocks.ext`** (example: `blocks.ext.card`, `blocks.ext.search-form`).

## Component index

| Role | Twig | Interaction | Handbook |
|------|------|-------------|----------|
| card | Card | nat | [Card](components/card.md) |
| table | Table | nat | [Table](components/table.md) |
| alert | Alert | nat | [Alert](components/alert.md) |
| description-list | DescriptionList | nat | — |
| stat | Stat | nat | — |
| timeline | Timeline | nat | — |
| accordion | Accordion | nat | [Accordion](components/accordion.md) |
| carousel | Carousel | nat | — |
| dialog | Dialog | nat | [Dialog](components/dialog.md) |
| popover | Popover | nat | [Popover](components/popover.md) |
| tooltip | Tooltip | nat | [Tooltip](components/tooltip.md) |
| navbar | Navbar | nat | — |
| steps | Steps | nat | — |
| auth-layout | AuthLayout | nat | — |
| dashboard-shell | DashboardShell | nat, act | — |
| app-shell | AppShell | nat | — |
| page-header | PageHeader | nat | — |
| data-table-chrome | DataTableChrome | nat | — |
| empty | Empty | nat | [Empty](components/empty.md) |
| bento-box-panel | BentoBoxPanel | nat | [Bento box panel](components/bento-box-panel.md) |
| search-form | SearchForm | nat | — |

The [README](../README.md) component table is the canonical inventory; this page adds handbook links where depth pages exist.

## Using components

Twig tag name matches the **Twig** column (`<twig:Card>`, `<twig:PageHeader>`, …). Nested table roles use `Table:Header`, `Table:Body`, `Table:Row`, `Table:Cell`. Bento panels nest `BentoBoxPanel:Box`.

Install sibling tiers when you need interactive overlays, marketing sections, or shop blocks:

- `symfinity/ux-blocks-interactive` — `stl` overlays
- `symfinity/ux-blocks-marketing` — landing sections
- `symfinity/ux-blocks-ecommerce` — shop roles

## Family navigation

See [UX Blocks install profiles](https://github.com/symfinity/ux-blocks#install-profiles) for tier dependencies and [Quick start](quickstart.md) for a minimal render path.
