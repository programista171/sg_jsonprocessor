<?php

namespace App\Service;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Exception\SerializationException;
use Symfony\Component\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

class JsonFileWriterService
{
    private SerializerInterface $serializer;
    private Filesystem $filesystem;
    private LoggerInterface $logger;

    public function __construct(
        SerializerInterface $serializer,
        Filesystem $filesystem,
        LoggerInterface $logger
    ) {
        $this->serializer = $serializer;
        $this->filesystem = $filesystem;
        $this->logger = $logger;
    }

    /**
     * Writes the given data to a JSON file.
     *
     * @param string $filename The name of the file to write to.
     * @param array $data The data to write to the file.
     * @throws IOException if the file could not be written.
     * @throws SerializationException if the data could not be serialized.
     */
    public function writeToFile(string $filename, array $data): void
    {
        try {
            $jsonData = $this->serializer->serialize($data, 'json');
            $this->filesystem->dumpFile($filename, $jsonData);
            $this->logger->info("Successfully wrote to {$filename}");
        } catch (IOException $e) {
            $this->logger->error("File writing failed for {$filename}", ['error' => $e->getMessage()]);
            throw $e;
        } catch (SerializationException $e) {
            $this->logger->error("Serialization failed for {$filename}", ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
