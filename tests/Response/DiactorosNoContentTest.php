<?php declare(strict_types=1);

namespace Qlimix\Tests\Http\Response;

use PHPUnit\Framework\TestCase;
use Qlimix\Http\Response\DiactorosNoContent;

final class DiactorosNoContentTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnNoContent(): void
    {
        $response = new DiactorosNoContent();

        $response = $response->noContent();

        $this->assertSame(204, $response->getStatusCode());
        $this->assertSame('', $response->getBody()->getContents());
    }
}
