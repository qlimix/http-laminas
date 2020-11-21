<?php declare(strict_types=1);

namespace Qlimix\Tests\Http\Response;

use Laminas\HttpHandlerRunner\Emitter\EmitterInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Qlimix\Http\Response\LaminasHandlerRunnerResponseEmitter;

final class LaminasHandlerRunnerResponseEmitterTest extends TestCase
{
    private MockObject $emitter;
    private LaminasHandlerRunnerResponseEmitter $handlerRunner;

    protected function setUp(): void
    {
        $this->emitter = $this->createMock(EmitterInterface::class);
        $this->handlerRunner = new LaminasHandlerRunnerResponseEmitter($this->emitter);
    }

    /**
     * @test
     */
    public function shouldEmit(): void
    {
        $this->emitter->expects($this->once())
            ->method('emit');

        $this->handlerRunner->emit($this->createMock(ResponseInterface::class));
    }
}
