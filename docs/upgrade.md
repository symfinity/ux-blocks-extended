# Upgrade guide

## First public release (`v0.1.0`)

This is the first tagged release on Packagist. There is no migration from a prior semver line.

### Install

```bash
composer require symfinity/ux-blocks:^0.1 symfinity/ux-blocks-core:^0.1 symfinity/ux-blocks-form:^0.1 symfinity/ux-blocks-extended:^0.1
# optional themed app:
composer require symfinity/ui-kernel:^0.1
```

Ensure the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint is configured so the install recipe runs.

### What you get

- Symfony bundle registered for all environments
- **20** compound UX Twig component roles with `blocks.ext.*` fragment ids (see `v0.1.1` for `search-form`)
- Registry revision **1.4** in package `config/ux_roles.yaml`
- AssetMapper + Twig + UX Twig Component auto-configuration

### After install

1. Include ui-kernel head partial in your base layout — [Quick start](quickstart.md)
2. Replace local compound templates with `<twig:*>` components
3. Clear Symfony cache in each environment

## 0.1.1

Patch release after [v0.1.0](https://github.com/symfinity/ux-blocks-extended/releases/tag/v0.1.0). Adds **search-form** role and CSS — no breaking changes to existing fragment ids.

```bash
composer update symfinity/ux-blocks-extended symfinity/ux-blocks
```

After upgrade:

1. Bump `symfinity/ux-blocks` to `^0.1.3` when you use catalog helpers in tests.
2. Adopt `<twig:SearchForm>` where you previously inlined search markup.
3. Clear Symfony cache and hard-refresh the browser if AssetMapper serves cached CSS in dev.

## Future releases

See [CHANGELOG](https://github.com/symfinity/ux-blocks-extended/blob/main/CHANGELOG.md) for version-to-version notes.
