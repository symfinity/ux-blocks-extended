<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig;

use Symfinity\UxBlocksCore\Registry\UxRoleRegistry;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\UX\TwigComponent\ComponentAttributes;
use Symfony\UX\TwigComponent\Event\PreRenderEvent;

#[AsEventListener(event: PreRenderEvent::class, method: 'onPreRender', priority: -10)]
final class PageHeaderSectionHeadingRoleListener
{
    public function __construct(
        private readonly UxRoleRegistry $registry,
    ) {
    }

    public function onPreRender(PreRenderEvent $event): void
    {
        if ('PageHeader' !== $event->getMetadata()->getName()) {
            return;
        }

        $record = $this->registry->findByTwigComponent('SectionHeading');
        if (null === $record) {
            return;
        }

        $variables = $event->getVariables();
        $attributesVar = $event->getMetadata()->getAttributesVar();
        $attributes = $variables[$attributesVar] ?? null;
        if (!$attributes instanceof ComponentAttributes) {
            return;
        }

        $variables[$attributesVar] = $attributes->defaults([
            'data-ui-role' => $record->role,
        ]);
        $event->setVariables($variables);
    }
}
