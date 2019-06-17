<?php declare(strict_types=1);

namespace Qlimix\Http\Response;

use Psr\Http\Message\ResponseInterface as PSRResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

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
