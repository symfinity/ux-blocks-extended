# Card

Groups related content with optional title, description, and actions.

## When to use

Dashboard tiles, settings sections, and list item summaries. Prefer a plain [Stack](https://docs.symfinity.dev/ux-blocks-core/components) when you only need vertical spacing without a border.

## Guidelines

**Do**

- Put the primary action in an `actions` region or footer slot.
- Use `density="compact"` for dense admin tables and `comfortable` for marketing.
- Keep titles scannable — one line when possible.

**Don't**

- Nest cards more than two levels deep.
- Use a card when a single [Alert](alert.md) or [Empty](empty.md) state is enough.

## Usage

```twig
<twig:Card title="Workspace plan" description="Includes shared themes and blocks.">
    Renews on 1 July.
</twig:Card>
```

Layout follows [shadcn Card](https://ui.shadcn.com/docs/components/card) (header + body + footer) via props and composition regions.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | `string?` | — | Card heading |
| `description` | `string?` | — | Supporting text |
| `size` | `string` | `md` | Padding scale |
| `density` | `string` | `comfortable` | `compact`, `comfortable`, `spacious` |
| `tone` | `string` | `default` | Surface emphasis: `default`, `muted`, `emphasis` |

Optional slots: `header`, `footer`, `media`, `actions`.

## Accessibility

- Use a heading element for `title` when the card is a landmark section.
- Ensure action buttons in the footer have discernible names.

## Related

- [Empty](empty.md) · [Alert](alert.md) · [Table](table.md)
