<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

/** PHP reserved word: class name EmptyState; Twig component remains {@see Empty}. */
#[AsTwigComponent('Empty', template: '@UxBlocksExtended/components/Empty.html.twig')]
final class EmptyState
{
    /** Container chrome: {@code outline} (dashed), {@code soft} (muted fill), {@code plain} (minimal). */
    public string $appearance = 'outline';

    public ?string $title = null;

    public ?string $description = null;

    public function mount(): void
    {
        $this->appearance = match ($this->appearance) {
            'outline', 'soft', 'plain' => $this->appearance,
            default => 'outline',
        };
    }
}
