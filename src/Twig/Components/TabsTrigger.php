<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Tabs:Trigger', template: '@UxBlocksExtended/components/Tabs/Trigger.html.twig')]
final class TabsTrigger
{
    public string $value = '';

    public bool $disabled = false;

    /** Matches Tabs defaultValue for SSR active styling before Stimulus connects. */
    public bool $active = false;

    /** When set, renders a navigation tab (link) instead of a panel switcher. */
    public string $href = '';
}
