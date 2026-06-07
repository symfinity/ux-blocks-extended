<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Field:Error', template: '@UxBlocksExtended/components/_shared/p_alert_slot.html.twig')]
final class FieldError
{
}
