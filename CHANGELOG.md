# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.1] - 2026-06-25

### Added

- **`search-form`** compound role — `<twig:SearchForm>` with `data-ui-role="search-form"` and fragment id `blocks.ext.search-form`
- **Role CSS** — `assets/styles/roles/search-form.css` for list/toolbar search UI shells
- Registry `config/ux_roles.yaml` now lists **21** shipped extended roles (was 20 at `v0.1.0`)

### Notes

- Requires `symfinity/ux-blocks` `^0.1.3` for `ExtendedRoleCatalog` alignment in dev/tests
- No breaking changes to existing `blocks.ext.*` fragment ids

## [0.1.0] - 2026-06-25

### Added

- Initial release of **symfinity/ux-blocks-extended** — compound UX Twig components for Symfony
- **20 shipped roles** with `blocks.ext.*` fragment ids: card, table, alert, description-list, stat, timeline, accordion, carousel, dialog, popover, tooltip, navbar, steps, auth-layout, dashboard-shell, app-shell, page-header, data-table-chrome, empty, and bento-box-panel
- **Composition language** on selected roles — scalar attributes plus universal region components (`Header`, `Actions`, `Media`, …) from core
- **Native-first (`nat`) interaction** — ui-kernel token styling and tier-owned role CSS under `assets/styles/roles/`
- **Symfony UX Twig components** — e.g. `<twig:Card>`, `<twig:PageHeader>`, `<twig:AppShell>`, `<twig:BentoBoxPanel>`
- **UX role registry** — `config/ux_roles.yaml` aligned with `blocks.ext` prefix and handbook component pages
- **Icon slots and watermarks** on alert, stat, navbar, empty, card, and related compounds where documented in the registry
- **Optional dashboard actions** — `DashboardShell` supports ui-action (`act`) when `symfinity/ui-action` is present
- **Flex recipe** `0.1` — bundle registration, AssetMapper paths, and default package config
- **Consumer handbook** — installation, quick start, configuration, usage, components, upgrade, and troubleshooting under `docs/`
- Symfony **7.4** and **8.0** compatibility; PHP **8.2+**

### Notes

- Requires `symfinity/ux-blocks-core` and `symfinity/ux-blocks-form` ^0.1 — see [UX Blocks install profiles](https://github.com/symfinity/ux-blocks#install-profiles)
- Interactive overlays (`stl`) and LiveComponents (`live`) ship in separate packages (`symfinity/ux-blocks-interactive`, `symfinity/ux-blocks-live`)
- Optional `symfinity/ux-runtime` suggestion for command-palette JSON backend only
