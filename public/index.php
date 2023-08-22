<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Okashoi\MyersTriangle\{InputData, Triangle};

$a = $_GET['a'] ?? '';
$b = $_GET['b'] ?? '';
$c = $_GET['c'] ?? '';

$message = '三角形の3辺の長さ（整数）を入力してください。';
if ($a !== '' && $b !== '' && $c !== '') {
    try {
        $inputData = new InputData($a, $b, $c);
        $triangle = new Triangle($inputData->a, $inputData->b, $inputData->c);
        $message = '入力された三角形は' . $triangle->getType() . 'です。';
    } catch (InvalidArgumentException $e) {
        $message = $e->getMessage();
    }
}
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>マイヤーズの三角形</title>
</head>
<body>
<form>
    <div>
        <label for="a">辺A</label>
        <input id="a" name="a" value="<?= $a ?>">
    </div>
    <div>
        <label for="b">辺B</label>
        <input id="b" name="b" value="<?= $b ?>">
    </div>
    <div>
        <label for="c">辺C</label>
        <input id="c" name="c" value="<?= $c ?>">
    </div>
    <input type="submit">
</form>
<p><?= $message ?></p>
</body>
</html>
