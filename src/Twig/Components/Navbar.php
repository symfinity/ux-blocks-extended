<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Navbar', template: '@UxBlocksExtended/components/Navbar.html.twig')]
final class Navbar
{
    use ResolvesExplicitIcon;

    /** Ignored — brand icon locked start. */
    public string $iconPosition = 'end';

    #[ExposeInTemplate('resolved_brand_icon')]
    public function resolvedBrandIcon(): ?string
    {
        return $this->resolveExplicitIcon();
    }
}
