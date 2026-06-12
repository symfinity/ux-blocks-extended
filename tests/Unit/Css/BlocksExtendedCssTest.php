<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocks\Registry\ExtendedRoleCatalog;

final class BlocksExtendedCssTest extends TestCase
{
    private static function bundleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/_bundle.css';
        self::assertFileExists($path);

        return (string) file_get_contents($path);
    }

    #[Test]
    public function bundleIncludesShippedExtendedRootRoles(): void
    {
        $css = self::bundleCss();

        foreach (ExtendedRoleCatalog::roles() as $role) {
            self::assertStringContainsString('[data-ui-role="' . $role . '"]', $css, $role);
        }
    }

    #[Test]
    public function bundleIncludesShippedExtendedSubRoles(): void
    {
        $css = self::bundleCss();

        foreach ([
            'field-group', 'grid-cell', 'list-item', 'list-item-title', 'list-item-description',
            'alert-dialog-trigger', 'alert-dialog-content', 'data-table-chrome-toolbar', 'filter-chip',
        ] as $role) {
            self::assertStringContainsString('[data-ui-role="' . $role . '"]', $css, $role);
        }
    }

    #[Test]
    public function accordionUsesFlushBootstrapStylePanelRules(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="accordion"] summary::after', $css);
        self::assertStringContainsString('[data-ui-role="accordion"] summary::-webkit-details-marker', $css);
        self::assertStringContainsString('details[open] > summary::after', $css);
        self::assertStringContainsString('details[open] > summary', $css);
        self::assertStringContainsString('color-mix(in srgb, var(--ui-accordion-accent)', $css);
        self::assertStringContainsString('--ui-accordion-border-color: var(--ui-color-border)', $css);
        self::assertStringContainsString('border-color: var(--ui-accordion-border-color)', $css);
        self::assertStringContainsString('details:not([open]) > summary', $css);
        self::assertStringContainsString('color: var(--ui-accordion-border-color)', $css);
        self::assertStringContainsString('[data-ui-role="accordion"] > [data-ui-role="stack"]', $css);
    }

    #[Test]
    public function layoutGridAndStackRulesArePresent(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="grid"]', $css);
        self::assertStringContainsString('[data-ui-role="stack"]', $css);
    }

    #[Test]
    public function overlayRulesCoverDialogPopoverAndTooltip(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="dialog"]', $css);
        self::assertStringContainsString('z-index: var(--ui-z-modal)', $css);
        self::assertStringContainsString('[data-ui-role="popover"]', $css);
        self::assertStringContainsString('[data-ui-role="popover"][anchor]:popover-open', $css);
        self::assertStringContainsString('[data-ui-role="tooltip"] .ui-tooltip-content', $css);
        self::assertStringContainsString('z-index: var(--ui-z-tooltip)', $css);
    }
}
