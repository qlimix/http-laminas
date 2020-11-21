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
    public function shouldCreateRequest(): void
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

        self::assertSame($serverValue, $request->getServerParams()[$serverName]);
        self::assertSame($queryValue, $request->getQueryParams()[$queryName]);
        self::assertSame($bodyValue, $request->getParsedBody()[$bodyName]);
        self::assertSame($cookieValue, $request->getCookieParams()[$cookieName]);

        /** @var UploadedFileInterface $file */
        $file = $request->getUploadedFiles()[0];
        self::assertSame($fileValue['size'], $file->getSize());
        self::assertSame($fileValue['error'], $file->getError());
        self::assertSame($fileValue['name'], $file->getClientFilename());
        self::assertSame($fileValue['type'], $file->getClientMediaType());
    }

    /**
     * @test
     */
    public function shouldCreateRequestFromGlobals(): void
    {
        $request = new DiactorosServerRequestBuilder();

        $serverName = 'foo_1';
        $serverValue = 'foo_2';

        $queryName = 'foo_3';
        $queryValue = 'foo_4';

        $cookieName = 'foo_5';
        $cookieValue = 'foo_6';

        $fileValue = [
            'tmp_name' => 'foo_7',
            'size' => 10,
            'error' => 1,
            'name' => 'foo_8',
            'type' => 'foo_9',
        ];

        $_SERVER[$serverName] = $serverValue;
        $_GET[$queryName] = $queryValue;
        $_COOKIE[$cookieName] = $cookieValue;
        $_FILES[] = $fileValue;

        $request = $request->buildFromGlobals();

        self::assertSame($serverValue, $request->getServerParams()[$serverName]);
        self::assertSame($queryValue, $request->getQueryParams()[$queryName]);
        self::assertSame($cookieValue, $request->getCookieParams()[$cookieName]);

        /** @var UploadedFileInterface $file */
        $file = $request->getUploadedFiles()[0];
        self::assertSame($fileValue['size'], $file->getSize());
        self::assertSame($fileValue['error'], $file->getError());
        self::assertSame($fileValue['name'], $file->getClientFilename());
        self::assertSame($fileValue['type'], $file->getClientMediaType());
    }
}
