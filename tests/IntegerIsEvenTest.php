<?php

namespace App;

use PHPUnit\Framework\TestCase;

class IntegerIsEvenTest extends TestCase
{
    /**
     * @var IntegerIsEven
     */
    private $integerIsEven;

    /**
     * Set up before each test
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->integerIsEven = new IntegerIsEven();
    }

    /**
     * Data provider for testRun
     *
     * @return array
     */
    public function runDataProvider(): array
    {
        return [
            [false, -127],
            [false, -1],
            [false, 1],
            [false, 127],
            [true, -128],
            [true, -2],
            [true, 0],
            [true, 2],
            [true, 128],
        ];
    }

    /**
     * Test run() method
     *
     * @dataProvider runDataProvider
     */
    public function testRun(bool $expected, int $number): void
    {
        $this->assertSame(
            $expected,
            $this->integerIsEven->run($number)
        );
    }
}
