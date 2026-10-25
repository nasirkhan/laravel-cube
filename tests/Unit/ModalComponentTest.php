<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ModalComponentTest extends TestCase
{
    #[Test]
    public function it_renders_slot_content_and_dialog_has_relative_class(): void
    {
        $view = $this->blade('<x-cube::modal name="demo">Body</x-cube::modal>');

        $view->assertSee('role="dialog"', false);
        $view->assertSee('relative', false);
        $view->assertSee('Body');
    }

    #[Test]
    public function it_omits_aria_labelledby_when_no_title_is_given(): void
    {
        $view = $this->blade('<x-cube::modal name="demo">Body</x-cube::modal>');

        $view->assertDontSee('aria-labelledby', false);
    }

    #[Test]
    public function it_renders_aria_labelledby_and_hidden_title_element_when_title_is_given(): void
    {
        $view = $this->blade('<x-cube::modal name="demo" title="Confirm action">Body</x-cube::modal>');

        $view->assertSee('aria-labelledby="demo-title"', false);
        $view->assertSee('id="demo-title"', false);
        $view->assertSee('Confirm action');
    }

    #[Test]
    public function it_does_not_contain_bare_transform_class(): void
    {
        $view = $this->blade('<x-cube::modal name="demo">Body</x-cube::modal>');

        $html = (string) $view;

        $this->assertStringNotContainsString('class="fixed inset-0 transform', $html);
        $this->assertStringNotContainsString(' transform transition', $html);
    }
}
