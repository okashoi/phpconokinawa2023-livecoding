<?php

declare(strict_types=1);

namespace Okashoi\MyersTriangle;

use InvalidArgumentException;

readonly class Triangle
{
    public function __construct(
        /** @var int 辺 A の長さ */
        private int $a,
        /** @var int 辺 B の長さ */
        private int $b,
        /** @var int 辺 C の長さ */
        private int $c,
    ) {
        if ($a + $b <= $c || $b + $c <= $a || $c + $a <= $b) {
            throw new InvalidArgumentException('三角形が成立しません。');
        }
    }

    public function isEquilateral(): bool
    {
        return $this->a === $this->b && $this->b === $this->c;
    }

    public function isIsosceles(): bool
    {
        return $this->a === $this->b || $this->b === $this->c || $this->c === $this->a;
    }
}
