# Empty

Zero-state placeholder when a list, table, or search has no rows to show.

## When to use

Replace a bare table or grid with **Empty** when filters return zero results or the user has not created content yet. Pair with a primary [Button](https://docs.symfinity.dev/ux-blocks-core/components/button) in the content slot for the recovery action.

## Guidelines

**Do**

- State clearly what is missing and what to do next (`title` + `description`).
- Use `appearance="outline"` for dashed drop zones; `soft` for muted panels.
- Put the create/import action in the default slot below the header.

**Don't**

- Show Empty while data is still loading — use [Skeleton](https://docs.symfinity.dev/ux-blocks-core/components/skeleton) or [Spinner](https://docs.symfinity.dev/ux-blocks-core/components/spinner) first.
- Use Empty inside every card when [Alert](alert.md) is enough.

## Usage

```twig
<twig:Empty title="No projects yet" description="Create one to get started.">
    <twig:Button variant="primary">New project</twig:Button>
</twig:Empty>
```

Comparable patterns: [shadcn empty states](https://ui.shadcn.com/docs/components) in data tables.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | `string?` | — | Primary zero-state heading |
| `description` | `string?` | — | Supporting explanation |
| `appearance` | `string` | `outline` | `outline`, `soft`, or `plain` |

Default slot: actions (buttons, links) below the header.

## Accessibility

- `title` should describe the situation, not only “No data”.
- Action buttons in the slot need discernible names.

## Related

- [Card](card.md) · [Table](table.md) · [Alert](alert.md)
