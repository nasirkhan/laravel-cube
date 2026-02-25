<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use Nasirkhan\LaravelCube\View\Components\Ui\Button;
use PHPUnit\Framework\Attributes\Test;

class ButtonComponentTest extends TestCase
{
    #[Test]
    public function it_has_default_type_button(): void
    {
        $component = new Button();
        
        $this->assertEquals('button', $component->type);
    }

    #[Test]
    public function it_accepts_valid_button_types(): void
    {
        $component = new Button(type: 'button');
        $this->assertEquals('button', $component->type);

        $component = new Button(type: 'submit');
        $this->assertEquals('submit', $component->type);

        $component = new Button(type: 'reset');
        $this->assertEquals('reset', $component->type);
    }

    #[Test]
    public function it_defaults_to_button_for_invalid_types(): void
    {
        $component = new Button(type: 'invalid');
        
        $this->assertEquals('button', $component->type);
    }

    #[Test]
    public function it_accepts_valid_variants(): void
    {
        $variants = ['primary', 'secondary', 'danger', 'success', 'warning', 'info', 'light', 'dark', 'link'];
        
        foreach ($variants as $variant) {
            $component = new Button(variant: $variant);
            $this->assertEquals($variant, $component->variant);
        }
    }

    #[Test]
    public function it_defaults_to_primary_for_invalid_variants(): void
    {
        $component = new Button(variant: 'invalid');
        
        $this->assertEquals('primary', $component->variant);
    }

    #[Test]
    public function it_accepts_valid_sizes(): void
    {
        $component = new Button(size: 'sm');
        $this->assertEquals('sm', $component->size);

        $component = new Button(size: 'md');
        $this->assertEquals('md', $component->size);

        $component = new Button(size: 'lg');
        $this->assertEquals('lg', $component->size);
    }

    #[Test]
    public function it_defaults_to_md_for_invalid_sizes(): void
    {
        $component = new Button(size: 'invalid');
        
        $this->assertEquals('md', $component->size);
    }

    #[Test]
    public function it_handles_loading_state(): void
    {
        $component = new Button(loading: true);
        $this->assertTrue($component->loading);

        $component = new Button(loading: false);
        $this->assertFalse($component->loading);
    }

    #[Test]
    public function it_defaults_to_tailwind_framework(): void
    {
        $component = new Button();
        
        $this->assertTrue($component->isTailwind());
        $this->assertFalse($component->isBootstrap());
    }

    #[Test]
    public function it_accepts_bootstrap_framework(): void
    {
        $component = new Button(framework: 'bootstrap');
        
        $this->assertTrue($component->isBootstrap());
        $this->assertFalse($component->isTailwind());
    }

    #[Test]
    public function it_returns_correct_framework_view_path(): void
    {
        $tailwindComponent = new Button();
        $this->assertEquals('cube::components.ui.button.tailwind', $tailwindComponent->getFrameworkView('ui.button'));

        $bootstrapComponent = new Button(framework: 'bootstrap');
        $this->assertEquals('cube::components.ui.button.bootstrap', $bootstrapComponent->getFrameworkView('ui.button'));
    }

    #[Test]
    public function it_gets_classes_from_config(): void
    {
        $component = new Button(variant: 'primary');
        
        $classes = $component->getClasses();
        
        $this->assertIsString($classes);
        $this->assertNotEmpty($classes);
    }
}
