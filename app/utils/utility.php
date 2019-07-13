<?php
declare(strict_types=1);

namespace App\Utils;

// Sanitize a string, use after validation
function sanitizeInput($input)
{
    $input = trim($input); // Trim whitespace from beginning/end
    $input = htmlspecialchars($input); // Convert special characters to HTML entities

    return $input;
}

// Create a csv file in given directory with given contents
function csvFile($dir, $fileName, array $contents)
{
    if (!is_dir($dir)) {
        mkdir($dir);
    }
    $file = fopen("{$dir}/{$fileName}.csv", 'w');

    return fputcsv($file, $contents);
}
