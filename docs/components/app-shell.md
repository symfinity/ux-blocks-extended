# AppShell

Application chrome wrapper.

## When to use

Application chrome wrapper. Use **AppShell** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Use AppShell once per application layout.
- Keep navbar items to primary destinations.

**Don't**

- Nest full shells inside shells.
- Duplicate page titles in shell chrome and PageHeading without reason.

## Usage

```twig
<twig:AppShell>…</twig:AppShell>
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | — | Component attribute |
| `density` | `string` | — | Component attribute |
| `open` | `string` | — | Component attribute |

## Accessibility

- Landmarks (`nav`, `main`) should be unique per page.
- Skip links help keyboard users reach main content.

## Related

- [PageHeader](page-header.md)
