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
        $entry = $this->packageDir . '/assets/styles/blocks-extended.css';
        if (!is_readable($entry)) {
            return $this->wrapTierCss($this->readRoleFile('roles/_bundle.css'));
        }

        $content = (string) file_get_contents($entry);
        if (!preg_match_all("/@import\\s+url\\('([^']+)'\\)\\s*;/", $content, $matches)) {
            return $this->wrapTierCss($this->readRoleFile('roles/_bundle.css'));
        }

        $css = '';
        foreach ($matches[1] as $importPath) {
            $css .= $this->readRoleFile($importPath);
            if ('' !== $css && !str_ends_with($css, "\n")) {
                $css .= "\n";
            }
        }

        return $this->wrapTierCss($css);
    }

    private function wrapTierCss(string $css): string
    {
        return TierCascadeLayerWrap::wrap(TierCascadeLayerWrap::BLOCKS_EXTENDED, $css);
    }

    private function readRoleFile(string $relativeToStylesDir): string
    {
        $path = $this->packageDir . '/assets/styles/' . $relativeToStylesDir;
        if (!is_readable($path)) {
            return '';
        }

        return (string) file_get_contents($path);
    }
}
