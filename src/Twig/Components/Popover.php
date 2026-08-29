<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesSurfaceSubstrate;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Popover', template: '@UxBlocksExtended/components/Popover.html.twig')]
final class Popover
{
    use ResolvesSurfaceSubstrate;

    public bool $open = false;

    public ?string $label = null;

    public ?string $popoverId = null;

    public ?string $anchorTarget = null;

    private string $generatedPopoverId = '';

    public function mount(): void
    {
        $this->mountSurfaceSubstrate();
    }

    #[ExposeInTemplate('popover_id')]
    public function popoverId(): string
    {
        if ($this->generatedPopoverId === '') {
            $this->generatedPopoverId = null !== $this->popoverId && '' !== $this->popoverId
                ? $this->popoverId
                : 'popover-' . bin2hex(random_bytes(4));
        }

        return $this->generatedPopoverId;
    }
}
