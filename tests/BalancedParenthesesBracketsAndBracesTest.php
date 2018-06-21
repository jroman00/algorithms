<?php

namespace App;

use PHPUnit\Framework\TestCase;

class BalancedParenthesesBracketsAndBracesTest extends TestCase
{
    /**
     * @var BalancedParenthesesBracketsAndBraces
     */
    private $balancedParenthesesBracketsAndBraces;

    /**
     * Set up before each test
     */
    protected function setUp()
    {
        parent::setUp();

        $this->balancedParenthesesBracketsAndBraces = new BalancedParenthesesBracketsAndBraces();
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
            [true, '[]'],
            [true, '{}'],
            [true, 'foobarbaz'],
            [true, '(foo[b{a}r]baz)'],
            [true, '{foo[b(a)r]baz}'],

            [false, '([{]})'],
            [false, 'foo(barbaz'],
            [false, 'foo[barbaz'],
            [false, 'foo{barbaz'],
            [false, 'foobar)baz'],
            [false, 'foobar]baz'],
            [false, 'foobar}baz'],
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
            $this->balancedParenthesesBracketsAndBraces->run($string)
        );
    }
}
