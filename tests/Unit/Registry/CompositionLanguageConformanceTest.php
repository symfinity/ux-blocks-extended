<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksExtended\Tests\Unit\Registry;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UxBlocks\Registry\CompositionLanguageRegistryAuditor;
use Symfinity\UxBlocks\Registry\LanguageConformance;
use Symfinity\UxBlocks\Registry\RoleLanguageDefinition;
use Symfinity\UxBlocksExtended\Tests\Support\CompositionLanguageAssertions;
use Symfony\Component\Yaml\Yaml;

final class CompositionLanguageConformanceTest extends TestCase
{
    use CompositionLanguageAssertions;

    /** @return list<array<string, mixed>> */
    private static function roleRows(): array
    {
        /** @var array<string, mixed> $registry */
        $registry = Yaml::parseFile(\dirname(__DIR__, 3) . '/config/ux_roles.yaml');

        /** @var list<array<string, mixed>> $rows */
        $rows = $registry['roles'] ?? [];

        return $rows;
    }

    #[Test]
    public function everyExtendedRoleDefinitionIsConformant(): void
    {
        foreach (self::roleRows() as $row) {
            $def = RoleLanguageDefinition::fromRegistryRow('extended', $row);
            $this->assertRoleDefinitionConformant($def);
        }
    }

    #[Test]
    public function containerRolesDeclareStyledParts(): void
    {
        $byRole = [];
        foreach (self::roleRows() as $row) {
            $byRole[(string) ($row['role'] ?? '')] = RoleLanguageDefinition::fromRegistryRow('extended', $row);
        }

        self::assertContains('header', $byRole['card']->styledParts);
        self::assertContains('media', $byRole['empty']->styledParts);
        self::assertContains('footer', $byRole['alert']->styledParts);
    }

    #[Test]
    public function noExtendedRoleIsAPerConceptCompound(): void
    {
        $roleIds = array_map(static fn (array $row): string => (string) ($row['role'] ?? ''), self::roleRows());

        $this->assertNoCompoundRoles($roleIds);
    }

    #[Test]
    public function catalogLaneAuditPassesForExtended(): void
    {
        $auditor = new CompositionLanguageRegistryAuditor();
        $failures = LanguageConformance::failuresOnly($auditor->auditLane('blocks.extended'));

        self::assertSame([], array_map(static fn ($v) => $v->describe(), $failures));
    }

    #[Test]
    public function enforcedContainerTemplatesEmitClosedParts(): void
    {
        $bundlePath = dirname(__DIR__, 3);
        foreach (['Card', 'Empty', 'Alert'] as $component) {
            $html = (string) file_get_contents($bundlePath . '/templates/components/' . $component . '.html.twig');
            $this->assertEmittedPartsConformant(strtolower($component), $this->emittedParts($html));
        }
    }
}
