# DashboardShell

Dashboard layout with sidebar slot.

## When to use

Dashboard layout with sidebar slot. Use **DashboardShell** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Use AppShell once per application layout.
- Keep navbar items to primary destinations.

**Don't**

- Nest full shells inside shells.
- Duplicate page titles in shell chrome and PageHeading without reason.

## Usage

```twig
<twig:DashboardShell>…</twig:DashboardShell>
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | See Twig component class and package registry. |

## Accessibility

- Landmarks (`nav`, `main`) should be unique per page.
- Skip links help keyboard users reach main content.

## Related

- [AppShell](app-shell.md)
