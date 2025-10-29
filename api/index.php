<?php

// Start the session at the very beginning of the script
session_start();

require __DIR__ . '/../vendor/autoload.php';

// Set up Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader);

// Check login status
$isLoggedIn = isset($_SESSION['user_id']); // Assuming 'user_id' is set upon login

// Data array to be passed to all templates
$templateData = [
    'isLoggedIn' => $isLoggedIn,
    'session' => $_SESSION, // You can pass the entire session if needed
];

// Handle different routes
$uri = $_SERVER['REQUEST_URI'];
$uri = strtok($uri, '?');

if ($uri === '/') {
    // Merge the general template data with page-specific data
    echo $twig->render('pages/home.twig', array_merge($templateData, ['name' => 'HNG']));
} elseif ($uri === '/login') {
    echo $twig->render('pages/login.twig', array_merge($templateData, ['page_title' => 'Login']));
} elseif ($uri === '/register') {
    echo $twig->render('pages/register.twig', array_merge($templateData, ['page_title' => 'Register']));
} elseif ($uri === '/logout') {
    // Handle logout logic
    session_destroy();
    header('Location: /'); // Redirect to home page
    exit;
} else {
    echo $twig->render('pages/404.twig', $templateData);
}

