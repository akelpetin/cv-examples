<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception as DoctrineDbalException;

$connectionParams = [
    'dbname'   => 'akelpetin_cv',
    'user'     => 'akelpetin',
    'password' => 'development',
    'host'     => '127.0.0.1',
    'port'     => 8082,
    'driver'   => 'mysqli',
];
try {
    $conn = DriverManager::getConnection($connectionParams);
} catch (DoctrineDbalException $e) {
    die($e->getMessage());
}

return $conn;