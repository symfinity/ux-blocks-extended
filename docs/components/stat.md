# Stat

Statistic with label and value.

## When to use

Statistic with label and value. Use **Stat** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Keep card titles concise; actions in the header/footer slots.
- Use Empty when a list has zero rows — not a bare table.

**Don't**

- Overload cards with more than one primary action.
- Hide essential data only in hover-only tooltips.

## Usage

```twig
<twig:Stat label="Users" value="1,204" />
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string?` | — | Icon slot |
| `iconPosition` | `string` | — | locked-end |

## Accessibility

- Table headers must scope columns/rows correctly.
- Accordion panels need expanded/collapsed state exposed.

## Related

- [DescriptionList](description-list.md)
