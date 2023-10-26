<?php

namespace Tests\App\Service;

use App\Service\JsonFileReader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class JsonFileReaderTest extends TestCase
{
    private JsonFileReader $jsonFileReader;

    protected function setUp(): void
    {
        $this->jsonFileReader = new JsonFileReader();
    }

    public function testReadFileNotFound(): void
    {
        $this->expectException(FileNotFoundException::class);
        $this->jsonFileReader->read('nonexistent_file.json');
    }

    public function testReadEmptyFile(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'empty_json');
        file_put_contents($filePath, '');

        $this->expectException(\RuntimeException::class);
        $this->jsonFileReader->read($filePath);

        unlink($filePath);
    }

    public function testReadInvalidJson(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'invalid_json');
        file_put_contents($filePath, 'invalid json');

        $this->expectException(\RuntimeException::class);
        $this->jsonFileReader->read($filePath);

        unlink($filePath);
    }

    public function testReadValidJson(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'valid_json');
        $testData = ['key' => 'value'];
        file_put_contents($filePath, json_encode($testData));

        $result = $this->jsonFileReader->read($filePath);
        $this->assertSame($testData, $result);

        unlink($filePath);
    }

    public function testReadValidJsonArray(): void
    {
        $filePath = tempnam(sys_get_temp_dir(), 'valid_json');
        $testData = ['key1' => 'value1', 'key2' => 'value2'];
        file_put_contents($filePath, json_encode($testData));

        $result = $this->jsonFileReader->read($filePath);
        $this->assertSame($testData, $result);

        unlink($filePath);
    }
}
