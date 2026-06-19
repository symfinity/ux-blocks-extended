<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Empty:Description', template: '@UxBlocksExtended/components/EmptyDescription.html.twig')]
final class EmptyDescription
{
}
