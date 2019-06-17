<?php declare(strict_types=1);

namespace Qlimix\Tests\Http\Response;

use PHPUnit\Framework\TestCase;
use Qlimix\Http\Response\DiactorosJsonResponse;

final class DiactorosJsonResponseTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnJsonResult(): void
    {
        $headerName = 'x-foo';
        $headerValue = 'foobar';
        $response = new DiactorosJsonResponse();

        $response = $response->response(['foo' => 'bar'], 200, [$headerName => $headerValue]);

        $this->assertSame($headerValue, $response->getHeader($headerName)[0]);
        $this->assertSame('{"foo":"bar"}', $response->getBody()->getContents());
    }
}
