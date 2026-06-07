<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Card:Footer', template: '@UxBlocksExtended/components/_shared/footer_slot.html.twig')]
final class CardFooter
{
}
