<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use PHPUnit\Framework\Attributes\Test;

final class TableScrollFrameTest extends ComponentTestCase
{
    #[Test]
    public function tableSitsInsideOneScrollFrame(): void
    {
        self::bootKernel();
        $html = $this->renderComponent('Table', [], '<tr><td>Cell</td></tr>');

        self::assertSame(1, substr_count($html, 'data-ui-part="scroll-frame"'));
        self::assertMatchesRegularExpression(
            '/data-ui-part="scroll-frame"[\s\S]*<table[\s\S]*<\/table>[\s\S]*<\/div>/',
            $html,
        );
    }
}
