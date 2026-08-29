<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfinity\UxBlocksCore\Twig\NormalizesSemanticColourVariant;
use Symfinity\UxBlocksCore\Twig\ResolvesIconWatermark;
use Symfinity\UxBlocksCore\Twig\ResolvesSurfaceSubstrate;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Alert', template: '@UxBlocksExtended/components/Alert.html.twig')]
final class Alert
{
    use ExposesSemanticVariant;
    use NormalizesSemanticColourVariant;
    use ResolvesIconWatermark;
    use ResolvesSurfaceSubstrate;

    public string $variant = 'info';

    public function mount(): void
    {
        $this->mountSurfaceSubstrate();
    }

    public bool $dismissible = false;

    public ?string $icon = null;

    private bool $iconDecorative = true;

    public ?string $title = null;

    #[ExposeInTemplate('iconDecorative')]
    public function isIconDecorative(): bool
    {
        return $this->iconDecorative;
    }

    #[ExposeInTemplate('resolved_alert_icon')]
    public function resolvedAlertIcon(): ?string
    {
        if (null !== $this->icon) {
            return '' === $this->icon ? null : $this->icon;
        }

        return match ($this->variant) {
            'success' => 'lucide:circle-check',
            'danger' => 'lucide:circle-x',
            'warning' => 'lucide:triangle-alert',
            'info' => 'lucide:info',
            default => null,
        };
    }

    #[ExposeInTemplate('resolved_icon_watermark')]
    public function resolvedIconWatermark(): ?string
    {
        return $this->resolveIconWatermark();
    }

    #[ExposeInTemplate('resolved_watermark_position')]
    public function resolvedWatermarkPosition(): string
    {
        return $this->resolveWatermarkPosition('top-start');
    }
}
