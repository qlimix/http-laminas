<?php declare(strict_types=1);

namespace Qlimix\Tests\Http\Request;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\UploadedFileInterface;
use Qlimix\Http\Request\DiactorosServerRequestBuilder;

final class DiactorosServerRequestBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnJsonResult(): void
    {
        $request = new DiactorosServerRequestBuilder();

        $serverName = 'foo_1';
        $serverValue = 'foo_2';

        $queryName = 'foo_3';
        $queryValue = 'foo_4';

        $bodyName = 'foo_5';
        $bodyValue = 'foo_6';

        $cookieName = 'foo_7';
        $cookieValue = 'foo_8';

        $fileValue = [
            'tmp_name' => 'foo_9',
            'size' => 10,
            'error' => 1,
            'name' => 'foo_12',
            'type' => 'foo_13',
        ];

        $request = $request->build(
            [$serverName => $serverValue],
            [$queryName => $queryValue],
            [$bodyName => $bodyValue],
            [$cookieName => $cookieValue],
            [$fileValue]
        );

        $this->assertSame($serverValue, $request->getServerParams()[$serverName]);
        $this->assertSame($queryValue, $request->getQueryParams()[$queryName]);
        $this->assertSame($bodyValue, $request->getParsedBody()[$bodyName]);
        $this->assertSame($cookieValue, $request->getCookieParams()[$cookieName]);

        /** @var UploadedFileInterface $file */
        $file = $request->getUploadedFiles()[0];
        $this->assertSame($fileValue['size'], $file->getSize());
        $this->assertSame($fileValue['error'], $file->getError());
        $this->assertSame($fileValue['name'], $file->getClientFilename());
        $this->assertSame($fileValue['type'], $file->getClientMediaType());

    }
}
