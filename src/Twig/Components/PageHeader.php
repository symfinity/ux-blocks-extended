<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('PageHeader', template: '@UxBlocksExtended/components/PageHeader.html.twig')]
final class PageHeader
{
    public ?string $title = null;

    public ?string $description = null;
}
