<?php declare(strict_types=1);

namespace Qlimix\Http\Response;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

final class DiactorosNoContent implements NoContentInterface
{
    /**
     * @inheritdoc
     */
    public function noContent(): ResponseInterface
    {
        return (new Response())->withStatus(204);
    }
}
