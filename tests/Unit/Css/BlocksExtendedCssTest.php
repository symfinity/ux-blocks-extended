<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksExtended\Css\BlocksExtendedCssProvider;
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
        $provider = new BlocksExtendedCssProvider(dirname(__DIR__, 3));
        $css = $provider->stylesheet();

        foreach (ExtendedRoleCatalog::roles() as $role) {
            self::assertStringContainsString('[data-ui-role="' . $role . '"]', $css, $role);
        }
    }

    #[Test]
    public function bundleIncludesShippedExtendedSubRoles(): void
    {
        $css = self::bundleCss();

        foreach ([
            'field-group',
            'alert-dialog-trigger', 'data-table-chrome-toolbar', 'filter-chip',
        ] as $role) {
            self::assertStringContainsString('[data-ui-role="' . $role . '"]', $css, $role);
        }

        // 107: alert-dialog-content surface is single-path in roles/dialog.css
        // (grouped with modal/dialog overlay chrome), not the residual aggregate.
        $full = (new BlocksExtendedCssProvider(dirname(__DIR__, 3)))->stylesheet();
        self::assertStringContainsString('[data-ui-role="alert-dialog-content"]', $full);
    }

    #[Test]
    public function accordionUsesFlushBootstrapStylePanelRules(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="accordion"] summary::after', $css);
        self::assertStringContainsString('[data-ui-role="accordion"] summary::-webkit-details-marker', $css);
        self::assertStringContainsString('details[open] > summary::after', $css);
        self::assertStringContainsString('details[open] > summary', $css);
        self::assertStringContainsString('color-mix(in srgb, var(--ux-accordion-accent)', $css);
        self::assertStringContainsString('--ux-accordion-border-color: var(--ui-color-border)', $css);
        self::assertStringContainsString('border-color: var(--ux-accordion-border-color)', $css);
        self::assertStringContainsString('details:not([open]) > summary', $css);
        self::assertStringContainsString('color: var(--ui-color-text-muted)', $css);
        self::assertStringContainsString('[data-ui-role="accordion"] > [data-ui-role="stack"]', $css);
    }

    #[Test]
    public function bundleIncludesDemotedEmptyCompoundRole(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="empty"]', $css);
        self::assertStringContainsString('[data-ui-role="empty-media"]', $css);
    }

    #[Test]
    public function bundleDoesNotOwnPromotedFoundationLayoutRoles(): void
    {
        $css = self::bundleCss();

        foreach (['grid', 'stack', 'list', 'breadcrumb', 'pagination', 'grid-cell'] as $role) {
            self::assertDoesNotMatchRegularExpression(
                '/^\[data-ui-role="' . preg_quote($role, '/') . '"\]/m',
                $css,
                $role,
            );
        }
    }

    #[Test]
    public function alertDismissibleCloseUsesBootstrapStyleDismissControl(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="alert"]:has([data-ui-role="alert-dismiss"])', $css);
        self::assertStringContainsString('[data-ui-role="alert-dismiss"]', $css);
        self::assertStringContainsString('[data-ui-role="alert-dismiss"]::before', $css);
    }

    #[Test]
    public function overlayRulesCoverDialogPopoverAndTooltip(): void
    {
        $provider = new BlocksExtendedCssProvider(dirname(__DIR__, 3));
        $css = $provider->stylesheet();

        self::assertStringContainsString('[data-ui-role="dialog"]', $css);
        self::assertStringContainsString('z-index: var(--ui-z-modal)', $css);
        self::assertStringContainsString('@starting-style', $css);
        self::assertStringContainsString('[data-ui-role="popover"]', $css);
        self::assertStringContainsString('[data-ui-role="popover"][anchor]:popover-open', $css);
        self::assertStringContainsString('[data-ui-role="tooltip"] .ui-tooltip-content', $css);
        self::assertStringContainsString('z-index: var(--ui-z-tooltip)', $css);
    }
}
