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

    /**
     * 辺の長さにもとづいて「正三角形」「二等辺三角形」「不等辺三角形」のいずれかを文字列として返す
     */
    public function getType(): string
    {
        if ($this->a === $this->b && $this->b === $this->c) {
            return '正三角形';
        }

        if ($this->a === $this->b || $this->b === $this->c || $this->c === $this->a) {
            return '二等辺三角形';
        }

        return '不等辺三角形';
    }
}
