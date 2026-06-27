# PageHeader

Page title and description bar.

## When to use

Page title and description bar. Use **PageHeader** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Use AppShell once per application layout.
- Keep navbar items to primary destinations.

**Don't**

- Nest full shells inside shells.
- Duplicate page titles in shell chrome and PageHeading without reason.

## Usage

```twig
<twig:PageHeader title="Settings" description="Manage your account." />
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | `string?` | — | Slot or scalar content |
| `description` | `string?` | — | Slot or scalar content |

## Accessibility

- Landmarks (`nav`, `main`) should be unique per page.
- Skip links help keyboard users reach main content.

## Related

- [AppShell](app-shell.md)
