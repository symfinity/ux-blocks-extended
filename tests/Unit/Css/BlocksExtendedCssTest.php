<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksExtended\Css\BlocksExtendedCssProvider;
use Symfinity\UxBlocks\Registry\ExtendedRoleCatalog;
use Symfinity\UxBlocksExtended\Tests\Support\CssTestSupport;

final class BlocksExtendedCssTest extends TestCase
{
    private static function bundleCss(): string
    {
        $path = dirname(__DIR__, 3) . '/assets/styles/roles/_bundle.css';
        self::assertFileExists($path);

        return CssTestSupport::normalizeSelectors((string) file_get_contents($path));
    }

    #[Test]
    public function bundleIncludesShippedExtendedRootRoles(): void
    {
        $provider = new BlocksExtendedCssProvider(dirname(__DIR__, 3));
        $css = CssTestSupport::normalizeSelectors($provider->stylesheet());

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
        $full = CssTestSupport::normalizeSelectors((new BlocksExtendedCssProvider(dirname(__DIR__, 3)))->stylesheet());
        self::assertStringContainsString('[data-ui-role="alert-dialog-content"]', $full);
    }

    #[Test]
    public function accordionUsesFlushBootstrapStylePanelRules(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('[data-ui-role="accordion"] summary::-webkit-details-marker', $css);
        self::assertStringContainsString('--ux-accordion-border-color: var(--ui-color-border)', $css);
        self::assertStringContainsString('border-color: var(--ux-accordion-border-color)', $css);
        self::assertStringContainsString('[data-ui-role="accordion"] > [data-ui-role="stack"]', $css);
    }

    #[Test]
    public function accordionUsesBootstrapStyleGridCollapse(): void
    {
        $css = CssTestSupport::normalizeSelectors((new BlocksExtendedCssProvider(dirname(__DIR__, 3)))->stylesheet());

        self::assertStringContainsString('--ux-accordion-collapse-duration: 0.35s', $css);
        self::assertStringContainsString('grid-template-rows: auto 0fr', $css);
        self::assertStringContainsString('grid-template-rows: auto 1fr', $css);
        self::assertStringContainsString('grid-template-rows var(--ux-accordion-collapse-duration) ease', $css);
        self::assertStringContainsString('.ux-accordion-chevron svg', $css);
        self::assertStringContainsString('transform: rotate(180deg)', $css);
        self::assertStringContainsString('.ux-accordion-label', $css);
        self::assertStringContainsString('color: inherit', $css);
        self::assertStringContainsString('box-shadow: inset', $css);
        self::assertStringContainsString('[data-ui-role="accordion"] details > p', $css);
        self::assertStringContainsString('padding: 1rem', $css);
        self::assertStringContainsString('[data-ui-role="accordion"] summary', $css);
        self::assertStringContainsString('margin: 0', $css);
        self::assertStringContainsString('width: 100%', $css);
        self::assertStringContainsString('box-sizing: border-box', $css);
        self::assertStringContainsString('prefers-reduced-motion: reduce', $css);
        self::assertStringNotContainsString('ux-accordion-panel-enter', $css);
        self::assertStringNotContainsString('ux-accordion-summary-idle', $css);
        self::assertStringNotContainsString('@keyframes ux-accordion-slide-in', $css);
    }

    #[Test]
    public function bundleIncludesEmptyRegionLayoutCss(): void
    {
        $css = CssTestSupport::normalizeSelectors((new BlocksExtendedCssProvider(dirname(__DIR__, 3)))->stylesheet());

        self::assertStringContainsString('[data-ui-role="empty"]', $css);
        self::assertStringContainsString('[data-ui-part="media"]', $css);
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
        $css = CssTestSupport::normalizeSelectors($provider->stylesheet());

        self::assertStringContainsString('[data-ui-role="dialog"]', $css);
        self::assertStringContainsString('z-index: var(--ui-z-modal)', $css);
        self::assertStringContainsString('@starting-style', $css);
        self::assertStringContainsString('[data-ui-role="popover"]', $css);
        self::assertStringContainsString('[data-ui-role="popover"][anchor]:popover-open', $css);
        self::assertStringContainsString('[data-ui-role="tooltip"] .ui-tooltip-content', $css);
        self::assertStringContainsString('z-index: var(--ui-z-tooltip)', $css);
    }

    #[Test]
    public function timelineDotCentersOnRail(): void
    {
        $css = self::bundleCss();

        self::assertStringContainsString('calc(-1 * var(--ui-space-lg) - 1px)', $css);
        self::assertStringContainsString('[data-ui-role="timeline-item"]::before', $css);
        self::assertStringContainsString('transform: translateX(-50%)', $css);
    }

    #[Test]
    public function alertIconRowMatchesFlashFeedbackSlot(): void
    {
        $css = CssTestSupport::normalizeSelectors((new BlocksExtendedCssProvider(dirname(__DIR__, 3)))->stylesheet());

        self::assertMatchesRegularExpression(
            '/\[data-ui-role="alert"\][^{]*\{[^}]*align-items:\s*center/s',
            $css,
        );
        self::assertMatchesRegularExpression(
            '/\[data-ui-role="alert"\][^{]*\[data-ui-part="icon"\]:has\(:is\(svg, img\)\)[^{]*\{[^}]*width:\s*var\(--ux-feedback-icon-slot-size,\s*2\.5rem\)/s',
            $css,
        );
        self::assertMatchesRegularExpression(
            '/\[data-ui-role="stat"\][^{]*\[data-ui-part="icon"\]:has\(:is\(svg, img\)\)[^{]*\{[^}]*height:\s*var\(--ux-feedback-icon-slot-size,\s*2\.5rem\)/s',
            $css,
        );
    }
}
