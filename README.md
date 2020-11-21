# http-laminas

[![Travis CI](https://api.travis-ci.org/qlimix/http-laminas.svg?branch=master)](https://travis-ci.org/qlimix/http-laminas)
[![Coveralls](https://img.shields.io/coveralls/github/qlimix/http-laminas.svg)](https://coveralls.io/github/qlimix/http-laminas)
[![Packagist](https://img.shields.io/packagist/v/qlimix/http-laminas.svg)](https://packagist.org/packages/qlimix/http-laminas)
[![MIT License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/qlimix/http-laminas/blob/master/LICENSE)

Http helper interfaces implemented with diactoros and httphandlerrunner.

## Install

Using Composer:

~~~
$ composer require qlimix/http-laminas
~~~

## usage

Request building:

```php
<?php

use Qlimix\Http\Request\DiactorosServerRequestBuilder;

$builder = new DiactorosServerRequestBuilder();

$builder->build();
$builder->buildFromGlobals();
```

Json response:
```php
<?php

use Qlimix\Http\Response\DiactorosJsonResponse;

$response = new DiactorosJsonResponse();
$response->response([], 200, ['x-foo' => 'foobar']);
```

No content response:

```php
<?php

use Qlimix\Http\Response\DiactorosNoContent;

$response = new DiactorosNoContent();
$response->noContent();
```

Response emitting:

```php
<?php

use Qlimix\Http\Response\LaminasHandlerRunnerResponseEmitter;
use Qlimix\Http\Response\DiactorosJsonResponse;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

$responseCreation = new DiactorosJsonResponse();
$response = $responseCreation->response([], 200, ['x-foo' => 'foobar']);

$emitter = new SapiEmitter();
$responseEmitter = new LaminasHandlerRunnerResponseEmitter($emitter);
$responseEmitter->emit($response);
```

## Testing
To run all unit tests locally with PHPUnit:

~~~
$ vendor/bin/phpunit
~~~

## Quality
To ensure code quality run grumphp which will run all tools:

~~~
$ vendor/bin/grumphp run
~~~

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
