<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class StimulusControllersTest extends TestCase
{
    /** @return array<string, array{0: string, 1: string}> */
    public static function overlayControllerProvider(): array
    {
        return [
            'alert-dialog-enhanced' => ['alert-dialog-enhanced', 'alert-dialog'],
            'drawer' => ['drawer', 'drawer'],
            'sheet' => ['sheet', 'sheet'],
            'context-menu' => ['context-menu', 'context-menu'],
            'hover-card' => ['hover-card', 'hover-card'],
        ];
    }

    /** @return array<string, array{0: string, 1: string}> */
    public static function navigationControllerProvider(): array
    {
        return [
            'menubar' => ['menubar', 'menubar'],
            'navigation-menu' => ['navigation-menu', 'navigation-menu'],
            'sidebar' => ['sidebar', 'sidebar'],
            'stacked-layout-interactive' => ['stacked-layout-interactive', 'stacked-layout-interactive'],
        ];
    }

    #[Test]
    #[DataProvider('overlayControllerProvider')]
    public function overlayControllerAssetExists(string $role, string $controllerSlug): void
    {
        $path = \dirname(__DIR__, 2) . '/assets/controllers/' . $controllerSlug . '_controller.js';

        self::assertFileExists($path, sprintf('Missing Stimulus controller for role "%s"', $role));
        self::assertNotSame('', trim((string) file_get_contents($path)));
    }

    #[Test]
    #[DataProvider('navigationControllerProvider')]
    public function navigationControllerAssetExists(string $role, string $controllerSlug): void
    {
        $path = \dirname(__DIR__, 2) . '/assets/controllers/' . $controllerSlug . '_controller.js';

        self::assertFileExists($path, sprintf('Missing Stimulus controller for role "%s"', $role));
        self::assertNotSame('', trim((string) file_get_contents($path)));
        self::assertStringNotContainsString('connect() {}', (string) file_get_contents($path));
    }

    #[Test]
    public function us1ControllersExist(): void
    {
        foreach (['tabs', 'dropdown-menu'] as $slug) {
            $path = \dirname(__DIR__, 2) . '/assets/controllers/' . $slug . '_controller.js';
            self::assertFileExists($path);
        }
    }
}
