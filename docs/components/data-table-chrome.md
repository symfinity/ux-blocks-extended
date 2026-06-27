# DataTableChrome

Toolbar and filters around a table.

## When to use

Toolbar and filters around a table. Use **DataTableChrome** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Keep card titles concise; actions in the header/footer slots.
- Use Empty when a list has zero rows — not a bare table.

**Don't**

- Overload cards with more than one primary action.
- Hide essential data only in hover-only tooltips.

## Usage

```twig
<twig:DataTableChrome>…</twig:DataTableChrome>
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | See Twig component class and package registry. |

## Accessibility

- Table headers must scope columns/rows correctly.
- Accordion panels need expanded/collapsed state exposed.

## Related

- [Table](table.md)
