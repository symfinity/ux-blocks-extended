<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Dialog', template: '@UxBlocksExtended/components/Dialog.html.twig')]
final class Dialog
{
    public bool $open = false;

    public ?string $label = null;

    public ?string $labelledBy = null;

    private string $generatedTitleId = '';

    public function mount(): void
    {
        if ($this->generatedTitleId === '') {
            $this->generatedTitleId = 'dialog-title-' . bin2hex(random_bytes(4));
        }
    }

    #[ExposeInTemplate('dialog_title_id')]
    public function titleId(): string
    {
        return $this->generatedTitleId;
    }
}
