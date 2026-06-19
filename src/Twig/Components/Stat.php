<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Stat', template: '@UxBlocksExtended/components/Stat.html.twig')]
final class Stat
{
    use ResolvesExplicitIcon;

    /** Ignored — locked end. */
    public string $iconPosition = 'start';

    #[ExposeInTemplate('resolved_stat_icon')]
    public function resolvedStatIcon(): ?string
    {
        return $this->resolveExplicitIcon();
    }
}
