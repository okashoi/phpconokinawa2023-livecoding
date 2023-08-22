<?php

declare(strict_types=1);

use Okashoi\MyersTriangle\Triangle;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\{DataProvider, Test};

class TriangleTest extends TestCase
{
    #[Test]
    #[DataProvider('isEquilateralDataProvider')]
    public function isEquilateral(int $a, int $b, int $c, bool $expected): void
    {
        $triangle = new Triangle($a, $b, $c);

        $this->assertSame($expected, $triangle->isEquilateral());
    }

    public static function isEquilateralDataProvider(): array
    {
        return [
            [1, 1, 1, true],
            [1, 2, 2, false],
            [2, 3, 4, false],
        ];
    }

    #[Test]
    #[DataProvider('isIsoscelesDataProvider')]
    public function isIsosceles(int $a, int $b, int $c, bool $expected): void
    {
        $triangle = new Triangle($a, $b, $c);

        $this->assertSame($expected, $triangle->isIsosceles());
    }

    public static function isIsoscelesDataProvider(): array
    {
        return [
            [1, 1, 1, true],
            [1, 2, 2, true],
            [2, 3, 4, false],
        ];
    }

    #[Test]
    public function 三辺の長さが三角不等式を満たさなければ三角形は成立しないこと(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('三角形が成立しません。');

        new Triangle(1, 2, 3);
    }
}
