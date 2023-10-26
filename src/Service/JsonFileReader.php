<?php

namespace App\Service;

use App\Service\JsonFileReaderInterface;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class JsonFileReader implements JsonFileReaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function read(string $filePath)
    {
        // Check if the file exists
        if (!file_exists($filePath)) {
            throw new FileNotFoundException(sprintf('File not found at path: %s', $filePath));
        }

        // Read the file
        $fileContent = file_get_contents($filePath);

        if ($fileContent === false) {
            throw new \RuntimeException(sprintf('Could not read file at path: %s', $filePath));
        }

        // Decode the JSON content
        $jsonData = json_decode($fileContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException(sprintf('Invalid JSON file at path: %s', $filePath));
        }

        return $jsonData;
    }

    // For PHP 8
    /*
    public function read(string $filePath): array
    {
        // Check if the file exists
        if (!file_exists($filePath)) {
            throw new FileNotFoundException(sprintf('File not found at path: %s', $filePath));
        }

        // Read the file
        $fileContent = file_get_contents($filePath);

        if ($fileContent === false) {
            throw new \RuntimeException(sprintf('Could not read file at path: %s', $filePath));
        }

        // Decode the JSON content
        $jsonData = json_decode($fileContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException(sprintf('Invalid JSON file at path: %s', $filePath));
        }

        return $jsonData;
    }
    */
}
