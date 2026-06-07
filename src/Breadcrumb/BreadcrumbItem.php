<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Breadcrumb;

final readonly class BreadcrumbItem
{
    public function __construct(
        public string $label,
        public ?string $url = null,
        public bool $current = false,
    ) {
    }
}
