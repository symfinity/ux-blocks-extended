<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesContainerStyle;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AppShell', template: '@UxBlocksExtended/components/AppShell.html.twig')]
final class AppShell
{
    use ResolvesContainerStyle;

    public string $variant = 'default';

    public string $density = 'comfortable';

    /** Sidebar visibility (composition state flag `open`). */
    public bool $open = true;

    public function mount(): void
    {
        $this->density = $this->normalizeDensity($this->density);
        $this->variant = match ($this->variant) {
            'default', 'compact', 'spacious' => $this->variant,
            default => 'default',
        };
    }
}
