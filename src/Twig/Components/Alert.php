<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksCore\Twig\ExposesSemanticVariant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Alert', template: '@UxBlocksExtended/components/Alert.html.twig')]
final class Alert
{
    use ExposesSemanticVariant;

    public string $variant = 'info';

    public bool $dismissible = false;
}
