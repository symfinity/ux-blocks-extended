# Steps

Multi-step progress indicator.

## When to use

Multi-step progress indicator. Use **Steps** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Mark the current page in breadcrumbs and pagination.
- Keep link text descriptive out of context.

**Don't**

- Duplicate primary nav in breadcrumbs and navbar.
- Use `#` hrefs for real destinations.

## Usage

```twig
<twig:Steps>…</twig:Steps>
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | See Twig component class and package registry. |

## Accessibility

- Current page should be indicated with `aria-current`.
- Pagination controls need discernible names.

## Related

- [Form](https://docs.symfinity.dev/ux-blocks-form/components/form)
