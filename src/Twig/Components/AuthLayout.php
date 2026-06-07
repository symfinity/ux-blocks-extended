<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AuthLayout', template: '@UxBlocksExtended/components/AuthLayout.html.twig')]
final class AuthLayout
{
}