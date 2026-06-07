<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Pagination', template: '@UxBlocksExtended/components/Pagination.html.twig')]
final class Pagination
{
}