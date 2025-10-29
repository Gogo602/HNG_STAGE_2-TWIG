<?php

require __DIR__ . '/../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader);

$uri = $_SERVER['REQUEST_URI'];
$uri = strtok($uri, '?');

if ($uri === '/') {
    echo $twig->render('home.twig', ['name' => 'Vercel']);
} elseif ($uri === '/login') {
    echo $twig->render('login.twig', ['page_title' => 'Login']);
} elseif ($uri === '/register') {
    echo $twig->render('register.twig', ['page_title' => 'Register']);
} else {
    echo $twig->render('404.twig');
}
