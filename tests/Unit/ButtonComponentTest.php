<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ButtonComponentTest extends TestCase
{
    #[Test]
    public function it_renders_with_default_type_button(): void
    {
        $view = $this->blade('<x-cube::button>Click me</x-cube::button>');

        $view->assertSee('type="button"', false);
        $view->assertSee('Click me');
    }

    #[Test]
    public function it_renders_with_submit_type(): void
    {
        $view = $this->blade('<x-cube::button type="submit">Submit</x-cube::button>');

        $view->assertSee('type="submit"', false);
    }

    #[Test]
    public function it_falls_back_to_button_for_invalid_types(): void
    {
        $view = $this->blade('<x-cube::button type="invalid">Click</x-cube::button>');

        $view->assertSee('type="button"', false);
    }

    #[Test]
    public function it_renders_disabled_attribute_when_disabled(): void
    {
        $view = $this->blade('<x-cube::button disabled>Click</x-cube::button>');

        $view->assertSee('disabled', false);
        $view->assertSee('aria-disabled="true"', false);
    }

    #[Test]
    public function it_renders_loading_spinner_when_loading(): void
    {
        $view = $this->blade('<x-cube::button :loading="true">Save</x-cube::button>');

        $view->assertSee('animate-spin', false);
        $view->assertSee('aria-busy="true"', false);
        $view->assertSee('disabled', false);
    }

    #[Test]
    public function it_does_not_render_spinner_by_default(): void
    {
        $view = $this->blade('<x-cube::button>Click</x-cube::button>');

        $view->assertDontSee('animate-spin', false);
    }

    #[Test]
    public function it_applies_danger_variant_classes(): void
    {
        $view = $this->blade('<x-cube::button variant="danger">Delete</x-cube::button>');

        $view->assertSee('bg-red-600', false);
    }

    #[Test]
    public function it_applies_success_variant_classes(): void
    {
        $view = $this->blade('<x-cube::button variant="success">Save</x-cube::button>');

        $view->assertSee('bg-green-600', false);
    }

    #[Test]
    public function it_merges_extra_attributes(): void
    {
        $view = $this->blade('<x-cube::button id="my-btn">Click</x-cube::button>');

        $view->assertSee('id="my-btn"', false);
    }
}
