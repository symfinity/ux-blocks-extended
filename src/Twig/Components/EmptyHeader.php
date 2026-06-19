<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Empty:Header', template: '@UxBlocksExtended/components/EmptyHeader.html.twig')]
final class EmptyHeader
{
}
