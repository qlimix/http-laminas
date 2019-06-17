<?php declare(strict_types=1);

namespace Qlimix\Http\Response;

use Psr\Http\Message\ResponseInterface;
use Zend\HttpHandlerRunner\Emitter\EmitterInterface;

final class HandlerRunnerResponseEmitter implements ResponseEmitterInterface
{
    /** @var EmitterInterface */
    private $emitter;

    public function __construct(EmitterInterface $emitter)
    {
        $this->emitter = $emitter;
    }

    /**
     * @inheritDoc
     */
    public function emit(ResponseInterface $response): void
    {
        $this->emitter->emit($response);
    }
}
