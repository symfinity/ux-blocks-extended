<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('AuthLayout', template: '@UxBlocksExtended/components/AuthLayout.html.twig')]
final class AuthLayout
{
    /** Primary submit button semantic variant (convention for auth form slots). */
    public string $submitVariant = 'primary';

    #[ExposeInTemplate('submit_semantic_variant')]
    public function submitSemanticVariant(): string
    {
        return $this->submitVariant;
    }
}
