<?php

declare(strict_types=1);

use Okashoi\MyersTriangle\Triangle;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class TriangleTest extends TestCase
{
    #[Test]
    public function 三辺の長さが等しければ正三角形であること(): void
    {
        $triangle = new Triangle(1, 1, 1);

        $this->assertSame('正三角形', $triangle->getType());
    }
}
