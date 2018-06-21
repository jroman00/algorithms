<?php

namespace App;

use PHPUnit\Framework\TestCase;

class BalancedParenthesesTest extends TestCase
{
    /**
     * @var BalancedParentheses
     */
    private $balancedParentheses;

    /**
     * Set up before each test
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->balancedParentheses = new BalancedParentheses();
    }

    /**
     * Data provider for testRun
     *
     * @return array
     */
    public function runDataProvider(): array
    {
        return [
            [true, ''],
            [true, '()'],
            [true, 'foo'],
            [true, 'foo(bar)baz'],
            [true, 'f(o)o(bar)b(a)z'],
            [true, 'f(o)o(b(a)r)b(a)z'],

            [false, 'foo(bar'],
            [false, 'foo)bar'],
            [false, 'foo)bar(baz'],
        ];
    }

    /**
     * Test run() method
     *
     * @dataProvider runDataProvider
     */
    public function testRun(bool $expected, string $string): void
    {
        $this->assertSame(
            $expected,
            $this->balancedParentheses->run($string)
        );
    }
}
