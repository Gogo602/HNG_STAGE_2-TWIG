<?php

// Require Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';

// Define the template directory
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');

// Create the Twig environment
$twig = new \Twig\Environment($loader);

// Define some data to pass to the template
$data = ['name' => 'Twig'];

// Render the template and output the result
echo $twig->render('home.twig', $data);
