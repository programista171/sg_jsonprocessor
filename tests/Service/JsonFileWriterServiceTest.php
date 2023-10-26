<?php

namespace App\Tests\Service;

use App\Service\JsonFileWriterService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Exception\SerializationException;
use Symfony\Component\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

class JsonFileWriterServiceTest extends TestCase
{
    private $serializer;
    private $filesystem;
    private $logger;
    private $jsonFileWriterService;

    protected function setUp(): void
    {
        $this->serializer = $this->createMock(SerializerInterface::class);
        $this->filesystem = $this->createMock(Filesystem::class);
        $this->logger = $this->createMock(LoggerInterface::class);
        $this->jsonFileWriterService = new JsonFileWriterService($this->serializer, $this->filesystem, $this->logger);
    }

    public function testWriteToFileSuccessfully(): void
    {
        // Arrange
        $filename = 'success.json';
        $data = ['key' => 'value'];

        $this->serializer->expects($this->once())
            ->method('serialize')
            ->willReturn(json_encode($data));

        $this->filesystem->expects($this->once())
            ->method('dumpFile')
            ->with($filename, json_encode($data));

        $this->logger->expects($this->once())
            ->method('info')
            ->with("Successfully wrote to {$filename}");

        // Act
        $this->jsonFileWriterService->writeToFile($filename, $data);

        // Assert
        // All expectations are automatically verified by PHPUnit at the end of the test
    }

    public function testWriteToFileIOException(): void
    {
        // Arrange
        $filename = 'failure.json';
        $data = ['key' => 'value'];

        $this->serializer->expects($this->once())
            ->method('serialize')
            ->willReturn(json_encode($data));

        $this->filesystem->expects($this->once())
            ->method('dumpFile')
            ->willThrowException(new IOException('An error occurred'));

        $this->logger->expects($this->once())
            ->method('error')
            ->with("File writing failed for {$filename}", ['error' => 'An error occurred']);

        // Act & Assert
        $this->expectException(IOException::class);
        $this->jsonFileWriterService->writeToFile($filename, $data);
    }

    public function testWriteToFileSerializationException(): void
    {
        // Arrange
        $filename = 'failure.json';
        $data = ['key' => 'value'];

        $this->serializer->expects($this->once())
            ->method('serialize')
            ->willThrowException(new SerializationException('An error occurred'));

        $this->logger->expects($this->once())
            ->method('error')
            ->with("Serialization failed for {$filename}", ['error' => 'An error occurred']);

        // Act & Assert
        $this->expectException(SerializationException::class);
        $this->jsonFileWriterService->writeToFile($filename, $data);
    }
}
