<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use Nasirkhan\LaravelCube\View\Components\Forms\Input;

class InputComponentTest extends TestCase
{
    /** @test */
    public function it_has_default_type_text(): void
    {
        $component = new Input();
        
        $this->assertEquals('text', $component->type);
    }

    /** @test */
    public function it_accepts_valid_input_types(): void
    {
        $validTypes = ['text', 'email', 'password', 'number', 'url', 'tel', 'date', 'time', 'datetime-local', 'color'];
        
        foreach ($validTypes as $type) {
            $component = new Input(type: $type);
            $this->assertEquals($type, $component->type);
        }
    }

    /** @test */
    public function it_defaults_to_text_for_invalid_types(): void
    {
        $component = new Input(type: 'invalid');
        
        $this->assertEquals('text', $component->type);
    }

    /** @test */
    public function it_handles_disabled_state(): void
    {
        $component = new Input(disabled: true);
        $this->assertTrue($component->disabled);

        $component = new Input(disabled: false);
        $this->assertFalse($component->disabled);
    }

    /** @test */
    public function it_handles_required_state(): void
    {
        $component = new Input(required: true);
        $this->assertTrue($component->required);

        $component = new Input(required: false);
        $this->assertFalse($component->required);
    }

    /** @test */
    public function it_accepts_placeholder(): void
    {
        $component = new Input(placeholder: 'Enter your email');
        
        $this->assertEquals('Enter your email', $component->placeholder);
    }

    /** @test */
    public function it_defaults_to_tailwind_framework(): void
    {
        $component = new Input();
        
        $this->assertTrue($component->isTailwind());
        $this->assertFalse($component->isBootstrap());
    }

    /** @test */
    public function it_accepts_bootstrap_framework(): void
    {
        $component = new Input(framework: 'bootstrap');
        
        $this->assertTrue($component->isBootstrap());
        $this->assertFalse($component->isTailwind());
    }
}
