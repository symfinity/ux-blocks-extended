<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Alert', template: '@UxBlocksExtended/components/Alert.html.twig')]
final class Alert
{
    use ExposesSemanticVariant;

    public string $variant = 'info';

    public bool $dismissible = false;

    public ?string $icon = null;

    public bool $iconDecorative = true;

    #[ExposeInTemplate('resolved_alert_icon')]
    public function resolvedAlertIcon(): ?string
    {
        if (null !== $this->icon) {
            return '' === $this->icon ? null : $this->icon;
        }

        return match ($this->variant) {
            'success' => 'lucide:circle-check',
            'error', 'destructive' => 'lucide:circle-x',
            'warning' => 'lucide:triangle-alert',
            'info' => 'lucide:info',
            default => null,
        };
    }
}
