# Usage

## Layout chrome

Use **app-shell** and **page-header** for product chrome:

```twig
<twig:AppShell>
    <twig:Aside>{# sidebar nav #}</twig:Aside>
    <twig:Header>
        <twig:PageHeader title="Dashboard" />
    </twig:Header>
    {# main content #}
</twig:AppShell>
```

## Composition language

Roles such as **card**, **alert**, and **empty** accept scalar attributes (`title`, `description`, `icon`) plus universal region components (`Header`, `Actions`, `Media`, …) from core. Prefer regions over ad-hoc wrapper markup.

## Data surfaces

- **table** + **data-table-chrome** for list/detail layouts
- **stat** and **description-list** for summary panels
- **bento-box-panel** for category landing grids

## Search UI

Wrap filter fields in **search-form** for toolbar or list-header search:

```twig
<twig:SearchForm>
    <twig:Input name="q" type="search" placeholder="Filter items…" />
</twig:SearchForm>
```

## Pitfalls

- Require **core** and **form** before extended — compounds reference core region components and form field roles.
- Overlay interactions (`stl`) and LiveComponents (`live`) ship in separate packages — do not expect Stimulus controllers in this tier.
- Link to [Troubleshooting](troubleshooting.md) when AssetMapper or missing CSS tokens block rendering.
