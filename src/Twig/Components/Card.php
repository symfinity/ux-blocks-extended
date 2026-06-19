<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesContainerStyle;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Card', template: '@UxBlocksExtended/components/Card.html.twig')]
final class Card
{
    use ResolvesContainerStyle;

    public string $size = 'default';

    public string $density = 'comfortable';

    public string $themeVariant = 'default';

    public function mount(): void
    {
        $this->density = $this->normalizeDensity($this->density);
        $this->themeVariant = $this->normalizeThemeVariant($this->themeVariant);
    }
}
