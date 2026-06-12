# popover

**Role:** `popover`  
**Fragment id:** `blocks.ext.popover`  
**Twig:** `Popover`

Panel-only component using the [Popover API](https://developer.mozilla.org/en-US/docs/Web/API/Popover_API). Pair with a **sibling** trigger: `<button id="…" popovertarget="{popoverId}">` + `<twig:Popover popoverId="{popoverId}" anchorTarget="…">` body slot. Set `anchorTarget` to the trigger element id so the panel positions beside the control (Stimulus fallback when CSS anchor is unavailable). Optional `open` opens the panel for demos. Set `label` for `aria-label` when no visible title.
