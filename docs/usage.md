# Usage

Patterns for **symfinity/ux-blocks-extended** compounds.

## Featured components

- **[Card](components/card.md)** — titled containers with live previews
- **[Accordion](components/accordion.md)** — FAQ and settings panels
- **[Alert](components/alert.md)** — inline success, warning, and error messages

## Layout chrome

```twig
<twig:AppShell>
    <twig:PageHeader title="Dashboard" description="Overview for your workspace" />
    {# main content #}
</twig:AppShell>
```

Install **ux-blocks-core** and **ux-blocks-form** first — extended compounds compose their primitives.

## Common combinations

| Need | Components |
|------|------------|
| Confirm destructive action | [Dialog](components/dialog.md) + core Button |
| Empty search results | [Empty](components/empty.md) |
| Data listing | [Table](components/table.md) |
| Category hub | [Bento box panel](components/bento-box-panel.md) |

## Theme CSS

Include UI Kernel theme CSS — see [ux-blocks-core usage](https://docs.symfinity.dev/ux-blocks-core/usage) for the boot snippet.

## See also

- [Components](components.md) · [Quick start](quickstart.md) · [Troubleshooting](troubleshooting.md)
