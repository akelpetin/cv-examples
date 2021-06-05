<?php

use App\Extensions\Doctrine\MatchAgainst;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$conn = require 'db-connection.php';

$paths = [dirname(__FILE__) . '/src/Entity'];
$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$config->addCustomStringFunction('MATCH_AGAINST', MatchAgainst::class);

try {
    $entityManager = EntityManager::create($conn, $config);
} catch (ORMException $e) {
    die($e->getMessage());
}

try {
    $entityManager->getConnection()->connect();
} catch (Throwable $e) {
    // failed to connect
    die(sprintf('Connection failed: %s', $e->getMessage()));
}

return $entityManager;