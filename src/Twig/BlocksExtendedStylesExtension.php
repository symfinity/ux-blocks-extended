<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig;

use Symfinity\UxBlocksExtended\Css\BlocksExtendedCssProvider;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class BlocksExtendedStylesExtension extends AbstractExtension
{
    public function __construct(
        private readonly BlocksExtendedCssProvider $cssProvider,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('ux_blocks_extended_stylesheet', $this->cssProvider->stylesheet(...), ['is_safe' => ['html']]),
        ];
    }
}
