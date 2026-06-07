<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Popover', template: '@UxBlocksExtended/components/Popover.html.twig')]
final class Popover
{
    public bool $open = false;

    public ?string $label = null;

    private string $generatedPopoverId = '';

    public function mount(): void
    {
        if ($this->generatedPopoverId === '') {
            $this->generatedPopoverId = 'popover-' . bin2hex(random_bytes(4));
        }
    }

    #[ExposeInTemplate('popover_id')]
    public function popoverId(): string
    {
        return $this->generatedPopoverId;
    }
}
