<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;
use Symfinity\UxBlocksExtended\Fixture\ElectronicsSixBoxFixture;

final class BentoBoxPanelTest extends ComponentTestCase
{
    #[Test]
    public function itRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel', [
            'boxes' => ElectronicsSixBoxFixture::boxes(),
        ]);

        $this->assertRootAttributes($html, 'bento-box-panel', 'blocks.ext.bento-box-panel');
        self::assertStringContainsString('data-ui-panel-layout="bento-box"', $html);
        self::assertStringNotContainsString('data-controller=', $html);
    }

    #[Test]
    public function itRendersSixBoxesWithColumnAssignment(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel', [
            'boxes' => ElectronicsSixBoxFixture::boxes(),
        ]);

        self::assertSame(6, substr_count($html, 'data-ui-role="bento-box-panel-box"'));
        self::assertSame(4, substr_count($html, 'data-ui-part="bento-box-panel-column"'));
        self::assertStringContainsString('data-ui-column="1"', $html);
        self::assertStringContainsString('data-ui-column="2"', $html);
        self::assertStringContainsString('data-ui-column="3"', $html);
        self::assertStringContainsString('data-ui-column="4"', $html);
        self::assertStringContainsString('Computers', $html);
        self::assertStringContainsString('Mobile Devices', $html);
        self::assertStringContainsString('Gaming Consoles', $html);
        self::assertStringContainsString('TV &amp; Home Cinema', $html);
    }

    #[Test]
    public function itExposesSharedPanelRowTracksForSubgrid(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel', [
            'boxes' => ElectronicsSixBoxFixture::boxes(),
        ]);

        self::assertStringContainsString('--ux-bento-panel-rows: 2', $html);
        self::assertStringContainsString('--ux-bento-row-span: 1', $html);
        self::assertStringContainsString('--ux-bento-row-span: 2', $html);
    }

    #[Test]
    public function itRendersBoxSizeAttributesFromElectronicsFixture(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel', [
            'boxes' => ElectronicsSixBoxFixture::boxes(),
        ]);

        self::assertStringContainsString('data-ui-box-size="large"', $html);
        self::assertStringContainsString('data-ui-box-size="small"', $html);
        self::assertSame(2, substr_count($html, 'data-ui-box-size="large"'));
        self::assertSame(4, substr_count($html, 'data-ui-box-size="small"'));
    }

    #[Test]
    public function itOmitsRootWhenBoxesEmpty(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel', ['boxes' => []]);

        self::assertStringNotContainsString('data-ui-role="bento-box-panel"', $html);
    }

    #[Test]
    public function boxNestedComponentRendersRegistryAttributes(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel:Box', [
            'heading' => 'Audio',
            'column' => 3,
            'icon' => 'lucide:headphones',
            'items' => [
                ['label' => 'Headphones', 'href' => '/audio/headphones'],
            ],
        ]);

        self::assertStringContainsString('data-ui-role="bento-box-panel-box"', $html);
        self::assertStringContainsString('data-ui-column="3"', $html);
        self::assertStringContainsString('data-ui-box-size="medium"', $html);
        self::assertStringContainsString('data-ui-box-layout="vertical"', $html);
        self::assertStringContainsString('data-ui-part="bento-box-panel-heading"', $html);
        self::assertStringContainsString('Headphones', $html);
    }

    #[Test]
    public function itCoercesHorizontalLayoutToVerticalWhenSizeIsNotMedium(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel:Box', [
            'heading' => 'Small',
            'column' => 1,
            'size' => 'small',
            'layout' => 'horizontal',
            'items' => [
                ['label' => 'One', 'href' => '/one'],
            ],
        ]);

        self::assertStringContainsString('data-ui-box-layout="vertical"', $html);
        self::assertStringNotContainsString('data-ui-links-layout="horizontal"', $html);
    }

    #[Test]
    public function categoryLandingRendersWithoutNestedItemAnchors(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel:Box', [
            'heading' => 'Computers',
            'column' => 1,
            'categoryHref' => '/electronics/computers',
            'items' => [
                ['label' => 'Laptops', 'href' => '/electronics/laptops'],
            ],
        ]);

        self::assertStringContainsString('data-ui-has-category-link', $html);
        self::assertStringContainsString('data-ui-part="category-landing"', $html);
        self::assertStringContainsString('data-ui-part="category-disclosure"', $html);
        self::assertMatchesRegularExpression(
            '/<a data-ui-part="category-landing" href="\/electronics\/computers">/',
            $html,
        );
        preg_match('/<a data-ui-part="category-landing"[^>]*>(.*?)<\/a>/s', $html, $categoryLanding);
        self::assertArrayHasKey(1, $categoryLanding);
        self::assertStringNotContainsString('<a href=', $categoryLanding[1]);
    }

    #[Test]
    public function disclosureOmitsWhenCategoryHrefUnset(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel:Box', [
            'heading' => 'Audio',
            'column' => 2,
            'items' => [
                ['label' => 'Speakers', 'href' => '/audio/speakers'],
            ],
        ]);

        self::assertStringNotContainsString('data-ui-has-category-link', $html);
        self::assertStringNotContainsString('data-ui-part="category-disclosure"', $html);
    }

    #[Test]
    public function drillItemsRenderOpenButtonsAndStackShell(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('BentoBoxPanel', [
            'boxes' => ElectronicsSixBoxFixture::boxes(true),
        ]);

        self::assertStringContainsString('data-ui-action="bento-drill-open"', $html);
        self::assertStringContainsString('data-ui-has-children', $html);
        self::assertStringContainsString('data-ui-part="drill-stack-shell"', $html);
        self::assertStringNotContainsString('data-controller=', $html);
    }
}
