# Dialog

Modal overlay for focused tasks — confirmations, forms, and short workflows.

## When to use

Interrupt the current view for a decision the user must make before continuing. For non-blocking hints, use [Popover](popover.md) or [Tooltip](tooltip.md).

## Guidelines

**Do**

- Set `label` (or `labelledBy`) so the dialog has an accessible name.
- Use `open` only for demos; toggle via your app action in production.
- Keep body copy short — link to a full page for long forms.

**Don't**

- Stack multiple modal layers without a clear dismiss path.
- Open dialogs on page load without user intent.

## Usage

```twig
<twig:Dialog open label="Confirm delete">
    This action cannot be undone.
</twig:Dialog>
```

Patterns align with [shadcn Dialog](https://ui.shadcn.com/docs/components/dialog).

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `open` | `bool` | `false` | Whether the dialog is visible |
| `label` | `string?` | — | Accessible name when no visible title element |
| `labelledBy` | `string?` | — | Id of an external title element |
| `dialogId` | `string?` | — | Stable id; auto-generated when omitted |

Default slot: dialog body content.

## Accessibility

- Focus should move into the dialog when opened and return to the trigger on close.
- Use `label` or a visible heading referenced by `labelledBy`.
- Provide a dismiss control for non-destructive flows.

## Related

- [Alert](alert.md) · [Popover](popover.md)
