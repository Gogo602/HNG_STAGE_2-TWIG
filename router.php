<?php
// router.php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$fullPath = __DIR__ . '/' . $path;

if (file_exists($fullPath) && is_file($fullPath)) {
    // If the request is for an existing file, serve it directly.
    // This is crucial for your CSS, images, etc.
    return false;
}

// For all other requests, run your main index.php script.
require __DIR__ . '/api/index.php';
