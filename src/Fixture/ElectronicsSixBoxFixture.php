<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Fixture;

/**
 * Six-box electronics nav — aligned with moodboard `var/foo/bento-box-menu/0_JC_9YaYmwoh9WfF4.png`.
 *
 * @phpstan-type NavItem array{
 *     label: string,
 *     href: string,
 *     children?: list<array{label: string, href: string}>
 * }
 * @phpstan-type CategoryBox array{
 *     heading: string,
 *     items: list<NavItem>,
 *     column: int,
 *     icon?: string,
 *     size?: string,
 *     layout?: string,
 *     categoryHref?: string
 * }
 */
final class ElectronicsSixBoxFixture
{
    /** @return list<CategoryBox> */
    public static function boxes(bool $withDrillDown = false): array
    {
        $componentsItem = ['label' => 'Components', 'href' => '/electronics/components'];
        $televisionsItem = ['label' => 'Televisions', 'href' => '/electronics/televisions'];

        if ($withDrillDown) {
            $componentsItem['children'] = self::componentsChildren();
            $televisionsItem['children'] = self::televisionsChildren();
        }

        return [
            [
                'heading' => 'Computers',
                'column' => 1,
                'size' => 'large',
                'layout' => 'vertical',
                'categoryHref' => '/electronics/computers',
                'icon' => 'lucide:laptop',
                'items' => [
                    ['label' => 'Laptops', 'href' => '/electronics/laptops'],
                    ['label' => 'Desktop PCs', 'href' => '/electronics/desktop-pcs'],
                    $componentsItem,
                    ['label' => 'Monitors', 'href' => '/electronics/monitors'],
                    ['label' => 'Printers', 'href' => '/electronics/printers'],
                    ['label' => 'Networking', 'href' => '/electronics/networking'],
                    ['label' => 'Drives & Storage', 'href' => '/electronics/drives-storage'],
                    ['label' => 'PC Gaming', 'href' => '/electronics/pc-gaming'],
                    ['label' => 'Accessories', 'href' => '/electronics/accessories'],
                ],
            ],
            [
                'heading' => 'Mobile Devices',
                'column' => 2,
                'size' => 'small',
                'layout' => 'vertical',
                'icon' => 'lucide:smartphone',
                'items' => [
                    ['label' => 'Smartphones', 'href' => '/electronics/smartphones'],
                    ['label' => 'Tablets', 'href' => '/electronics/tablets'],
                    ['label' => 'Wearable', 'href' => '/electronics/wearable'],
                ],
            ],
            [
                'heading' => 'Audio & Video',
                'column' => 2,
                'size' => 'small',
                'layout' => 'vertical',
                'icon' => 'lucide:headphones',
                'items' => [
                    ['label' => 'Headphones', 'href' => '/electronics/headphones'],
                    ['label' => 'Speakers', 'href' => '/electronics/speakers'],
                    ['label' => 'Cameras', 'href' => '/electronics/cameras'],
                ],
            ],
            [
                'heading' => 'Car Electronics',
                'column' => 3,
                'size' => 'large',
                'layout' => 'vertical',
                'icon' => 'lucide:car',
                'items' => [
                    ['label' => 'Car Audio', 'href' => '/electronics/car-audio'],
                    ['label' => 'Car Security', 'href' => '/electronics/car-security'],
                    ['label' => 'Dash Cameras', 'href' => '/electronics/dash-cameras'],
                    ['label' => 'Electric Chargers', 'href' => '/electronics/electric-chargers'],
                    ['label' => 'GPS Navigation', 'href' => '/electronics/gps-navigation'],
                    ['label' => 'Radar Detectors', 'href' => '/electronics/radar-detectors'],
                    ['label' => 'CB Radios & Scanners', 'href' => '/electronics/cb-radios-scanners'],
                    ['label' => 'Installation Parts', 'href' => '/electronics/installation-parts'],
                ],
            ],
            [
                'heading' => 'Gaming Consoles',
                'column' => 4,
                'size' => 'small',
                'layout' => 'vertical',
                'icon' => 'lucide:gamepad-2',
                'items' => [
                    ['label' => 'Playstation', 'href' => '/electronics/playstation'],
                    ['label' => 'Xbox', 'href' => '/electronics/xbox'],
                    ['label' => 'Switch', 'href' => '/electronics/switch'],
                ],
            ],
            [
                'heading' => 'TV & Home Cinema',
                'column' => 4,
                'size' => 'small',
                'layout' => 'vertical',
                'icon' => 'lucide:tv',
                'items' => [
                    $televisionsItem,
                    ['label' => 'Home Audio', 'href' => '/electronics/home-audio'],
                    ['label' => 'Projectors', 'href' => '/electronics/projectors'],
                ],
            ],
        ];
    }

    /** @return list<array{label: string, href: string}> */
    public static function componentsChildren(): array
    {
        return [
            ['label' => 'Processors', 'href' => '/electronics/components/processors'],
            ['label' => 'Graphics Cards', 'href' => '/electronics/components/gpus'],
            ['label' => 'Memory', 'href' => '/electronics/components/memory'],
            ['label' => 'Storage', 'href' => '/electronics/components/storage'],
            ['label' => 'Motherboards', 'href' => '/electronics/components/motherboards'],
            ['label' => 'Power Supplies', 'href' => '/electronics/components/power-supplies'],
        ];
    }

    /** @return list<array{label: string, href: string}> */
    public static function televisionsChildren(): array
    {
        return [
            ['label' => 'Smart TVs', 'href' => '/electronics/televisions/smart'],
            ['label' => 'LED TVs', 'href' => '/electronics/televisions/led'],
            ['label' => 'OLED TVs', 'href' => '/electronics/televisions/oled'],
            ['label' => 'QLED TVs', 'href' => '/electronics/televisions/qled'],
            ['label' => 'Projector TVs', 'href' => '/electronics/televisions/projector'],
            ['label' => 'Outdoor TVs', 'href' => '/electronics/televisions/outdoor'],
        ];
    }
}
