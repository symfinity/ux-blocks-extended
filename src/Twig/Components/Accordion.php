<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Accordion', template: '@UxBlocksExtended/components/Accordion.html.twig')]
final class Accordion
{
    /** @var 'single'|'multiple'|string */
    public string $type = 'single';

    private string $groupName = '';

    public function mount(): void
    {
        if ('' === $this->groupName) {
            $this->groupName = 'accordion-' . bin2hex(random_bytes(4));
        }
    }

    /** @return 'single'|'multiple' */
    #[ExposeInTemplate('accordion_type')]
    public function resolvedType(): string
    {
        return \in_array($this->type, ['single', 'multiple'], true) ? $this->type : 'single';
    }

    #[ExposeInTemplate('accordion_is_single')]
    public function isSingle(): bool
    {
        return 'single' === $this->resolvedType();
    }

    #[ExposeInTemplate('accordion_group_name')]
    public function groupName(): string
    {
        return $this->groupName;
    }
}
