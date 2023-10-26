<?php

namespace App\Service;

interface JsonFileReaderInterface
{
    /**
     * Read a JSON file and return the data.
     *
     * @param string $filePath The path to the JSON file.
     * @return array The data from the JSON file.
     */
    public function read(string $filePath);

    // For PHP 8
    // public function read(string $filePath): array;
}
