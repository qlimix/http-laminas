<?php declare(strict_types=1);

namespace Qlimix\Http\Request;

use Laminas\Diactoros\ServerRequestFactory;
use Psr\Http\Message\ServerRequestInterface;

final class DiactorosServerRequestBuilder implements ServerRequestBuilderInterface
{
    /**
     * @inheritDoc
     */
    public function build(
        ?array $server = null,
        ?array $query = null,
        ?array $body = null,
        ?array $cookies = null,
        ?array $files = null
    ): ServerRequestInterface {
        return ServerRequestFactory::fromGlobals($server, $query, $body, $cookies, $files);
    }

    /**
     * @inheritDoc
     */
    public function buildFromGlobals(): ServerRequestInterface
    {
        return ServerRequestFactory::fromGlobals();
    }
}
