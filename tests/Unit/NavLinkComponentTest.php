<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class NavLinkComponentTest extends TestCase
{
    #[Test]
    public function it_renders_as_anchor_tag(): void
    {
        $view = $this->blade('<x-cube::nav-link href="/dashboard">Dashboard</x-cube::nav-link>');

        $view->assertSee('<a', false);
        $view->assertSee('Dashboard');
    }

    #[Test]
    public function it_applies_active_classes_when_active(): void
    {
        $view = $this->blade('<x-cube::nav-link :active="true">Home</x-cube::nav-link>');

        $view->assertSee('border-indigo-400', false);
    }

    #[Test]
    public function it_applies_inactive_classes_by_default(): void
    {
        $view = $this->blade('<x-cube::nav-link>Home</x-cube::nav-link>');

        $view->assertSee('border-transparent', false);
    }

    #[Test]
    public function it_passes_href_attribute(): void
    {
        $view = $this->blade('<x-cube::nav-link href="/profile">Profile</x-cube::nav-link>');

        $view->assertSee('href="/profile"', false);
    }
}
