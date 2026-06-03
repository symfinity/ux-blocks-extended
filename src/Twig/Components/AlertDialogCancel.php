<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('AlertDialog:Cancel', template: '@UxBlocksExtended/components/AlertDialog/Cancel.html.twig')]
final class AlertDialogCancel
{
}
