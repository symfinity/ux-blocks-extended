# Configuration

UX Blocks Extended ships **zero required app YAML**. The bundle prepends AssetMapper paths, Twig template paths, and UX Twig Component defaults at compile time.

## What the bundle configures

| Concern | Behavior |
|---------|----------|
| AssetMapper | Maps `assets/` to logical namespace `ux-blocks-extended` |
| Twig templates | Namespace `UxBlocksExtended` → `templates/` |
| UX Twig components | `Symfinity\UxBlocksExtended\Twig\Components\` → `components/` templates |
| Role registry | `config/ux_roles.yaml` (revision **1.4**) — read-only reference inside the package |
| Services | Autowired listeners — see bundle `config/services.yaml` |

Applications **do not** copy bundle `config/` into `config/packages/`.

## Routes

This package ships **no HTTP routes** — only Twig components, registry YAML, and AssetMapper assets.

## Themed apps (optional ui-kernel)

Role CSS uses `var(--ui-*)` tokens. When **symfinity/ui-kernel** is installed, include theme CSS in your layout — see ui-kernel [theme-preference](https://github.com/symfinity/ui-kernel/blob/main/docs/theme-preference.md).

## Optional integrations

| Package | Purpose |
|---------|---------|
| [symfinity/ui-action](https://packagist.org/packages/symfinity/ui-action) | Declarative `act` on `DashboardShell` |

## See also

- [Installation](installation.md)
- [Components](components.md)
- [ui-kernel configuration](https://github.com/symfinity/ui-kernel/blob/main/docs/configuration.md)
