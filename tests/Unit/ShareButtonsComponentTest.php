<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ShareButtonsComponentTest extends TestCase
{
    #[Test]
    public function it_renders_share_buttons_with_expected_networks(): void
    {
        $view = $this->blade('<x-cube::share-buttons url="https://example.com/posts/hello" title="Hello World" :networks="[\'x\', \'copy\']" />');

        $view->assertSee('data-cube-share', false);
        $view->assertSee('data-cube-share-network="x"', false);
        $view->assertSee('data-cube-share-network="copy"', false);
        $view->assertSee('Hello World');
    }
}
