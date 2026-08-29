<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Table:Body', template: '@UxBlocksExtended/components/_shared/tbody_slot.html.twig')]
final class TableBody
{
}
