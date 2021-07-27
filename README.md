<p align="center">
    <a href="https://github.com/yii-extension" target="_blank">
        <img src="https://lh3.googleusercontent.com/ehSTPnXqrkk0M3U-UPCjC0fty9K6lgykK2WOUA2nUHp8gIkRjeTN8z8SABlkvcvR-9PIrboxIvPGujPgWebLQeHHgX7yLUoxFSduiZrTog6WoZLiAvqcTR1QTPVRmns2tYjACpp7EQ=w2400" height="100px">
    </a>
    <h1 align="center">Alert Flash Bulma Widget</h1>
    <br>
</p>

[![Total Downloads](https://poser.pugx.org/yii-extension/alert-flash-bulma/downloads)](//packagist.org/packages/yii-extension/alert-flash-bulma)
[![build](https://github.com/yii-extension/alert-flash-bulma/workflows/build/badge.svg?branch=main)](https://github.com/yii-extension/alert-flash-bulma/actions)
[![codecov](https://codecov.io/gh/yii-extension/alert-flash-bulma/branch/main/graph/badge.svg?token=KB6T5KMGED)](https://codecov.io/gh/yii-extension/alert-flash-bulma)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyii-extension%2Falert-flash-bulma%2Fmain)](https://dashboard.stryker-mutator.io/reports/github.com/yii-extension/alert-flash-bulma/main)
[![static analysis](https://github.com/yii-extension/alert-flash-bulma/workflows/static%20analysis/badge.svg)](https://github.com/yii-extension/alert-flash-bulma/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yii-extension/alert-flash-bulma/coverage.svg)](https://shepherd.dev/github/yii-extension/alert-flash-bulma)


## Installation

```shell
composer require yii-extension/alert-flash-bulma
```

## Usage

In controller or action:

```php
<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Session\Flash\Flash;

final class Action
{
    public function index(Flash $flash): ResponseInterface
    {
        $flash->add(
            'success', // types: [danger, dark, info, link, primary, success, warning]
            [
                'header' => 'Header message flash', // Its optional.
                'body' => 'body message flash' // Its mandatory.
            ],
            true
        );
    }
}
```

In layout:

```php
<?php

declare(strict_types=1);

use Yii\Extension\Widget\FlashMessage;

?>

<?= FlashMessage::widget() ?>
```

### Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

### Mutation testing

The package tests are checked with [Infection](https://infection.github.io/) mutation framework. To run it:

```shell
./vendor/bin/infection
```

### Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```shell
./vendor/bin/psalm
```

## License

The `yii-extension/alert-flash-bulma` for Yii Packages is free software.

It is released under the terms of the BSD License. Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Yii Extension](https://github.com/yii-extension).

## Support the project

[![Open Collective](https://img.shields.io/badge/Open%20Collective-sponsor-7eadf1?logo=open%20collective&logoColor=7eadf1&labelColor=555555)](https://opencollective.com/yiisoft)

## Powered by Yii Framework

[![Official website](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)


