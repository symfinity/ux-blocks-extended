<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Tooltip', template: '@UxBlocksExtended/components/Tooltip.html.twig')]
final class Tooltip
{
    public string $label = '';

    /** Alias used by showcase manifests (`content` prop). */
    public string $content = '';

    private string $generatedTooltipId = '';

    #[ExposeInTemplate('tooltip_text')]
    public function text(): string
    {
        return $this->content !== '' ? $this->content : $this->label;
    }

    public function mount(): void
    {
        if ($this->generatedTooltipId === '') {
            $this->generatedTooltipId = 'tooltip-' . bin2hex(random_bytes(4));
        }
    }

    #[ExposeInTemplate('tooltip_id')]
    public function tooltipId(): string
    {
        return $this->generatedTooltipId;
    }
}
