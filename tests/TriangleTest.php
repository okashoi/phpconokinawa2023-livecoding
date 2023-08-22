<?php

declare(strict_types=1);

use Okashoi\MyersTriangle\Triangle;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\{DataProvider, Test};

class TriangleTest extends TestCase
{
    #[Test]
    #[DataProvider('getTypeDataProvider')]
    public function getType($a, $b, $c, $expected): void
    {
        $triangle = new Triangle($a, $b, $c);

        $this->assertSame($expected, $triangle->getType());
    }

    public static function getTypeDataProvider()
    {
        return [
            '三辺の長さが等しければ正三角形であること' => [1, 1, 1, '正三角形'],
            '二辺の長さが等しければ二等辺三角形であること' => [1, 2, 2, '二等辺三角形'],
            '三辺の長さがすべて異なれば不等辺三角形であること' => [2, 3, 4, '不等辺三角形'],
        ];
    }

    #[Test]
    #[DataProvider('invalidArgumentDataProvider')]
    public function 三辺の長さは正の整数でなければならないこと($a, $b, $c): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('三角形の3辺の長さは正の整数でなければなりません。');

        new Triangle($a, $b, $c);
    }

    public static function invalidArgumentDataProvider()
    {
        return [
            [1.1,  1,   1],
            [  1, -1,   1],
            [  1,  1, 'a'],
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
