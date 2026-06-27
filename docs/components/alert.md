# Alert

Inline feedback — success, warning, error, or neutral information.

## When to use

Confirm outcomes (`Saved`), surface validation summaries, or show non-blocking notices. For blocking confirmation, use [Dialog](dialog.md). For empty lists, use [Empty](empty.md).

## Guidelines

**Do**

- Lead with a short `title` when the message needs context.
- Use `variant="danger"` for errors the user must fix.
- Enable `dismissible` only when dismissal is safe and reversible.

**Don't**

- Replace toast notifications for transient success — interactive tier ships [Toast](https://github.com/symfinity/ux-blocks-interactive) separately.
- Hide the only copy of an error inside an icon.

## Usage

```twig
<twig:Alert variant="success" title="Saved">Your profile was updated.</twig:Alert>
```

Variant previews below mirror [Bootstrap alerts](https://getbootstrap.com/docs/5.3/components/alerts/) and [shadcn Alert](https://ui.shadcn.com/docs/components/alert) patterns.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | `info` | `success`, `warning`, `danger`, `info`, … |
| `title` | `string?` | — | Optional heading |
| `dismissible` | `bool` | `false` | Close control |
| `icon` | `string?` | — | Override default variant icon |

Optional regions: `header`, `footer`, `actions` for compound layout.

## Accessibility

- Put the message in the default slot or `title`.
- Keep the dismiss control keyboard reachable when `dismissible` is true.
- Do not rely on colour alone — include explicit success/error wording.

## Related

- [Empty](empty.md) · [Card](card.md) · [Dialog](dialog.md)
