# Verification

**Integration profile:** P2 — embed (extended tier; CSS via ux-blocks-core auto stack).

## Local commands

```bash
composer test
composer phpstan
```

## Clean-app smoke

```bash
composer require symfinity/ux-blocks-extended
```

Render `<twig:Card><twig:Card:Body>Hello</twig:Card:Body></twig:Card>` — expect `data-ui-role="card"` and inline CSS through `id="ux-blocks-core-css"` … `id="ux-blocks-extended-css"`.

Org maintainer dogfood:

```bash
make dogfood-new SLUG=ux-blocks-kiosk-lab VERSION='7.4.*' FORCE=1
make dogfood-serve SLUG=ux-blocks-kiosk-lab
```

## See also

- [Quick start](quickstart.md)
- [CHANGELOG](../CHANGELOG.md)
