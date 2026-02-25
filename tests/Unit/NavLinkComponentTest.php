<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use Nasirkhan\LaravelCube\View\Components\Navigation\NavLink;

class NavLinkComponentTest extends TestCase
{
    /**
     * Test that nav link accepts href.
     *
     * @test
     */
    public function it_accepts_href(): void
    {
        $component = new NavLink(href: 'https://example.com');
        
        $this->assertEquals('https://example.com', $component->href);
    }

    /**
     * Test that nav link handles active state.
     *
     * @test
     */
    public function it_handles_active_state(): void
    {
        $component = new NavLink(active: true);
        $this->assertTrue($component->active);

        $component = new NavLink(active: false);
        $this->assertFalse($component->active);
    }

    /**
     * Test that nav link defaults to Tailwind framework.
     *
     * @test
     */
    public function it_defaults_to_tailwind_framework(): void
    {
        $component = new NavLink();
        
        $this->assertTrue($component->isTailwind());
        $this->assertFalse($component->isBootstrap());
    }

    /**
     * Test that nav link accepts Bootstrap framework.
     *
     * @test
     */
    public function it_accepts_bootstrap_framework(): void
    {
        $component = new NavLink(framework: 'bootstrap');
        
        $this->assertTrue($component->isBootstrap());
        $this->assertFalse($component->isTailwind());
    }

    /**
     * Test that nav link returns correct framework view path.
     *
     * @test
     */
    public function it_returns_correct_framework_view_path(): void
    {
        $tailwindComponent = new NavLink();
        $this->assertEquals('cube::components.navigation.nav-link.tailwind', $tailwindComponent->getFrameworkView('navigation.nav-link'));

        $bootstrapComponent = new NavLink(framework: 'bootstrap');
        $this->assertEquals('cube::components.navigation.nav-link.bootstrap', $bootstrapComponent->getFrameworkView('navigation.nav-link'));
    }
}
