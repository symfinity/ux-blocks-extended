# Tooltip

Hover/focus hint.

## When to use

Hover/focus hint. Use **Tooltip** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Trap focus inside modal dialogs while open.
- Return focus to the trigger on close.

**Don't**

- Open dialogs without a user gesture unless necessary.
- Stack multiple modal layers without clear dismissal.

## Usage

```twig
<twig:Tooltip content="Help text">…</twig:Tooltip>
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | See Twig component class and package registry. |

## Accessibility

- Dialogs need `aria-modal` and labelled titles.
- Tooltips must not hold essential instructions only.

## Related

- [Popover](popover.md)
