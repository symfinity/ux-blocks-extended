<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

/** PHP reserved word: class name EmptyState; Twig component remains {@see Empty}. */
#[AsTwigComponent('Empty:Media', template: '@UxBlocksExtended/components/EmptyMedia.html.twig')]
final class EmptyMedia
{
    use ResolvesExplicitIcon;

    /** Ignored — locked center on media well. */
    public string $iconPosition = 'start';

    #[ExposeInTemplate('resolved_media_icon')]
    public function resolvedMediaIcon(): ?string
    {
        return $this->resolveExplicitIcon();
    }
}
