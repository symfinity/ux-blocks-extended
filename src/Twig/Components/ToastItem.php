<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Toast:Item', template: '@UxBlocksExtended/components/Toast/Item.html.twig')]
final class ToastItem
{
}
