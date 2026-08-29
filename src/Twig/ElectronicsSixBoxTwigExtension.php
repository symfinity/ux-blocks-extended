<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig;

use Symfinity\UxBlocksExtended\Fixture\ElectronicsSixBoxFixture;
use Twig\Attribute\AsTwigFunction;

final class ElectronicsSixBoxTwigExtension
{
    /**
     * @return list<array<string, mixed>>
     */
    #[AsTwigFunction('electronics_six_box_fixture')]
    public function boxes(bool $withDrillDown = false): array
    {
        return ElectronicsSixBoxFixture::boxes($withDrillDown);
    }
}
