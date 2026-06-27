# Navbar

Top application bar with brand slot and primary navigation region.

## When to use

Once per [AppShell](app-shell.md) layout — holds brand, primary nav links, and utility actions. Keep items to top-level destinations; use [Breadcrumb](https://docs.symfinity.dev/ux-blocks-core/components/breadcrumb) below for hierarchy.

## Guidelines

**Do**

- Reserve the brand region for logo or product name (`icon` for mark-only brands).
- Keep nav link count small (≤7 primary items).
- Sticky chrome is default — avoid nesting a second header inside page content.

**Don't**

- Duplicate [PageHeader](page-header.md) titles in the navbar without reason.
- Put long prose or form fields in the navbar slot.

## Usage

```twig
<twig:Navbar icon="tabler:brand-symfinity">
    <twig:Link href="/docs">Docs</twig:Link>
    <twig:Link href="/components">Components</twig:Link>
</twig:Navbar>
```

Layout follows common app-shell nav patterns (Bootstrap navbar, shadcn shell).

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string?` | — | Brand mark (locked start position) |

Default slot: navigation links and utility actions inside `navbar-chrome`.

## Accessibility

- Wrap navigation in a landmark (`header` + `nav` semantics from component shell).
- Current page link should use `aria-current="page"` on the active item.

## Related

- [AppShell](app-shell.md) · [PageHeader](page-header.md)
