#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';
$entityManager = require __DIR__ . '/../bootstrap.php';

use App\Command\CreateUserCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new CreateUserCommand($entityManager));

$application->run();