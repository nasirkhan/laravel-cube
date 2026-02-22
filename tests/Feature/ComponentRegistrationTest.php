<?php

namespace Nasirkhan\LaravelCube\Tests\Feature;

use Nasirkhan\LaravelCube\Tests\TestCase;

class ComponentRegistrationTest extends TestCase
{
    /**
     * Test that UI components are registered.
     *
     * @test
     */
    public function it_registers_ui_components(): void
    {
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Ui\Button::class));
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Ui\Modal::class));
    }

    /**
     * Test that form components are registered.
     *
     * @test
     */
    public function it_registers_form_components(): void
    {
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Forms\Input::class));
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Forms\Label::class));
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Forms\Error::class));
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Forms\Group::class));
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Forms\Checkbox::class));
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Forms\Select::class));
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Forms\Textarea::class));
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Forms\Toggle::class));
    }

    /**
     * Test that navigation components are registered.
     *
     * @test
     */
    public function it_registers_navigation_components(): void
    {
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Navigation\NavLink::class));
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Navigation\ResponsiveNavLink::class));
    }

    /**
     * Test that the HasFramework trait exists.
     *
     * @test
     */
    public function it_has_has_framework_trait(): void
    {
        $this->assertTrue(trait_exists(\Nasirkhan\LaravelCube\View\Components\HasFramework::class));
    }
}
