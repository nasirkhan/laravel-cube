<?php

namespace Nasirkhan\LaravelCube\Tests\Feature;

use Nasirkhan\LaravelCube\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ComponentRegistrationTest extends TestCase
{
    #[Test]
    public function it_registers_ui_button_component(): void
    {
        $view = $this->blade('<x-cube::button>OK</x-cube::button>');

        $view->assertSee('OK');
    }

    #[Test]
    public function it_registers_ui_badge_component(): void
    {
        $view = $this->blade('<x-cube::badge text="New" />');

        $view->assertSee('New');
    }

    #[Test]
    public function it_registers_ui_card_component(): void
    {
        $view = $this->blade('<x-cube::card>Content</x-cube::card>');

        $view->assertSee('Content');
    }

    #[Test]
    public function it_registers_form_input_component(): void
    {
        $view = $this->blade('<x-cube::input name="email" />');

        $view->assertSee('name="email"', false);
    }

    #[Test]
    public function it_registers_form_label_component(): void
    {
        $view = $this->blade('<x-cube::label for="email">Email</x-cube::label>');

        $view->assertSee('Email');
    }

    #[Test]
    public function it_registers_form_select_component(): void
    {
        $view = $this->blade('<x-cube::select name="country"></x-cube::select>');

        $view->assertSee('name="country"', false);
    }

    #[Test]
    public function it_registers_form_textarea_component(): void
    {
        $view = $this->blade('<x-cube::textarea name="message"></x-cube::textarea>');

        $view->assertSee('name="message"', false);
    }

    #[Test]
    public function it_registers_nav_link_component(): void
    {
        $view = $this->blade('<x-cube::nav-link href="/home">Home</x-cube::nav-link>');

        $view->assertSee('Home');
    }

    #[Test]
    public function it_registers_class_based_icon_component(): void
    {
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Ui\Icon::class));
    }

    #[Test]
    public function it_registers_class_based_share_buttons_component(): void
    {
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\Frontend\ShareButtons::class));
    }

    #[Test]
    public function it_registers_class_based_application_logo_component(): void
    {
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\ApplicationLogo::class));
    }

    #[Test]
    public function it_registers_class_based_google_analytics_component(): void
    {
        $this->assertTrue(class_exists(\Nasirkhan\LaravelCube\View\Components\GoogleAnalytics::class));
    }
}
