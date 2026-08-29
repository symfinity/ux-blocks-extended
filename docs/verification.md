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

## See also

- [Quick start](quickstart.md)
- [CHANGELOG](../CHANGELOG.md)
