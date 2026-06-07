<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Alert:Title', template: '@UxBlocksExtended/components/_shared/strong_slot.html.twig')]
final class AlertTitle
{
}
