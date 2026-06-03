<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Tabs:Content', template: '@UxBlocksExtended/components/Tabs/Content.html.twig')]
final class TabsContent
{
    public string $value = '';
}
