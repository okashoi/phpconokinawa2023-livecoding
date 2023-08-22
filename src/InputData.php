<?php

declare(strict_types=1);

namespace Okashoi\MyersTriangle;

use InvalidArgumentException;

class InputData
{
    public int $a;
    public int $b;
    public int $c;

    public function __construct(string $a, string $b, string $c)
    {
        $a = filter_var($a, FILTER_VALIDATE_INT);
        $b = filter_var($b, FILTER_VALIDATE_INT);
        $c = filter_var($c, FILTER_VALIDATE_INT);

        if (!is_int($a) || !is_int($b) || !is_int($c)) {
            throw new InvalidArgumentException('三角形の3辺の長さは正の整数でなければなりません。');
        }

        if ($a <= 0 || $b <= 0 || $c <= 0) {
            throw new InvalidArgumentException('三角形の3辺の長さは正の整数でなければなりません。');
        }

        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
}
