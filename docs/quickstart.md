# Quick start

Use UX Blocks Extended compounds in a Symfony app with ui-kernel theme CSS.

## Prerequisites

[Installation](installation.md) completed — `symfinity/ux-blocks-core`, `symfinity/ux-blocks-form`, and `symfinity/ux-blocks-extended` installed. Add `symfinity/ui-kernel` for themed apps.

## 1. Include ui-kernel CSS

Compound roles rely on ui-kernel design tokens. In your base layout `<head>`:

```twig
{# templates/base.html.twig #}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}My app{% endblock %}</title>
    {{ ui_kernel_theme_boot_script() }}
    {{ ui_kernel_css()|raw }}
    {% block stylesheets %}{% endblock %}
</head>
<body>
    {% block body %}{% endblock %}
</body>
</html>
```

## 2. Render compounds

Use UX Twig component tags. Composition-language roles accept universal region components from core:

```twig
<twig:PageHeader title="Settings" description="Manage your account." />

<twig:Card>
    <twig:Header>Notifications</twig:Header>
    <twig:Actions>
        <twig:Button variant="default">Save</twig:Button>
    </twig:Actions>
</twig:Card>

<twig:SearchForm action="/search" method="get">
    <twig:Input name="q" type="search" placeholder="Search…" />
    <twig:Button type="submit" variant="default">Search</twig:Button>
</twig:SearchForm>
```

Each root element exposes `data-ui-role`, `data-ui-fragment`, and UI Kernel variant hooks — see [Components](components.md).

## Verify markup

In a functional test or browser inspector, confirm:

- `data-ui-role="page-header"` on the page header root
- `data-ui-fragment="blocks.ext.card"` on the card root
- `data-ui-fragment="blocks.ext.search-form"` on the search form shell

## Next steps

- [Components](components.md) — full role index
- [Usage](usage.md) — layout shells and data chrome patterns
- [CHANGELOG](../CHANGELOG.md) · [CONTRIBUTING](../CONTRIBUTING.md) · [GitHub Issues](https://github.com/symfinity/ux-blocks-extended/issues)
