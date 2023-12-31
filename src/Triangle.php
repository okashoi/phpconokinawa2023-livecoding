<?php

declare(strict_types=1);

namespace Okashoi\MyersTriangle;

class Triangle
{
    public function __construct(
        private $a, // 辺 A の長さ
        private $b, // 辺 B の長さ
        private $c, // 辺 C の長さ
    ) {
    }

    /**
     * 辺の長さにもとづいて「正三角形」「二等辺三角形」「不等辺三角形」のいずれかを文字列として返す
     */
    public function getType(): string
    {
        // TODO: 実装
        return '不等辺三角形';
    }
}
