<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Stack', template: '@UxBlocksExtended/components/Stack.html.twig')]
final class Stack
{
    public string $direction = 'vertical';

    public string $gap = 'md';
}
