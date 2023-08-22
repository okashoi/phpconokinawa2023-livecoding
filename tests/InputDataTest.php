<?php

declare(strict_types=1);

use Okashoi\MyersTriangle\InputData;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\{DataProvider, Test};

class InputDataTest extends TestCase
{
    #[Test]
    public function 文字列で与えらた入力を整数としてアクセスできること(): void
    {
        $inputData = new InputData('2', '3', '4');

        $this->assertSame(2, $inputData->a);
        $this->assertSame(3, $inputData->b);
        $this->assertSame(4, $inputData->c);
    }

    #[Test]
    #[DataProvider('invalidArgumentDataProvider')]
    public function 三辺の長さは正の整数でなければならないこと(string $a, string $b, string $c): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('三角形の3辺の長さは正の整数でなければなりません。');

        new InputData($a, $b, $c);
    }

    public static function invalidArgumentDataProvider(): array
    {
        return [
            ['1.1',  '1', '1'],
            [  '1', '-1', '1'],
            [  '1',  '1', 'a'],
        ];
    }
}
