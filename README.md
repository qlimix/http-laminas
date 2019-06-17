# http-diactoros

[![Travis CI](https://api.travis-ci.org/qlimix/http-diactoros.svg?branch=master)](https://travis-ci.org/qlimix/http-diactoros)
[![Coveralls](https://img.shields.io/coveralls/github/qlimix/http-diactoros.svg)](https://coveralls.io/github/qlimix/http-diactoros)
[![Packagist](https://img.shields.io/packagist/v/qlimix/http-diactoros.svg)](https://packagist.org/packages/qlimix/http-diactoros)
[![MIT License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/qlimix/http-diactoros/blob/master/LICENSE)

Http helper interfaces implemented with diactoros and httphandlerrunner.

## Install

Using Composer:

~~~
$ composer require qlimix/http-diactoros
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

use Qlimix\Http\Response\HandlerRunnerResponseEmitter;
use Qlimix\Http\Response\DiactorosJsonResponse;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

$responseCreation = new DiactorosJsonResponse();
$response = $responseCreation->response([], 200, ['x-foo' => 'foobar']);

$emitter = new SapiEmitter();
$responseEmitter = new HandlerRunnerResponseEmitter($emitter);
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
