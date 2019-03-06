<?php declare(strict_types=1);

namespace Qlimix\Http\Response;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

final class DiactorosJsonResponse implements JsonResponseInterface
{
    /**
     * @inheritdoc
     */
    public function createJsonResponse(array $data, int $status = 200, array $headers = []): ResponseInterface
    {
        return new JsonResponse($data, $status, $headers);
    }
}
