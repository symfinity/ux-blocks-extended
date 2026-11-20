<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class PageHeaderTest extends ComponentTestCase
{
    #[Test]
    public function pageHeaderRendersLevelOneSectionHeading(): void
    {
        self::bootKernel();
        $html = $this->renderTwig(<<<'TWIG'
<twig:PageHeader>
    <twig:block name="title">Page title</twig:block>
    <twig:block name="description">A short description.</twig:block>
    <twig:block name="breadcrumb"><a href="/">Home</a></twig:block>
    <twig:block name="actions"><button type="button">Share</button></twig:block>
</twig:PageHeader>
TWIG);

        self::assertStringContainsString('<header', $html);
        self::assertStringContainsString('data-ui-role="section-heading"', $html);
        self::assertStringContainsString('<h1 data-ui-part="title">', $html);
        self::assertStringContainsString('data-ui-part="description"', $html);
        self::assertStringContainsString('data-ui-part="breadcrumb"', $html);
        self::assertStringContainsString('data-ui-part="actions"', $html);
    }

    #[Test]
    public function sectionHeadingLevelOneKeepsTheSameShape(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('SectionHeading', ['level' => 1], 'Settings');

        self::assertStringContainsString('<header', $html);
        self::assertStringContainsString('<h1 data-ui-part="title">', $html);
    }

    private function renderTwig(string $template): string
    {
        return (string) self::getContainer()->get('twig')->createTemplate($template)->render();
    }
}
