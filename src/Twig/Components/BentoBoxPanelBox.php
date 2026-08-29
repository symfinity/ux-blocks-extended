<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesExplicitIcon;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('BentoBoxPanel:Box', template: '@UxBlocksExtended/components/BentoBoxPanel/Box.html.twig')]
final class BentoBoxPanelBox
{
    use ResolvesExplicitIcon;

    public string $heading = '';

    /**
     * @var list<array{
     *     label: string,
     *     href: string,
     *     children?: list<array{label: string, href: string}>
     * }>
     */
    public array $items = [];

    public int $column = 1;

    public int $row = 1;

    public string $size = 'medium';

    public string $layout = 'vertical';

    public ?string $categoryHref = null;

    public function mount(): void
    {
        $this->size = $this->normalizeSize($this->size);
        $this->layout = $this->normalizeLayout($this->size, $this->layout);
        $this->column = max(1, min(4, $this->column));
        $this->row = max(1, min(4, $this->row));
    }

    #[ExposeInTemplate('resolved_box_icon')]
    public function resolvedBoxIcon(): ?string
    {
        return $this->resolveExplicitIcon();
    }

    #[ExposeInTemplate('resolved_size')]
    public function resolvedSize(): string
    {
        return $this->normalizeSize($this->size);
    }

    #[ExposeInTemplate('resolved_layout')]
    public function resolvedLayout(): string
    {
        return $this->normalizeLayout($this->resolvedSize(), $this->layout);
    }

    #[ExposeInTemplate('has_category_link')]
    public function hasCategoryLink(): bool
    {
        return null !== $this->categoryHref && '' !== $this->categoryHref;
    }

    private function normalizeSize(string $size): string
    {
        return \in_array($size, ['small', 'medium', 'large'], true) ? $size : 'medium';
    }

    private function normalizeLayout(string $size, string $layout): string
    {
        if ('horizontal' === $layout && 'medium' === $size) {
            return 'horizontal';
        }

        return 'vertical';
    }
}
