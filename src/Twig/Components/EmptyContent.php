<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Empty:Content', template: '@UxBlocksExtended/components/EmptyContent.html.twig')]
final class EmptyContent
{
}
