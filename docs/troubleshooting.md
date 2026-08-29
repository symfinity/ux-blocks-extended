# Troubleshooting

## Components render unstyled

**Cause:** ui-kernel theme CSS is missing from the layout, or AssetMapper did not load `ux-blocks-extended` role CSS.

**Fix:** Include `ui_kernel_theme_boot_script()` and `ui_kernel_css()` in your base layout — see [Quick start](quickstart.md). Run `php bin/console debug:asset-map` and confirm `ux-blocks-extended` styles are mapped.

## `SearchForm` or other extended component not found

**Cause:** Extended bundle not registered, or core/form tiers missing.

**Fix:** `composer require symfinity/ux-blocks-core symfinity/ux-blocks-form symfinity/ux-blocks-extended`. Confirm `SymfinityUxBlocksExtendedBundle` appears in `config/bundles.php` and run `php bin/console debug:container --tag=twig.component`.

## Fragment id mismatch in tests

**Cause:** Tests assert legacy `blocks.{role}` ids instead of `blocks.ext.{role}`.

**Fix:** Use `blocks.ext.*` fragment ids from `config/ux_roles.yaml`. The SDK `RegistrySchema::fragmentId()` helper accepts tier prefix and role id.

## Getting help

- [GitHub Issues](https://github.com/symfinity/ux-blocks-extended/issues)
- [CONTRIBUTING](../CONTRIBUTING.md)
- [Security](../.github/SECURITY.md)
