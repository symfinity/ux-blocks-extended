<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('InputOtp', template: '@UxBlocksExtended/components/InputOtp.html.twig')]
final class InputOtp
{
    public int $length = 6;

}
