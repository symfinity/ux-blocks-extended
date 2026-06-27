# SearchForm

Search field in a form shell.

## When to use

Search field in a form shell. Use **SearchForm** when this pattern fits the screen — variant previews are below.

## Guidelines

**Do**

- Group related fields in Fieldset or Field compounds.
- Align FormActions with reading direction (end for LTR submit).

**Don't**

- Nest forms inside forms.
- Split one logical field across multiple unlabeled inputs.

## Usage

```twig
<twig:SearchForm action="/search" method="get">…</twig:SearchForm>
```


## API Reference

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| — | — | — | See Twig component class and package registry. |

## Accessibility

- Fieldset legends describe the group purpose.
- Surface validation summary for multi-field errors.

## Related

- [Input](https://docs.symfinity.dev/ux-blocks-form/components/input)
