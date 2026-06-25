<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Css;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocksExtended\Css\BlocksExtendedCssProvider;
use Symfinity\UxBlocksExtended\Tests\Support\CssTestSupport;

/**
 * 120 SC-003 — primary role selector inventory for coverage measurement.
 */
final class RoleSelectorInventoryTest extends TestCase
{
    /**
     * Literal selector inventory — scanned by {@see \Symfinity\UxBlocks\DevTools\CssSelectorCoverageReporter}.
     */
    private const SELECTOR_INVENTORY = <<<'SELECTORS'
[data-ui-role="accordion"]
[data-ui-role="alert"]
[data-ui-role="alert-dialog-action"]
[data-ui-role="alert-dialog-cancel"]
[data-ui-role="alert-dialog-description"]
[data-ui-role="alert-dialog-footer"]
[data-ui-role="alert-dialog-title"]
[data-ui-role="alert-dialog-trigger"]
[data-ui-role="alert-dismiss"]
[data-ui-role="auth-layout"]
[data-ui-role="carousel"]
[data-ui-role="dashboard-shell"]
[data-ui-role="data-table-chrome"]
[data-ui-role="data-table-chrome-toolbar"]
[data-ui-role="description-list"]
[data-ui-role="field-group"]
[data-ui-role="filter-chip"]
[data-ui-role="navbar"]
[data-ui-role="stack"]
[data-ui-role="stat"]
[data-ui-role="stat-label"]
[data-ui-role="steps"]
[data-ui-role="timeline"]
[data-ui-role="timeline-item"]
[data-ui-role="tooltip"]
SELECTORS;

    private static function bundleCss(): string
    {
        return CssTestSupport::normalizeSelectors(
            (new BlocksExtendedCssProvider(dirname(__DIR__, 3)))->stylesheet(),
        );
    }

    #[Test]
    public function bundleIncludesPrimaryRoleSelectors(): void
    {
        $css = self::bundleCss();

        foreach (self::inventoryRoles() as $role) {
            self::assertStringContainsString('[data-ui-role="' . $role . '"]', $css, $role);
        }
    }

    /**
     * @return list<string>
     */
    private static function inventoryRoles(): array
    {
        preg_match_all('/\[data-ui-role="([^"]+)"\]/', self::SELECTOR_INVENTORY, $matches);

        return $matches[1];
    }
}
