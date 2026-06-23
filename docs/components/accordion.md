# accordion

**Role:** `accordion`  
**Fragment id:** `blocks.accordion`  
**Twig:** `Accordion`

Multi-item disclosure stack — compose native `<details>` / `<summary>` items inside the slot (see workshop compound compound).

## Open mode

| Prop | Default | Values | Behavior |
|------|---------|--------|----------|
| `type` | `single` | `single`, `multiple` | **single:** at most one panel open (Stimulus + `<details name>` grouping). **multiple:** independent panels. |

```twig
{# Default — single open; flush stacked items (Bootstrap-style) #}
<twig:Accordion>
    <details><summary>One</summary><p>…</p></details>
    <details><summary>Two</summary><p>…</p></details>
</twig:Accordion>

{# FAQ-style — several sections may stay open #}
<twig:Accordion :type="'multiple'">
    …
</twig:Accordion>
```

Distinct from `collapsible` (one trigger + one panel) on the **interactive** tier — see `symfinity/ux-blocks-interactive`.
