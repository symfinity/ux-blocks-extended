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

<twig:Card title="Notifications" description="Choose how we reach you.">
    <twig:Button variant="primary">Save</twig:Button>
</twig:Card>

<twig:Alert variant="info" title="Tip">
    Changes apply immediately after you save.
</twig:Alert>
```

## Next steps

- [Components](components.md) — handbook index
- [Card](components/card.md) · [Alert](components/alert.md)
- [Usage](usage.md) — layout and data patterns
- [CHANGELOG](../CHANGELOG.md) · [Contributing](../CONTRIBUTING.md)
