<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use Nasirkhan\LaravelCube\View\Components\Forms\Input;

class InputComponentTest extends TestCase
{
    /**
     * Test that input has default type of 'text'.
     *
     * @test
     */
    public function it_has_default_type_text(): void
    {
        $component = new Input();
        
        $this->assertEquals('text', $component->type);
    }

    /**
     * Test that input accepts valid input types.
     *
     * @test
     */
    public function it_accepts_valid_input_types(): void
    {
        $validTypes = ['text', 'email', 'password', 'number', 'url', 'tel', 'date', 'time', 'datetime-local', 'color'];
        
        foreach ($validTypes as $type) {
            $component = new Input(type: $type);
            $this->assertEquals($type, $component->type);
        }
    }

    /**
     * Test that input defaults to 'text' type for invalid types.
     *
     * @test
     */
    public function it_defaults_to_text_for_invalid_types(): void
    {
        $component = new Input(type: 'invalid');
        
        $this->assertEquals('text', $component->type);
    }

    /**
     * Test that input handles disabled state.
     *
     * @test
     */
    public function it_handles_disabled_state(): void
    {
        $component = new Input(disabled: true);
        $this->assertTrue($component->disabled);

        $component = new Input(disabled: false);
        $this->assertFalse($component->disabled);
    }

    /**
     * Test that input handles required state.
     *
     * @test
     */
    public function it_handles_required_state(): void
    {
        $component = new Input(required: true);
        $this->assertTrue($component->required);

        $component = new Input(required: false);
        $this->assertFalse($component->required);
    }

    /**
     * Test that input accepts placeholder.
     *
     * @test
     */
    public function it_accepts_placeholder(): void
    {
        $component = new Input(placeholder: 'Enter your email');
        
        $this->assertEquals('Enter your email', $component->placeholder);
    }

    /**
     * Test that input defaults to Tailwind framework.
     *
     * @test
     */
    public function it_defaults_to_tailwind_framework(): void
    {
        $component = new Input();
        
        $this->assertTrue($component->isTailwind());
        $this->assertFalse($component->isBootstrap());
    }

    /**
     * Test that input accepts Bootstrap framework.
     *
     * @test
     */
    public function it_accepts_bootstrap_framework(): void
    {
        $component = new Input(framework: 'bootstrap');
        
        $this->assertTrue($component->isBootstrap());
        $this->assertFalse($component->isTailwind());
    }
}
