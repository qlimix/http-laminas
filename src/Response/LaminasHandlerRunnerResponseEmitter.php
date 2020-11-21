<?php declare(strict_types=1);

namespace Qlimix\Http\Response;

use Laminas\HttpHandlerRunner\Emitter\EmitterInterface;
use Psr\Http\Message\ResponseInterface;

final class LaminasHandlerRunnerResponseEmitter implements ResponseEmitterInterface
{
    private EmitterInterface $emitter;

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
