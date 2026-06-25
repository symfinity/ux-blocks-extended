# Installation

## Prerequisites

1. Add the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint to your project's `composer.json` (see [recipes README](https://github.com/symfinity/recipes/blob/main/README.md)).
2. Install **core** and **form** tiers first — extended compounds depend on both:

```bash
composer require symfinity/ux-blocks-core symfinity/ux-blocks-form
```

3. For **styled** apps, install **ui-kernel** (theme CSS). The registry SDK `symfinity/ux-blocks` is pulled transitively from Packagist.

```bash
composer require symfinity/ui-kernel   # optional — themed apps only
```

See [UX Blocks install profiles](https://github.com/symfinity/ux-blocks#install-profiles) for tier choices.

## Composer

```bash
composer require symfinity/ux-blocks-extended
```

## Symfony Flex

The `0.1` recipe applies:

- Registers `SymfinityUxBlocksExtendedBundle` for **all** environments
- No app config file is copied — the bundle auto-configures AssetMapper, Twig paths, and UX Twig components

## Manual installation

When Flex is unavailable:

1. `composer require symfinity/ux-blocks symfinity/ux-blocks-core symfinity/ux-blocks-form symfinity/ux-blocks-extended`
2. Register `Symfinity\UxBlocksExtended\SymfinityUxBlocksExtendedBundle` in `config/bundles.php`
3. Ensure AssetMapper, Stimulus, and UX Twig Component bundles are enabled

## Verify installation

```bash
php bin/console debug:container --tag=twig.component | grep -i SearchForm
```

## Next steps

[Quick start](quickstart.md).
