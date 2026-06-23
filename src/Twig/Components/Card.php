<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ModifierNormalizer;
use Symfinity\UxBlocksCore\Twig\ResolvesContainerStyle;
use Symfinity\UxBlocksCore\Twig\ResolvesIconWatermark;
use Symfinity\UxBlocksCore\Twig\ResolvesSurfaceSubstrate;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Card', template: '@UxBlocksExtended/components/Card.html.twig')]
final class Card
{
    use ResolvesContainerStyle;
    use ResolvesIconWatermark;
    use ResolvesSurfaceSubstrate;

    public string $size = 'md';

    public string $density = 'comfortable';

    /**
     * Emphasis tone (default|muted|emphasis) — replaces legacy `themeVariant` (108 FR-010).
     */
    public string $tone = 'default';

    public ?string $title = null;

    public ?string $description = null;

    public function mount(): void
    {
        $this->mountSurfaceSubstrate();
        $this->size = ModifierNormalizer::canonicalSize($this->size);
        $this->density = $this->normalizeDensity($this->density);
        $this->tone = $this->normalizeThemeVariant($this->tone);
    }

    #[ExposeInTemplate('resolved_icon_watermark')]
    public function resolvedIconWatermark(): ?string
    {
        return $this->resolveIconWatermark();
    }

    #[ExposeInTemplate('resolved_watermark_position')]
    public function resolvedWatermarkPosition(): string
    {
        return $this->resolveWatermarkPosition('bottom-end');
    }
}
