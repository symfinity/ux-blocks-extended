# tooltip

**Role:** `tooltip`  
**Fragment id:** `blocks.ext.tooltip`  
**Twig:** `Tooltip`

Wrap a focusable trigger in the `content` slot; pass hint copy via `label` (`aria-describedby` + `.ui-tooltip-content`). Hint visibility is CSS-driven (`:hover` / `:focus-within`); optional Stimulus controller upgrades placement to `position: fixed` inside clipped hosts. Package CSS owns `.ui-tooltip-content` surface rules.
