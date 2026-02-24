<?php

namespace Nasirkhan\LaravelCube\Tests\Unit;

use Nasirkhan\LaravelCube\Tests\TestCase;
use Nasirkhan\LaravelCube\View\Components\CastsBooleans;

class CastsBooleansTraitTest extends TestCase
{
    private object $subject;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an anonymous class that uses the trait so we can test it directly
        $this->subject = new class {
            use CastsBooleans;

            public function cast(bool|string $value): bool
            {
                return $this->castBool($value);
            }
        };
    }

    /**
     * @test
     */
    public function it_casts_true_boolean_to_true(): void
    {
        $this->assertTrue($this->subject->cast(true));
    }

    /**
     * @test
     */
    public function it_casts_false_boolean_to_false(): void
    {
        $this->assertFalse($this->subject->cast(false));
    }

    /**
     * @test
     */
    public function it_casts_string_true_to_true(): void
    {
        $this->assertTrue($this->subject->cast('true'));
    }

    /**
     * @test
     */
    public function it_casts_string_false_to_false(): void
    {
        $this->assertFalse($this->subject->cast('false'));
    }

    /**
     * @test
     */
    public function it_casts_string_one_to_true(): void
    {
        $this->assertTrue($this->subject->cast('1'));
    }

    /**
     * @test
     */
    public function it_casts_string_zero_to_false(): void
    {
        $this->assertFalse($this->subject->cast('0'));
    }

    /**
     * @test
     */
    public function it_casts_string_on_to_true(): void
    {
        $this->assertTrue($this->subject->cast('on'));
    }

    /**
     * @test
     */
    public function it_casts_string_yes_to_true(): void
    {
        $this->assertTrue($this->subject->cast('yes'));
    }

    /**
     * @test
     */
    public function it_casts_empty_string_to_false(): void
    {
        $this->assertFalse($this->subject->cast(''));
    }

    /**
     * @test
     */
    public function it_casts_string_off_to_false(): void
    {
        $this->assertFalse($this->subject->cast('off'));
    }

    /**
     * @test
     */
    public function it_casts_string_no_to_false(): void
    {
        $this->assertFalse($this->subject->cast('no'));
    }

    /**
     * @test
     */
    public function it_returns_strict_bool_type(): void
    {
        $result = $this->subject->cast('true');

        $this->assertIsBool($result);
    }
}
