<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AlertDialog:Title', template: '@UxBlocksExtended/components/AlertDialog/Title.html.twig')]
final class AlertDialogTitle
{
}
