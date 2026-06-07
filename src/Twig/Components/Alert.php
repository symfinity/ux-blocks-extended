<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Alert', template: '@UxBlocksExtended/components/Alert.html.twig')]
final class Alert
{
    public string $variant = 'info';
}
