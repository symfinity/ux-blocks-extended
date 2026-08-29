<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Twig\Components;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;
use Symfinity\UxBlocksExtended\Tests\Integration\UxBlocksExtendedTestKernel;

abstract class ComponentTestCase extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected static function getKernelClass(): string
    {
        return UxBlocksExtendedTestKernel::class;
    }

    /**
     * @param class-string|non-empty-string $name
     * @param array<string, mixed>          $data
     */
    protected function renderComponent(string $name, array $data = [], ?string $content = null): string
    {
        if (null === $content) {
            return (string) $this->renderTwigComponent($name, $data);
        }

        return (string) $this->renderTwigComponent($name, $data, $content);
    }

    protected function assertRootAttributes(string $html, string $role, string $fragment): void
    {
        self::assertStringContainsString(sprintf('data-ui-role="%s"', $role), $html);
        self::assertStringContainsString(sprintf('data-ui-fragment="%s"', $fragment), $html);
        self::assertDoesNotMatchRegularExpression('/html_cva|tailwind_merge|twig-tailwind-extra/', $html);
    }
}
