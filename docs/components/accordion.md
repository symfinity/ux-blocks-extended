# accordion

**Role:** `accordion`  
**Fragment id:** `blocks.accordion`  
**Twig:** `Accordion`

Multi-item disclosure stack — compose native `<details>` / `<summary>` items inside the slot (see chameleon showcase compound).

## Open mode

| Prop | Default | Values | Behavior |
|------|---------|--------|----------|
| `type` | `single` | `single`, `multiple` | **single:** at most one panel open (Stimulus + `<details name>` grouping). **multiple:** independent panels. |

```twig
{# Default — single open #}
<twig:Accordion>
    <div data-ui-role="stack" data-ui-gap="sm">
        <details><summary>One</summary><p>…</p></details>
        <details><summary>Two</summary><p>…</p></details>
    </div>
</twig:Accordion>

{# FAQ-style — several sections may stay open #}
<twig:Accordion :type="'multiple'">
    …
</twig:Accordion>
```

Distinct from `collapsible` (one trigger + one panel). See [collapsible.md](./collapsible.md).
