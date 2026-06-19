<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ResolvesContainerStyle;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('BentoBoxPanel', template: '@UxBlocksExtended/components/BentoBoxPanel.html.twig')]
final class BentoBoxPanel
{
    use ResolvesContainerStyle;

    /**
     * @var list<array{
     *     heading: string,
     *     items: list<array{
     *         label: string,
     *         href: string,
     *         children?: list<array{label: string, href: string}>
     *     }>,
     *     column: int,
     *     icon?: string|null,
     *     size?: string,
     *     layout?: string,
     *     categoryHref?: string|null
     * }>
     */
    public array $boxes = [];

    public string $density = 'comfortable';

    public function mount(): void
    {
        $this->density = $this->normalizeDensity($this->density);
    }

    #[ExposeInTemplate('panel_has_drill_items')]
    public function hasDrillItems(): bool
    {
        foreach ($this->boxes as $box) {
            foreach ($box['items'] ?? [] as $item) {
                if (!empty($item['children'])) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Boxes grouped by column (1–4), preserving source order within each column.
     *
     * @return array<int, list<array<string, mixed>>>
     */
    #[ExposeInTemplate('boxes_by_column')]
    public function boxesByColumn(): array
    {
        /** @var array<int, list<array<string, mixed>>> $grouped */
        $grouped = [];

        foreach ($this->boxes as $box) {
            $column = max(1, min(4, (int) ($box['column'] ?? 1)));
            $grouped[$column][] = $box;
        }

        ksort($grouped);

        return $grouped;
    }

    /** Max boxes stacked in any column — drives shared panel row tracks (subgrid). */
    #[ExposeInTemplate('panel_row_count')]
    public function panelRowCount(): int
    {
        $max = 0;

        foreach ($this->boxesByColumn() as $columnBoxes) {
            $max = max($max, count($columnBoxes));
        }

        return max(1, $max);
    }
}
