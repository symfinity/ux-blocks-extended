<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfinity\UxBlocksExtended\Breadcrumb\BreadcrumbItem;
use Symfinity\UxBlocksExtended\Breadcrumb\BreadcrumbTrailResolverInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Breadcrumb', template: '@UxBlocksExtended/components/Breadcrumb.html.twig')]
final class Breadcrumb
{
    /** @var '/'|'chevron'|'gt'|'none' Slash divider is Bootstrap default. */
    public string $divider = '/';

    /** When true and {@see $items} is null, resolve trail from the current request path. */
    public bool $auto = true;

    /** @var list<BreadcrumbItem>|null Explicit trail; overrides auto when set. */
    public ?array $items = null;

    public function __construct(
        private readonly BreadcrumbTrailResolverInterface $trailResolver,
        private readonly RequestStack $requestStack,
    ) {
    }

    /**
     * @return list<BreadcrumbItem>
     */
    public function getResolvedItems(): array
    {
        if (null !== $this->items) {
            return $this->items;
        }

        if (!$this->auto) {
            return [];
        }

        $request = $this->requestStack->getCurrentRequest();
        if (null === $request) {
            return [];
        }

        return $this->trailResolver->resolve($request);
    }
}
