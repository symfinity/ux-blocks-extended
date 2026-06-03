# Quickstart: symfinity/ux-blocks-extended

**Status:** shipped 2026-06-03 — 24 `stl` roles, `blocks.ext.*` fragments.

**Planning:** symfinity **025** `DONE` · **Contracts:** [extended-role-registry](../../../../specs/symfinity/symfinity/3-ux-component-catalog/contracts/extended-role-registry.md)

## Prerequisites

- Product monorepo `src/symfinity/` with Docker (`docker compose`, `make test`)
- **003** / **024** `DONE`: `symfinity/ux-blocks-core`, `symfinity/ux-blocks-demo`
- Recommended: `symfinity/ui-kernel` for themed previews

## Install

```bash
cd src/symfinity
./bin/composer require symfinity/ux-blocks-extended

# Optional command palette backend:
./bin/composer require symfinity/ux-runtime
```

Flex: `recipes/symfinity/ux-blocks-extended/0.1/`

## Minimal Twig

```twig
<twig:DropdownMenu>
  <twig:DropdownMenu:Trigger>Open</twig:DropdownMenu:Trigger>
  <twig:DropdownMenu:Content>
    <twig:DropdownMenu:Item href="/settings">Settings</twig:DropdownMenu:Item>
  </twig:DropdownMenu:Content>
</twig:DropdownMenu>

<twig:CommandPalette commandsUrl="/_ui/palette/commands" />
```

## Demo hub (`ux-blocks-demo`)

| Route | Category |
|-------|----------|
| `/extended` | Index |
| `/extended/overlays` | Overlays |
| `/extended/navigation` | Navigation |
| `/extended/app-shell` | Sidebar, menubar, nav menu |
| `/extended/forms` | Form micro-UX |
| `/extended/data` | Table chrome, carousel, resizable, toast |
| `/extended/command-palette` | With / without ux-runtime |

## Verification

| Check | Command |
|-------|---------|
| Package tests | `docker compose run php vendor/bin/phpunit -c packages/ux-blocks-extended/phpunit.xml.dist` |
| Monorepo gate | `make test` |
| Registry parity | `config/ux_roles.yaml` vs [extended-role-registry](../../../../specs/symfinity/symfinity/3-ux-component-catalog/contracts/extended-role-registry.md) |

## Related

- [extended-role-registry](../../../../specs/symfinity/symfinity/3-ux-component-catalog/contracts/extended-role-registry.md)
- [stimulus-controllers-registry](../../../../specs/symfinity/symfinity/3-ux-component-catalog/contracts/stimulus-controllers-registry.md)
- [command-palette-blocks-integration](../../../../specs/symfinity/symfinity/3-ux-component-catalog/contracts/command-palette-blocks-integration.md)
- [PRODUCT-ux-blocks-family](../../../../classified/explore/PRODUCT-ux-blocks-family.md)
