<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Table:Cell', template: '@UxBlocksExtended/components/_shared/td_slot.html.twig')]
final class TableCell
{
}
