<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Css;

final class BlocksExtendedCssProvider
{
    public function __construct(
        private readonly string $packageDir,
    ) {
    }

    public function assetPath(): string
    {
        return 'ux-blocks-extended/styles/blocks-extended.css';
    }

    public function stylesheet(): string
    {
        $bundle = $this->packageDir . '/assets/styles/roles/_bundle.css';
        if (!is_readable($bundle)) {
            return '';
        }

        return (string) file_get_contents($bundle);
    }
}
