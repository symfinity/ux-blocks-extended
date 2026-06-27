# Accordion

Expand/collapse panels for FAQs, settings groups, and progressive disclosure.

## When to use

Stack related content that most users can skim collapsed. Prefer [Card](card.md) when all content should stay visible without interaction.

## Guidelines

**Do**

- Use `type="single"` when only one panel should be open (FAQ pattern).
- Use `type="multiple"` when users compare sections side by side.
- Put panel titles in `<summary>` with the `ux-accordion-label` class for consistent typography.

**Don't**

- Hide essential instructions only inside collapsed panels.
- Nest accordions more than one level deep without clear headings.

## Usage

```twig
<twig:Accordion type="single">
    <details open name="billing-faq">
        <summary><span class="ux-accordion-label">What is included?</span></summary>
        <p>Plans include shared themes and component tiers.</p>
    </details>
</twig:Accordion>
```

Markup follows [Bootstrap accordion](https://getbootstrap.com/docs/5.3/components/accordion/) semantics (`details` / `summary`) with kernel tokens.

## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | `string` | `primary` | Semantic colour accent |
| `type` | `string` | `single` | `single` (one open) or `multiple` |

Content slot: one or more `<details>` elements sharing a `name` when `type="single"`.

## Accessibility

- Each `<summary>` must describe the panel content.
- Expanded/collapsed state is exposed via native `details` semantics.
- Do not remove keyboard focus styles from summaries.

## Related

- [Card](card.md) · [Dialog](dialog.md)
