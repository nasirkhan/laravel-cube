<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class InputComponentTest extends TestCase
{
    #[Test]
    public function it_renders_with_default_type_text(): void
    {
        $view = $this->blade('<x-cube::input />');

        $view->assertSee('type="text"', false);
    }

    #[Test]
    public function it_renders_with_valid_email_type(): void
    {
        $view = $this->blade('<x-cube::input type="email" />');

        $view->assertSee('type="email"', false);
    }

    #[Test]
    public function it_falls_back_to_text_for_invalid_types(): void
    {
        $view = $this->blade('<x-cube::input type="invalid" />');

        $view->assertSee('type="text"', false);
    }

    #[Test]
    public function it_renders_disabled_attribute_when_disabled(): void
    {
        $view = $this->blade('<x-cube::input disabled />');

        $view->assertSee('disabled', false);
    }

    #[Test]
    public function it_renders_required_attribute_when_required(): void
    {
        $view = $this->blade('<x-cube::input required />');

        $view->assertSee('required', false);
    }

    #[Test]
    public function it_renders_placeholder_when_provided(): void
    {
        $view = $this->blade('<x-cube::input placeholder="Enter your email" />');

        $view->assertSee('placeholder="Enter your email"', false);
    }

    #[Test]
    public function it_renders_autofocus_when_set(): void
    {
        $view = $this->blade('<x-cube::input autofocus />');

        $view->assertSee('autofocus', false);
    }

    #[Test]
    public function it_auto_sets_id_from_name_attribute(): void
    {
        $view = $this->blade('<x-cube::input name="email" />');

        $view->assertSee('id="email"', false);
    }

    #[Test]
    public function it_does_not_override_explicit_id(): void
    {
        $view = $this->blade('<x-cube::input name="email" id="custom-id" />');

        $view->assertSee('id="custom-id"', false);
    }
}
