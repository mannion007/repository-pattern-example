<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

require_once('vendor/autoload.php');

$container = new ContainerBuilder();
$loader = new YamlFileLoader(
    $container,
    new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR)
);
$loader->load('services.yml');

/** @var \Mannion007\RepositoryPattern\Repository\GameRepository $gameRepository */
$gameRepository = $container->get('game-repository');

echo '<h3>All Games</h3>';
var_dump($gameRepository->findAll());

echo '<h3>Game #5</h3>';
var_dump($gameRepository->find(5));

echo '<h3>Megadrive Games #5</h3>';
var_dump($gameRepository->findMegadrive());