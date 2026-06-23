<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesSurfaceSubstrate;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('Dialog', template: '@UxBlocksExtended/components/Dialog.html.twig')]
final class Dialog
{
    use ResolvesSurfaceSubstrate;

    public bool $open = false;

    public ?string $label = null;

    public ?string $labelledBy = null;

    public ?string $dialogId = null;

    private string $generatedTitleId = '';

    private string $generatedDialogId = '';

    public function mount(): void
    {
        $this->mountSurfaceSubstrate();

        if ($this->generatedTitleId === '') {
            $this->generatedTitleId = 'dialog-title-' . bin2hex(random_bytes(4));
        }

        if ($this->generatedDialogId === '') {
            $this->generatedDialogId = null !== $this->dialogId && '' !== $this->dialogId
                ? $this->dialogId
                : 'dialog-' . bin2hex(random_bytes(4));
        }
    }

    #[ExposeInTemplate('dialog_id')]
    public function id(): string
    {
        return $this->generatedDialogId;
    }

    #[ExposeInTemplate('dialog_title_id')]
    public function titleId(): string
    {
        return $this->generatedTitleId;
    }
}
