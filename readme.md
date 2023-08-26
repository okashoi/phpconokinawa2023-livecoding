# PHPカンファレンス 2023 沖縄 ライブコーディング

## このリポジトリについて

[PHPカンファレンス 2023 沖縄](https://phpcon.okinawa.jp/) で実演したライブコーディングのためのリポジトリです。

トーク概要：[【ライブコーディング】素朴で考慮漏れのある PHP コードをテストコードとともに補強していく by おかしょい／岡田正平 | プロポーザル | PHPカンファレンス沖縄2023 - fortee.jp](https://fortee.jp/phpcon-okinawa-2023/proposal/0512a121-2983-4c60-90f3-651c7e7f79fd)

初期状態（ロジック未実装）を [main ブランチ](https://github.com/okashoi/phpconokinawa2023-livecoding/tree/main)、ライブコーディング後の最終的な状態を [reference ブランチ](https://github.com/okashoi/phpconokinawa2023-livecoding/tree/reference)としてアクセスできる状態にしてあります。

また、[reference ブランチのコミットログ](https://github.com/okashoi/phpconokinawa2023-livecoding/commits/reference)には、ライブコーディングの過程で行った変更を step-by-step で残しているので、そちらも参考にしてください。

## 題材

ソフトウェアテストの領域でよく題材として挙げられる「Myers の三角形問題」と呼ばれる問題を扱います。
Myers の三角形問題とは以下の要件に対するテストケースを作成する、というものです。

> このプログラムは入力ダイアログから3つの整数を読む。 この3つの値は、それぞれ三角形の3辺の長さをあらわすものとする。 プログラムは、三角形が不等辺三角形、二等辺三角形、正三角形のうちどれであるかを示すメッセージを表示する。

参考ページ：[マイヤーズの三角形問題](http://milk0824.sakura.ne.jp/services/myers/)

## 使い方

直接 PHP 実行する方法と、Docker（Docker Compose）を使う方法の 2 つを提供しています。

### 直接 PHP 実行する方法

動作確認済み環境

- PHP 8.2.8
- Composer 2.5.8

#### 環境構築

このリポジトリを clone したのち、以下のコマンドを実行してください。

```
composer install
```

#### アプリケーション起動

リポジトリルートで以下のコマンドを実行してください（ポート番号は任意）。

```
php -S localhost:<ポート番号> -t public public/index.php
```

その後 Web ブラウザで http://localhost:<ポート番号> にアクセスしてください。

#### テスト実行

リポジトリルートで

```
./vendor/bin/phpunit
```

または

```
composer test
```

を実行してください。

### Docker（Docker Compose）を使う方法

動作確認済み環境

- Docker 24.0.2
- Docker Compose 2.19.1

#### 環境構築

このリポジトリを clone したのち、以下のコマンドを実行してください。

```
docker compose run --rm php composer install
```

また、ホストマシン上で listen するポート番号を変更したい場合は `.env` ファイルの `HTTP_PORT` を変更してください。

#### アプリケーション起動

リポジトリルートで以下のコマンドを実行してください。

```
docker compose up
```

その後 Web ブラウザで http://localhost:<ポート番号> にアクセスしてください。

#### テスト実行

リポジトリルートで

```
docker compose run --rm php ./vendor/bin/phpunit
```

または

```
docker compose run --rm php composer test
```

を実行してください。
