<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\DependencyInjection\Compiler;

use Symfinity\UxBlocksCore\Twig\RoleAttributeBridgeListener;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * PageHeader renders through the section-heading template, so it takes that role.
 */
final class PageHeaderRoleAliasPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->hasDefinition(RoleAttributeBridgeListener::class)) {
            return;
        }

        $container->getDefinition(RoleAttributeBridgeListener::class)
            ->addMethodCall('aliasComponent', ['PageHeader', 'SectionHeading']);
    }
}
