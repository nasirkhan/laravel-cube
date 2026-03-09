<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use Nasirkhan\LaravelCube\View\Components\Ui\Icon;
use PHPUnit\Framework\Attributes\Test;

class IconComponentTest extends TestCase
{
    #[Test]
    public function it_builds_outline_alias_by_default(): void
    {
        $component = new Icon(name: 'adjustments-horizontal');

        $this->assertSame('fwb-o-adjustments-horizontal', $component->iconComponentAlias());
    }

    #[Test]
    public function it_builds_solid_alias_when_requested(): void
    {
        $component = new Icon(name: 'adjustments-horizontal', variant: 'solid');

        $this->assertSame('fwb-s-adjustments-horizontal', $component->iconComponentAlias());
    }

    #[Test]
    public function it_defaults_to_outline_when_variant_is_invalid(): void
    {
        $component = new Icon(name: 'adjustments-horizontal', variant: 'mini');

        $this->assertSame('outline', $component->variant);
        $this->assertSame('fwb-o-adjustments-horizontal', $component->iconComponentAlias());
    }

    #[Test]
    public function it_sanitizes_icon_name(): void
    {
        $component = new Icon(name: '  ADJUSTMENTS Horizontal  ');

        $this->assertSame('adjustments-horizontal', $component->name);
    }
}
