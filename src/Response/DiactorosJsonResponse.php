<?php declare(strict_types=1);

namespace Qlimix\Http\Response;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as PSRResponseInterface;

final class DiactorosJsonResponse implements ResponseInterface
{
    /**
     * @inheritdoc
     */
    public function response(array $data, int $status = 200, array $headers = []): PSRResponseInterface
    {
        return new JsonResponse($data, $status, $headers);
    }
}
