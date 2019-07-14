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

// Create a csv file in given directory with given contents and send to client for download
function csvFile($dir, $fileName, array $contents)
{
    // Create directory
    if (!is_dir($dir)) {
        mkdir($dir);
    }
    
    // Write $contents to file
    $file = fopen("{$dir}/{$fileName}.csv", 'w');
    fputcsv($file, $contents);

    // Get full file path
    $filePath = realpath("{$dir}/{$fileName}.csv");

    // Set headers
    header('Content-Description: File Transfer');
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));

    // Output file
    return readfile($filePath);
}
