# bento-box-panel

**Role:** `bento-box-panel`  
**Fragment id:** `blocks.ext.bento-box-panel`  
**Interaction:** `nat` (extended compound)

Four-column **category box** grid: icon, heading, and vertical link list per box. Usable standalone in app shell, docs, or admin — no marketing package required.

## Props

| Prop | Type | Default | Notes |
|------|------|---------|-------|
| `boxes` | list | `[]` | Category boxes; omitted root when empty |

### CategoryBox

| Field | Type | Default | Notes |
|-------|------|---------|-------|
| `heading` | string | — | required |
| `items` | `{label, href, children?}[]` | — | required |
| `icon` | string | — | optional (**088**) |
| `column` | int 1–4 | — | required |
| `size` | `small` \| `medium` \| `large` | `medium` | row span in column grid |
| `layout` | `vertical` \| `horizontal` | `vertical` | `horizontal` only when `size: medium` |
| `categoryHref` | string | — | whole-box category landing (icon + heading) |

## Standalone

```twig
<twig:BentoBoxPanel :boxes="categoryBoxes" />
```

## Interactive (drill-down)

Use `BentoBoxPanelInteractive` from `symfinity/ux-blocks-interactive` when items have `children[]`:

```twig
<twig:BentoBoxPanelInteractive :boxes="navWithChildren" />
```

Composer: `symfinity/ux-blocks-extended` + `symfinity/ux-blocks-interactive`.

## Anti-patterns

| MUST NOT | Reason |
|----------|--------|
| `DropdownMenu` mega-menu as catalog SSOT | Rejected 2026-06-17 — use in-page `BentoBoxPanelInteractive` |
| `layout: horizontal` on `small` / `large` | Coerced to `vertical` in v0 |
| Stimulus on extended package for drill-down | **057** four-tier boundary |
| Wrap item list inside `categoryHref` anchor | Nested anchors — heading area only |
