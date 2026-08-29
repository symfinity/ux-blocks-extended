<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesContainerStyle;
use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Stat', template: '@UxBlocksExtended/components/Stat.html.twig')]
final class Stat
{
    use ResolvesContainerStyle;
    use ResolvesExplicitIcon;

    /** Ignored — locked end. */
    public string $iconPosition = 'start';

    public string $density = 'comfortable';

    public function mount(): void
    {
        $this->density = $this->normalizeDensity($this->density);
    }

    #[ExposeInTemplate('resolved_stat_icon')]
    public function resolvedStatIcon(): ?string
    {
        return $this->resolveExplicitIcon();
    }
}
