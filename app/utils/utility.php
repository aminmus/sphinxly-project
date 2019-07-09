<?php
namespace App\Utils;

// Sanitize a string, use after validation
function sanitizeInput($input)
{
    $input = trim($input); // Trim whitespace from beginning/end
    $input = htmlspecialchars($input); // Convert special characters to HTML entities

    return $input;
}
