<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AlertDialog:Description', template: '@UxBlocksExtended/components/AlertDialog/Description.html.twig')]
final class AlertDialogDescription
{
}
